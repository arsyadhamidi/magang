<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use App\Models\LaporanMingguan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SupervisorLaporanMingguan extends Controller
{
    public function index(Request $request)
    {
        $query = LaporanMingguan::query();

        // Filter berdasarkan status
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        $laporans = $query->latest()->get();

        return view('supervisor.laporan-mingguan.index', [
            'laporans' => $laporans,
        ]);
    }

    public function edit($id)
    {
        $users = User::where('level', 'Mahasiswa')->latest()->get();
        $laporans = LaporanMingguan::where('id', $id)->first();
        return view('supervisor.laporan-mingguan.edit', [
            'users' => $users,
            'laporans' => $laporans,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'required|max:255',
        ], [
            'status.required' => 'Status harus diisi.',
            'status.max' => 'Status tidak boleh lebih dari 255 karakter.',
        ]);

        $laporans = LaporanMingguan::where('id', $id)->first();

        $validated['nilai'] = $request->nilai;

        $laporans->update($validated);

        return redirect()->route('supervisor-laporanmingguan.index')->with('success', 'Selamat ! Anda berhasil memperbaharui data');
    }
}
