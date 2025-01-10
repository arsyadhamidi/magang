<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MahasiswaBiodataDiriController extends Controller
{
    public function update(Request $request)
    {
        $validated = $request->validate([
            'nim' => 'required|string|max:20',
            'nama' => 'required|string|max:100',
            'universitas' => 'required|string|max:100',
            'jurusan' => 'required|string|max:100',
            'prodi' => 'required|string|max:100',
            'no_hp' => 'required|digits_between:10,15',
            'foto_profile' => 'nullable|mimes:png,jpeg,jpg|max:10248',
        ], [
            'nim.required' => 'NIM wajib diisi.',
            'nim.string' => 'NIM harus berupa teks.',
            'nim.max' => 'NIM maksimal 20 karakter.',
            'nama.required' => 'Nama wajib diisi.',
            'nama.string' => 'Nama harus berupa teks.',
            'nama.max' => 'Nama maksimal 100 karakter.',
            'universitas.required' => 'Universitas wajib diisi.',
            'universitas.string' => 'Universitas harus berupa teks.',
            'universitas.max' => 'Universitas maksimal 100 karakter.',
            'jurusan.required' => 'Jurusan wajib diisi.',
            'jurusan.string' => 'Jurusan harus berupa teks.',
            'jurusan.max' => 'Jurusan maksimal 100 karakter.',
            'prodi.required' => 'Program studi wajib diisi.',
            'prodi.string' => 'Program studi harus berupa teks.',
            'prodi.max' => 'Program studi maksimal 100 karakter.',
            'no_hp.required' => 'Nomor HP wajib diisi.',
            'no_hp.digits_between' => 'Nomor HP harus berupa angka dengan panjang 10-15 digit.',
            'foto_profile.mimes' => 'Foto profil harus berupa file dengan tipe png, jpeg, atau jpg.',
            'foto_profile.max' => 'Ukuran foto profil maksimal 10 MB.',
        ]);

        $user = Auth::user();

        // Cari data mahasiswa berdasarkan `users_id`
        $mahasiswa = Mahasiswa::where('users_id', $user->id)->first();

        // Handle file upload
        if ($request->hasFile('foto_profile')) {
            // Hapus file lama jika ada
            if ($user->foto_profile) {
                Storage::delete($user->foto_profile);
            }

            // Simpan file baru
            $validated['foto_profile'] = $request->file('foto_profile')->store('profile_photo');

            // Update di tabel Users
            $user->update([
                'foto_profile' => $validated['foto_profile'],
            ]);
        }

        if (empty($mahasiswa)) {
            // Buat data baru jika mahasiswa belum ada
            Mahasiswa::create([
                'users_id' => Auth::user()->id,
                'nim' => $request->nim,
                'nama' => $request->nama,
                'universitas' => $request->universitas,
                'jurusan' => $request->jurusan,
                'prodi' => $request->prodi,
                'no_hp' => $request->no_hp,
            ]);
        } else {
            // Update data mahasiswa jika sudah ada
            $mahasiswa->update([
                'users_id' => Auth::user()->id,
                'nim' => $request->nim,
                'nama' => $request->nama,
                'universitas' => $request->universitas,
                'jurusan' => $request->jurusan,
                'prodi' => $request->prodi,
                'no_hp' => $request->no_hp,
            ]);
        }

        return back()->with('success', 'Selamat! Anda berhasil mengisi biodata mahasiswa.');
    }

}
