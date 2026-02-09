<!doctype html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>SaranaCare - Pengaduan Sarana Sekolah</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body {
        font-family: 'Segoe UI', sans-serif;
        background: #f8f9fc;
        overflow-x: hidden;
    }

    /* Navbar */
    .navbar {
        backdrop-filter: blur(10px);
        background: rgba(0,0,0,0.3);
    }

    /* Hero */
    .hero {
        background: linear-gradient(135deg, #4e73df, #1cc88a);
        color: white;
        padding: 140px 0 160px 0;
        position: relative;
    }

    .hero h1 {
        font-weight: 800;
    }

    .hero p {
        opacity: 0.9;
    }

    .btn-glow {
        background: white;
        color: #4e73df;
        font-weight: 600;
        border-radius: 50px;
        padding: 12px 30px;
        transition: 0.3s;
    }

    .btn-glow:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
    }

    /* Wave */
    .wave {
        position: absolute;
        bottom: 0;
        width: 100%;
    }

    /* Features */
    .feature-card {
        border-radius: 20px;
        transition: 0.3s;
    }

    .feature-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
    }

    /* Stats */
    .stats {
        background: white;
        border-radius: 20px;
        margin-top: -80px;
        position: relative;
        z-index: 10;
    }

    /* CTA */
    .cta {
        background: linear-gradient(135deg, #4e73df, #36b9cc);
        border-radius: 25px;
        color: white;
    }

    footer {
        background: #111;
    }
</style>
</head>
<body>

{{-- Navbar --}}
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">🏫 SaranaCharlesPutra</a>

        <div>
            <a href="{{ route('login') }}" class="btn btn-light btn-sm me-2">Login</a>
            <a href="{{ route('register') }}" class="btn btn-outline-light btn-sm">Daftar</a>
        </div>
    </div>
</nav>

{{-- Hero --}}
<section class="hero text-center">
    <div class="container">
        <h1 class="display-4 mb-3">
            Laporkan Kerusakan Fasilitas Sekolah Dengan Mudah
        </h1>
        <p class="lead mb-4">
            Sistem pengaduan digital yang cepat, transparan, dan efisien untuk kenyamanan belajar.
        </p>

        <a href="{{ route('login') }}" class="btn btn-glow shadow">
            Mulai Sekarang
        </a>
    </div>

    {{-- <svg class="wave" viewBox="0 0 1440 320">
        <path fill="#f8f9fc" fill-opacity="1"
            d="M0,192L60,186.7C120,181,240,171,360,181.3C480,192,600,224,720,224C840,224,960,192,1080,170.7C1200,149,1320,139,1380,133.3L1440,128L1440,320L0,320Z">
        </path>
    </svg> --}}
</section>

{{-- Statistik Section --}}
<div class="container">
    <div class="stats shadow p-5 text-center">
        <div class="row">
            <div class="col-md-4">
                <h2 class="fw-bold text-primary">100+</h2>
                <p class="text-muted">Laporan Diproses</p>
            </div>
            <div class="col-md-4">
                <h2 class="fw-bold text-success">95%</h2>
                <p class="text-muted">Terselesaikan</p>
            </div>
            <div class="col-md-4">
                <h2 class="fw-bold text-info">24 Jam</h2>
                <p class="text-muted">Respon Admin</p>
            </div>
        </div>
    </div>
</div>

{{-- Features --}}
<section class="py-5">
    <div class="container text-center">
        <h2 class="fw-bold mb-5">Kenapa Memilih SaranaCharlesPutra?</h2>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="p-4 bg-white feature-card shadow-sm">
                    <h1>⚡</h1>
                    <h5 class="fw-bold mt-3">Cepat & Praktis</h5>
                    <p class="text-muted">
                        Laporan dikirim dalam hitungan menit tanpa proses rumit.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="p-4 bg-white feature-card shadow-sm">
                    <h1>📊</h1>
                    <h5 class="fw-bold mt-3">Monitoring Real-Time</h5>
                    <p class="text-muted">
                        Pantau status pengaduan kapan saja dan di mana saja.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="p-4 bg-white feature-card shadow-sm">
                    <h1>🔒</h1>
                    <h5 class="fw-bold mt-3">Aman & Terpercaya</h5>
                    <p class="text-muted">
                        Sistem terintegrasi dan aman untuk seluruh warga sekolah.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-5">
    <div class="container">
        <div class="cta p-5 text-center shadow-lg">
            <h3 class="fw-bold mb-3">
                Jangan Biarkan Fasilitas Rusak Mengganggu Belajar
            </h3>
            <p class="mb-4">
                Bergabung sekarang dan bantu sekolah menjadi lebih baik.
            </p>
            <a href="{{ route('register') }}" class="btn btn-light btn-lg px-4">
                Daftar Sekarang
            </a>
        </div>
    </div>
</section>

{{-- Footer --}}
<footer class="text-white text-center py-4 mt-5">
    <small>
        © {{ date('Y') }} SaranaCare | Sistem Pengaduan Sarana Sekolah
    </small>
</footer>

</body>
</html>
