<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f3f4f6;
            font-family: 'Segoe UI', sans-serif;
        }

        /* ===== SIDEBAR ===== */
        .sidebar {
            width: 260px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: #111827;
            padding: 25px 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .sidebar-profile {
            text-align: center;
        }

        .avatar-circle {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
            font-weight: 600;
            color: #fff;
            margin: 0 auto 10px;
        }

        .sidebar-profile h6 {
            color: #fff;
            margin-bottom: 0;
        }

        .sidebar-profile small {
            color: #9ca3af;
        }

        /* ===== MENU ===== */
        .sidebar-menu {
            margin-top: 30px;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 14px;
            border-radius: 12px;
            color: #d1d5db;
            text-decoration: none;
            margin-bottom: 8px;
            transition: 0.2s;
            font-weight: 500;
        }

        .sidebar-menu a:hover {
            background: #1f2937;
            color: #fff;
        }

        .sidebar-menu a.active {
            background: #2563eb;
            color: #fff;
        }

        /* ===== LOGOUT ===== */
        .logout-btn {
            background: #1f2937;
            border: none;
            color: #f87171;
            padding: 10px;
            border-radius: 12px;
            width: 100%;
            transition: 0.2s;
        }

        .logout-btn:hover {
            background: #dc2626;
            color: #fff;
        }

        /* ===== CONTENT ===== */
        .main-content {
            margin-left: 260px;
            padding: 30px;
        }

        @media(max-width: 991px){
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
            }

            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>

@php
    $initial = strtoupper(substr(Auth::user()->name, 0, 1));
@endphp

<div class="sidebar">

    <!-- Profile -->
    <div>
        <div class="sidebar-profile">
            <div class="avatar-circle">
                {{ $initial }}
            </div>
            <h6>{{ Auth::user()->name }}</h6>
            <small>Administrator</small>
        </div>

        <!-- Menu -->
        <div class="sidebar-menu mt-4">

            <a href="{{ route('admin.dashboard') }}"
               class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                📊 Dashboard
            </a>

            <a href="{{ route('admin.category.index') }}"
               class="{{ request()->routeIs('admin.category.*') ? 'active' : '' }}">
                📂 Category
            </a>

            <a href="{{ route('admin.aspirations.index') }}"
               class="{{ request()->routeIs('admin.aspirations.*') ? 'active' : '' }}">
                📝 Pengaduan
            </a>

        </div>
    </div>

    <!-- Logout -->
    <div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="logout-btn">
                🚪 Logout
            </button>
        </form>
    </div>

</div>

<!-- Content -->
<div class="main-content">
    @yield('content')
</div>

</body>
</html>
