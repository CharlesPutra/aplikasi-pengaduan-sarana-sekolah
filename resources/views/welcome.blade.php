<!doctype html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>SaranaCharlesPutra - Pengaduan Sarana Sekolah</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body {
        font-family: 'Segoe UI', sans-serif;
        background: #f4f6fb;
        scroll-behavior: smooth;
    }

    /* ================= NAVBAR ================= */
    .navbar {
        transition: 0.3s ease;
        padding: 15px 0;
    }

    .navbar.scrolled {
        background: white !important;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
    }

    .navbar-brand {
        font-weight: 700;
        font-size: 20px;
        letter-spacing: 0.5px;
    }

    .nav-btn {
        border-radius: 30px;
        padding: 6px 18px;
        font-size: 14px;
    }

    /* ================= HERO ================= */
    .hero {
        background: linear-gradient(135deg, #4e73df, #224abe);
        color: white;
        padding: 160px 0 120px 0;
        position: relative;
    }

    .hero h1 {
        font-weight: 800;
        line-height: 1.3;
    }

    .hero p {
        opacity: 0.9;
        max-width: 600px;
        margin: auto;
    }

    .hero-btn {
        border-radius: 50px;
        padding: 12px 30px;
        font-weight: 600;
        transition: 0.3s;
    }

    .hero-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
    }

    /* ================= STATS ================= */
    .stats-box {
        background: white;
        border-radius: 20px;
        margin-top: -70px;
        position: relative;
        z-index: 10;
    }

    .stats-box h2 {
        font-weight: 700;
    }

    /* ================= FEATURES ================= */
    .feature-card {
        border-radius: 18px;
        transition: 0.3s ease;
        border: none;
    }

    .feature-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.08);
    }

    /* ================= CTA ================= */
    .cta {
        background: linear-gradient(135deg, #1cc88a, #17a673);
        border-radius: 25px;
        color: white;
    }

    /* ================= FOOTER ================= */
    footer {
        background: #111827;
    }
</style>
</head>
<body>

{{-- NAVBAR --}}
<nav class="navbar navbar-expand-lg fixed-top navbar-light">
    <div class="container">
        <a class="navbar-brand" href="#">
            🏫 SaranaCharlesPutra
        </a>

        <div>
            <a href="{{ route('login') }}" class="btn btn-outline-primary nav-btn me-2">
                Login
            </a>
            <a href="{{ route('register') }}" class="btn btn-primary nav-btn">
                Daftar
            </a>
        </div>
    </div>
</nav>

{{-- HERO --}}
<section class="hero text-center">
    <div class="container">
        <h1 class="display-5 mb-4">
            Sistem Pengaduan Sarana Sekolah <br>
            Lebih Cepat & Transparan
        </h1>
        <p class="lead mb-4">
            Laporkan fasilitas rusak, pantau prosesnya secara real-time,
            dan bantu ciptakan lingkungan belajar yang nyaman.
        </p>

        <a href="{{ route('login') }}" class="btn btn-light hero-btn shadow">
            🚀 Mulai Sekarang
        </a>
    </div>
</section>

{{-- STATS --}}
<div class="container">
    <div class="stats-box shadow p-5 text-center">
        <div class="row">
            <div class="col-md-4">
                <h2 class="text-primary">120+</h2>
                <p class="text-muted mb-0">Laporan Masuk</p>
            </div>
            <div class="col-md-4">
                <h2 class="text-success">90%</h2>
                <p class="text-muted mb-0">Diselesaikan</p>
            </div>
            <div class="col-md-4">
                <h2 class="text-info">1x24 Jam</h2>
                <p class="text-muted mb-0">Respon Admin</p>
            </div>
        </div>
    </div>
</div>

{{-- FEATURES --}}
<section class="py-5">
    <div class="container text-center">
        <h2 class="fw-bold mb-5">Kenapa Memilih Sistem Ini?</h2>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card feature-card p-4 shadow-sm">
                    <div class="fs-1">⚡</div>
                    <h5 class="fw-bold mt-3">Cepat & Praktis</h5>
                    <p class="text-muted small">
                        Kirim laporan hanya dalam beberapa klik.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card feature-card p-4 shadow-sm">
                    <div class="fs-1">📊</div>
                    <h5 class="fw-bold mt-3">Monitoring Status</h5>
                    <p class="text-muted small">
                        Pantau progres pengaduan secara langsung.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card feature-card p-4 shadow-sm">
                    <div class="fs-1">🔒</div>
                    <h5 class="fw-bold mt-3">Aman & Transparan</h5>
                    <p class="text-muted small">
                        Sistem terintegrasi dengan manajemen sekolah.
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
                Mari Wujudkan Sekolah yang Lebih Nyaman
            </h3>
            <p class="mb-4">
                Satu laporan Anda sangat berarti untuk perubahan.
            </p>
            <a href="{{ route('register') }}" class="btn btn-light btn-lg px-4 rounded-pill">
                Daftar Sekarang
            </a>
        </div>
    </div>
</section>

{{-- FOOTER --}}
<footer class="text-white text-center py-4 mt-5">
    <small>
        © {{ date('Y') }} SaranaCharlesPutra — Sistem Pengaduan Sarana Sekolah
    </small>
</footer>

<script>
    // Navbar effect saat scroll
    window.addEventListener('scroll', function () {
        let navbar = document.querySelector('.navbar');
        navbar.classList.toggle('scrolled', window.scrollY > 50);
    });
</script>

</body>
</html>
