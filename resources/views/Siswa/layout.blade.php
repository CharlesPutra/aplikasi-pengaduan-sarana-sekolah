<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Siswa Panel</title>

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
            background: #0f172a;
            padding: 25px 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .brand {
            color: #fff;
            font-weight: 600;
            font-size: 18px;
            text-decoration: none;
            margin-bottom: 25px;
            display: block;
            letter-spacing: 0.5px;
        }

        /* Avatar */
        .profile-box {
            text-align: center;
            margin-bottom: 30px;
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

        .user-name {
            color: #fff;
            font-weight: 500;
            font-size: 14px;
        }

        .user-role {
            color: #94a3b8;
            font-size: 12px;
        }

        /* ===== MENU ===== */
        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 14px;
            border-radius: 12px;
            color: #cbd5e1;
            text-decoration: none;
            margin-bottom: 8px;
            transition: 0.2s;
            font-weight: 500;
            font-size: 14px;
        }

        .sidebar-menu a:hover {
            background: #1e293b;
            color: #fff;
        }

        .sidebar-menu a.active {
            background: #2563eb;
            color: #fff;
        }

        /* Logout */
        .logout-btn button {
            width: 100%;
            background: #1e293b;
            border: none;
            color: #f87171;
            padding: 10px;
            border-radius: 12px;
            transition: 0.2s;
            font-size: 14px;
        }

        .logout-btn button:hover {
            background: #dc2626;
            color: #fff;
        }

        /* Content */
        .main-content {
            margin-left: 260px;
            padding: 30px;
        }

        @media (max-width: 991px) {
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

    <div>
        <!-- Brand -->
        <a href="{{ route('siswa.dashboard') }}" class="brand">
            🎓 Siswa Panel
        </a>

        <!-- Profile -->
        <div class="profile-box">
            <div class="avatar-circle">
                {{ $initial }}
            </div>
            <div class="user-name">
                {{ Auth::user()->name }}
            </div>
            <div class="user-role">
                Siswa
            </div>
        </div>

        <!-- Menu -->
        <div class="sidebar-menu">

            <a href="{{ route('siswa.dashboard') }}"
               class="{{ request()->routeIs('siswa.dashboard') ? 'active' : '' }}">
                📊 Dashboard
            </a>

            <a href="{{ route('siswa.aspiration.index') }}"
               class="{{ request()->routeIs('siswa.aspiration.*') ? 'active' : '' }}">
                📝 Pengajuan Sarana
            </a>

            <a href="{{ route('siswa.student.index') }}"
               class="{{ request()->routeIs('siswa.student.*') ? 'active' : '' }}">
                👤 Data Siswa
            </a>

        </div>
    </div>

    <!-- Logout -->
    <div class="logout-btn">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">
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
