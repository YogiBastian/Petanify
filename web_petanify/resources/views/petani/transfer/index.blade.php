@extends('layouts.app')
@section('title', 'Riwayat Penerimaan Transfer')

@section('content')
<style>
    .riwayat-container {
        max-width: 850px;
        margin: 32px auto 0 auto;
        background: #fff;
        border-radius: 12px;
        padding: 32px 36px 24px 36px;
        box-shadow: 0 4px 24px #00000008;
    }
    .riwayat-container h3 {
        margin-bottom: 22px;
        font-weight: 700;
        letter-spacing: 0.2px;
        color: #222;
    }
    .table-riwayat {
        width: 100%;
        border-collapse: collapse;
        background: #fff;
        margin-bottom: 16px;
    }
    .table-riwayat th, .table-riwayat td {
        padding: 12px 10px;
        text-align: center;
        border-bottom: 1px solid #e8e8e8;
    }
    .table-riwayat th {
        background: #f6f6f6;
        color: #111;
        font-weight: 600;
        font-size: 1.05rem;
    }
    .table-riwayat td {
        color: #222;
        font-size: 1rem;
    }
    .table-riwayat a {
        color: #007d60;
        text-decoration: underline;
        font-weight: 500;
    }
    @media (max-width: 768px) {
        .riwayat-container {
            padding: 18px 4px;
        }
        .table-riwayat th, .table-riwayat td {
            font-size: 0.94rem;
            padding: 7px 2px;
        }
    }
</style>
<div class="riwayat-container">
    <h3>Riwayat Penerimaan Uang Hasil Penjualan</h3>
    <table class="table-riwayat">
        <thead>
            <tr>
                <th>Nominal</th>
                <th>Catatan</th>
                <th>Tanggal</th>
                <th>Foto Transfer</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($transfers as $transfer)
            <tr>
                <td>Rp {{ number_format($transfer->nominal, 0, ',', '.') }}</td>
                <td>{{ $transfer->catatan }}</td>
                <td>{{ $transfer->created_at->format('d-m-Y H:i') }}</td>
                <td>
                    @if($transfer->foto_transfer)
                        <a href="{{ asset('storage/' . $transfer->foto_transfer) }}" target="_blank">Lihat Foto</a>
                    @else
                        <span style="color:#bbb;">-</span>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center" style="color:#c33;">Belum ada transfer.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    <div style="text-align:right;">
        {{ $transfers->links() }}
    </div>
</div>
@endsection
