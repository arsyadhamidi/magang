<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\Perizinan;
use App\Models\Perusahan;
use App\Models\User;
use Illuminate\Http\Request;

class AdminPerizinanController extends Controller
{
    public function index(Request $request)
    {
        $query = Perizinan::query();

        // Filter berdasarkan status
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        // Dapatkan data berdasarkan filter
        $izins = $query->latest()->get();

        // Data untuk dropdown
        $users = User::where('level', 'Mahasiswa')->latest()->get();

        return view('admin.perizinan.index', [
            'izins' => $izins,
            'users' => $users,
        ]);
    }
}
