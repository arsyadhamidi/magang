<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Perizinan;
use PDF;

class MahasiswaRiwayatController extends Controller
{
    public function index()
    {
        $izins = Perizinan::where('status', 'Disetujui')->latest()->get();
        return view('mahasiswa.riwayat.index', [
            'izins' => $izins,
        ]);
    }

    public function generatepdf($id)
    {

        $izins = Perizinan::where('id', $id)->first();
        $countIzins = Perizinan::where('status', 'Selesai')->count();

        $pdf = PDF::loadview('mahasiswa.riwayat.export-pdf', [
            'izins' => $izins,
            'countIzins' => $countIzins,
        ]);
        // return $pdf->download('laporan-pegawai-pdf');
        return $pdf->stream('surat-izin.pdf');
    }
}
