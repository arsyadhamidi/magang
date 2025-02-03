<?php

namespace App\Http\Controllers\Admin;

use PDF;
use App\Http\Controllers\Controller;
use App\Models\LaporanMagang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminLaporanMagangController extends Controller
{
    public function index(Request $request)
    {
        $query = LaporanMagang::query();

        // Filter berdasarkan status
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        $laporans = $query->latest()->get();

        return view('admin.laporan-magang.index', [
            'laporans' => $laporans,
        ]);
    }

    public function create()
    {
        $users = User::where('level', 'Mahasiswa')->latest()->get();
        return view('admin.laporan-magang.create', [
            'users' => $users,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'users_id' => 'required',
            'tgl_laporan' => 'required|date',
            'file_magang' => 'required|max:10248|mimes:pdf',
            'status' => 'required|max:255',
        ], [
            'users_id.required' => 'ID pengguna harus diisi.',
            'tgl_laporan.required' => 'Tanggal laporan harus diisi.',
            'tgl_laporan.date' => 'Tanggal laporan harus berupa tanggal yang valid.',
            'file_magang.required' => 'File Magang harus diunggah.',
            'file_magang.max' => 'Ukuran File Magang tidak boleh lebih dari 10 MB.',
            'file_magang.mimes' => 'File Magang harus berupa file PDF.',
            'status.required' => 'Status harus diisi.',
            'status.max' => 'Status tidak boleh lebih dari 255 karakter.',
        ]);

        if($request->file_magang){
            $validated['file_magang'] = $request->file('file_magang')->store('file_magang');
        }

        $validated['keterangan'] = $request->keterangan;

        LaporanMagang
        ::create($validated);

        return redirect()->route('data-laporanmagang.index')->with('success', 'Selamat ! Anda berhasil menambahkan data');
    }

    public function edit($id)
    {
        $users = User::where('level', 'Mahasiswa')->latest()->get();
        $laporans = LaporanMagang::where('id', $id)->first();
        return view('admin.laporan-magang.edit', [
            'users' => $users,
            'laporans' => $laporans,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'users_id' => 'required',
            'tgl_laporan' => 'required|date',
            'file_magang' => 'nullable|max:10248|mimes:pdf',
            'status' => 'required|max:255',
        ], [
            'users_id.required' => 'ID pengguna harus diisi.',
            'tgl_laporan.required' => 'Tanggal laporan harus diisi.',
            'tgl_laporan.date' => 'Tanggal laporan harus berupa tanggal yang valid.',
            'file_magang.max' => 'Ukuran File Magang tidak boleh lebih dari 10 MB.',
            'file_magang.mimes' => 'File Magang harus berupa file PDF.',
            'status.required' => 'Status harus diisi.',
            'status.max' => 'Status tidak boleh lebih dari 255 karakter.',
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

        $validated['keterangan'] = $request->keterangan;

        $laporans->update($validated);

        return redirect()->route('data-laporanmagang.index')->with('success', 'Selamat ! Anda berhasil memperbaharui data');
    }

    public function destroy($id)
    {
        $laporans = LaporanMagang::where('id', $id)->first();
        if($laporans->file_magang){
            Storage::delete($laporans->file_magang);
        }

        $laporans->delete();

        return redirect()->route('data-laporanmagang.index')->with('success', 'Selamat ! Anda berhasil menghapus data');
    }

    public function generatepdf(Request $request)
    {
        $query = LaporanMagang::query();

        // Filter berdasarkan status
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        // Dapatkan data berdasarkan filter
        $magangs = $query->latest()->get();

    	$pdf = PDF::loadview('admin.laporan-magang.export-pdf',['magangs'=> $magangs]);
    	return $pdf->stream('laporan-magang.pdf');
    }
}
