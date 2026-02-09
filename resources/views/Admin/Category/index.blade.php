@extends('Admin.layout')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold mb-0">Manajemen Kategori</h4>

    <a href="{{ route('admin.category.create') }}"
       class="btn btn-primary shadow-sm">
        + Tambah Kategori
    </a>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body">

        @if($datas->count() > 0)

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th width="5%">#</th>
                        <th>Kategori</th>
                        <th class="text-center" width="20%">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($datas as $index => $d)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td class="fw-semibold">{{ $d->ket_kategori }}</td>
                            <td class="text-center">

                                <a href="{{ route('admin.category.edit', $d->id) }}"
                                   class="btn btn-sm btn-warning me-1">
                                    Edit
                                </a>

                                <form action="{{ route('admin.category.destroy', $d->id) }}"
                                      method="POST"
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-sm btn-danger"
                                            onclick="return confirm('Hapus kategori ini?')">
                                        Hapus
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @else

        <div class="text-center py-4">
            <p class="text-muted mb-2">Belum ada kategori.</p>
            <a href="{{ route('admin.category.create') }}"
               class="btn btn-outline-primary btn-sm">
                Tambah Kategori Pertama
            </a>
        </div>

        @endif

    </div>
</div>

@endsection
