@php
    $mahasiswas = \App\Models\Mahasiswa::where('users_id', Auth()->user()->id)->first();
@endphp

<div class="row">
    <div class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        @if (Auth()->user()->foto_profile)
                            <img src="{{ asset('storage/' . Auth()->user()->foto_profile) }}"
                                style="width: 100px; height: 100px; object-fit: cover" class="img-fluid rounded-circle"
                                alt="">
                        @else
                            <img src="{{ asset('images/foto-profile.png') }}" width="100"
                                class="img-fluid rounded-circle" alt="">
                        @endif
                        <p class="my-3 h5">{{ $mahasiswas->nama ?? '-' }}</p>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <hr>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label>Nama Lengkap</label>
                            <p>{{ $mahasiswas->nama ?? '-' }}</p>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <hr>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label>NIM</label>
                            <p>{{ $mahasiswas->nim ?? '-' }}</p>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <hr>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label>Universitas</label>
                            <p>{{ $mahasiswas->universitas ?? '-' }}</p>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <hr>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label>Jurusan</label>
                            <p>{{ $mahasiswas->jurusan ?? '-' }}</p>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <hr>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label>Program Studi</label>
                            <p>{{ $mahasiswas->prodi ?? '-' }}</p>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label>Telepon</label>
                            <p>{{ $mahasiswas->no_hp ?? '-' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-9">
        <div class="row">
            <div class="col-lg-12">
                <form action="{{ route('biodata-update.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <b>Biodata Mahasiswa</b>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label>Nomor Induk Mahasiswa</label>
                                        <input type="text" name="nim"
                                            class="form-control @error('nim') is-invalid @enderror"
                                            value="{{ old('nim', $mahasiswas->nim ?? '') }}" placeholder="Masukan nim">
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
                                            value="{{ old('nama', $mahasiswas->nama ?? '') }}"
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
                                            value="{{ old('universitas', $mahasiswas->universitas ?? '') }}"
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
                                            value="{{ old('jurusan', $mahasiswas->jurusan ?? '') }}"
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
                                            value="{{ old('prodi', $mahasiswas->prodi ?? '') }}"
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
                                            value="{{ old('no_hp', $mahasiswas->no_hp ?? '') }}"
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
                                        <label>Foto Profile</label>
                                        <div class="form-group">
                                            <div class="custom-file">
                                                <input type="file" name="foto_profile"
                                                    class="custom-file-input @error('foto_profile') is-invalid @enderror"
                                                    id="customFile">
                                                <label class="custom-file-label" for="customFile">Choose
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
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success"
                                onclick="return confirm('Apakah anda yakin data ini sudah sebenarnya ?');">
                                <i class="fas fa-save"></i>
                                Simpan Data
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
