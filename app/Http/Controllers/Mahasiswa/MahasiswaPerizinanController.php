<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\Perizinan;
use App\Models\Perusahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaPerizinanController extends Controller
{
    public function index()
    {
        $perusahaans = Perusahan::latest()->get();
        return view('mahasiswa.perizinan.index', [
            'perusahaans' => $perusahaans,
        ]);
    }

    public function show($id)
    {
        $perusahaans = Perusahan::where('id', $id)->first();
        return view('mahasiswa.perizinan.show', [
            'perusahaans' => $perusahaans,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date|after_or_equal:tgl_mulai',
            'keterangan' => 'nullable|string|max:500',
        ], [
            'tgl_mulai.required' => 'Tanggal mulai wajib diisi.',
            'tgl_mulai.date' => 'Tanggal mulai harus berupa format tanggal yang valid.',
            'tgl_selesai.required' => 'Tanggal selesai wajib diisi.',
            'tgl_selesai.date' => 'Tanggal selesai harus berupa format tanggal yang valid.',
            'tgl_selesai.after_or_equal' => 'Tanggal selesai harus setelah atau sama dengan tanggal mulai.',
            'keterangan.string' => 'Keterangan harus berupa teks.',
            'keterangan.max' => 'Keterangan maksimal 500 karakter.',
        ]);

        $users = Auth::user();
        $mahasiswas = Mahasiswa::where('users_id', $users->id)->first();
        $perusahaans = Perusahan::where('id', $request->perusahaan_id)->first();

        if (empty($perusahaans)) {
            return back()->with('error', 'Maaf ! Data Perusahaan tidak ditemukan!');
        }

        if (empty($mahasiswas)) {
            return back()->with('error', 'Maaf ! Data Mahasiswa anda belum tersedia, silahkan isi biodata mahasisa!');
        }

        if ($perusahaans->kuota_perusahaan <= 0) {
            return back()->with('error', 'Kuota perusahaan tidak tersedia lagi!');
        }

        $perusahaans->update([
            'kuota_perusahaan' => $perusahaans->kuota_perusahaan - 1,
        ]);

        Perizinan::create([
            'perusahaan_id' => $request->perusahaan_id,
            'mahasiswa_id' => $mahasiswas->id,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_selesai' => $request->tgl_selesai,
            'status' => 'Proses',
            'keterangan' => $request->keterangan ?? null,
        ]);

        return redirect()->route('mahasiswa-perizinan.index')->with('success', 'Selamat ! Anda berhasil mengajukan tempat magang!');
    }

    public function destroy($id)
    {
        // Ambil data perizinan berdasarkan ID
        $izins = Perizinan::find($id);

        // Periksa apakah data perizinan ditemukan
        if (!$izins) {
            return back()->with('error', 'Data perizinan tidak ditemukan.');
        }

        // Ambil data perusahaan yang terkait
        $perusahaans = Perusahan::find($izins->perusahaan_id);

        // Periksa apakah data perusahaan ditemukan
        if ($perusahaans) {
            // Tambahkan kuota perusahaan
            $perusahaans->update([
                'kuota_perusahaan' => $perusahaans->kuota_perusahaan + 1,
            ]);
        }

        // Hapus data perizinan
        $izins->delete();

        return back()->with('success', 'Selamat! Anda berhasil menghapus tempat magang Anda! Silakan pilih tempat magang lainnya.');
    }

}
