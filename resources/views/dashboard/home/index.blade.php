@extends('dashboard.layout.master')
@section('menuDashboard', 'active')
@section('content')
    @if (Auth()->user()->level == 'Admin')
        @include('admin.index')
    @endif
@endsection
@push('custom-script')
    <script>
        const ctx = document.getElementById('myChart');

        const chartYears = @json($chartYears); // Tahun
        const chartData = @json($chartData); // Data jumlah mahasiswa

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: chartYears,
                datasets: [{
                    label: 'Jumlah Mahasiswa Magang',
                    data: chartData,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Jumlah Mahasiswa'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Tahun'
                        }
                    }
                },
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                    },
                    tooltip: {
                        enabled: true
                    }
                }
            }
        });
    </script>
@endpush
