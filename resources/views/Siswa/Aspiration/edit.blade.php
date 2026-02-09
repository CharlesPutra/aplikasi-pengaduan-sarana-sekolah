@extends('Siswa.layout')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-8">

        <div class="card shadow-sm border-0">
            <div class="card-body p-4">

                <h4 class="fw-bold mb-4">Edit Aspirasi</h4>

                <form method="POST"
                      action="{{ route('siswa.aspiration.update', $aspiration->id) }}">
                    @csrf
                    @method('PUT')

                    {{-- Kategori --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Kategori</label>
                        <select name="id_kategori"
                                class="form-select @error('id_kategori') is-invalid @enderror">
                            <option value="">-- Pilih Kategori --</option>

                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}"
                                    {{ old('id_kategori', $aspiration->category_id) == $cat->id ? 'selected' : '' }}>
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
                               value="{{ old('lokasi', $aspiration->lokasi) }}"
                               placeholder="Contoh: Ruang Kelas 10A">

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
                                  placeholder="Tuliskan aspirasi Anda...">{{ old('ket', $aspiration->ket) }}</textarea>

                        @error('ket')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Status (Info) --}}
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Status Aspirasi</label><br>
                        @if($aspiration->status == 'pending')
                            <span class="badge bg-warning text-dark">Pending</span>
                        @elseif($aspiration->status == 'proses')
                            <span class="badge bg-info text-dark">Proses</span>
                        @elseif($aspiration->status == 'selesai')
                            <span class="badge bg-success">Selesai</span>
                        @endif
                    </div>

                    {{-- Tombol --}}
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('siswa.aspiration.index') }}"
                           class="btn btn-outline-secondary">
                            Kembali
                        </a>

                        <button type="submit"
                                class="btn btn-primary shadow-sm">
                            Update Aspirasi
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>
</div>

@endsection
