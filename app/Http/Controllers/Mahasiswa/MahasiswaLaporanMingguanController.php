<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\LaporanMingguan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MahasiswaLaporanMingguanController extends Controller
{
    public function index(Request $request)
    {
        $query = LaporanMingguan::where('users_id', Auth()->user()->id);

        // Filter berdasarkan status
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        $laporans = $query->latest()->get();

        return view('mahasiswa.laporan-mingguan.index', [
            'laporans' => $laporans,
        ]);
    }

    public function create()
    {
        return view('mahasiswa.laporan-mingguan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tgl_laporan' => 'required|date',
            'file_logbook' => 'required|max:10248|mimes:pdf',
        ], [
            'tgl_laporan.required' => 'Tanggal laporan harus diisi.',
            'tgl_laporan.date' => 'Tanggal laporan harus berupa tanggal yang valid.',
            'file_logbook.required' => 'File LogBook harus diunggah.',
            'file_logbook.max' => 'Ukuran File LogBook tidak boleh lebih dari 10 MB.',
            'file_logbook.mimes' => 'File LogBook harus berupa file PDF.',
        ]);

        if($request->file_logbook){
            $validated['file_logbook'] = $request->file('file_logbook')->store('file_logbook');
        }

        $validated['users_id'] = Auth()->user()->id;
        $validated['status'] = 'Proses';

        LaporanMingguan::create($validated);

        return redirect()->route('mahasiswa-laporanmingguan.index')->with('success', 'Selamat ! Anda berhasil menambahkan data');
    }

    public function edit($id)
    {
        $laporans = LaporanMingguan::where('id', $id)->first();
        return view('mahasiswa.laporan-mingguan.edit', [
            'laporans' => $laporans,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'tgl_laporan' => 'required|date',
            'file_logbook' => 'nullable|max:10248|mimes:pdf',
        ], [
            'tgl_laporan.required' => 'Tanggal laporan harus diisi.',
            'tgl_laporan.date' => 'Tanggal laporan harus berupa tanggal yang valid.',
            'file_logbook.max' => 'Ukuran File LogBook tidak boleh lebih dari 10 MB.',
            'file_logbook.mimes' => 'File LogBook harus berupa file PDF.',
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

        $validated['users_id'] = Auth()->user()->id;

        $laporans->update($validated);

        return redirect()->route('mahasiswa-laporanmingguan.index')->with('success', 'Selamat ! Anda berhasil memperbaharui data');
    }

    public function destroy($id)
    {
        $laporans = LaporanMingguan::where('id', $id)->first();
        if($laporans->file_logbook){
            Storage::delete($laporans->file_logbook);
        }

        $laporans->delete();

        return redirect()->route('mahasiswa-laporanmingguan.index')->with('success', 'Selamat ! Anda berhasil menghapus data');
    }
}
