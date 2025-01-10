<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\Perizinan;
use App\Models\Perusahan;
use App\Models\User;
use Illuminate\Http\Request;

class AdminPerizinanController extends Controller
{
    public function index(Request $request)
    {
        $query = Perizinan::query();

        // Filter berdasarkan perusahaan_id
        if ($request->has('perusahaan_id') && $request->perusahaan_id != '') {
            $query->where('perusahaan_id', $request->perusahaan_id);
        }

        // Filter berdasarkan status
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        // Dapatkan data berdasarkan filter
        $izins = $query->latest()->get();

        // Data untuk dropdown
        $users = User::where('level', 'Pegawai')->latest()->get();
        $mahasiswas = Mahasiswa::latest()->get();
        $perusahaans = Perusahan::latest()->get();

        return view('admin.perizinan.index', [
            'izins' => $izins,
            'users' => $users,
            'mahasiswas' => $mahasiswas,
            'perusahaans' => $perusahaans,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'perusahaan_id' => 'required', // Wajib diisi dan harus ada di tabel `perusahaans`
            'mahasiswa_id' => 'required', // Wajib diisi dan harus ada di tabel `mahasiswas`
            'pegawai_id' => 'required', // Wajib diisi dan harus ada di tabel `pegawais`
            'tgl_mulai' => 'required|date|before_or_equal:tgl_selesai', // Wajib diisi, harus berupa tanggal, dan tidak boleh setelah tgl_selesai
            'tgl_selesai' => 'required|date|after_or_equal:tgl_mulai', // Wajib diisi, harus berupa tanggal, dan tidak boleh sebelum tgl_mulai
            'status' => 'required|in:Proses,Disetujui,Ditolak', // Wajib diisi, hanya menerima nilai tertentu
            'keterangan' => 'required|max:500', // Wajib diisi, maksimal 500 karakter
        ], [
            'perusahaan_id.required' => 'Perusahaan wajib diisi.',
            'mahasiswa_id.required' => 'Mahasiswa wajib diisi.',
            'pegawai_id.required' => 'Pegawai wajib diisi.',
            'tgl_mulai.required' => 'Tanggal mulai wajib diisi.',
            'tgl_mulai.date' => 'Tanggal mulai harus berupa tanggal yang valid.',
            'tgl_mulai.before_or_equal' => 'Tanggal mulai tidak boleh setelah tanggal selesai.',
            'tgl_selesai.required' => 'Tanggal selesai wajib diisi.',
            'tgl_selesai.date' => 'Tanggal selesai harus berupa tanggal yang valid.',
            'tgl_selesai.after_or_equal' => 'Tanggal selesai tidak boleh sebelum tanggal mulai.',
            'status.required' => 'Status wajib diisi.',
            'status.in' => 'Status hanya boleh diisi dengan nilai: aktif, selesai, atau dibatalkan.',
            'keterangan.required' => 'Keterangan wajib diisi.',
            'keterangan.max' => 'Keterangan tidak boleh lebih dari 500 karakter.',
        ]);

        Perizinan::create($validated);

        return back()->with('success', 'Selamat ! anda berhasil menambahkan data perizinan magang!');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'perusahaan_id' => 'required',
            'mahasiswa_id' => 'required',
            'pegawai_id' => 'required',
            'tgl_mulai' => 'required|date|before_or_equal:tgl_selesai', // Wajib diisi, harus berupa tanggal, dan tidak boleh setelah tgl_selesai
            'tgl_selesai' => 'required|date|after_or_equal:tgl_mulai', // Wajib diisi, harus berupa tanggal, dan tidak boleh sebelum tgl_mulai
            'status' => 'required|in:Proses,Disetujui,Ditolak', // Wajib diisi, hanya menerima nilai tertentu
            'keterangan' => 'required|max:500', // Wajib diisi, maksimal 500 karakter
        ], [
            'perusahaan_id.required' => 'Perusahaan wajib diisi.',
            'mahasiswa_id.required' => 'Mahasiswa wajib diisi.',
            'pegawai_id.required' => 'Pegawai wajib diisi.',
            'tgl_mulai.required' => 'Tanggal mulai wajib diisi.',
            'tgl_mulai.date' => 'Tanggal mulai harus berupa tanggal yang valid.',
            'tgl_mulai.before_or_equal' => 'Tanggal mulai tidak boleh setelah tanggal selesai.',
            'tgl_selesai.required' => 'Tanggal selesai wajib diisi.',
            'tgl_selesai.date' => 'Tanggal selesai harus berupa tanggal yang valid.',
            'tgl_selesai.after_or_equal' => 'Tanggal selesai tidak boleh sebelum tanggal mulai.',
            'status.required' => 'Status wajib diisi.',
            'status.in' => 'Status hanya boleh diisi dengan nilai: aktif, selesai, atau dibatalkan.',
            'keterangan.required' => 'Keterangan wajib diisi.',
            'keterangan.max' => 'Keterangan tidak boleh lebih dari 500 karakter.',
        ]);

        $izins = Perizinan::where('id', $id)->first();

        $izins->update($validated);

        return back()->with('success', 'Selamat ! anda berhasil memperbaharui data perizinan magang!');
    }

    public function destroy($id)
    {
        $izins = Perizinan::where('id', $id)->first();

        $izins->delete();

        return back()->with('success', 'Selamat ! anda berhasil menghapus data perizinan magang!');
    }
}
