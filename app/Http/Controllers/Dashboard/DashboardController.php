<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\LaporanMagang;
use App\Models\LaporanMingguan;
use App\Models\Perizinan;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::count();
        $mingguans = LaporanMingguan::count();
        $magangs = LaporanMagang::count();
        $izins = Perizinan::count();

        $perizinanData = DB::table('perizinans')
            ->selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc') // Mengurutkan berdasarkan tahun secara ascending
            ->orderBy('month', 'asc') // Mengurutkan berdasarkan bulan secara ascending
            ->get();

        // Array untuk nama bulan
        $bulan = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember',
        ];

        // Format data untuk dikirim ke view
        $months = [];
        $counts = [];
        foreach ($perizinanData as $data) {
            // Menggunakan nama bulan dari array
            $months[] = $bulan[$data->month] . ' ' . $data->year; // Format "Bulan Tahun"
            $counts[] = $data->count;
        }

        return view('dashboard.home.index', [
            'users' => $users,
            'mingguans' => $mingguans,
            'magangs' => $magangs,
            'izins' => $izins,
            'counts' => $counts,
            'months' => $months,
        ]);
    }
}
