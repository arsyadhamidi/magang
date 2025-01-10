@extends('dashboard.layout.master')
@section('menuDataPerizinan', 'active')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="mb-3">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('data-perizinan.index') }}" method="GET">
                            @csrf
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <select name="perusahaan_id"
                                            class="form-control @error('perusahaan_id') is-invalid @enderror"
                                            id="selectedPerusahaanSearch" style="width: 100%">
                                            <option value="" selected>Pilih Perusahaan</option>
                                            @foreach ($perusahaans as $data)
                                                <option value="{{ $data->id }}"
                                                    {{ request('perusahaan_id') == $data->id ? 'selected' : '' }}>
                                                    {{ $data->nama_perusahaan ?? '-' }}</option>
                                            @endforeach
                                        </select>
                                        @error('perusahaan_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <select name="status" class="form-control @error('status') is-invalid @enderror"
                                            id="selectedStatusSearch" style="width: 100%">
                                            <option value="" selected>Pilih Status</option>
                                            <option value="Proses" {{ request('status') == 'Proses' ? 'selected' : '' }}>
                                                Proses
                                            </option>
                                            <option value="Disetujui"
                                                {{ request('status') == 'Disetujui' ? 'selected' : '' }}>
                                                Disetujui
                                            </option>
                                            <option value="Ditolak" {{ request('status') == 'Ditolak' ? 'selected' : '' }}>
                                                Ditolak
                                            </option>
                                        </select>
                                        @error('status')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <button type="submit" class="btn btn-sm btn-info">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="mb-3">
                <div class="card">
                    <div class="card-header">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModal">
                            <i class="fas fa-plus"></i>
                            Tambahkan Data Perizinan
                        </button>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-striped" id="myTable">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th style="width: 4%; text-align: center">#</th>
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
                                        <td class="d-flex">
                                            <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                                data-bs-target="#editModal{{ $data->id }}">
                                                <i class="fas fa-edit"></i>
                                            </button>

                                            <!-- Edit Modal -->
                                            <div class="modal fade" id="editModal{{ $data->id }}"
                                                aria-labelledby="editModalLabel" aria-hidden="true">
                                                <form action="{{ route('data-perizinan.update', $data->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="editModalLabel">Edit
                                                                    Data Perizinan Magang</h1>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="mb-3">
                                                                            <label>Perusahaan</label>
                                                                            <select name="perusahaan_id"
                                                                                class="form-control @error('perusahaan_id') is-invalid @enderror"
                                                                                id="selectedPerusahaanEdit"
                                                                                style="width: 100%">
                                                                                <option value="" selected>Pilih
                                                                                    Perusahaan</option>
                                                                                @foreach ($perusahaans as $val)
                                                                                    <option value="{{ $val->id }}"
                                                                                        {{ $data->perusahaan_id == $val->id ? 'selected' : '' }}>
                                                                                        {{ $val->nama_perusahaan ?? '-' }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                            @error('perusahaan_id')
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="mb-3">
                                                                            <label>Mahasiswa</label>
                                                                            <select name="mahasiswa_id"
                                                                                class="form-control @error('mahasiswa_id') is-invalid @enderror"
                                                                                id="selectedMahasiswaEdit"
                                                                                style="width: 100%">
                                                                                <option value="" selected>Pilih
                                                                                    Mahasiswa</option>
                                                                                @foreach ($mahasiswas as $val)
                                                                                    <option value="{{ $val->id }}"
                                                                                        {{ $data->mahasiswa_id == $val->id ? 'selected' : '' }}>
                                                                                        {{ $val->nama ?? '-' }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            @error('mahasiswa_id')
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="mb-3">
                                                                            <label>Tanggal Mulai</label>
                                                                            <input type="date" name="tgl_mulai"
                                                                                class="form-control @error('tgl_mulai') is-invalid @enderror"
                                                                                value="{{ old('tgl_mulai', $data->tgl_mulai) }}">
                                                                            @error('tgl_mulai')
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="mb-3">
                                                                            <label>Tanggal Selesai</label>
                                                                            <input type="date" name="tgl_selesai"
                                                                                class="form-control @error('tgl_selesai') is-invalid @enderror"
                                                                                value="{{ old('tgl_selesai', $data->tgl_selesai) }}">
                                                                            @error('tgl_selesai')
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="mb-3">
                                                                            <label>Pegawai</label>
                                                                            <select name="pegawai_id"
                                                                                class="form-control @error('pegawai_id') is-invalid @enderror"
                                                                                id="selectedPegawaiEdit"
                                                                                style="width: 100%">
                                                                                <option value="" selected>Pilih
                                                                                    Pegawai</option>
                                                                                @foreach ($users as $val)
                                                                                    <option value="{{ $val->id }}"
                                                                                        {{ $data->pegawai_id == $val->id ? 'selected' : '' }}>
                                                                                        {{ $val->name ?? '-' }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            @error('pegawai_id')
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="mb-3">
                                                                            <label>Status</label>
                                                                            <select name="status"
                                                                                class="form-control @error('status') is-invalid @enderror"
                                                                                id="selectedStatusEdit"
                                                                                style="width: 100%">
                                                                                <option value="" selected>Pilih
                                                                                    Status
                                                                                </option>
                                                                                <option value="Proses"
                                                                                    {{ $data->status == 'Proses' ? 'selected' : '' }}>
                                                                                    Proses
                                                                                </option>
                                                                                <option value="Disetujui"
                                                                                    {{ $data->status == 'Disetujui' ? 'selected' : '' }}>
                                                                                    Disetujui
                                                                                </option>
                                                                                <option value="Ditolak"
                                                                                    {{ $data->status == 'Ditolak' ? 'selected' : '' }}>
                                                                                    Ditolak
                                                                                </option>
                                                                            </select>
                                                                            @error('status')
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12">
                                                                        <div class="mb-3">
                                                                            <label>Keterangan</label>
                                                                            <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" rows="5"
                                                                                placeholder="Masukan keterangan">{{ old('keterangan', $data->keterangan ?? '-') }}</textarea>
                                                                            @error('keterangan')
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Simpan
                                                                    Data</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                            <form action="{{ route('data-perizinan.destroy', $data->id) }}"
                                                method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger mx-2"
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

    <!-- Tambah Modal -->
    <div class="modal fade" id="tambahModal" aria-labelledby="tambahModalLabel" aria-hidden="true">
        <form action="{{ route('data-perizinan.store') }}" method="POST">
            @csrf
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="tambahModalLabel">Tambah Data Perizinan Magang</h1>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label>Perusahaan</label>
                                    <select name="perusahaan_id"
                                        class="form-control @error('perusahaan_id') is-invalid @enderror"
                                        id="selectedPerusahaan" style="width: 100%">
                                        <option value="" selected>Pilih Perusahaan</option>
                                        @foreach ($perusahaans as $data)
                                            <option value="{{ $data->id }}"
                                                {{ old('perusahaan_id') == $data->id ? 'selected' : '' }}>
                                                {{ $data->nama_perusahaan ?? '-' }}</option>
                                        @endforeach
                                    </select>
                                    @error('perusahaan_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label>Mahasiswa</label>
                                    <select name="mahasiswa_id"
                                        class="form-control @error('mahasiswa_id') is-invalid @enderror"
                                        id="selectedMahasiswa" style="width: 100%">
                                        <option value="" selected>Pilih Mahasiswa</option>
                                        @foreach ($mahasiswas as $data)
                                            <option value="{{ $data->id }}"
                                                {{ old('mahasiswa_id') == $data->id ? 'selected' : '' }}>
                                                {{ $data->nama ?? '-' }}</option>
                                        @endforeach
                                    </select>
                                    @error('mahasiswa_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label>Tanggal Mulai</label>
                                    <input type="date" name="tgl_mulai"
                                        class="form-control @error('tgl_mulai') is-invalid @enderror"
                                        value="{{ old('tgl_mulai', \Carbon\Carbon::now()->format('Y-m-d')) }}">
                                    @error('tgl_mulai')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label>Tanggal Selesai</label>
                                    <input type="date" name="tgl_selesai"
                                        class="form-control @error('tgl_selesai') is-invalid @enderror"
                                        value="{{ old('tgl_selesai', \Carbon\Carbon::now()->format('Y-m-d')) }}">
                                    @error('tgl_selesai')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label>Pegawai</label>
                                    <select name="pegawai_id"
                                        class="form-control @error('pegawai_id') is-invalid @enderror"
                                        id="selectedPegawai" style="width: 100%">
                                        <option value="" selected>Pilih Pegawai</option>
                                        @foreach ($users as $data)
                                            <option value="{{ $data->id }}"
                                                {{ old('pegawai_id') == $data->id ? 'selected' : '' }}>
                                                {{ $data->name ?? '-' }}</option>
                                        @endforeach
                                    </select>
                                    @error('pegawai_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label>Status</label>
                                    <select name="status" class="form-control @error('status') is-invalid @enderror"
                                        id="selectedStatus" style="width: 100%">
                                        <option value="" selected>Pilih Status</option>
                                        <option value="Proses" {{ old('status') == 'Proses' ? 'selected' : '' }}>Proses
                                        </option>
                                        <option value="Disetujui" {{ old('status') == 'Disetujui' ? 'selected' : '' }}>
                                            Disetujui
                                        </option>
                                        <option value="Ditolak" {{ old('status') == 'Ditolak' ? 'selected' : '' }}>Ditolak
                                        </option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label>Keterangan</label>
                                    <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" rows="5"
                                        placeholder="Masukan keterangan">{{ old('keterangan') }}</textarea>
                                    @error('keterangan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@push('custom-script')
    <script>
        $(document).ready(function() {
            $('#selectedPerusahaan').select2({
                theme: 'bootstrap4'
            });
            $('#selectedMahasiswa').select2({
                theme: 'bootstrap4'
            });
            $('#selectedStatus').select2({
                theme: 'bootstrap4'
            });
            $('#selectedPegawai').select2({
                theme: 'bootstrap4'
            });

            // =======================
            $('#selectedPerusahaanEdit').select2({
                theme: 'bootstrap4'
            });
            $('#selectedMahasiswaEdit').select2({
                theme: 'bootstrap4'
            });
            $('#selectedStatusEdit').select2({
                theme: 'bootstrap4'
            });
            $('#selectedPegawaiEdit').select2({
                theme: 'bootstrap4'
            });

            // Search
            $('#selectedPerusahaanSearch').select2({
                theme: 'bootstrap4'
            });
            $('#selectedStatusSearch').select2({
                theme: 'bootstrap4'
            });
        });
    </script>
@endpush
