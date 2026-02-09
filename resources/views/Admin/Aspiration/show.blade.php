@extends('Admin.layout')

@section('content')

<div class="row">
    <div class="col-lg-8 mx-auto">

        <h4 class="fw-bold mb-4">Detail Aspirasi Siswa</h4>

        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body">

                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>Nama Siswa:</strong><br>
                        {{ $aspiration->student->user->name }}
                    </div>
                    <div class="col-md-6">
                        <strong>Kelas:</strong><br>
                        <span class="badge bg-secondary">
                            {{ $aspiration->student->kelas }}
                        </span>
                    </div>
                </div>

                <div class="mb-3">
                    <strong>Kategori:</strong><br>
                    {{ $aspiration->category->ket_kategori ?? '-' }}
                </div>

                <div class="mb-3">
                    <strong>Lokasi:</strong><br>
                    {{ $aspiration->lokasi }}
                </div>

                <div class="mb-3">
                    <strong>Keterangan:</strong><br>
                    <div class="border rounded p-3 bg-light">
                        {{ $aspiration->ket }}
                    </div>
                </div>

                <div class="mb-2">
                    <strong>Status Saat Ini:</strong><br>
                    @if($aspiration->status == 'pending')
                        <span class="badge bg-warning text-dark">Pending</span>
                    @elseif($aspiration->status == 'diproses')
                        <span class="badge bg-info text-dark">Diproses</span>
                    @elseif($aspiration->status == 'selesai')
                        <span class="badge bg-success">Selesai</span>
                    @endif
                </div>

            </div>
        </div>

        {{-- Form Update --}}
        <div class="card shadow-sm border-0">
            <div class="card-body">

                <h6 class="fw-bold mb-3">Update Status & Feedback</h6>

                <form method="POST"
                      action="{{ route('admin.aspirations.update', $aspiration->id) }}">
                    @csrf
                    @method('PUT')

                    {{-- Status --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Status</label>
                        <select name="status"
                                class="form-select @error('status') is-invalid @enderror">

                            <option value="pending"
                                {{ old('status', $aspiration->status) == 'pending' ? 'selected' : '' }}>
                                Pending
                            </option>

                            <option value="diproses"
                                {{ old('status', $aspiration->status) == 'diproses' ? 'selected' : '' }}>
                                Diproses
                            </option>

                            <option value="selesai"
                                {{ old('status', $aspiration->status) == 'selesai' ? 'selected' : '' }}>
                                Selesai
                            </option>
                        </select>

                        @error('status')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Feedback --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Feedback</label>
                        <textarea name="feedback"
                                  rows="4"
                                  class="form-control @error('feedback') is-invalid @enderror"
                                  placeholder="Tulis feedback untuk siswa...">{{ old('feedback', $aspiration->feedback) }}</textarea>

                        @error('feedback')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Tombol --}}
                    <div class="d-flex justify-content-between mt-3">
                        <a href="{{ route('admin.aspirations.index') }}"
                           class="btn btn-outline-secondary">
                            ← Kembali
                        </a>

                        <button type="submit"
                                class="btn btn-primary shadow-sm">
                            Update Data
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>
</div>

@endsection
