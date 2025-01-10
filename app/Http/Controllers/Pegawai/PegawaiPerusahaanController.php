<?php

namespace App\Http\Controllers\Pegawai;

use App\Models\Perusahan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PegawaiPerusahaanController extends Controller
{
    public function index()
    {
        $perusahaans = Perusahan::latest()->get();
        return view('pegawai.perusahaan.index', [
            'perusahaans' => $perusahaans,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_perusahaan' => 'required|max:100',
            'kuota_perusahaan' => 'required|max:100',
            'telp_perusahaan' => 'required|max:100|regex:/^[0-9]+$/', // Tambahkan validasi angka untuk nomor telepon
            'alamat_perusahaan' => 'required|max:500',
            'deskripsi_perusahaan' => 'required|max:500',
        ], [
            'nama_perusahaan.required' => 'Nama perusahaan wajib diisi.',
            'nama_perusahaan.max' => 'Nama perusahaan tidak boleh lebih dari 100 karakter.',
            'kuota_perusahaan.required' => 'Kuota perusahaan wajib diisi.',
            'kuota_perusahaan.max' => 'Kuota perusahaan tidak boleh lebih dari 100 karakter.',
            'telp_perusahaan.required' => 'Nomor telepon perusahaan wajib diisi.',
            'telp_perusahaan.max' => 'Nomor telepon perusahaan tidak boleh lebih dari 100 karakter.',
            'telp_perusahaan.regex' => 'Nomor telepon hanya boleh berisi angka.',
            'alamat_perusahaan.required' => 'Alamat perusahaan wajib diisi.',
            'alamat_perusahaan.max' => 'Alamat perusahaan tidak boleh lebih dari 500 karakter.',
            'deskripsi_perusahaan.required' => 'Deskripsi perusahaan wajib diisi.',
            'deskripsi_perusahaan.max' => 'Deskripsi perusahaan tidak boleh lebih dari 500 karakter.',
        ]);

        Perusahan::create($validated);

        return back()->with('success', 'Selamat Anda berhasil menambahkan data perusahaan!');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_perusahaan' => 'required|max:100',
            'kuota_perusahaan' => 'required|max:100',
            'telp_perusahaan' => 'required|max:100|regex:/^[0-9]+$/', // Tambahkan validasi angka untuk nomor telepon
            'alamat_perusahaan' => 'required|max:500',
            'deskripsi_perusahaan' => 'required|max:500',
        ], [
            'nama_perusahaan.required' => 'Nama perusahaan wajib diisi.',
            'nama_perusahaan.max' => 'Nama perusahaan tidak boleh lebih dari 100 karakter.',
            'kuota_perusahaan.required' => 'Kuota perusahaan wajib diisi.',
            'kuota_perusahaan.max' => 'Kuota perusahaan tidak boleh lebih dari 100 karakter.',
            'telp_perusahaan.required' => 'Nomor telepon perusahaan wajib diisi.',
            'telp_perusahaan.max' => 'Nomor telepon perusahaan tidak boleh lebih dari 100 karakter.',
            'telp_perusahaan.regex' => 'Nomor telepon hanya boleh berisi angka.',
            'alamat_perusahaan.required' => 'Alamat perusahaan wajib diisi.',
            'alamat_perusahaan.max' => 'Alamat perusahaan tidak boleh lebih dari 500 karakter.',
            'deskripsi_perusahaan.required' => 'Deskripsi perusahaan wajib diisi.',
            'deskripsi_perusahaan.max' => 'Deskripsi perusahaan tidak boleh lebih dari 500 karakter.',
        ]);

        $perusahaans = Perusahan::where('id', $id)->first();

        $perusahaans->update($validated);

        return back()->with('success', 'Selamat Anda berhasil memperbaharui data perusahaan!');
    }

    public function destroy($id)
    {
        $perusahaans = Perusahan::where('id', $id)->first();

        $perusahaans->delete();

        return back()->with('success', 'Selamat Anda berhasil menghapus data perusahaan!');
    }
}
