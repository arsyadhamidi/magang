@extends('dashboard.layout.master')
@section('menuDataPerizinan', 'active')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="mb-3">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('data-perizinan.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i>
                            Tambahkan Data Perizinan
                        </a>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-striped" id="myTable" style="width: 100%">
                            <thead>
                                <tr>
                                    <th style="width: 4%; text-align: center;">No.</th>
                                    <th style="text-align: center;">Nama</th>
                                    <th style="text-align: center;">TTL</th>
                                    <th style="text-align: center;">JK</th>
                                    <th style="text-align: center;">Universitas</th>
                                    <th style="text-align: center;">Status</th>
                                    <th style="text-align: center;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($izins as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->nama ?? '-' }}</td>
                                        <td>{{ $data->tmp_lahir ?? '-' }} /
                                            {{ \Carbon\Carbon::parse($data->tgl_lahir)->translatedFormat('d F Y') }}</td>
                                        <td>{{ $data->jk ?? '-' }}</td>
                                        <td>{{ $data->universitas ?? '-' }}</td>
                                        <td>
                                            @if ($data->status == 'Diterima')
                                                <span class="badge badge-success">{{ $data->status ?? '-' }}</span>
                                            @elseif($data->status == 'Proses')
                                                <span class="badge badge-warning">{{ $data->status ?? '-' }}</span>
                                            @elseif($data->status == 'Ditolak')
                                                <span class="badge badge-danger">{{ $data->status ?? '-' }}</span>
                                            @endif
                                        </td>
                                        <td class="d-flex">
                                            <a href="{{ route('data-perizinan.edit', $data->id) }}" class="btn btn-sm btn-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{ asset('storage/' . $data->surat_permohonan) }}" class="btn btn-sm btn-info mx-2" target="_blank">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <form action="{{ route('data-perizinan.destroy', $data->id) }}" method="POST">
                                                @csrf
                                                <button class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Apakah anda yakin untuk menghapus data ini ?');">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </form>
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
