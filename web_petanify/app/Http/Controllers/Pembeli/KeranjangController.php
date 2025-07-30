<?php

namespace App\Http\Controllers\Pembeli;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    public function index()
    {
        // Ambil semua produk di keranjang milik user login
        $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();

        // Hitung subtotal & total
        $subtotal = $cartItems->sum(function($item) {
            return $item->product->harga * $item->quantity;
        });
        $total = $subtotal; // Ubah jika ada diskon/kupon

        // Kirim data ke view PEMBELI
        return view('pembeli.keranjang.index', compact('cartItems', 'subtotal', 'total'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity'   => 'required|integer|min:1|max:100'
        ]);

        // Cari produk
        $product = Product::findOrFail($request->product_id);

        // Update jika sudah ada, atau create baru
        $cartItem = Cart::where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->first();

        if ($cartItem) {
            // Jika sudah ada, tambah qty
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {
            Cart::create([
                'user_id'    => Auth::id(),
                'product_id' => $product->id,
                'quantity'   => $request->quantity
            ]);
        }

        // Update badge keranjang di navbar
        $cartCount = Cart::where('user_id', Auth::id())->count();
        session(['cart_count' => $cartCount]);

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    public function update(Request $request)
    {
        // Handle remove (hapus produk)
        if ($request->has('remove')) {
            $cartId = $request->input('remove');
            Cart::where('id', $cartId)
                ->where('user_id', Auth::id())
                ->delete();

            return redirect()->back()->with('success', 'Produk dihapus dari keranjang.');
        }

        // Handle increase/decrease quantity
        if ($request->has('increase')) {
            $cartId = $request->input('increase');
            $cartItem = Cart::where('id', $cartId)->where('user_id', Auth::id())->first();
            if ($cartItem) {
                $cartItem->quantity += 1;
                $cartItem->save();
            }
            return redirect()->back();
        }
        if ($request->has('decrease')) {
            $cartId = $request->input('decrease');
            $cartItem = Cart::where('id', $cartId)->where('user_id', Auth::id())->first();
            if ($cartItem && $cartItem->quantity > 1) {
                $cartItem->quantity -= 1;
                $cartItem->save();
            }
            return redirect()->back();
        }

        // Handle update seluruh quantity
        if ($request->has('quantities')) {
            foreach ($request->quantities as $cartId => $qty) {
                $cartItem = Cart::where('id', $cartId)
                    ->where('user_id', Auth::id())
                    ->first();
                if ($cartItem && $qty > 0) {
                    $cartItem->quantity = $qty;
                    $cartItem->save();
                }
            }
            return redirect()->back()->with('success', 'Keranjang diperbarui.');
        }

        // Handle apply coupon (contoh, logika manual)
        if ($request->has('apply_coupon')) {
            // Sementara hanya menampilkan pesan sukses
            return redirect()->back()->with('success', 'Kode kupon diterapkan.');
        }

        // Handle checkout
        if ($request->has('checkout')) {
            // Logika checkout dapat dikembangkan
            return redirect()->back()->with('success', 'Fitur checkout belum diimplementasikan.');
        }

        // Default fallback
        return redirect()->back();
    }
}
