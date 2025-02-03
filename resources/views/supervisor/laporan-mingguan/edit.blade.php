@extends('dashboard.layout.master')
@section('menuDataLaporanMingguan', 'active')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form action="{{ route('supervisor-laporanmingguan.update', $laporans->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('supervisor-laporanmingguan.index') }}" class="btn btn-primary">
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
                                    <label>Penilaian</label>
                                    <select name="nilai" id="selectedNilai"
                                        class="form-control @error('nilai') is-invalid @enderror" style="width: 100%">
                                        <option value="" selected>Pilih Penilaian</option>
                                        <option value="Sangat Baik" {{ $laporans->nilai == 'Sangat Baik' ? 'selected' : '' }}>
                                            Sangat Baik</option>
                                        <option value="Baik" {{ $laporans->nilai == 'Baik' ? 'selected' : '' }}>
                                            Baik</option>
                                        <option value="Cukup" {{ $laporans->nilai == 'Cukup' ? 'selected' : '' }}>
                                            Cukup</option>
                                        <option value="Kurang Baik" {{ $laporans->nilai == 'Kurang Baik' ? 'selected' : '' }}>
                                            Kurang Baik</option>
                                        <option value="Tidak Baik" {{ $laporans->nilai == 'Tidak Baik' ? 'selected' : '' }}>
                                            Tidak Baik</option>
                                    </select>
                                    @error('nilai')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label>Status</label>
                                    <select name="status" id="selectedStatus"
                                        class="form-control @error('status') is-invalid @enderror" style="width: 100%">
                                        <option value="" selected>Pilih Status</option>
                                        <option value="Periksa" {{ $laporans->status == 'Periksa' ? 'selected' : '' }}>
                                            Periksa</option>
                                        <option value="Proses" {{ $laporans->status == 'Proses' ? 'selected' : '' }}>
                                            Proses</option>
                                    </select>
                                    @error('status')
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
