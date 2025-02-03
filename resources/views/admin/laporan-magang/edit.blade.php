@extends('dashboard.layout.master')
@section('menuDataLaporanMagang', 'active')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form action="{{ route('data-laporanmagang.update', $laporans->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('data-laporanmagang.index') }}" class="btn btn-primary">
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
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label>Mahasiswa</label>
                                    <select name="users_id" class="form-control @error('users_id') is-invalid @enderror"
                                        id="selectedUser" style="width: 100%">
                                        <option value="" selected>Pilih Mahasiswa</option>
                                        @foreach ($users as $data)
                                            <option value="{{ $data->id }}"
                                                {{ $laporans->users_id == $data->id ? 'selected' : '' }}>
                                                {{ $data->name ?? '-' }}</option>
                                        @endforeach
                                    </select>
                                    @error('users_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
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
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label>File Magang</label>
                                    <input type="file" name="file_magang"
                                        class="form-control @error('file_magang') is-invalid @enderror"
                                        value="{{ old('file_magang') }}">
                                    @error('file_magang')
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
        $('#selectedJekel').select2({
            theme: 'bootstrap4'
        });
        $('#selectedStatus').select2({
            theme: 'bootstrap4'
        });
        $('#selectedNilai').select2({
            theme: 'bootstrap4'
        });
    </script>
@endpush
