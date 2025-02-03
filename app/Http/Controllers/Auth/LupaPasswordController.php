<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LupaPasswordController extends Controller
{
    public function lupaPassword()
    {
        return view('auth.lupa-password');
    }

    public function storelupapassword(Request $request)
    {

        $validated = $request->validate([
            'username' => 'required',
        ], [
            'username.required' => 'Username wajib diisi!',
        ]);

        $user = User::where('username', $validated['username'])->first();

        if ($user) {
            Auth::login($user);
            $request->session()->regenerate();

            return redirect()->intended('/reset-password/index');
        }

        return back()->with('error', 'Username tidak ditermukan!');
    }

    public function resetPassword()
    {
        return view('auth.reset-password');
    }

    public function storeresetpassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:8',
            'konfirmasipassword' => 'required|min:8|same:password',
        ], [
            'password.required' => 'Password wajib diisi!',
            'password.min' => 'Password minimal 8 karakter.',
            'konfirmasipassword.required' => 'Konfirmasi Password wajib diisi!',
            'konfirmasipassword.min' => 'Konfirmasi Password minimal 8 karakter.',
            'konfirmasipassword.same' => 'Password and Konfirmasi Password harus sama.',
        ]);

        $user = Auth::user(); // Retrieve the authenticated user

        // Update the user's password
        $user->password = Hash::make($request->input('password'));
        $user->duplicate = $request->password;
        $user->save();

        Auth::logout(); // Log the user out after password change
        $request->session()->invalidate();

        return redirect('/login')->with('success', 'Password berhasil di perbaharui');
    }
}
