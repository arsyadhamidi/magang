@extends('dashboard.layout.master')
@section('menuDataLaporanMagang', 'active')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form action="{{ route('supervisor-laporanmagang.update', $laporans->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('supervisor-laporanmagang.index') }}" class="btn btn-primary">
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
                                    <label>Status</label>
                                    <select name="status" id="selectedStatus"
                                        class="form-control @error('status') is-invalid @enderror" style="width: 100%">
                                        <option value="" selected>Pilih Status</option>
                                        <option value="Periksa" {{ $laporans->status == 'Periksa' ? 'selected' : '' }}>
                                            Periksa</option>
                                        <option value="Proses" {{ $laporans->status == 'Proses' ? 'selected' : '' }}>
                                            Proses</option>
                                        <option value="Ditolak" {{ $laporans->status == 'Ditolak' ? 'selected' : '' }}>
                                            Ditolak</option>
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
                                        placeholder="Masukan keterangan">{{ old('keterangan', $laporans->keterangan ?? '') }}</textarea>
                                    @error('keterangan')
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
        $('#selectedUser').select2({
            theme: 'bootstrap4'
        });
        $('#selectedStatus').select2({
            theme: 'bootstrap4'
        });
    </script>
@endpush
