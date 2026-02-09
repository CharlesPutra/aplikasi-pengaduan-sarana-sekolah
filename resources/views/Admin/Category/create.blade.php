@extends('Admin.layout')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-6">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold mb-0">Tambah Kategori</h4>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body p-4">

                <form action="{{ route('admin.category.store') }}" method="POST">
                    @csrf

                    {{-- Nama Kategori --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            Nama Kategori
                        </label>

                        <input type="text"
                               name="ket_kategori"
                               class="form-control @error('ket_kategori') is-invalid @enderror"
                               placeholder="Contoh: Fasilitas Kelas"
                               value="{{ old('ket_kategori') }}">

                        @error('ket_kategori')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Tombol --}}
                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('admin.category.index') }}"
                           class="btn btn-outline-secondary">
                            ← Kembali
                        </a>

                        <button type="submit"
                                class="btn btn-primary shadow-sm">
                            Simpan Data
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>
</div>

@endsection
