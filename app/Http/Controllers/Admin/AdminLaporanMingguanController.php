<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LaporanMingguan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminLaporanMingguanController extends Controller
{
    public function index(Request $request)
    {
        $query = LaporanMingguan::query();

        // Filter berdasarkan status
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        $laporans = $query->latest()->get();

        return view('admin.laporan-mingguan.index', [
            'laporans' => $laporans,
        ]);
    }

    public function create()
    {
        $users = User::where('level', 'Mahasiswa')->latest()->get();
        return view('admin.laporan-mingguan.create', [
            'users' => $users,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'users_id' => 'required',
            'tgl_laporan' => 'required|date',
            'file_logbook' => 'required|max:10248|mimes:pdf',
            'status' => 'required|max:255',
        ], [
            'users_id.required' => 'ID pengguna harus diisi.',
            'tgl_laporan.required' => 'Tanggal laporan harus diisi.',
            'tgl_laporan.date' => 'Tanggal laporan harus berupa tanggal yang valid.',
            'file_logbook.required' => 'File LogBook harus diunggah.',
            'file_logbook.max' => 'Ukuran File LogBook tidak boleh lebih dari 10 MB.',
            'file_logbook.mimes' => 'File LogBook harus berupa file PDF.',
            'status.required' => 'Status harus diisi.',
            'status.max' => 'Status tidak boleh lebih dari 255 karakter.',
        ]);

        if($request->file_logbook){
            $validated['file_logbook'] = $request->file('file_logbook')->store('file_logbook');
        }

        $validated['nilai'] = $request->nilai;

        LaporanMingguan::create($validated);

        return redirect()->route('data-laporanmingguan.index')->with('success', 'Selamat ! Anda berhasil menambahkan data');
    }

    public function edit($id)
    {
        $users = User::where('level', 'Mahasiswa')->latest()->get();
        $laporans = LaporanMingguan::where('id', $id)->first();
        return view('admin.laporan-mingguan.edit', [
            'users' => $users,
            'laporans' => $laporans,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'users_id' => 'required',
            'tgl_laporan' => 'required|date',
            'file_logbook' => 'nullable|max:10248|mimes:pdf',
            'status' => 'required|max:255',
        ], [
            'users_id.required' => 'ID pengguna harus diisi.',
            'tgl_laporan.required' => 'Tanggal laporan harus diisi.',
            'tgl_laporan.date' => 'Tanggal laporan harus berupa tanggal yang valid.',
            'file_logbook.max' => 'Ukuran File LogBook tidak boleh lebih dari 10 MB.',
            'file_logbook.mimes' => 'File LogBook harus berupa file PDF.',
            'status.required' => 'Status harus diisi.',
            'status.max' => 'Status tidak boleh lebih dari 255 karakter.',
        ]);

        $laporans = LaporanMingguan::where('id', $id)->first();

        if($request->file_logbook){
            if($laporans->file_logbook){
                Storage::delete($laporans->file_logbook);
            }
            $validated['file_logbook'] = $request->file('file_logbook')->store('file_logbook');
        }else{
            $validated['file_logbook'] = $laporans->file_logbook;
        }

        $validated['nilai'] = $request->nilai;

        $laporans->update($validated);

        return redirect()->route('data-laporanmingguan.index')->with('success', 'Selamat ! Anda berhasil memperbaharui data');
    }

    public function destroy($id)
    {
        $laporans = LaporanMingguan::where('id', $id)->first();
        if($laporans->file_logbook){
            Storage::delete($laporans->file_logbook);
        }

        $laporans->delete();

        return redirect()->route('data-laporanmingguan.index')->with('success', 'Selamat ! Anda berhasil menghapus data');
    }
}
