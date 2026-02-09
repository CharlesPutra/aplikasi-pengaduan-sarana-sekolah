@extends('Admin.layout')

@section('content')
    <div class="container py-4">

        {{-- Greeting --}}
        <div class="mb-4">
            <h4 class="fw-bold">
                Selamat Datang, {{ Auth::user()->name }} 🛠️
            </h4>
            <p class="text-muted mb-0">
                Kelola data aspirasi dan kategori siswa di sini.
            </p>
        </div>

        {{-- Statistik --}}
        <div class="row g-3 mb-4">

            <div class="col-md-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h6 class="text-muted">Total Aspirasi</h6>
                        <h3 class="fw-bold">{{ $total ?? 0 }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h6 class="text-warning">Pending</h6>
                        <h3 class="fw-bold text-warning">
                            {{ $pending ?? 0 }}
                        </h3>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h6 class="text-info">Diproses</h6>
                        <h3 class="fw-bold text-info">
                            {{ $proses ?? 0 }}
                        </h3>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h6 class="text-success">Selesai</h6>
                        <h3 class="fw-bold text-success">
                            {{ $selesai ?? 0 }}
                        </h3>
                    </div>
                </div>
            </div>

        </div>


        {{-- Charts --}}
        <div class="row justify-content-center mt-4">

            {{-- Chart Status --}}
            <div class="col-md-5 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body text-center">
                        <h6 class="fw-bold mb-3">
                            Grafik Status Aspirasi
                        </h6>

                        <div style="max-width: 300px; margin:auto;">
                            <canvas id="statusChart"></canvas>
                        </div>

                    </div>
                </div>
            </div>

            {{-- Chart Category --}}
            <div class="col-md-5 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body text-center">
                        <h6 class="fw-bold mb-3">
                            Grafik Aspirasi per Kategori
                        </h6>

                        <div style="max-width: 350px; margin:auto;">
                            <canvas id="categoryChart"></canvas>
                        </div>

                    </div>
                </div>
            </div>

        </div>


        {{-- Quick Menu --}}
        <div class="row g-3">

            <div class="col-md-6">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body">
                        <h6 class="fw-bold">Manajemen Kategori</h6>
                        <p class="text-muted small">
                            Tambah, ubah, atau hapus kategori aspirasi.
                        </p>
                        <a href="{{ route('admin.category.index') }}" class="btn btn-outline-primary btn-sm">
                            Kelola Kategori
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body">
                        <h6 class="fw-bold">Data Aspirasi Siswa</h6>
                        <p class="text-muted small">
                            Lihat dan proses aspirasi dari siswa.
                        </p>
                        <a href="{{ route('admin.aspirations.index') }}" class="btn btn-outline-success btn-sm">
                            Lihat Aspirasi
                        </a>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            // Chart Status
            new Chart(document.getElementById('statusChart'), {
                type: 'doughnut',
                data: {
                    labels: ['Pending', 'Diproses', 'Selesai'],
                    datasets: [{
                        data: [
                            {{ $pending ?? 0 }},
                            {{ $proses ?? 0 }},
                            {{ $selesai ?? 0 }}
                        ],
                        backgroundColor: [
                            '#ffc107',
                            '#0dcaf0',
                            '#198754'
                        ]
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            });

            // Chart Category
            new Chart(document.getElementById('categoryChart'), {
                type: 'bar',
                data: {
                    labels: {!! json_encode($categoryLabels) !!},
                    datasets: [{
                        label: 'Jumlah Aspirasi',
                        data: {!! json_encode($categoryData) !!},
                        backgroundColor: '#0d6efd',
                        borderRadius: 6
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });

        });
    </script>
@endsection
