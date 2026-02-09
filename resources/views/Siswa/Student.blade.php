@extends('Siswa.layout')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card border-0 shadow-lg rounded-4">

                {{-- Header --}}
                <div class="card-header bg-primary text-white text-center rounded-top-4 py-3">
                    <h5 class="mb-0 fw-bold">
                        <i class="bi bi-person-circle me-2"></i>
                        Data Siswa
                    </h5>
                </div>

                <div class="card-body p-4">

                    {{-- Success Message --}}
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show rounded-3">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    {{-- Validation Errors --}}
                    @if ($errors->any())
                        <div class="alert alert-danger rounded-3">
                            <ul class="mb-0 small">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    {{-- ===============================
                         JIKA BELUM ADA DATA
                    =============================== --}}
                    @if (!$student)

                        <form method="POST" action="{{ route('siswa.student.store') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="nis" class="form-label fw-semibold">NIS</label>
                                <input type="text"
                                       name="nis"
                                       id="nis"
                                       class="form-control rounded-3"
                                       value="{{ old('nis') }}"
                                       placeholder="Masukkan NIS"
                                       required>
                            </div>

                            <div class="mb-4">
                                <label for="kelas" class="form-label fw-semibold">Kelas</label>
                                <input type="text"
                                       name="kelas"
                                       id="kelas"
                                       class="form-control rounded-3"
                                       value="{{ old('kelas') }}"
                                       placeholder="Contoh: XII RPL 1"
                                       required>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 rounded-3 shadow-sm">
                                Simpan Data
                            </button>
                        </form>

                    {{-- ===============================
                         JIKA SUDAH ADA DATA
                    =============================== --}}
                    @else

                        <form method="POST" action="{{ route('siswa.student.update') }}">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="nis" class="form-label fw-semibold">NIS</label>
                                <input type="text"
                                       id="nis"
                                       name="nis"
                                       class="form-control rounded-3"
                                       value="{{ $student->nis }}"
                                       required>
                            </div>

                            <div class="mb-4">
                                <label for="kelas" class="form-label fw-semibold">Kelas</label>
                                <input type="text"
                                       name="kelas"
                                       id="kelas"
                                       class="form-control rounded-3"
                                       value="{{ old('kelas', $student->kelas) }}"
                                       required>
                            </div>

                            <button type="submit" class="btn btn-success w-100 rounded-3 shadow-sm">
                                Update Data
                            </button>
                        </form>

                    @endif

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
