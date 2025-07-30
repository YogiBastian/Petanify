<x-app-layout>
    <div class="max-w-4xl mx-auto mt-10 bg-white rounded-xl shadow p-8">
        <h1 class="text-3xl font-bold text-center mb-7">Cart</h1>

        @if($cartItems->isEmpty())
            <div class="text-center py-10 text-gray-500 text-lg">
                Keranjang masih kosong.
            </div>
            <div class="text-center mt-6">
                <a href="{{ route('pembeli.marketplace.index') }}"
                   class="bg-lime-600 hover:bg-lime-700 text-white px-6 py-3 rounded font-bold">
                    Back to Shop
                </a>
            </div>
        @else
            <form action="{{ route('pembeli.keranjang.update') }}" method="POST">
                @csrf

                {{-- Tabel produk di keranjang --}}
                <table class="w-full mb-8 border-separate" style="border-spacing: 0;">
                    <thead>
                        <tr class="bg-gray-100 text-sm">
                            <th class="text-left p-3 rounded-tl-md">PRODUCT</th>
                            <th class="text-center p-3">PRICE</th>
                            <th class="text-center p-3">QUANTITY</th>
                            <th class="text-center p-3">TOTAL</th>
                            <th class="p-3 rounded-tr-md"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cartItems as $item)
                        <tr class="border-b group hover:bg-gray-50">
                            <td class="flex gap-4 items-center py-3">
                                <img src="{{ asset('storage/'.$item->product->foto) }}" alt="{{ $item->product->nama_produk }}"
                                     class="w-16 h-16 rounded shadow object-cover bg-white">
                                <a href="{{ route('pembeli.produk.show', $item->product_id) }}"
                                   class="text-green-700 font-semibold hover:underline">
                                    {{ $item->product->nama_produk }}
                                </a>
                            </td>
                            <td class="text-center font-medium text-gray-700">
                                Rp{{ number_format($item->product->harga, 0, ',', '.') }}
                            </td>
                            <td class="text-center">
                                <div class="inline-flex items-center border rounded">
                                    <button type="submit" name="decrease" value="{{ $item->id }}" class="px-3 py-1 text-lg">-</button>
                                    <input type="number" name="quantities[{{ $item->id }}]" value="{{ $item->quantity }}"
                                        min="1" max="99"
                                        class="w-12 text-center border-0 focus:ring-0 py-1" />
                                    <button type="submit" name="increase" value="{{ $item->id }}" class="px-3 py-1 text-lg">+</button>
                                </div>
                            </td>
                            <td class="text-center font-bold">
                                Rp{{ number_format($item->product->harga * $item->quantity, 0, ',', '.') }}
                            </td>
                            <td class="text-center">
                                <button type="submit" name="remove" value="{{ $item->id }}"
                                    class="text-xl text-gray-400 hover:text-red-600 font-bold" title="Hapus">
                                    &times;
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- Aksi dan ringkasan --}}
                <div class="flex flex-col md:flex-row justify-between gap-6 items-start md:items-center mb-4">
                    <a href="{{ route('pembeli.marketplace.index') }}"
                       class="bg-lime-600 hover:bg-lime-700 text-white px-6 py-2 rounded flex items-center gap-2 text-md font-bold">
                        <i class="fa fa-arrow-left"></i> Back To Shop
                    </a>

                    <button type="submit" class="border px-6 py-2 rounded shadow text-gray-700 bg-white hover:bg-gray-50 font-semibold flex items-center gap-2">
                        <i class="fa fa-refresh"></i> Update cart
                    </button>
                </div>

                <div class="flex flex-col md:flex-row gap-7 mt-8">
                    {{-- Coupon --}}
                    <div class="flex-1">
                        <h3 class="font-bold mb-2">Coupon Discount</h3>
                        <div class="flex gap-2">
                            <input type="text" name="coupon_code" placeholder="Coupon code"
                                   class="border px-3 py-2 rounded w-full focus:outline-none focus:border-green-500" />
                            <button type="submit" name="apply_coupon"
                                class="border px-5 py-2 rounded bg-white font-semibold hover:bg-green-100">
                                Apply coupon
                            </button>
                        </div>
                    </div>

                    {{-- Total --}}
                    <div class="bg-gray-50 px-7 py-6 rounded-lg shadow flex-1 max-w-xs w-full">
                        <table class="w-full text-base">
                            <tr>
                                <td class="py-1">Subtotal</td>
                                <td class="py-1 text-right font-medium">
                                    Rp{{ number_format($subtotal, 0, ',', '.') }}
                                </td>
                            </tr>
                            <tr>
                                <td class="py-1 font-bold text-lg">Total</td>
                                <td class="py-1 text-right font-bold text-red-600 text-lg">
                                    Rp{{ number_format($total, 0, ',', '.') }}
                                </td>
                            </tr>
                        </table>
                        {{-- Checkout --}}
                        <a href="{{ route('pembeli.checkout') }}"
                           class="block w-full mt-4 bg-lime-600 hover:bg-lime-700 text-white py-3 rounded font-bold text-lg shadow text-center">
                            Proceed to checkout
                        </a>
                    </div>
                </div>
            </form>
        @endif
    </div>
</x-app-layout>
