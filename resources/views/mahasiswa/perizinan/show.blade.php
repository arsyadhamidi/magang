@extends('dashboard.layout.master')
@section('menuMahasiswaPerizinan', 'active')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-default-primary" role="alert">
                <h4 class="alert-heading"><b>Perhatian!</b></h4>
                <hr>
                <p>
                    Pastikan data Anda diisi dengan benar, karena setelah disimpan, data ini tidak dapat diubah lagi.
                </p>
            </div>
        </div>
        <div class="col-lg-12">
            <form action="{{ route('mahasiswa-perizinan.store') }}" method="POST">
                @csrf
                <input type="text" name="perusahaan_id" value="{{ $perusahaans->id }}" hidden>
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('mahasiswa-perizinan.index') }}" class="btn btn-primary">
                            <i class="fas fa-arrow-left"></i>
                            Kembali
                        </a>
                        <button type="submit" class="btn btn-success"
                            onclick="return confirm('Apakah data anda sudah benar ?')">
                            <i class="fas fa-save"></i>
                            Simpan Data
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="row">
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
                            <div class="col-lg-12">
                                <label>Keterangan (optional)</label>
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
            </form>
        </div>
    </div>
@endsection
