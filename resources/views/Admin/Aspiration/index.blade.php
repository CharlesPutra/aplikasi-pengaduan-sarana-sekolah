@extends('Admin.layout')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-0">Data Aspirasi Siswa</h4>
        <small class="text-muted">Daftar seluruh pengaduan / aspirasi yang masuk</small>
    </div>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body">

        @if($aspirations->count() > 0)

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Kategori</th>
                        <th>Lokasi</th>
                        <th>Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($aspirations as $item)
                        <tr>
                            <td class="fw-semibold">
                                {{ $item->student->user->name }}
                            </td>

                            <td>
                                <span class="badge bg-secondary">
                                    {{ $item->student->kelas }}
                                </span>
                            </td>

                            <td>
                                {{ $item->category->ket_kategori ?? '-' }}
                            </td>

                            <td>{{ $item->lokasi }}</td>

                            <td>
                                @if($item->status == 'pending')
                                    <span class="badge bg-warning text-dark">
                                        Pending
                                    </span>
                                @elseif($item->status == 'proses')
                                    <span class="badge bg-info text-dark">
                                        Proses
                                    </span>
                                @elseif($item->status == 'selesai')
                                    <span class="badge bg-success">
                                        Selesai
                                    </span>
                                @else
                                    <span class="badge bg-secondary">
                                        {{ ucfirst($item->status) }}
                                    </span>
                                @endif
                            </td>

                            <td class="text-center">
                                <a href="{{ route('admin.aspirations.show', $item->id) }}"
                                   class="btn btn-sm btn-primary shadow-sm">
                                    Detail
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @else

        <div class="text-center py-4">
            <p class="text-muted mb-2">
                Belum ada aspirasi yang masuk.
            </p>
        </div>

        @endif

    </div>
</div>

@endsection
