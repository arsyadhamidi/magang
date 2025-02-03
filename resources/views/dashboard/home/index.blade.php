@extends('dashboard.layout.master')
@section('menuDashboard', 'active')
@section('content')
    @if (Auth()->user()->level == 'Admin')
        @include('admin.index')
    @elseif (Auth()->user()->level == 'Mahasiswa')
        @include('mahasiswa.index')
    @elseif (Auth()->user()->level == 'Operator')
        @include('operator.index')
    @endif
@endsection
@push('custom-script')
    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($months), // Menggunakan data bulan
                datasets: [{
                    label: 'Jumlah Perizinan',
                    data: @json($counts), // Menggunakan data jumlah perizinan
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endpush
