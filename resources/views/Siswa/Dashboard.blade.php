@extends('Siswa.layout')

@section('content')
    <div class="container">

        {{-- Greeting --}}
        <div class="mb-4">
            <h4 class="fw-bold">
                Halo, {{ Auth::user()->name }} 👋
            </h4>
            <p class="text-muted mb-0">
                Selamat datang di Dashboard Siswa.
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

        {{-- Chart --}}
        <div class="card shadow-sm border-0 mt-4">
            <div class="card-body text-center">
                <h6 class="fw-bold mb-3">Statistik Status Aspirasi</h6>

                <div style="max-width: 300px; margin: auto;">
                    <canvas id="aspirationChart"></canvas>
                </div>

            </div>
        </div>



        {{-- Quick Action --}}
        <div class="card shadow-sm border-0">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fw-bold mb-1">Punya Aspirasi Baru?</h6>
                    <small class="text-muted">
                        Sampaikan keluhan atau saran Anda sekarang.
                    </small>
                </div>

                <a href="{{ route('siswa.aspiration.create') }}" class="btn btn-primary shadow-sm">
                    + Buat Aspirasi
                </a>
            </div>
        </div>

    </div>

    {{-- Chart JS CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('aspirationChart');

        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Pending', 'Diproses', 'Selesai'],
                datasets: [{
                    data: [
                        {{ $pending ?? 0 }},
                        {{ $proses ?? 0 }},
                        {{ $selesai ?? 0 }}
                    ],
                    backgroundColor: [
                        '#ffc107', // kuning
                        '#0dcaf0', // biru
                        '#198754' // hijau
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }

        });
    </script>
@endsection
