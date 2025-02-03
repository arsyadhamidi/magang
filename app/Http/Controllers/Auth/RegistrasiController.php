<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegistrasiController extends Controller
{
    public function index()
    {
        return view('auth.registrasi');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:100',
            'username' => 'required|unique:users,username|max:100',
            'password' => 'required|max:100',
            'telp' => 'required|max:100',
        ], [
            'name.required' => 'Nama Lengkap wajib diisi',
            'username.required' => 'Username wajib diisi',
            'password.required' => 'Password wajib diisi',
            'telp.required' => 'Nomor Telepon wajib diisi',
            'name.max' => 'Nama Lengkap maksimal 100 karakter',
            'username.max' => 'Username maksimal 100 karakter',
            'password.max' => 'Password maksimal 100 karakter',
            'telp.max' => 'Nomor Telepon maksimal 100 karakter',
            'username.unique' => 'Username sudah tersedia',
        ]);

        $validated['password'] = bcrypt($request->password);
        $validated['duplicate'] = $request->password;
        $validated['level'] = 'Mahasiswa';

        User::create($validated);

        return redirect()->route('login')->with('success', 'Selamat ! Anda berhasil melakukan registrasi');
    }
}
