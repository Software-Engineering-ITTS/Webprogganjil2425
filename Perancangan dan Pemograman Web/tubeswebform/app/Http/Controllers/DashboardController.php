<?php
namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Customer;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'totalInvoices' => Invoice::count(),
            'totalCustomers' => Customer::count(),
            'totalPayments' => Payment::where('status', 'success')->sum('amount'),
            'outstandingPayments' => Invoice::sum('grand_total') - Payment::where('status', 'success')->sum('amount'),
            'recentInvoices' => Invoice::with('customer')->latest()->take(5)->get(),
            'recentPayments' => Payment::with('invoice')->latest()->take(5)->get(),
            'chartData' => $this->getChartData(),
        ];

        return view('dashboard', $data);
    }

    private function getChartData()
    {
        $days = collect(range(29, 0))->map(function ($day) {
            $date = now()->subDays($day);
            return [
                'date' => $date->format('Y-m-d'),
                'label' => $date->format('d M'),
                'total' => 0
            ];
        })->keyBy('date');

        Payment::where('status', 'success')
            ->where('payment_date', '>=', now()->subDays(30))
            ->get()
            ->groupBy(function ($payment) {
                return $payment->payment_date->format('Y-m-d');
            })
            ->each(function ($payments, $date) use (&$days) {
                if (isset($days[$date])) {
                    $days[$date]['total'] = $payments->sum('amount');
                }
            });

        return [
            'labels' => $days->pluck('label')->values(),
            'data' => $days->pluck('total')->values(),
        ];
    }
}