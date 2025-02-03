@extends('dashboard.layout.master')
@section('menuDataLaporanMingguan', 'active')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="mb-3">
                <div class="card">
                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-striped" id="myTable" style="width: 100%">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th style="width: 4%; text-align: center;">No.</th>
                                    <th style="text-align: center;">Nama</th>
                                    <th style="text-align: center;">Tanggal</th>
                                    <th style="text-align: center;">Status</th>
                                    <th style="text-align: center;">Nilai</th>
                                    <th style="text-align: center;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($laporans as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->users->name ?? '-' }}</td>
                                        <td>{{ \Carbon\Carbon::parse($data->tgl_laporan)->translatedFormat('d F Y') }}</td>
                                        <td>
                                            @if ($data->status == 'Periksa')
                                                <span class="badge badge-success">{{ $data->status ?? '-' }}</span>
                                            @elseif($data->status == 'Proses')
                                                <span class="badge badge-warning">{{ $data->status ?? '-' }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $data->nilai ?? 'Belum Dinilai' }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('supervisor-laporanmingguan.edit', $data->id) }}" class="btn btn-sm btn-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{ asset('storage/' . $data->file_logbook) }}" class="btn btn-sm btn-info mx-2" target="_blank">
                                                <i class="fas fa-download"></i>
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
