@extends('dashboard.layout.master')
@section('menuDataUser', 'active')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="mb-3">
                <form action="{{ route('data-user.index') }}" method="GET">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"><b>Pencarian Data</b></h4>
                            <br>
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <select name="level" class="form-control @error('level') is-invalid @enderror"
                                            id="selectedLevelSearch" style="width: 100%">
                                            <option value="" selected>Pilih Status</option>
                                            <option value="Admin" {{ request('level') == 'Admin' ? 'selected' : '' }}>
                                                Admin
                                            </option>
                                            <option value="Mahasiswa"
                                                {{ request('level') == 'Mahasiswa' ? 'selected' : '' }}>
                                                Mahasiswa
                                            </option>
                                            <option value="Operator" {{ request('level') == 'Operator' ? 'selected' : '' }}>
                                                Operator
                                            </option>
                                            <option value="Supervisor"
                                                {{ request('level') == 'Supervisor' ? 'selected' : '' }}>
                                                Supervisor
                                            </option>
                                            <option value="Kepala" {{ request('level') == 'Kepala' ? 'selected' : '' }}>
                                                Kepala
                                            </option>
                                        </select>
                                        @error('level')
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
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="mb-3">
                <div class="card">
                    <div class="card-header">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModal">
                            <i class="fas fa-plus"></i>
                            Tambahkan Data Pengguna
                        </button>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-striped" id="myTable">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th style="width: 4%; text-align: center">#</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Telepon</th>
                                    <th>Perusahaan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->name ?? '-' }}</td>
                                        <td>{{ $data->username ?? '-' }}</td>
                                        <td>{{ $data->duplicate ?? '-' }}</td>
                                        <td>{{ $data->telp ?? '-' }}</td>
                                        <td>{{ $data->perusahaan->nama_perusahaan ?? '-' }}</td>
                                        <td>{{ $data->level ?? '-' }}</td>
                                        <td class="d-flex">
                                            <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                                data-bs-target="#editModal{{ $data->id }}">
                                                <i class="fas fa-edit"></i>
                                            </button>


                                            <div class="modal fade" id="editModal{{ $data->id }}"
                                                aria-labelledby="editModalLabel" aria-hidden="true">
                                                <form action="{{ route('data-user.update', $data->id) }}" method="POST">
                                                    @csrf
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="editModalLabel">Edit
                                                                    Data Pengguna</h1>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="mb-3">
                                                                            <label>Nama Lengkap</label>
                                                                            <input type="text" name="name"
                                                                                class="form-control @error('name') is-invalid @enderror"
                                                                                value="{{ old('name', $data->name ?? '-') }}"
                                                                                placeholder="Masukan nama lengkap">
                                                                            @error('name')
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="mb-3">
                                                                            <label>Username</label>
                                                                            <input type="text" name="username"
                                                                                class="form-control @error('username') is-invalid @enderror"
                                                                                value="{{ old('username') }}"
                                                                                placeholder="Masukan username">
                                                                            @error('username')
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="mb-3">
                                                                            <label>Password</label>
                                                                            <input type="password" name="password"
                                                                                class="form-control @error('password') is-invalid @enderror"
                                                                                value="{{ old('password', $data->duplicate ?? '-') }}"
                                                                                placeholder="Masukan password">
                                                                            @error('password')
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="mb-3">
                                                                            <label>Telepon</label>
                                                                            <input type="number" name="telp"
                                                                                class="form-control @error('telp') is-invalid @enderror"
                                                                                value="{{ old('telp', $data->telp ?? '-') }}"
                                                                                placeholder="Masukan telepon">
                                                                            @error('telp')
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12">
                                                                        <div class="mb-3">
                                                                            <label>Perusahaan</label>
                                                                            <select name="perusahaan_id"
                                                                                class="form-control @error('perusahaan_id') is-invalid @enderror"
                                                                                id="selectedPerusahaanEdit" style="width: 100%">
                                                                                <option value="" selected>Pilih Perusahaan</option>
                                                                                @foreach ($perusahaans as $val)
                                                                                    <option value="{{ $val->id }}" {{ $data->perusahaan_id == $val->id ? 'selected' : '' }}>
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
                                                                    <div class="col-lg-12">
                                                                        <div class="mb-3">
                                                                            <label>Status Pengguna</label>
                                                                            <select name="level"
                                                                                class="form-control @error('level') is-invalid @enderror"
                                                                                id="selectedLevelEdit" style="width: 100%">
                                                                                <option value="" selected>Pilih Status
                                                                                </option>
                                                                                <option value="Admin"
                                                                                    {{ $data->level == 'Admin' ? 'selected' : '' }}>
                                                                                    Admin
                                                                                </option>
                                                                                <option value="Mahasiswa"
                                                                                    {{ $data->level == 'Mahasiswa' ? 'selected' : '' }}>
                                                                                    Mahasiswa
                                                                                </option>
                                                                                <option value="Operator"
                                                                                    {{ $data->level == 'Operator' ? 'selected' : '' }}>
                                                                                    Operator
                                                                                </option>
                                                                                <option value="Supervisor"
                                                                                    {{ $data->level == 'Supervisor' ? 'selected' : '' }}>
                                                                                    Supervisor
                                                                                </option>
                                                                                <option value="Kepala"
                                                                                    {{ $data->level == 'Kepala' ? 'selected' : '' }}>
                                                                                    Kepala
                                                                                </option>
                                                                            </select>
                                                                            @error('level')
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

                                            <form action="{{ route('data-user.destroy', $data->id) }}" method="POST">
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
        <form action="{{ route('data-user.store') }}" method="POST">
            @csrf
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="tambahModalLabel">Tambah Data Pengguna</h1>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label>Nama Lengkap</label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name') }}" placeholder="Masukan nama lengkap">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label>Username</label>
                                    <input type="text" name="username"
                                        class="form-control @error('username') is-invalid @enderror"
                                        value="{{ old('username') }}" placeholder="Masukan username">
                                    @error('username')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label>Password</label>
                                    <input type="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        value="{{ old('password') }}" placeholder="Masukan password">
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label>Telepon</label>
                                    <input type="number" name="telp"
                                        class="form-control @error('telp') is-invalid @enderror"
                                        value="{{ old('telp') }}" placeholder="Masukan telepon">
                                    @error('telp')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label>Perusahaan</label>
                                    <select name="perusahaan_id"
                                        class="form-control @error('perusahaan_id') is-invalid @enderror"
                                        id="selectedPerusahaan" style="width: 100%">
                                        <option value="" selected>Pilih Perusahaan</option>
                                        @foreach ($perusahaans as $data)
                                            <option value="{{ $data->id }}" {{ old('perusahaan_id') == $data->id ? 'selected' : '' }}>
                                                {{ $data->nama_perusahaan ?? '-' }}
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
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label>Status Pengguna</label>
                                    <select name="level" class="form-control @error('level') is-invalid @enderror"
                                        id="selectedLevel" style="width: 100%">
                                        <option value="" selected>Pilih Status</option>
                                        <option value="Admin" {{ old('level') == 'Admin' ? 'selected' : '' }}>
                                            Admin
                                        </option>
                                        <option value="Mahasiswa" {{ old('level') == 'Mahasiswa' ? 'selected' : '' }}>
                                            Mahasiswa
                                        </option>
                                        <option value="Operator" {{ old('level') == 'Operator' ? 'selected' : '' }}>
                                            Operator
                                        </option>
                                        <option value="Supervisor" {{ old('level') == 'Supervisor' ? 'selected' : '' }}>
                                            Supervisor
                                        </option>
                                        <option value="Kepala" {{ old('level') == 'Kepala' ? 'selected' : '' }}>Kepala
                                        </option>
                                    </select>
                                    @error('level')
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
            $('#selectedLevel').select2({
                theme: 'bootstrap4'
            });
            $('#selectedPerusahaan').select2({
                theme: 'bootstrap4'
            });
            $('#selectedLevelEdit').select2({
                theme: 'bootstrap4'
            });
            $('#selectedPerusahaanEdit').select2({
                theme: 'bootstrap4'
            });
            $('#selectedLevelSearch').select2({
                theme: 'bootstrap4'
            });
        });
    </script>
@endpush
