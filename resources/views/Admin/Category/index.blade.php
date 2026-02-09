@extends('Admin.layout')

@section('content')
    <a href="{{ route('admin.category.create') }}" class="btn btn-primary btn-sm mt-5">Tambah Data</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Kategori</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $data => $d)
                <tr>
                    <td>{{ $data + 1 }}</td>
                    <td>{{ $d->ket_kategori }}</td>
                    <td>
                        <a href="{{ route('admin.category.edit', $d->id) }}" class="btn btn-warning btn-sm"> Edit</a>
                        <form action="{{ route('admin.category.destroy', $d->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus kategori ini?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
