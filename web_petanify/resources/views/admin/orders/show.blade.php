@extends('layouts.admin')

@section('title', 'Detail Pesanan')

@section('content')
<div class="container py-4">

    {{-- Flash Messages --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <i class="fa fa-check-circle me-1"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
            <i class="fa fa-exclamation-circle me-1"></i> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Informasi Pesanan --}}
    <div class="card shadow-sm mb-4">
        <div class="card-body row g-4">
            {{-- Kiri: Detail Pemesan --}}
            <div class="col-md-8">
                <h5 class="card-title mb-3"><i class="fa fa-user me-2 text-primary"></i>{{ $order->user->name }}</h5>
                <p class="mb-2 text-muted"><i class="fa fa-map-marker-alt me-2"></i>{{ $order->alamat }}</p>

                <p class="mb-2">
                    <strong>Status:</strong>
                    @php
                        $badge = match($order->status) {
                            'pending' => 'warning text-dark',
                            'paid' => 'primary',
                            'verified' => 'success',
                            'cancelled' => 'danger',
                            default => 'secondary'
                        };
                    @endphp
                    <span class="badge bg-{{ $badge }}">{{ ucfirst($order->status) }}</span>
                </p>

                <p class="mb-2"><strong>Total:</strong> Rp{{ number_format($order->total, 0, ',', '.') }}</p>
                <p><strong>Catatan:</strong> {{ $order->catatan ? e($order->catatan) : '-' }}</p>
            </div>

            {{-- Kanan: Aksi & Bukti --}}
            <div class="col-md-4 text-center">
                @if($order->bukti_transfer)
                    <h6 class="fw-bold mb-2">Bukti Transfer</h6>
                    @if(Str::endsWith($order->bukti_transfer, ['.jpg', '.jpeg', '.png', '.webp']))
                        <a href="{{ asset('storage/' . $order->bukti_transfer) }}" target="_blank" class="d-block mb-2">
                            <img src="{{ asset('storage/' . $order->bukti_transfer) }}"
                                 alt="Bukti Transfer"
                                 class="img-thumbnail shadow"
                                 style="max-width: 180px;">
                        </a>
                    @else
                        <a href="{{ asset('storage/' . $order->bukti_transfer) }}" target="_blank" class="d-block mb-2">
                            <i class="fa fa-file-pdf text-danger fa-2x"></i> File PDF
                        </a>
                    @endif
                    <a href="{{ asset('storage/' . $order->bukti_transfer) }}" target="_blank" class="btn btn-sm btn-outline-primary mt-2">
                        <i class="fa fa-download me-1"></i> Download Bukti
                    </a>
                @endif

                @if($order->status == 'paid')
                    <form action="{{ route('admin.orders.verify', $order->id) }}" method="POST" class="d-grid gap-2 mt-4">
                        @csrf
                        <button type="submit" class="btn btn-success shadow" onclick="return confirm('Verifikasi pesanan ini?')">
                            <i class="fa fa-check me-1"></i> Verifikasi
                        </button>
                    </form>
                    <form action="{{ route('admin.orders.cancel', $order->id) }}" method="POST" class="d-grid gap-2 mt-2">
                        @csrf
                        <button type="submit" class="btn btn-danger shadow" onclick="return confirm('Batalkan pesanan ini?')">
                            <i class="fa fa-times me-1"></i> Batalkan
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>

    {{-- Daftar Produk --}}
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-light fw-semibold">
            <i class="fa fa-box me-2 text-secondary"></i>Daftar Produk Dipesan
        </div>
        <div class="table-responsive">
            <table class="table table-hover mb-0 align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Produk</th>
                        <th>Qty</th>
                        <th>Harga</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->orderItems as $item)
                    <tr>
                        <td>{{ $item->product->nama_produk ?? '-' }}</td>
                        <td>{{ $item->qty ?? $item->quantity ?? '-' }}</td>
                        <td>Rp{{ number_format($item->harga ?? $item->harga_satuan ?? 0, 0, ',', '.') }}</td>
                        <td>Rp{{ number_format(
                            ($item->harga ?? $item->harga_satuan ?? 0) * ($item->qty ?? $item->quantity ?? 0),
                            0, ',', '.') }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Rekap Transfer ke Petani --}}
    @if(!empty($rekapPetani))
    <div class="card shadow-sm">
        <div class="card-header bg-light fw-semibold">
            <i class="fa fa-user-farmer me-2 text-success"></i>Rekapitulasi Transfer ke Petani
        </div>
        <div class="table-responsive">
            <table class="table table-bordered mb-0 align-middle">
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

</div>
@endsection
