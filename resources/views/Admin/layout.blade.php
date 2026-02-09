<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>
        .navbar-admin {
            background: linear-gradient(90deg, #212529, #343a40);
        }

        .navbar-admin .navbar-brand {
            font-weight: 700;
            color: #ffffff !important;
        }

        .navbar-admin .nav-link {
            color: #e9ecef !important;
            font-weight: 500;
        }

        .navbar-admin .nav-link:hover {
            color: #ffc107 !important;
        }

        .navbar-admin .nav-link.active {
            color: #ffc107 !important;
            font-weight: 700;
        }

        .navbar-admin .dropdown-menu {
            border-radius: 12px;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar-admin shadow-sm sticky-top">
    <div class="container">

        <!-- Brand -->
        <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
            🛠 Admin Panel
        </a>

        <!-- Toggle -->
        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarAdmin">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu -->
        <div class="collapse navbar-collapse" id="navbarAdmin">

            <!-- Left Menu -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                       href="{{ route('admin.dashboard') }}">
                        Dashboard
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.category.*') ? 'active' : '' }}"
                       href="{{ route('admin.category.index') }}">
                        Category
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.aspirations.*') ? 'active' : '' }}"
                       href="{{ route('admin.aspirations.index') }}">
                        Pengaduan
                    </a>
                </li>

            </ul>

            <!-- Right Menu -->
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
                                Role: Admin
                            </span>
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
