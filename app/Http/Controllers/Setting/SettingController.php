<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $users = Auth::user();
        return view('setting.index', [
            'users' => $users,
        ]);
    }

    public function updateprofile(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:100',
            'telp' => 'required|max:100',
        ], [
            'name.required' => 'Nama Lengkap wajib diisi',
            'telp.required' => 'Nomor Telepon wajib diisi',
            'name.max' => 'Nama Lengkap maksimal 100 karakter',
            'telp.max' => 'Nomor Telepon maksimal 100 karakter',
        ]);

        User::where('id', Auth::user()->id)->update($validated);

        return back()->with('success', 'Selamat ! Anda berhasil memperbaharui data profile');
    }

    public function updateusername(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|max:100|unique:users,username',
        ], [
            'username.required' => 'Username wajib diisi',
            'username.max' => 'Username maksimal 100 karakter',
            'username.unique' => 'Username sudah tersedia',
        ]);

        User::where('id', Auth::user()->id)->update($validated);

        return back()->with('success', 'Selamat ! Anda berhasil memperbaharui username');
    }

    public function updatepassword(Request $request)
    {
        $validated = $request->validate([
            'password' => 'required|max:100',
        ], [
            'password.required' => 'Password wajib diisi',
            'password.max' => 'Password maksimal 100 karakter',
        ]);

        $validated['password'] = bcrypt($request->password);
        $validated['duplicate'] = $request->password;

        User::where('id', Auth::user()->id)->update($validated);

        return back()->with('success', 'Selamat ! Anda berhasil memperbaharui password');
    }

    public function updategambar(Request $request)
    {
        $validated = $request->validate([
            'foto_profile' => 'required|max:10248|mimes:png,jpg,jpeg',
        ], [
            'foto_profile.required' => 'Foto Profile wajib diisi',
            'foto_profile.max' => 'Foto Profile maksimal 10 MB',
            'foto_profile.mimes' => 'Foto Profile harus memiliki format PNG, JPG, atau JPEG',
        ]);

        $users = Auth::user();

        if ($request->file('foto_profile')) {
            if ($users->foto_profile) {
                Storage::delete($users->foto_profile);
            }

            $validated['foto_profile'] = $request->file('foto_profile')->store('foto_profile');
        } else {
            $validated['foto_profile'] = $users->foto_profile;
        }

        User::where('id', $users->id)->update($validated);

        return back()->with('success', 'Selamat ! Anda berhasil memperbaharui foto profile');
    }

    public function hapusgambar()
    {
        $users = Auth::user();
        if ($users->foto_profile) {
            Storage::delete($users->foto_profile);
        }

        User::where('id', $users->id)->update([
            'foto_profile' => null,
        ]);

        return back()->with('success', 'Selamat ! Anda berhasil menghapus foto profile');
    }
}
