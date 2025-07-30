<x-app-layout>
<div class="max-w-2xl mx-auto py-8">
    <h1 class="text-2xl font-bold mb-4">Pembayaran Pesanan #{{ $order->id }}</h1>
    <div class="mb-4">
        <b>Total Bayar:</b> <span class="text-green-700 text-xl">Rp{{ number_format($order->total,0,',','.') }}</span><br>
        <b>Ongkir:</b> Rp{{ number_format($order->ongkir,0,',','.') }}<br>
        <b>Bank Tujuan:</b>
        @php $bank = $banks[$order->bank_code] ?? null; @endphp
        @if($bank)
            <div class="mb-1">
                <span class="font-bold">{{ $bank['name'] }}</span><br>
                Nomor Rekening: <span class="font-mono">{{ $bank['no_rek'] }}</span><br>
                Atas Nama: <span class="font-semibold">{{ $bank['an'] }}</span>
            </div>
        @endif
    </div>
    <form action="{{ route('pembeli.orders.uploadBukti', $order->id) }}" method="POST" enctype="multipart/form-data" class="mb-6">
        @csrf
        <label class="block font-semibold mb-2">Upload Bukti Transfer</label>
        <input type="file" name="bukti_transfer" accept="image/*,application/pdf" required class="mb-2">
        <label class="block font-semibold mb-2">Catatan (opsional)</label>
        <textarea name="catatan" class="w-full border rounded mb-2" maxlength="200">{{ old('catatan', $order->catatan) }}</textarea>
        <button type="submit" class="px-5 py-2 bg-green-600 text-white rounded hover:bg-green-700">Kirim Bukti Pembayaran</button>
    </form>
    <div>
        <a href="{{ route('pembeli.orders.index') }}" class="text-blue-600 underline">Kembali ke Riwayat Pesanan</a>
    </div>
</div>
</x-app-layout>
