@extends('Admin.layout')

@section('content')
<div class="container">
    <h4 class="mb-3 mt-5">Tambah Mata Pelajaran</h4>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.category.update',$edit->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nama Kategori</label>
                    <input type="text" name="ket_kategori"
                           class="form-control @error('ket_kategori') is-invalid @enderror"
                           value="{{$edit->ket_kategori}}">

                    @error('ket_kategori')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('admin.category.index') }}" class="btn btn-secondary me-2">
                        Kembali
                    </a>
                    <button class="btn btn-primary">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection