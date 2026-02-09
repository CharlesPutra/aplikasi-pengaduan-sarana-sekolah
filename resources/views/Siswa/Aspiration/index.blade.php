@extends('Siswa.layout')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold mb-0">Daftar Aspirasi</h4>

    <a href="{{ route('siswa.aspiration.create') }}"
       class="btn btn-primary shadow-sm">
        + Tambah Aspirasi
    </a>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body">

        @if($aspirations->count() > 0)

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Kategori</th>
                        <th>Lokasi</th>
                        <th>Status</th>
                        <th>Feedback</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($aspirations as $item)
                    <tr>
                        <td>{{ $item->category->ket_kategori }}</td>

                        <td>{{ $item->lokasi }}</td>

                        <td>
                            @if($item->status == 'pending')
                                <span class="badge bg-warning text-dark">Pending</span>
                            @elseif($item->status == 'proses')
                                <span class="badge bg-info text-dark">Proses</span>
                            @elseif($item->status == 'selesai')
                                <span class="badge bg-success">Selesai</span>
                            @else
                                <span class="badge bg-secondary">
                                    {{ ucfirst($item->status) }}
                                </span>
                            @endif
                        </td>

                        <td>
                            {{ $item->feedback ?? '-' }}
                        </td>

                        <td class="text-center">
                            @if ($item->status == 'pending')
                                <a href="{{ route('siswa.aspiration.edit', $item->id) }}"
                                   class="btn btn-sm btn-warning me-1">
                                    Edit
                                </a>

                                <form action="{{ route('siswa.aspiration.destroy', $item->id) }}"
                                      method="POST"
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger"
                                            onclick="return confirm('Yakin ingin menghapus aspirasi ini?')">
                                        Hapus
                                    </button>
                                </form>
                            @else
                                <span class="text-muted small">Tidak tersedia</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @else

            <div class="text-center py-4">
                <p class="text-muted mb-2">Belum ada aspirasi yang dibuat.</p>
                <a href="{{ route('siswa.aspiration.create') }}"
                   class="btn btn-outline-primary btn-sm">
                    Buat Aspirasi Pertama
                </a>
            </div>

        @endif

    </div>
</div>

@endsection
