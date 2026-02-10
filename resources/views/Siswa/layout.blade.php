<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Siswa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f6f9;
        }

        .navbar-custom {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            backdrop-filter: blur(6px);
        }

        .navbar-brand {
            font-weight: 700;
            letter-spacing: 0.5px;
            font-size: 1.2rem;
        }

        .navbar-custom .nav-link {
            color: #ffffff !important;
            font-weight: 500;
            position: relative;
            margin-right: 10px;
            transition: all 0.3s ease;
        }

        /* Hover effect */
        .navbar-custom .nav-link:hover {
            opacity: 0.85;
            transform: translateY(-1px);
        }

        /* Active underline animation */
        .navbar-custom .nav-link.active::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -4px;
            width: 100%;
            height: 2px;
            background: #ffffff;
            border-radius: 2px;
        }

        /* Dropdown style */
        .dropdown-menu {
            border-radius: 12px;
            border: none;
        }

        .dropdown-item:hover {
            background-color: #f1f3f5;
        }

        /* Avatar circle */
        .avatar-circle {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: white;
            color: #2a5298;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 8px;
            font-size: 14px;
        }
    </style>

</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark navbar-custom shadow sticky-top">
    <div class="container">

        <!-- Brand -->
        <a class="navbar-brand d-flex align-items-center"
           href="{{ route('siswa.dashboard') }}">
            🎓 <span class="ms-2">Siswa Panel</span>
        </a>

        <!-- Toggle -->
        <button class="navbar-toggler" type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <!-- Left Menu -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('siswa.dashboard') ? 'active' : '' }}"
                        href="{{ route('siswa.dashboard') }}">
                        📊 Dashboard
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('siswa.aspiration.*') ? 'active' : '' }}"
                        href="{{ route('siswa.aspiration.index') }}">
                        📝 Pengajuan Sarana
                    </a>
                </li>

            </ul>

            <!-- Right Menu -->
            <ul class="navbar-nav">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center"
                        href="#"
                        role="button"
                        data-bs-toggle="dropdown">

                        <div class="avatar-circle">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>

                        <span class="fw-semibold">
                            {{ Auth::user()->name }}
                        </span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end shadow">

                        <li>
                            <span class="dropdown-item-text text-muted small">
                                Login sebagai Siswa
                            </span>
                        </li>

                        <li>
                            <a class="dropdown-item"
                                href="{{ route('siswa.student.index') }}">
                                ⚙️ Pengaturan Akun
                            </a>
                        </li>

                        <li><hr class="dropdown-divider"></li>

                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="dropdown-item text-danger">
                                    🚪 Logout
                                </button>
                            </form>
                        </li>

                    </ul>
                </li>

            </ul>

        </div>
    </div>
</nav>


    <main class="container py-4">
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
