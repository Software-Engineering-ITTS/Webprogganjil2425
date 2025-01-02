<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\History;
use App\Models\Kondisi_Mesins;
use App\Models\Mesins;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $category = Category::all();
        $mesin = Mesins::all();
        $user = User::where('role', 'user')->get();
        $history = History::all();

        // $temperature = Kondisi_Mesins::join('mesins', 'kondisi__mesins.mesin_id', '=', 'mesins.id')->whereBetween('temperature', [30, 80])
        //     ->get(['temperature', 'last_checked', 'mesins.nama as mesin_nama'])->map(function ($item) {
        //         $item->last_checked = Carbon::parse($item->last_checked)->format('d-M-Y');
        //         return $item;
        //     });

        $kondisi_mesin = Kondisi_Mesins::with('mesin')->orderBy('last_checked')->get();

        $groupedData = $kondisi_mesin->groupBy('mesin_id');

        // Format data untuk chart.js
        // $chartData = $groupedData->map(function ($group, $mesin_id) {
        //     return [
        //         'label' => $group->first()->mesin->nama ?? 'Unknown',
        //         'data' => $group->pluck('temperature'),
        //         'labels' => $group->pluck('last_checked')->map(fn($date) => $date->format('Y-m-d H:i:s'))->all(),
        //         'backgroundColor' => null, // Akan diisi di frontend
        //         'borderColor' => null, // Akan diisi di frontend
        //         'last_checked' => $group->pluck('last_checked')->map(fn($date) => $date->format('Y-m-d H:i:s')),
        //         'status' => $group->pluck('status')->all(),
        //     ];
        // });

        if ($groupedData->isEmpty()) {
            $chartData = [];
            $categories = [];
        } else {
            $chartData = $groupedData->map(function ($group, $mesin_id) {
                return [
                    'name' => $group->first()->mesin->nama ?? 'Unknown',
                    'data' => $group->pluck('temperature')->all(),
                    'last_checked' => $group->pluck('last_checked')->map(fn($date) => $date->format('Y-m-d H:i:s'))->all(),
                    'status' => $group->pluck('status')->all(),
                ];
            })->values();

            $categories = $groupedData->first()->pluck('last_checked')->map(fn($date) => $date->format('Y-m-d H:i:s'))->all();
        }

        return view('content.dashboard', compact('category', 'mesin', 'user', 'history', 'chartData', 'categories'));
    }
}
