<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register - SaranaCare</title>

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

        .register-wrapper {
            width: 90%;
            max-width: 1100px;
            height: 650px;
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

        .btn-register {
            border-radius: 8px;
            background: #0066ff;
            border: none;
        }

        .btn-register:hover {
            background: #004ecc;
        }

        @media (max-width: 768px) {
            .register-wrapper {
                height: auto;
            }
            .left-side {
                display: none;
            }
        }
    </style>
</head>
<body>

<div class="register-wrapper row g-0">

    {{-- LEFT SIDE --}}
    <div class="col-md-6 left-side text-center">
        <div>
            <h5 class="fw-bold mb-3">SaranaCare</h5>
            <p class="text-muted">
                Daftar dan mulai laporkan fasilitas sekolah dengan mudah.
            </p>

            <img src="https://cdn-icons-png.flaticon.com/512/2922/2922510.png"
                 class="img-fluid mt-4"
                 style="max-height:300px;">
        </div>
    </div>

    {{-- RIGHT SIDE --}}
    <div class="col-md-6 right-side">
        <div style="width:100%; max-width:350px;">

            <h3 class="fw-bold mb-4 text-center">Create Account</h3>

            @if ($errors->any())
                <div class="alert alert-danger">
                    Periksa kembali data yang kamu isi.
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-3">
                    <input type="text"
                           name="name"
                           value="{{ old('name') }}"
                           class="form-control @error('name') is-invalid @enderror"
                           placeholder="Full Name"
                           required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <input type="email"
                           name="email"
                           value="{{ old('email') }}"
                           class="form-control @error('email') is-invalid @enderror"
                           placeholder="Email Address"
                           required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <input type="password"
                           name="password"
                           class="form-control @error('password') is-invalid @enderror"
                           placeholder="Password"
                           required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <input type="password"
                           name="password_confirmation"
                           class="form-control"
                           placeholder="Confirm Password"
                           required>
                </div>

                <div class="d-grid">
                    <button class="btn btn-primary btn-register">
                        Register
                    </button>
                </div>

                <div class="text-center mt-4 small">
                    Already have an account?
                    <a href="{{ route('login') }}"
                       class="fw-semibold text-decoration-none">
                        Log in
                    </a>
                </div>

            </form>

        </div>
    </div>

</div>

</body>
</html>
