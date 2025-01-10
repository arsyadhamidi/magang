@extends('dashboard.layout.master')

@section('menuDataPerusahaan', 'active')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="mb-3">
                <div class="card">
                    <div class="card-header">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModal">
                            <i class="fas fa-plus"></i>
                            Tambahkan Data Perusahaan
                        </button>
                    </div>
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
                                        <td class="d-flex">
                                            <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                                data-bs-target="#editModal{{ $data->id }}">
                                                <i class="fas fa-edit"></i>
                                            </button>


                                            <div class="modal fade" id="editModal{{ $data->id }}"
                                                aria-labelledby="editModalLabel" aria-hidden="true">
                                                <form action="{{ route('pegawai-perusahaan.update', $data->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="editModalLabel">Edit
                                                                    Data Perusahaan</h1>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="mb-3">
                                                                            <label>Nama Perusahaan</label>
                                                                            <input type="text" name="nama_perusahaan"
                                                                                class="form-control @error('nama_perusahaan') is-invalid @enderror"
                                                                                value="{{ old('nama_perusahaan', $data->nama_perusahaan ?? '-') }}"
                                                                                placeholder="Masukan nama perusahaan">
                                                                            @error('nama_perusahaan')
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="mb-3">
                                                                            <label>Telepon Perusahaan</label>
                                                                            <input type="number" name="telp_perusahaan"
                                                                                class="form-control @error('telp_perusahaan') is-invalid @enderror"
                                                                                value="{{ old('telp_perusahaan', $data->telp_perusahaan ?? '-') }}"
                                                                                placeholder="Masukan telepon perusahaan">
                                                                            @error('telp_perusahaan')
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12">
                                                                        <div class="mb-3">
                                                                            <label>Kuota Perusahaan</label>
                                                                            <input type="number" name="kuota_perusahaan"
                                                                                class="form-control @error('kuota_perusahaan') is-invalid @enderror"
                                                                                value="{{ old('kuota_perusahaan', $data->kuota_perusahaan ?? '-') }}"
                                                                                placeholder="Masukan kuota perusahaan">
                                                                            @error('kuota_perusahaan')
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12">
                                                                        <div class="mb-3">
                                                                            <label>Alamat Perusahaan</label>
                                                                            <textarea name="alamat_perusahaan" class="form-control @error('alamat_perusahaan') is-invalid @enderror" rows="5"
                                                                                placeholder="Masukan alamat perusahaan">{{ old('alamat_perusahaan', $data->alamat_perusahaan ?? '-') }}</textarea>
                                                                            @error('alamat_perusahaan')
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12">
                                                                        <div class="mb-3">
                                                                            <label>Deskripsi Perusahaan</label>
                                                                            <textarea name="deskripsi_perusahaan" class="form-control @error('deskripsi_perusahaan') is-invalid @enderror"
                                                                                rows="5" placeholder="Masukan deskripsi perusahaan">{{ old('deskripsi_perusahaan', $data->deskripsi_perusahaan ?? '-') }}</textarea>
                                                                            @error('deskripsi_perusahaan')
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

                                            <form action="{{ route('pegawai-perusahaan.destroy', $data->id) }}"
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
        <form action="{{ route('pegawai-perusahaan.store') }}" method="POST">
            @csrf
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="tambahModalLabel">Tambah Data Perusahaan</h1>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label>Nama Perusahaan</label>
                                    <input type="text" name="nama_perusahaan"
                                        class="form-control @error('nama_perusahaan') is-invalid @enderror"
                                        value="{{ old('nama_perusahaan') }}" placeholder="Masukan nama perusahaan">
                                    @error('nama_perusahaan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label>Telepon Perusahaan</label>
                                    <input type="number" name="telp_perusahaan"
                                        class="form-control @error('telp_perusahaan') is-invalid @enderror"
                                        value="{{ old('telp_perusahaan') }}" placeholder="Masukan telepon perusahaan">
                                    @error('telp_perusahaan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label>Kuota Perusahaan</label>
                                    <input type="number" name="kuota_perusahaan"
                                        class="form-control @error('kuota_perusahaan') is-invalid @enderror"
                                        value="{{ old('kuota_perusahaan') }}" placeholder="Masukan kuota perusahaan">
                                    @error('kuota_perusahaan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label>Alamat Perusahaan</label>
                                    <textarea name="alamat_perusahaan" class="form-control @error('alamat_perusahaan') is-invalid @enderror"
                                        rows="5" placeholder="Masukan alamat perusahaan">{{ old('alamat_perusahaan') }}</textarea>
                                    @error('alamat_perusahaan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label>Deskripsi Perusahaan</label>
                                    <textarea name="deskripsi_perusahaan" class="form-control @error('deskripsi_perusahaan') is-invalid @enderror"
                                        rows="5" placeholder="Masukan deskripsi perusahaan">{{ old('deskripsi_perusahaan') }}</textarea>
                                    @error('deskripsi_perusahaan')
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
