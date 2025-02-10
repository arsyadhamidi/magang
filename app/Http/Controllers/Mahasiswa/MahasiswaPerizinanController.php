<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Perizinan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MahasiswaPerizinanController extends Controller
{
    public function index(Request $request)
    {
        $query = Perizinan::where('users_id', Auth()->user()->id);

        // Filter berdasarkan status
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        // Dapatkan data berdasarkan filter
        $izins = $query->latest()->get();

        return view('mahasiswa.perizinan.index', [
            'izins' => $izins,
        ]);
    }

    public function create()
    {
        return view('mahasiswa.perizinan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|max:255',
            'tmp_lahir' => 'required|max:255',
            'tgl_lahir' => 'required|date',
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date',
            'jk' => 'required|max:255',
            'telp' => 'required|max:255',
            'universitas' => 'required|max:255',
            'surat_permohonan' => 'required|max:10248|mimes:pdf',
            'alamat' => 'required|max:500',
        ], [
            'nama.required' => 'Nama harus diisi.',
            'nama.max' => 'Nama tidak boleh lebih dari 255 karakter.',
            'tmp_lahir.required' => 'Tempat lahir harus diisi.',
            'tmp_lahir.max' => 'Tempat lahir tidak boleh lebih dari 255 karakter.',
            'tgl_lahir.required' => 'Tanggal lahir harus diisi.',
            'tgl_lahir.date' => 'Tanggal lahir harus berupa tanggal yang valid.',
            'tgl_mulai.required' => 'Tanggal Mulai Magang harus diisi.',
            'tgl_mulai.date' => 'Tanggal Mulai Magang harus berupa tanggal yang valid.',
            'tgl_selesai.required' => 'Tanggal Selesai Magang harus diisi.',
            'tgl_selesai.date' => 'Tanggal Selesai Magang harus berupa tanggal yang valid.',
            'jk.required' => 'Jenis kelamin harus dipilih.',
            'jk.max' => 'Jenis kelamin tidak boleh lebih dari 255 karakter.',
            'telp.required' => 'Nomor telepon harus diisi.',
            'telp.max' => 'Nomor telepon tidak boleh lebih dari 255 karakter.',
            'universitas.required' => 'Universitas harus diisi.',
            'universitas.max' => 'Universitas tidak boleh lebih dari 255 karakter.',
            'surat_permohonan.required' => 'Surat permohonan harus diunggah.',
            'surat_permohonan.max' => 'Ukuran surat permohonan tidak boleh lebih dari 10 MB.',
            'surat_permohonan.mimes' => 'Surat permohonan harus berupa file PDF.',
            'alamat.required' => 'Alamat harus diisi.',
            'alamat.max' => 'Alamat tidak boleh lebih dari 500 karakter.',
        ]);

        if ($request->surat_permohonan) {
            $validated['surat_permohonan'] = $request->file('surat_permohonan')->store('surat_permohonan');
        }

        $validated['users_id'] = Auth::user()->id;
        $validated['status'] = 'Proses';

        Perizinan::create($validated);

        return redirect()->route('mahasiswa-perizinan.index')->with('success', 'Selamat ! Anda berhasil menambahkan data');
    }

    public function edit($id)
    {
        $izins = Perizinan::where('id', $id)->first();
        return view('mahasiswa.perizinan.edit', [
            'izins' => $izins,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required|max:255',
            'tmp_lahir' => 'required|max:255',
            'tgl_lahir' => 'required|date',
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date',
            'jk' => 'required|max:255',
            'telp' => 'required|max:255',
            'universitas' => 'required|max:255',
            'surat_permohonan' => 'nullable|max:10248|mimes:pdf',
            'alamat' => 'required|max:500',
        ], [
            'nama.required' => 'Nama harus diisi.',
            'nama.max' => 'Nama tidak boleh lebih dari 255 karakter.',
            'tmp_lahir.required' => 'Tempat lahir harus diisi.',
            'tmp_lahir.max' => 'Tempat lahir tidak boleh lebih dari 255 karakter.',
            'tgl_lahir.required' => 'Tanggal lahir harus diisi.',
            'tgl_lahir.date' => 'Tanggal lahir harus berupa tanggal yang valid.',
            'tgl_mulai.required' => 'Tanggal Mulai Magang harus diisi.',
            'tgl_mulai.date' => 'Tanggal Mulai Magang harus berupa tanggal yang valid.',
            'tgl_selesai.required' => 'Tanggal Selesai Magang harus diisi.',
            'tgl_selesai.date' => 'Tanggal Selesai Magang harus berupa tanggal yang valid.',
            'jk.required' => 'Jenis kelamin harus dipilih.',
            'jk.max' => 'Jenis kelamin tidak boleh lebih dari 255 karakter.',
            'telp.required' => 'Nomor telepon harus diisi.',
            'telp.max' => 'Nomor telepon tidak boleh lebih dari 255 karakter.',
            'universitas.required' => 'Universitas harus diisi.',
            'universitas.max' => 'Universitas tidak boleh lebih dari 255 karakter.',
            'surat_permohonan.max' => 'Ukuran surat permohonan tidak boleh lebih dari 10 MB.',
            'surat_permohonan.mimes' => 'Surat permohonan harus berupa file PDF.',
            'alamat.required' => 'Alamat harus diisi.',
            'alamat.max' => 'Alamat tidak boleh lebih dari 500 karakter.',
        ]);

        $validated['users_id'] = Auth::user()->id;

        $izins = Perizinan::where('id', $id)->first();

        if ($request->surat_permohonan) {
            if ($izins->surat_permohonan) {
                Storage::delete($izins->surat_permohonan);
            }
            $validated['surat_permohonan'] = $request->file('surat_permohonan')->store('surat_permohonan');
        } else {
            $validated['surat_permohonan'] = $izins->surat_permohonan;
        }

        $izins->update($validated);

        return redirect()->route('mahasiswa-perizinan.index')->with('success', 'Selamat ! Anda berhasil memperbaharui data');
    }

    public function destroy($id)
    {
        $izins = Perizinan::where('id', $id)->first();
        if ($izins->surat_permohonan) {
            Storage::delete($izins->surat_permohonan);
        }

        $izins->delete();

        return redirect()->route('mahasiswa-perizinan.index')->with('success', 'Selamat ! Anda berhasil menghapus data');
    }
}
