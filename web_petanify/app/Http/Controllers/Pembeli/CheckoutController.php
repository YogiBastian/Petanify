<?php

namespace App\Http\Controllers\Pembeli;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;

class CheckoutController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $cartItems = Cart::where('user_id', $user->id)->with('product')->get();
        $ongkir = 25000; // contoh ongkir flat

        // Data bank PETANIFY (bukan Virtual Account!)
        $banks = [
            [
                'code' => 'bca',
                'name' => 'BCA',
                'no_rek' => '1234567890',      // GANTI dengan rekening BCA Petanify
                'an' => 'PT PETANIFY MAKMUR'
            ],
            [
                'code' => 'mandiri',
                'name' => 'Mandiri',
                'no_rek' => '2345678901',
                'an' => 'PT PETANIFY MAKMUR'
            ],
            [
                'code' => 'bri',
                'name' => 'BRI',
                'no_rek' => '3456789012',
                'an' => 'PT PETANIFY MAKMUR'
            ],
            [
                'code' => 'bni',
                'name' => 'BNI',
                'no_rek' => '4567890123',
                'an' => 'PT PETANIFY MAKMUR'
            ]
        ];

        $subtotal = $cartItems->sum(fn($item) => $item->product->harga * $item->quantity);
        $total = $subtotal + $ongkir;

        return view('pembeli.checkout', compact('user', 'cartItems', 'banks', 'subtotal', 'ongkir', 'total'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'bank_code' => 'required',
            // Bisa tambahkan validasi lain seperti alamat, dsb.
        ]);

        $cartItems = Cart::where('user_id', $user->id)->with('product')->get();
        if ($cartItems->isEmpty()) {
            return back()->with('error', 'Keranjang masih kosong.');
        }

        $subtotal = $cartItems->sum(fn($item) => $item->product->harga * $item->quantity);
        $ongkir = 25000; // flat (atau dinamis)
        $total = $subtotal + $ongkir;

        // 1. Simpan ke tabel orders DAN AMBIL HASILNYA
        $order = Order::create([
            'user_id'        => $user->id,
            'nama_penerima'  => $user->name,
            'alamat'         => $user->alamat,
            'kota'           => $user->kota,
            'provinsi'       => $user->provinsi,
            'kode_pos'       => $user->kode_pos,
            'no_hp'          => $user->no_hp,
            'total'          => $total,
            'ongkir'         => $ongkir,
            'catatan'        => $request->catatan,
            'bank_code'      => $request->bank_code,
            'status'         => 'pending',
        ]);

        // 2. Simpan ke tabel order_items
        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id'     => $order->id,
                'product_id'   => $item->product->id,
                'quantity'     => $item->quantity,
                'harga_satuan' => $item->product->harga,
                'subtotal'     => $item->product->harga * $item->quantity,
            ]);
        }

        // 3. Kosongkan keranjang
        Cart::where('user_id', $user->id)->delete();

        // 4. Redirect langsung ke halaman BAYAR order ini
        return redirect()->route('pembeli.orders.bayar', $order->id)
            ->with('success', 'Pesanan berhasil dibuat. Silakan lakukan pembayaran!');
    }
}
