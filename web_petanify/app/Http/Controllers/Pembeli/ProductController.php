<?php

namespace App\Http\Controllers\Pembeli;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($id)
    {
        // Ambil produk beserta relasi: kategori, user (petani), reviews, dan reviewer-nya
        $product = Product::with(['kategori', 'user', 'reviews.user'])
            ->withCount('reviews')
            ->findOrFail($id);

        // Hitung rata-rata rating dari review
        $averageRating = $product->reviews->avg('rating');

        // Tampilkan view khusus pembeli
        return view('pembeli.produk.show', compact('product', 'averageRating'));
    }

    public function etalase($id)
    {
        // Ambil petani berdasarkan ID dan role
        $petani = User::where('role', 'petani')->findOrFail($id);

        // Ambil semua produk yang dibuat petani tersebut
        $products = Product::where('user_id', $petani->id)->latest()->get();

        // Tampilkan view etalase untuk pembeli
        return view('pembeli.produk.etalase', compact('petani', 'products'));
    }
}
