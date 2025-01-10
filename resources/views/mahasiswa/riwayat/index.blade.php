@extends('dashboard.layout.master')
@section('menuMahasiswaRiwayat', 'active')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="mb-3">
                <div class="card">
                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-striped" id="myTable">
                            <thead>
                                <tr>
                                    <th style="width: 4%">No.</th>
                                    <th>Perusahaan</th>
                                    <th>Mahasiswa</th>
                                    <th>Tgl. Mulai</th>
                                    <th>Tgl. Selesai</th>
                                    <th>Status</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($izins as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->perusahaan->nama_perusahaan ?? '-' }}</td>
                                        <td>{{ $data->mahasiswa->nama ?? '-' }}</td>
                                        <td>{{ $data->tgl_mulai ?? '-' }}</td>
                                        <td>{{ $data->tgl_selesai ?? '-' }}</td>
                                        <td>
                                            @if ($data->status == 'Proses')
                                                <span class="badge badge-warning">{{ $data->status ?? '-' }}</span>
                                            @elseif($data->status == 'Disetujui')
                                                <span class="badge badge-success">{{ $data->status ?? '-' }}</span>
                                            @elseif($data->status == 'Ditolak')
                                                <span class="badge badge-danger">{{ $data->status ?? '-' }}</span>
                                            @else
                                                <span class="badge badge-secondary">{{ $data->status ?? '-' }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $data->keterangan ?? '-' }}</td>
                                        <td>
                                            <a href="{{ route('mahasiswa-riwayat.generatepdf', $data->id) }}"
                                                class="btn btn-sm btn-info" target="_blank">
                                                Surat Izin
                                            </a>
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
