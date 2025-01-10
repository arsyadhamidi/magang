@extends('dashboard.layout.master')

@section('menuMahasiswaPerizinan', 'active')

@section('content')
    <div class="row">
        @php
            $user = Auth()->user();
            $mahasiswa = \App\Models\Mahasiswa::where('users_id', $user->id)
                ->orderBy('id', 'desc')
                ->first();
            $izin = \App\Models\Perizinan::where('mahasiswa_id', $mahasiswa->id)
                ->orderBy('id', 'desc')
                ->first();
            $izinProses = \App\Models\Perizinan::where('mahasiswa_id', $mahasiswa->id)
                ->where('status', 'Proses')
                ->orderBy('id', 'desc')
                ->first();
        @endphp
        @if (!empty($izin))
            <div class="col-lg-12">
                <div class="mb-3">
                    <div class="alert alert-success">
                        <h4><b>Selamat Anda sudah mendaftarkan diri untuk magang di
                                {{ $izin->perusahaan->nama_perusahaan ?? '-' }}!</b>
                        </h4>
                        <p>{{ $izin->perusahaan->deskripsi_perusahaan ?? '-' }}</p>
                        <p>{{ $izin->perusahaan->telp_perusahaan ?? '-' }}</p>
                        @if ($izinProses)
                            <form action="{{ route('mahasiswa-perizinan.destroy', $izin->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-warning"
                                    onclick="return confirm('Apakah anda yakin untuk menghapus data ini ?')">
                                    <i class="fas fa-trash-alt"></i>
                                    Pilih Tempat Lain
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        @endif
        <div class="col-lg-12">
            <div class="mb-3">
                <div class="card">
                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-striped" id="myTable">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th style="width: 4%; text-align: center">#</th>
                                    <th>Perusahaan</th>
                                    <th>Kuota</th>
                                    <th>Telepon</th>
                                    <th>Alamat</th>
                                    <th>Deskripsi</th>
                                    <th>Mahasiswa</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($perusahaans as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->nama_perusahaan ?? '-' }}</td>
                                        <td>{{ $data->kuota_perusahaan ?? '-' }}</td>
                                        <td>{{ $data->telp_perusahaan ?? '-' }}</td>
                                        <td>{{ $data->alamat_perusahaan ?? '-' }}</td>
                                        <td>{{ $data->deskripsi_perusahaan ?? '-' }}</td>
                                        <td>
                                            <ol>
                                                @foreach ($data->perizinan as $izin)
                                                    @if ($izin->mahasiswa)
                                                        <li>{{ $izin->mahasiswa->nama ?? '-' }}</li>
                                                    @else
                                                        <li>-</li>
                                                    @endif
                                                @endforeach
                                            </ol>
                                        </td>
                                        <td>
                                            @php
                                                $users = Auth()->user();
                                                $mahasiswas = \App\Models\Mahasiswa::where(
                                                    'users_id',
                                                    $users->id,
                                                )->first();
                                                $mahasiswaExists = $data->perizinan->contains(
                                                    'mahasiswa_id',
                                                    $mahasiswas->id ?? null,
                                                );
                                                // Pengecekan global apakah mahasiswa sudah terdaftar di tabel perizinan
                                                $isAlreadyRegistered = \App\Models\Perizinan::where(
                                                    'mahasiswa_id',
                                                    $mahasiswas->id ?? null,
                                                )->exists();
                                            @endphp

                                            <!-- Menonaktifkan semua tombol "Daftar" jika mahasiswa sudah terdaftar -->
                                            @if ($isAlreadyRegistered)
                                                <button type="button" class="btn btn-sm btn-info" disabled>
                                                    <i class="fas fa-pen"></i> Daftar
                                                </button>
                                            @else
                                                <a href="{{ route('mahasiswa-perizinan.show', $data->id) }}"
                                                    class="btn btn-sm btn-info">
                                                    <i class="fas fa-pen"></i> Daftar
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
