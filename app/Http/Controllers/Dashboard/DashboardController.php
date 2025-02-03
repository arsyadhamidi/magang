<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\Perizinan;
use App\Models\Perusahan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::count();

        $currentYear = Carbon::now()->year;
        $years = range($currentYear, $currentYear + 5);

        $data = DB::table('perizinans')
            ->selectRaw('YEAR(tgl_mulai) as year, COUNT(*) as count')
            ->whereBetween(DB::raw('YEAR(tgl_mulai)'), [$currentYear, $currentYear + 5])
            ->groupBy('year')
            ->pluck('count', 'year');

        // Format data untuk chart
        $chartData = [];
        foreach ($years as $year) {
            $chartData[] = $data[$year] ?? 0; // Isi 0 jika tidak ada data
        }
        return view('dashboard.home.index', [
            'users' => $users,
            'chartYears' => $years,
            'chartData' => $chartData,
        ]);
    }
}
