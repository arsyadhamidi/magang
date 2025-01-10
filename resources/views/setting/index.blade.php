@extends('dashboard.layout.master')
@section('menuDashboard', 'active')

@section('content')
    <div class="row">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            @if ($users->foto_profile)
                                <img src="{{ asset('storage/' . $users->foto_profile) }}"
                                    style="width: 100px; height: 100px; object-fit: cover" class="img-fluid rounded-circle"
                                    alt="">
                            @else
                                <img src="{{ asset('images/foto-profile.png') }}" width="100"
                                    class="img-fluid rounded-circle" alt="">
                            @endif
                            <p class="my-3 h5">{{ $users->name ?? '-' }}</p>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <hr>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label>Nama Lengkap</label>
                                <p>{{ $users->name ?? '-' }}</p>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <hr>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label>Username</label>
                                <p>{{ $users->username ?? '-' }}</p>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <hr>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label>Password</label>
                                <p>{{ $users->duplicate ?? '-' }}</p>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <hr>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label>Telepon</label>
                                <p>{{ $users->telp ?? '-' }}</p>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <hr>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label>Status</label>
                                <p>{{ $users->level ?? '-' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <button class="nav-link active" id="nav-profile-tab" data-bs-toggle="tab"
                                                data-bs-target="#nav-profile" type="button" role="tab"
                                                aria-controls="nav-profile" aria-selected="true">Profile</button>
                                            <button class="nav-link" id="nav-username-tab" data-bs-toggle="tab"
                                                data-bs-target="#nav-username" type="button" role="tab"
                                                aria-controls="nav-username" aria-selected="false">Username</button>
                                            <button class="nav-link" id="nav-password-tab" data-bs-toggle="tab"
                                                data-bs-target="#nav-password" type="button" role="tab"
                                                aria-controls="nav-password" aria-selected="false">Password</button>
                                            <button class="nav-link" id="nav-gambar-tab" data-bs-toggle="tab"
                                                data-bs-target="#nav-gambar" type="button" role="tab"
                                                aria-controls="nav-gambar" aria-selected="false">
                                                Foto Profile
                                            </button>
                                        </div>
                                    </nav>
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-profile" role="tabpanel"
                                            aria-labelledby="nav-profile-tab" tabindex="0">
                                            <form action="{{ route('setting.updateprofile') }}" method="POST">
                                                @csrf
                                                <div class="row mt-4">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label>Nama Lengkap</label>
                                                            <input type="text" name="name"
                                                                class="form-control @error('name') is-invalid @enderror"
                                                                value="{{ old('name', $users->name ?? '-') }}"
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
                                                            <label>Telepon</label>
                                                            <input type="number" name="telp"
                                                                class="form-control @error('telp') is-invalid @enderror"
                                                                value="{{ old('telp', $users->telp ?? '-') }}"
                                                                placeholder="Masukan nomor telepon">
                                                            @error('telp')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <button type="submit" class="btn btn-success">
                                                                <i class="fas fa-save"></i>
                                                                Simpan Data
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="nav-username" role="tabpanel"
                                            aria-labelledby="nav-username-tab" tabindex="0">
                                            <form action="{{ route('setting.updateusername') }}" method="POST">
                                                @csrf
                                                <div class="row mt-4">
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label>Username Lama</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $users->username ?? '-' }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label>Username Baru</label>
                                                            <input type="text" name="username"
                                                                class="form-control @error('username') is-invalid @enderror"
                                                                value="{{ old('username') }}"
                                                                placeholder="Masukan username baru">
                                                            @error('username')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <button type="submit" class="btn btn-success">
                                                                <i class="fas fa-save"></i>
                                                                Simpan Data
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="nav-password" role="tabpanel"
                                            aria-labelledby="nav-password-tab" tabindex="0">
                                            <form action="{{ route('setting.updatepassword') }}" method="POST">
                                                @csrf
                                                <div class="row mt-4">
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label>Password Baru</label>
                                                            <input type="password" name="password"
                                                                class="form-control @error('password') is-invalid @enderror"
                                                                placeholder="Masukan password">
                                                            @error('password')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <button type="submit" class="btn btn-success">
                                                                <i class="fas fa-save"></i>
                                                                Simpan Data
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="nav-gambar" role="tabpanel"
                                            aria-labelledby="nav-gambar-tab" tabindex="0">
                                            <form action="{{ route('setting.updategambar') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="row mt-4">
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label>Update Foto Profile</label>
                                                            <div class="form-group">
                                                                <div class="custom-file">
                                                                    <input type="file" name="foto_profile"
                                                                        class="custom-file-input @error('foto_profile') is-invalid @enderror"
                                                                        id="customFile">
                                                                    <label class="custom-file-label"
                                                                        for="customFile">Choose
                                                                        file</label>
                                                                    @error('foto_profile')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <button type="submit" class="btn btn-success">
                                                                <i class="fas fa-save"></i>
                                                                Simpan Data
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if ($users->foto_profile)
                <form action="{{ route('setting.hapusgambar') }}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <h4><b>Hapus Foto Profile ?</b></h4>
                            <p>
                                Apakah anda yakin untuk menghapus foto profile ini ?
                            </p>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Apakah anda yakin untuk menghapus data ini ?')">
                                <i class="fas fa-trash-alt"></i>
                                Hapus Gambar
                            </button>
                        </div>
                    </div>
                </form>
            @endif
        </div>
    </div>
@endsection
