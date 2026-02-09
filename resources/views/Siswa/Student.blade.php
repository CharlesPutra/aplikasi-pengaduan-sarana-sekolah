@extends('Siswa.layout')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card">
                    <div class="card-header text-center">
                        <h4>Data Siswa</h4>
                    </div>
                    <div class="card-body">

                        {{-- pesan sukses --}}
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        {{-- error validasi --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{-- JIKA BELUM ADA DATA --}}
                        @if (!$student)
                            <form method="POST" action="{{ route('siswa.student.store') }}">
                                @csrf

                                <div class="mb-3">
                                    <label for="nis" class="form-label">NIS</label>
                                    <input type="text" name="nis" id="nis" class="form-control"
                                        value="{{ old('nis') }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="kelas" class="form-label">Kelas</label>
                                    <input type="text" name="kelas" id="kelas" class="form-control"
                                        value="{{ old('kelas') }}" required>
                                </div>

                                <button type="submit" class="btn btn-primary w-100">
                                    Simpan Data
                                </button>
                            </form>

                            {{-- JIKA SUDAH ADA DATA --}}
                        @else
                            <form method="POST" action="{{ route('siswa.student.update') }}">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="nis" class="form-label">NIS</label>
                                    <input type="text" id="nis" class="form-control" name="nis" value="{{ $student->nis }}">
                                </div>

                                <div class="mb-3">
                                    <label for="kelas" class="form-label">Kelas</label>
                                    <input type="text" name="kelas" id="kelas" class="form-control"
                                        value="{{ old('kelas', $student->kelas) }}" required>
                                </div>

                                <button type="submit" class="btn btn-success w-100">
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
