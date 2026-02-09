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

        {{-- ================= FILTER SECTION ================= --}}
        <form method="GET" action="{{ route('admin.aspirations.index') }}" class="row g-3 mb-4">

            <div class="col-md-2">
                <label class="form-label">Dari</label>
                <input type="date" name="start_date"
                       value="{{ request('start_date') }}"
                       class="form-control">
            </div>

            <div class="col-md-2">
                <label class="form-label">Sampai</label>
                <input type="date" name="end_date"
                       value="{{ request('end_date') }}"
                       class="form-control">
            </div>

            <div class="col-md-2">
                <label class="form-label">Bulan</label>
                <select name="month" class="form-select">
                    <option value="">Semua</option>
                    @for($i=1; $i<=12; $i++)
                        <option value="{{ $i }}"
                            {{ request('month') == $i ? 'selected' : '' }}>
                            {{ \Carbon\Carbon::create()->month($i)->translatedFormat('F') }}
                        </option>
                    @endfor
                </select>
            </div>

            <div class="col-md-2">
                <label class="form-label">Siswa</label>
                <select name="student_id" class="form-select">
                    <option value="">Semua</option>
                    @foreach($students as $student)
                        <option value="{{ $student->id }}"
                            {{ request('student_id') == $student->id ? 'selected' : '' }}>
                            {{ $student->user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-2">
                <label class="form-label">Kategori</label>
                <select name="id_kategori" class="form-select">
                    <option value="">Semua</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}"
                            {{ request('id_kategori') == $cat->id ? 'selected' : '' }}>
                            {{ $cat->ket_kategori }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-2">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="">Semua</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="proses" {{ request('status') == 'proses' ? 'selected' : '' }}>Proses</option>
                    <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
            </div>

            <div class="col-12 text-end">
                <button type="submit" class="btn btn-primary">
                    Filter
                </button>
                <a href="{{ route('admin.aspirations.index') }}"
                   class="btn btn-secondary">
                    Reset
                </a>
            </div>

        </form>
        {{-- ================= END FILTER ================= --}}

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
                                    <span class="badge bg-warning text-dark">Pending</span>
                                @elseif($item->status == 'proses')
                                    <span class="badge bg-info text-dark">Proses</span>
                                @elseif($item->status == 'selesai')
                                    <span class="badge bg-success">Selesai</span>
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

        <div class="mt-3">
            {{ $aspirations->links() }}
        </div>

        @else

        <div class="text-center py-4">
            <p class="text-muted mb-2">
                Data tidak ditemukan.
            </p>
        </div>

        @endif

    </div>
</div>

@endsection
