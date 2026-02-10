<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - SaranaCare</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            height: 100vh;
            background: linear-gradient(135deg, #1e90ff, #0066ff);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-wrapper {
            width: 90%;
            max-width: 1100px;
            height: 600px;
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 25px 50px rgba(0,0,0,0.2);
        }

        .left-side {
            background: #f8f9fc;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
        }

        .right-side {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 60px;
        }

        .form-control {
            border-radius: 8px;
        }

        .btn-login {
            border-radius: 8px;
            background: #0066ff;
            border: none;
        }

        .btn-login:hover {
            background: #004ecc;
        }

        @media (max-width: 768px) {
            .login-wrapper {
                height: auto;
            }
            .left-side {
                display: none;
            }
        }
    </style>
</head>
<body>

<div class="login-wrapper row g-0">

    {{-- LEFT SIDE --}}
    <div class="col-md-6 left-side text-center">
        <div>
            <h5 class="fw-bold mb-3">SaranaCare</h5>
            <p class="text-muted">
                Sistem Pengaduan Sarana Sekolah yang cepat & transparan.
            </p>

            {{-- Ganti dengan gambar kamu --}}
            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png"
                 class="img-fluid mt-4"
                 style="max-height:300px;">
        </div>
    </div>

    {{-- RIGHT SIDE --}}
    <div class="col-md-6 right-side">
        <div style="width:100%; max-width:350px;">

            <h3 class="fw-bold mb-4 text-center">Welcome Back</h3>

            @if ($errors->any())
                <div class="alert alert-danger">
                    Email atau password salah.
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <input type="email"
                           name="email"
                           class="form-control"
                           placeholder="Your Email"
                           required>
                </div>

                <div class="mb-3">
                    <input type="password"
                           name="password"
                           class="form-control"
                           placeholder="Your Password"
                           required>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3 small">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember">
                        <label class="form-check-label">
                            Keep me logged in
                        </label>
                    </div>

                    <a href="{{ route('password.request') }}" class="text-decoration-none">
                        Forgot Password
                    </a>
                </div>

                <div class="d-grid">
                    <button class="btn btn-primary btn-login">
                        Log In
                    </button>
                </div>

                <div class="text-center mt-4 small">
                    Don’t have account yet?
                    <a href="{{ route('register') }}" class="fw-semibold text-decoration-none">
                        Sign-up
                    </a>
                </div>

            </form>

        </div>
    </div>

</div>

</body>
</html>
