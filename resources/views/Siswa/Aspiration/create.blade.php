@extends('Siswa.layout')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-8">

        <div class="card shadow-sm border-0">
            <div class="card-body p-4">

                <h4 class="fw-bold mb-4">Buat Aspirasi Baru</h4>

                <form method="POST" action="{{ route('siswa.aspiration.store') }}">
                    @csrf

                    {{-- Kategori --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Kategori</label>
                        <select name="id_kategori"
                                class="form-select @error('id_kategori') is-invalid @enderror">
                            <option value="">-- Pilih Kategori --</option>
                            @foreach ($category as $cat)
                                <option value="{{ $cat->id }}"
                                    {{ old('id_kategori') == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->ket_kategori }}
                                </option>
                            @endforeach
                        </select>

                        @error('id_kategori')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Lokasi --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Lokasi</label>
                        <input type="text"
                               name="lokasi"
                               class="form-control @error('lokasi') is-invalid @enderror"
                               placeholder="Contoh: Ruang Kelas 10A"
                               value="{{ old('lokasi') }}">

                        @error('lokasi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Isi Aspirasi --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Isi Aspirasi</label>
                        <textarea name="ket"
                                  rows="4"
                                  class="form-control @error('ket') is-invalid @enderror"
                                  placeholder="Tuliskan aspirasi Anda di sini...">{{ old('ket') }}</textarea>

                        @error('ket')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Tombol --}}
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('siswa.aspiration.index') }}"
                           class="btn btn-outline-secondary">
                            Kembali
                        </a>

                        <button type="submit"
                                class="btn btn-primary shadow-sm">
                            Kirim Aspirasi
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>
</div>

@endsection
