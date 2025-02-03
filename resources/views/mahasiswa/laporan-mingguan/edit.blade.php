@extends('dashboard.layout.master')
@section('menuDataLaporanMingguan', 'active')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form action="{{ route('mahasiswa-laporanmingguan.update', $laporans->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('mahasiswa-laporanmingguan.index') }}" class="btn btn-primary">
                            <i class="fas fa-arrow-left"></i>
                            Kembali
                        </a>
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save"></i>
                            Simpan Data
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label>Tanggal Laporan</label>
                                    <input type="date" name="tgl_laporan"
                                        class="form-control @error('tgl_laporan') is-invalid @enderror"
                                        value="{{ old('tgl_laporan', $laporans->tgl_laporan) }}">
                                    @error('tgl_laporan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label>File LogBook</label>
                                    <input type="file" name="file_logbook"
                                        class="form-control @error('file_logbook') is-invalid @enderror"
                                        value="{{ old('file_logbook') }}">
                                    @error('file_logbook')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('custom-script')
    <script>
        $('#selectedJekel').select2({
            theme: 'bootstrap4'
        });
    </script>
@endpush
