<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Izvlačenje broja logova grupisanih po receptu
        $logs_by_recipe = \App\Models\Log::with('recept')
            ->select('po_receptu', DB::raw('count(*) as total_logs'))
            ->groupBy('po_receptu')
            ->get()
            ->map(function ($item) {
                return [
                    'naziv_recepta' => optional($item->recept)->naziv ?? 'Nepoznato',
                    'total_logs' => $item->total_logs,
                ];
            });


        // Možeš dodati još podataka ovde ako želiš druge grafikone

        // Prosleđivanje podataka u view
        return view('admin.dashboard', compact('logs_by_recipe'));
    }
}
