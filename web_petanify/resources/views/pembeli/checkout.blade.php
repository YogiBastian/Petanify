<x-app-layout>
@php
    $alamatLengkap = $user->alamat && $user->kota && $user->provinsi && $user->kode_pos && $user->no_hp;
@endphp

<div class="max-w-6xl mx-auto mt-8 mb-16">
    <h1 class="text-3xl font-bold mb-8">Checkout</h1>
    <form action="{{ route('pembeli.checkout.store') }}" method="POST" class="flex flex-col lg:flex-row gap-8">
        @csrf

        <!-- KIRI: ALAMAT & PRODUK -->
        <div class="flex-1 space-y-6">
            <!-- ALAMAT -->
            <div class="bg-white rounded-xl shadow p-5">
                <div class="flex items-center justify-between mb-1">
                    <div class="flex items-center gap-3">
                        <span class="inline-block w-3 h-3 bg-green-600 rounded-full"></span>
                        <span class="font-semibold">Rumah &bull; {{ $user->name }}</span>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="text-sm px-3 py-1 rounded border hover:bg-gray-50">Ganti</a>
                </div>
                <div class="text-gray-700 text-sm">
                    {{ $user->alamat }},
                    {{ $user->kota }},
                    {{ $user->provinsi }},
                    {{ $user->kode_pos }},
                    {{ $user->no_hp }}
                </div>
            </div>

            <!-- PRODUK DI KERANJANG -->
            <div class="bg-white rounded-xl shadow p-5">
                <div class="font-semibold mb-4 text-lg">Keranjang Anda</div>
                @foreach($cartItems as $item)
                    <div class="flex items-center gap-4 py-3 border-b last:border-0">
                        <img src="{{ asset('storage/' . $item->product->foto) }}" class="w-20 h-20 rounded object-cover" alt="">
                        <div class="flex-1">
                            <div class="font-medium">{{ $item->product->nama_produk }}</div>
                            <div class="text-gray-500 text-sm">{{ $item->product->deskripsi }}</div>
                            <div class="text-xs mt-2">
                                Qty: <b>{{ $item->quantity }}</b>
                            </div>
                        </div>
                        <div class="text-right font-bold text-green-700">
                            Rp{{ number_format($item->product->harga * $item->quantity, 0, ',', '.') }}
                        </div>
                        <input type="hidden" name="products[{{ $loop->index }}][product_id]" value="{{ $item->product->id }}">
                        <input type="hidden" name="products[{{ $loop->index }}][quantity]" value="{{ $item->quantity }}">
                    </div>
                @endforeach

                <!-- Catatan pesanan -->
                <div class="mt-4">
                    <label class="text-sm font-semibold">Kasih Catatan</label>
                    <textarea name="catatan" class="w-full border rounded p-2 mt-1" rows="2" maxlength="200">{{ old('catatan') }}</textarea>
                </div>
            </div>
        </div>

        <!-- KANAN: METODE BAYAR & TOTAL -->
        <div class="w-full lg:w-[340px] space-y-6">
            <div class="bg-white rounded-xl shadow p-6">
                <div class="font-semibold mb-2 text-lg">Pilih Bank Tujuan Transfer</div>
                @foreach($banks as $bank)
                    <div class="flex items-center mb-2">
                        <input type="radio" id="bank_{{ $bank['code'] }}" name="bank_code"
                            value="{{ $bank['code'] }}"
                            {{ old('bank_code', $loop->first ? $bank['code'] : '') == $bank['code'] ? 'checked' : '' }}>
                        <label for="bank_{{ $bank['code'] }}" class="ml-2">
                            {{ $bank['name'] }}
                        </label>
                    </div>
                @endforeach

                <div class="mt-5 border-t pt-5">
                    <div class="flex justify-between text-sm mb-1">
                        <span>Subtotal</span>
                        <span>Rp{{ number_format($subtotal, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between text-sm mb-1">
                        <span>Ongkir</span>
                        <span>Rp{{ number_format($ongkir, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between text-base font-bold mt-2">
                        <span>Total</span>
                        <span class="text-green-700">Rp{{ number_format($total, 0, ',', '.') }}</span>
                    </div>

                    <!-- Tombol Bayar -->
                    @if($alamatLengkap)
                        <button type="submit"
                            class="w-full mt-6 bg-green-600 hover:bg-green-700 text-white py-3 rounded font-bold text-lg shadow">
                            Bayar Sekarang
                        </button>
                    @else
                        <div class="mt-4 text-red-600 text-sm font-semibold">
                            Silakan lengkapi alamat Anda terlebih dahulu sebelum melakukan checkout.
                        </div>
                        <a href="{{ route('profile.edit') }}"
                            class="w-full block mt-2 bg-gray-400 hover:bg-gray-500 text-white py-3 rounded font-bold text-center text-lg shadow">
                            Lengkapi Alamat
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </form>
</div>
</x-app-layout>
