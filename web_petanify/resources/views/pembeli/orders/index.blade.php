<x-app-layout>
<div class="max-w-3xl mx-auto py-8">
    <h1 class="text-2xl font-bold mb-5">Riwayat Pesanan</h1>

    {{-- Status Filter --}}
    @php
        $statusList = [
            'all' => 'Semua',
            'pending' => 'Menunggu Pembayaran',
            'paid' => 'Menunggu Verifikasi',
            'verified' => 'Terverifikasi',
            'cancelled' => 'Dibatalkan'
        ];
        $currentStatus = $status ?? 'all';
    @endphp

    <div class="flex flex-wrap gap-2 mb-6">
        @foreach($statusList as $key => $label)
            <a href="{{ route('pembeli.orders.index', ['status' => $key != 'all' ? $key : null]) }}"
                class="px-4 py-2 rounded border transition 
                    {{ $currentStatus == $key ? 'bg-green-100 border-green-500 text-green-700 font-bold' : 'bg-white border-gray-300 text-gray-700 hover:bg-gray-100' }}">
                {{ $label }}
            </a>
        @endforeach
        <a href="{{ route('pembeli.orders.index') }}" class="ml-4 text-sm text-green-700 underline">Reset Filter</a>
    </div>

    {{-- Data Bank Petanify --}}
    @php
        $banks = [
            'bca' => ['name' => 'BCA', 'no_rek' => '1234567890', 'an' => 'PT Petanify BCA'],
            'mandiri' => ['name' => 'Mandiri', 'no_rek' => '9876543210', 'an' => 'PT Petanify Mandiri'],
            'bri' => ['name' => 'BRI', 'no_rek' => '888877776666', 'an' => 'PT Petanify BRI'],
            'bni' => ['name' => 'BNI', 'no_rek' => '1122334455', 'an' => 'PT Petanify BNI'],
        ];
    @endphp

    {{-- Empty State --}}
    @if($orders->isEmpty())
        <div class="flex flex-col items-center py-12">
            <img src="{{ asset('img/empty_order1.png') }}" alt="No Order" class="w-28 mb-4 opacity-70">
            <div class="font-bold text-xl mb-2">Yaah belum ada nich :)</div>
            <div class="text-gray-600 mb-6">Yuk, mulai belanja dan penuhi kebutuhanmu!</div>
            <a href="{{ route('pembeli.marketplace.index') }}" class="px-6 py-2 bg-green-600 text-white rounded hover:bg-green-700">Mulai Belanja</a>
        </div>
    @endif

    @foreach($orders as $order)
    <div class="bg-white shadow rounded mb-8 p-6">
        <div class="flex flex-col md:flex-row justify-between gap-5">
            <div>
                <div class="font-bold text-lg mb-2">Pesanan #{{ $order->id }}</div>
                <div class="text-sm mb-2">
                    <b>Tanggal:</b> {{ $order->created_at->format('d/m/Y H:i') }}<br>
                    <b>Status:</b>
                    @if($order->status == 'pending')
                        <span class="text-yellow-600">Menunggu Pembayaran</span>
                    @elseif($order->status == 'paid')
                        <span class="text-blue-700">Menunggu Verifikasi</span>
                    @elseif($order->status == 'verified')
                        <span class="text-green-600">Terverifikasi</span>
                    @elseif($order->status == 'cancelled')
                        <span class="text-red-600">Dibatalkan</span>
                    @endif
                </div>
                <div class="mb-2">
                    <b>Total:</b> Rp{{ number_format($order->total,0,',','.') }} <br>
                    <b>Ongkir:</b> Rp{{ number_format($order->ongkir,0,',','.') }}
                </div>
                <div class="mb-2">
                    <b>Bank Tujuan:</b>
                    @php
                        $bank = $banks[$order->bank_code] ?? null;
                    @endphp
                    @if($bank)
                        <div class="mb-1">
                            <span class="font-bold">{{ $bank['name'] }}</span><br>
                            Nomor Rekening: <span class="font-mono">{{ $bank['no_rek'] }}</span><br>
                            Atas Nama: <span class="font-semibold">{{ $bank['an'] }}</span>
                        </div>
                    @endif
                </div>
                <div>
                    <b>Catatan:</b> {{ $order->catatan ?? '-' }}
                </div>
            </div>
            <div class="border-l md:pl-8 pl-0 mt-4 md:mt-0 flex-1">
                <div class="font-semibold mb-2">Produk:</div>
                @foreach($order->orderItems as $item)
                    <div class="flex items-center gap-3 mb-2">
                        <img src="{{ asset('storage/'.$item->product->foto) }}" alt="" class="w-12 h-12 rounded shadow object-cover bg-white">
                        <div>
                            <div>{{ $item->product->nama_produk }}</div>
                            <div class="text-sm text-gray-500">Qty: {{ $item->quantity }}</div>
                            <div class="text-sm text-gray-700">Rp{{ number_format($item->harga_satuan,0,',','.') }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Upload Bukti Transfer --}}
        @if($order->status == 'pending')
        <form action="{{ route('pembeli.orders.uploadBukti', $order->id) }}" method="POST" enctype="multipart/form-data" class="mt-6">
            @csrf
            <label class="font-semibold mb-1">Upload Bukti Transfer</label>
            <input type="file" name="bukti_transfer" accept="image/*,application/pdf" required class="block mb-2">
            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Upload</button>
        </form>
        @elseif($order->bukti_transfer)
            <div class="mt-6">
                <b>Bukti Transfer:</b><br>
                <a href="{{ asset('storage/'.$order->bukti_transfer) }}" target="_blank" class="text-blue-700 underline">
                    Lihat Bukti Transfer
                </a>
            </div>
        @endif
    </div>
    @endforeach

    {{ $orders->withQueryString()->links() }}
</div>
</x-app-layout>
