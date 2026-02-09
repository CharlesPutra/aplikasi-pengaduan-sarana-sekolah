<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Siswa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <style>
        .navbar-custom {
            background: linear-gradient(90deg, #0d6efd, #0b5ed7);
        }

        .navbar-custom .nav-link {
            color: #ffffff !important;
            font-weight: 500;
        }

        .navbar-custom .nav-link:hover {
            opacity: 0.8;
        }

        .navbar-custom .navbar-brand {
            font-weight: bold;
            color: #ffffff !important;
        }

        .navbar-custom .dropdown-menu {
            border-radius: 12px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom shadow-sm sticky-top">
        <div class="container">

            <!-- Logo -->
            <a class="navbar-brand" href="{{ route('siswa.dashboard') }}">
                🎓 Siswa Panel
            </a>

            <!-- Toggle Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu -->
            <div class="collapse navbar-collapse" id="navbarNav">

                <!-- Left Menu -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('siswa.dashboard') ? 'active fw-bold' : '' }}"
                            href="{{ route('siswa.dashboard') }}">
                            Dashboard
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('siswa.aspiration.*') ? 'active fw-bold' : '' }}"
                            href="{{ route('siswa.aspiration.index') }}">
                            Pengajuan Sarana
                        </a>
                    </li>

                </ul>

                <!-- Right Menu (User Dropdown) -->
                <ul class="navbar-nav">

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle fw-semibold"
                            href="#"
                            role="button"
                            data-bs-toggle="dropdown">
                            {{ Auth::user()->name }}
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end shadow">

                            <li>
                                <span class="dropdown-item-text text-muted small">
                                    Role: Siswa
                                </span>
                            </li>

                            <li>
                                <a class="dropdown-item"
                                    href="{{ route('siswa.student.index') }}">
                                    ⚙️ Pengaturan
                                </a>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

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
