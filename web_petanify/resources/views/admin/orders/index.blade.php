@extends('layouts.admin')
@section('title', 'Kelola Pesanan')

@section('content')
<div class="container">

    {{-- Flash Messages --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <i class="fa fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Tabel Pesanan --}}
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-success text-white fw-semibold">
            Daftar Pesanan
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Pembeli</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Total</th>
                        <th class="text-center">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $i => $order)
                    <tr>
                        <td>{{ $orders->firstItem() + $i }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                            @php
                                $status = $order->status;
                                $statusBadge = match($status) {
                                    'pending' => 'warning',
                                    'paid' => 'primary',
                                    'verified' => 'success',
                                    'cancelled' => 'danger',
                                    default => 'secondary',
                                };
                            @endphp
                            <span class="badge bg-{{ $statusBadge }}">
                                {{ ucfirst($status) }}
                            </span>
                        </td>
                        <td>Rp{{ number_format($order->total, 0, ',', '.') }}</td>
                        <td class="text-center">
                            <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-eye me-1"></i> Lihat
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-3">
                            <i class="fa fa-info-circle me-1"></i> Belum ada pesanan
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Rekap Penjualan Petani --}}
    @if(!empty($rekapPetani))
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-info text-white fw-semibold">
            Rekapitulasi Total Penjualan per Petani
        </div>
        <div class="table-responsive">
            <table class="table table-bordered align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Nama Petani</th>
                        <th>Total Penjualan (Rp)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rekapPetani as $petani)
                    <tr>
                        <td>{{ $petani['nama'] }}</td>
                        <td>Rp{{ number_format($petani['total'], 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif

    {{-- Pagination --}}
    <div class="d-flex justify-content-end">
    {{ $orders->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
