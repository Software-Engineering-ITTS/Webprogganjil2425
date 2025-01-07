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
        // Ambil data dengan eager loading
        $recentInvoices = Invoice::with(['customer', 'payments'])
            ->latest()
            ->take(5)
            ->get();

        $recentPayments = Payment::with(['invoice.customer'])
            ->latest()
            ->take(5)
            ->get();

        // Kalkulasi total
        $totalInvoices = Invoice::count();
        $totalCustomers = Customer::count();
        $totalPayments = Payment::where('status', 'success')->sum('amount');
        $outstandingPayments = Invoice::sum('grand_total') - $totalPayments;

        return view('dashboard', [
            'recentCustomers' => Customer::latest()->take(5)->get(),
            'recentInvoices' => $recentInvoices,
            'recentPayments' => $recentPayments,
            'totalInvoices' => $totalInvoices,
            'totalCustomers' => $totalCustomers,
            'totalPayments' => $totalPayments,
            'outstandingPayments' => $outstandingPayments,
            'chartData' => [
                'labels' => collect(range(1, 12))->map(fn($month) => date('F', mktime(0, 0, 0, $month, 1))),
                'data' => collect(range(1, 12))->map(fn($month) => Payment::whereMonth('created_at', $month)->sum('amount'))
            ]
        ]);
    }
}