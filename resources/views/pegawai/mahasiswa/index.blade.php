@extends('dashboard.layout.master')
@section('menuDataMahasiswa', 'active')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="mb-3">
                <div class="card">
                    <div class="card-header">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModal">
                            <i class="fas fa-plus"></i>
                            Tambahkan Data Mahasiswa
                        </button>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-striped" id="myTable">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th style="width: 4%; text-align: center">#</th>
                                    <th>NIM</th>
                                    <th>Nama</th>
                                    <th>Universitas</th>
                                    <th>Jurusan</th>
                                    <th>Telepon</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mahasiswas as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->nim ?? '-' }}</td>
                                        <td>{{ $data->nama ?? '-' }}</td>
                                        <td>{{ $data->universitas ?? '-' }}</td>
                                        <td>{{ $data->jurusan ?? '-' }}, {{ $data->prodi ?? '-' }}</td>
                                        <td>{{ $data->no_hp ?? '-' }}</td>
                                        <td class="d-flex">
                                            <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                                data-bs-target="#editModal{{ $data->id }}">
                                                <i class="fas fa-edit"></i>
                                            </button>


                                            <div class="modal fade" id="editModal{{ $data->id }}"
                                                aria-labelledby="editModalLabel" aria-hidden="true">
                                                <form action="{{ route('data-mahasiswa.update', $data->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="editModalLabel">Edit
                                                                    Data Mahasiswa</h1>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="mb-3">
                                                                            <label>NIM</label>
                                                                            <input type="text" name="nim"
                                                                                class="form-control @error('nim') is-invalid @enderror"
                                                                                value="{{ old('nim', $data->nim ?? '-') }}"
                                                                                placeholder="Masukan nim">
                                                                            @error('nim')
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="mb-3">
                                                                            <label>Nama Lengkap</label>
                                                                            <input type="text" name="nama"
                                                                                class="form-control @error('nama') is-invalid @enderror"
                                                                                value="{{ old('nama', $data->nama ?? '-') }}"
                                                                                placeholder="Masukan nama lengkap">
                                                                            @error('nama')
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="mb-3">
                                                                            <label>Universitas</label>
                                                                            <input type="text" name="universitas"
                                                                                class="form-control @error('universitas') is-invalid @enderror"
                                                                                value="{{ old('universitas', $data->universitas ?? '-') }}"
                                                                                placeholder="Masukan universitas">
                                                                            @error('universitas')
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="mb-3">
                                                                            <label>Jurusan</label>
                                                                            <input type="text" name="jurusan"
                                                                                class="form-control @error('jurusan') is-invalid @enderror"
                                                                                value="{{ old('jurusan', $data->jurusan ?? '-') }}"
                                                                                placeholder="Masukan jurusan">
                                                                            @error('jurusan')
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="mb-3">
                                                                            <label>Program Studi</label>
                                                                            <input type="text" name="prodi"
                                                                                class="form-control @error('prodi') is-invalid @enderror"
                                                                                value="{{ old('prodi', $data->prodi ?? '-') }}"
                                                                                placeholder="Masukan program studi">
                                                                            @error('prodi')
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="mb-3">
                                                                            <label>Telepon</label>
                                                                            <input type="number" name="no_hp"
                                                                                class="form-control @error('no_hp') is-invalid @enderror"
                                                                                value="{{ old('no_hp', $data->no_hp ?? '-') }}"
                                                                                placeholder="Masukan telepon">
                                                                            @error('no_hp')
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12">
                                                                        <div class="mb-3">
                                                                            <label>Pengguna</label>
                                                                            <select name="users_id"
                                                                                class="form-control @error('users_id') is-invalid @enderror"
                                                                                id="selectedUsersEdit" style="width: 100%">
                                                                                <option value="" selected>Pilih
                                                                                    Pengguna
                                                                                </option>
                                                                                @foreach ($users as $val)
                                                                                    <option value="{{ $val->id }}"
                                                                                        {{ $data->users_id == $val->id ? 'selected' : '' }}>
                                                                                        {{ $val->name ?? '-' }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                            @error('users_id')
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

                                            <form action="{{ route('data-mahasiswa.destroy', $data->id) }}" method="POST">
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
        <form action="{{ route('data-mahasiswa.store') }}" method="POST">
            @csrf
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="tambahModalLabel">Tambah Data Mahasiswa</h1>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label>NIM</label>
                                    <input type="text" name="nim"
                                        class="form-control @error('nim') is-invalid @enderror"
                                        value="{{ old('nim') }}" placeholder="Masukan nim">
                                    @error('nim')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label>Nama Lengkap</label>
                                    <input type="text" name="nama"
                                        class="form-control @error('nama') is-invalid @enderror"
                                        value="{{ old('nama') }}" placeholder="Masukan nama lengkap">
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label>Universitas</label>
                                    <input type="text" name="universitas"
                                        class="form-control @error('universitas') is-invalid @enderror"
                                        value="{{ old('universitas') }}" placeholder="Masukan universitas">
                                    @error('universitas')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label>Jurusan</label>
                                    <input type="text" name="jurusan"
                                        class="form-control @error('jurusan') is-invalid @enderror"
                                        value="{{ old('jurusan') }}" placeholder="Masukan jurusan">
                                    @error('jurusan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label>Program Studi</label>
                                    <input type="text" name="prodi"
                                        class="form-control @error('prodi') is-invalid @enderror"
                                        value="{{ old('prodi') }}" placeholder="Masukan program studi">
                                    @error('prodi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label>Telepon</label>
                                    <input type="number" name="no_hp"
                                        class="form-control @error('no_hp') is-invalid @enderror"
                                        value="{{ old('no_hp') }}" placeholder="Masukan telepon">
                                    @error('no_hp')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label>Pengguna</label>
                                    <select name="users_id" class="form-control @error('users_id') is-invalid @enderror"
                                        id="selectedUsers" style="width: 100%">
                                        <option value="" selected>Pilih
                                            Pengguna
                                        </option>
                                        @foreach ($users as $val)
                                            <option value="{{ $val->id }}"
                                                {{ old('users_id') == $val->id ? 'selected' : '' }}>
                                                {{ $val->name ?? '-' }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('users_id')
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
            $('#selectedUsers').select2({
                theme: 'bootstrap4'
            });
            $('#selectedUsersEdit').select2({
                theme: 'bootstrap4'
            });
        });
    </script>
@endpush
