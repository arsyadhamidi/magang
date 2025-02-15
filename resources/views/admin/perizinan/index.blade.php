@extends('dashboard.layout.master')
@section('menuDataPerizinan', 'active')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="mb-3">
                <form action="{{ route('data-perizinan.generatepdf') }}" method="POST" target="_blank">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label>Status</label>
                                        <select name="status" id="selectedStatus"
                                            class="form-control @error('status') is-invalid @enderror" style="width: 100%">
                                            <option value="" selected>Pilih Status</option>
                                            <option value="Diterima" {{ old('status') == 'Diterima' ? 'selected' : '' }}>
                                                Diterima</option>
                                            <option value="Proses" {{ old('status') == 'Proses' ? 'selected' : '' }}>
                                                Proses</option>
                                            <option value="Ditolak" {{ old('status') == 'Ditolak' ? 'selected' : '' }}>
                                                Ditolak</option>
                                        </select>
                                        @error('status')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-download"></i>
                                Download PDF
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
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
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th style="width: 4%; text-align: center;">No.</th>
                                    <th style="text-align: center;">Nama</th>
                                    <th style="text-align: center;">TTL</th>
                                    <th style="text-align: center;">JK</th>
                                    <th style="text-align: center;">Universitas</th>
                                    <th style="text-align: center;">Tgl. Magang</th>
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
                                            {{ \Carbon\Carbon::parse($data->tgl_mulai)->translatedFormat('d F Y') }},
                                            {{ \Carbon\Carbon::parse($data->tgl_selesai)->translatedFormat('d F Y') }}
                                        </td>
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
                                            <a href="{{ route('data-perizinan.edit', $data->id) }}"
                                                class="btn btn-sm btn-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{ asset('storage/' . $data->surat_permohonan) }}"
                                                class="btn btn-sm btn-info mx-2" target="_blank">
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
@push('custom-script')
    <script>
        $('#selectedStatus').select2({
            theme: 'bootstrap4'
        });
    </script>
@endpush
