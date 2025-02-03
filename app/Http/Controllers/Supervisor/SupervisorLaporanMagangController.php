<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use App\Models\LaporanMagang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SupervisorLaporanMagangController extends Controller
{
    public function index(Request $request)
    {
        $query = LaporanMagang::query();

        // Filter berdasarkan status
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        $laporans = $query->latest()->get();

        return view('supervisor.laporan-magang.index', [
            'laporans' => $laporans,
        ]);
    }

    public function edit($id)
    {
        $users = User::where('level', 'Mahasiswa')->latest()->get();
        $laporans = LaporanMagang::where('id', $id)->first();
        return view('supervisor.laporan-magang.edit', [
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

        $laporans = LaporanMagang::where('id', $id)->first();

        $validated['keterangan'] = $request->keterangan;

        $laporans->update($validated);

        return redirect()->route('supervisor-laporanmagang.index')->with('success', 'Selamat ! Anda berhasil memperbaharui data');
    }
}
