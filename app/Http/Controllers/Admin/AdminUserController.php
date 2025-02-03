<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Perusahan;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index(Request $request)
    {
        // Ambil parameter pencarian dari request
        $level = $request->input('level');

        // Query data berdasarkan parameter pencarian
        $query = User::query();

        if ($level) {
            $query->where('level', $level);
        }

        $users = $query->latest()->get();
        $perusahaans = Perusahan::latest()->get();

        return view('admin.user.index', [
            'users' => $users,
            'perusahaans' => $perusahaans,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|max:255|unique:users,username',
            'password' => 'required',
            'level' => 'required',
            'telp' => 'required|regex:/^[0-9]+$/|max:15',
        ], [
            'name.required' => 'Nama wajib diisi.',
            'name.max' => 'Nama tidak boleh lebih dari 255 karakter.',
            'username.required' => 'Username wajib diisi.',
            'username.max' => 'Username tidak boleh lebih dari 255 karakter.',
            'username.unique' => 'Username sudah terdaftar, gunakan username lain.',
            'password.required' => 'Password wajib diisi.',
            'level.required' => 'Status wajib dipilih.',
            'telp.required' => 'Nomor telepon wajib diisi.',
            'telp.regex' => 'Nomor telepon hanya boleh berisi angka.',
            'telp.max' => 'Nomor telepon tidak boleh lebih dari 15 karakter.',
        ]);

        $validated['password'] = bcrypt($request->password);
        $validated['duplicate'] = $request->password;
        $validated['perusahaan_id'] = $request->perusahaan_id;

        User::create($validated);

        return back()->with('success', 'Selamat ! Anda berhasil menambahkan data user registrasi!');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'username' => 'nullable|max:255|unique:users,username',
            'password' => 'nullable',
            'level' => 'required',
            'telp' => 'required|regex:/^[0-9]+$/|max:15',
        ], [
            'name.required' => 'Nama wajib diisi.',
            'name.max' => 'Nama tidak boleh lebih dari 255 karakter.',
            'username.max' => 'Username tidak boleh lebih dari 255 karakter.',
            'username.unique' => 'Username sudah terdaftar, gunakan username lain.',
            'level.required' => 'Status wajib dipilih.',
            'telp.required' => 'Nomor telepon wajib diisi.',
            'telp.regex' => 'Nomor telepon hanya boleh berisi angka.',
            'telp.max' => 'Nomor telepon tidak boleh lebih dari 15 karakter.',
        ]);

        $users = User::where('id', $id)->first();

        $validated['username'] = $request->username ? $request->username : $users->username;
        $validated['password'] = $request->password ? bcrypt($request->password) : $users->duplicate;
        $validated['duplicate'] = $request->password ? $request->password : $users->duplicate;
        $validated['perusahaan_id'] = $request->perusahaan_id ? $request->perusahaan_id : $users->perusahaan_id;

        $users->update($validated);

        return back()->with('success', 'Selamat ! Anda berhasil memperbaharui data user registrasi!');
    }

    public function destroy($id)
    {
        $users = User::where('id', $id)->first();

        $users->delete();

        return back()->with('success', 'Selamat ! Anda berhasil menghapus data user registrasi!');
    }
}
