<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\LaporanMagang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MahasiswaLaporanMagangController extends Controller
{
    public function index(Request $request)
    {
        $query = LaporanMagang::where('users_id', Auth()->user()->id);

        // Filter berdasarkan status
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        $laporans = $query->latest()->get();

        return view('mahasiswa.laporan-magang.index', [
            'laporans' => $laporans,
        ]);
    }

    public function create()
    {
        return view('mahasiswa.laporan-magang.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tgl_laporan' => 'required|date',
            'file_magang' => 'required|max:10248|mimes:pdf',
        ], [
            'tgl_laporan.required' => 'Tanggal laporan harus diisi.',
            'tgl_laporan.date' => 'Tanggal laporan harus berupa tanggal yang valid.',
            'file_magang.required' => 'File Magang harus diunggah.',
            'file_magang.max' => 'Ukuran File Magang tidak boleh lebih dari 10 MB.',
            'file_magang.mimes' => 'File Magang harus berupa file PDF.',
        ]);

        if($request->file_magang){
            $validated['file_magang'] = $request->file('file_magang')->store('file_magang');
        }

        $validated['users_id'] = Auth()->user()->id;
        $validated['status'] = 'Proses';

        LaporanMagang::create($validated);

        return redirect()->route('mahasiswa-laporanmagang.index')->with('success', 'Selamat ! Anda berhasil menambahkan data');
    }

    public function edit($id)
    {
        $laporans = LaporanMagang::where('id', $id)->first();
        return view('mahasiswa.laporan-magang.edit', [
            'laporans' => $laporans,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'tgl_laporan' => 'required|date',
            'file_magang' => 'nullable|max:10248|mimes:pdf',
        ], [
            'tgl_laporan.required' => 'Tanggal laporan harus diisi.',
            'tgl_laporan.date' => 'Tanggal laporan harus berupa tanggal yang valid.',
            'file_magang.max' => 'Ukuran File Magang tidak boleh lebih dari 10 MB.',
            'file_magang.mimes' => 'File Magang harus berupa file PDF.',
        ]);

        $laporans = LaporanMagang::where('id', $id)->first();

        if($request->file_magang){
            if($laporans->file_magang){
                Storage::delete($laporans->file_magang);
            }
            $validated['file_magang'] = $request->file('file_magang')->store('file_magang');
        }else{
            $validated['file_magang'] = $laporans->file_magang;
        }

        $validated['users_id'] = Auth()->user()->id;

        $laporans->update($validated);

        return redirect()->route('mahasiswa-laporanmagang.index')->with('success', 'Selamat ! Anda berhasil memperbaharui data');
    }

    public function destroy($id)
    {
        $laporans = LaporanMagang::where('id', $id)->first();
        if($laporans->file_magang){
            Storage::delete($laporans->file_magang);
        }

        $laporans->delete();

        return redirect()->route('mahasiswa-laporanmagang.index')->with('success', 'Selamat ! Anda berhasil menghapus data');
    }
}
