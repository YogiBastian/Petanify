@extends('layouts.admin')

@section('title', 'Transfer ke Petani')

@section('content')
<div class="container py-4">

    {{-- Flash Message --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0"><i class="fas fa-money-check-alt me-2 text-primary"></i>Riwayat Transfer Petani</h4>
        <a href="{{ route('admin.transfer_petani.create') }}" class="btn btn-primary shadow-sm">
            <i class="fas fa-plus-circle me-1"></i> Transfer Baru
        </a>
    </div>

    {{-- Tabel --}}
    <div class="card shadow-sm border-0">
        <div class="card-body table-responsive p-0">
            <table class="table table-striped table-hover align-middle text-center mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Nama Petani</th>
                        <th>Nominal</th>
                        <th>Catatan</th>
                        <th>Tanggal</th>
                        <th>Bukti Transfer</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($transfers as $transfer)
                    <tr>
                        <td>{{ $transfer->petani->name }}</td>
                        <td class="text-end">Rp {{ number_format($transfer->nominal, 0, ',', '.') }}</td>
                        <td class="text-start">{{ $transfer->catatan ?? '-' }}</td>
                        <td>{{ $transfer->created_at->format('d-m-Y H:i') }}</td>
                        <td>
                            @if($transfer->foto_transfer)
                                <a href="{{ asset('storage/' . $transfer->foto_transfer) }}" target="_blank" class="btn btn-sm btn-outline-info">
                                    <i class="fas fa-image me-1"></i>Lihat Foto
                                </a>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.transfer_petani.edit', $transfer->id) }}" class="btn btn-sm btn-warning" title="Edit Transfer">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-muted py-4">Belum ada data transfer.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Pagination --}}
    <div class="d-flex justify-content-end mt-3">
        {{ $transfers->links('pagination::bootstrap-5') }}
    </div>

</div>
@endsection
