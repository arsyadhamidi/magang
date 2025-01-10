<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;

class PegawaiMahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::latest()->get();
        $users = User::where('level', 'Mahasiswa')->latest()->get();
        return view('pegawai.mahasiswa.index', [
            'mahasiswas' => $mahasiswas,
            'users' => $users,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'users_id' => 'required|exists:users,id', // Harus ada di tabel users
            'nim' => 'required|max:255', // Wajib diisi, maksimal 255 karakter
            'nama' => 'required|max:255', // Wajib diisi, maksimal 255 karakter
            'jurusan' => 'required|max:255', // Wajib diisi, maksimal 255 karakter
            'prodi' => 'required|max:255', // Wajib diisi, maksimal 255 karakter
            'universitas' => 'required|max:255', // Wajib diisi, maksimal 255 karakter
            'no_hp' => 'required|regex:/^[0-9]+$/|max:15', // Wajib diisi, hanya angka, maksimal 15 karakter
        ], [
            'users_id.required' => 'ID pengguna wajib diisi.',
            'users_id.exists' => 'ID pengguna tidak ditemukan di database.',
            'nim.required' => 'NIM wajib diisi.',
            'nim.max' => 'NIM tidak boleh lebih dari 255 karakter.',
            'nama.required' => 'Nama wajib diisi.',
            'nama.max' => 'Nama tidak boleh lebih dari 255 karakter.',
            'jurusan.required' => 'Jurusan wajib diisi.',
            'jurusan.max' => 'Jurusan tidak boleh lebih dari 255 karakter.',
            'prodi.required' => 'Program studi wajib diisi.',
            'prodi.max' => 'Program studi tidak boleh lebih dari 255 karakter.',
            'universitas.required' => 'Nama universitas wajib diisi.',
            'universitas.max' => 'Nama universitas tidak boleh lebih dari 255 karakter.',
            'no_hp.required' => 'Nomor HP wajib diisi.',
            'no_hp.regex' => 'Nomor HP hanya boleh berisi angka.',
            'no_hp.max' => 'Nomor HP tidak boleh lebih dari 15 karakter.',
        ]);

        Mahasiswa::create($validated);

        return back()->with('success', 'Selamat ! Anda berhasil menambahkan data mahasiswa');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'users_id' => 'required|exists:users,id', // Harus ada di tabel users
            'nim' => 'required|max:255', // Wajib diisi, maksimal 255 karakter
            'nama' => 'required|max:255', // Wajib diisi, maksimal 255 karakter
            'jurusan' => 'required|max:255', // Wajib diisi, maksimal 255 karakter
            'prodi' => 'required|max:255', // Wajib diisi, maksimal 255 karakter
            'universitas' => 'required|max:255', // Wajib diisi, maksimal 255 karakter
            'no_hp' => 'required|regex:/^[0-9]+$/|max:15', // Wajib diisi, hanya angka, maksimal 15 karakter
        ], [
            'users_id.required' => 'ID pengguna wajib diisi.',
            'users_id.exists' => 'ID pengguna tidak ditemukan di database.',
            'nim.required' => 'NIM wajib diisi.',
            'nim.max' => 'NIM tidak boleh lebih dari 255 karakter.',
            'nama.required' => 'Nama wajib diisi.',
            'nama.max' => 'Nama tidak boleh lebih dari 255 karakter.',
            'jurusan.required' => 'Jurusan wajib diisi.',
            'jurusan.max' => 'Jurusan tidak boleh lebih dari 255 karakter.',
            'prodi.required' => 'Program studi wajib diisi.',
            'prodi.max' => 'Program studi tidak boleh lebih dari 255 karakter.',
            'universitas.required' => 'Nama universitas wajib diisi.',
            'universitas.max' => 'Nama universitas tidak boleh lebih dari 255 karakter.',
            'no_hp.required' => 'Nomor HP wajib diisi.',
            'no_hp.regex' => 'Nomor HP hanya boleh berisi angka.',
            'no_hp.max' => 'Nomor HP tidak boleh lebih dari 15 karakter.',
        ]);

        $mahasiswas = Mahasiswa::where('id', $id)->first();

        $mahasiswas->update($validated);

        return back()->with('success', 'Selamat ! Anda berhasil memperbaharui data mahasiswa');
    }

    public function destroy($id)
    {
        $mahasiswas = Mahasiswa::where('id', $id)->first();

        $mahasiswas->delete();

        return back()->with('success', 'Selamat ! Anda berhasil menghapus data mahasiswa');
    }
}
