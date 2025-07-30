<?php

namespace App\Http\Controllers\Petani;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\User;

class ProductController extends Controller
{
    public function show($id)
    {
        $product = Product::with(['kategori', 'user', 'reviews.user'])
            ->withCount('reviews')
            ->findOrFail($id);
    
        // Hitung rating rata-rata
        $averageRating = $product->reviews->avg('rating');
    
        return view('petani.produk.show', compact('product', 'averageRating'));
    }

 public function etalase($id)
    {
        $petani = User::where('role', 'petani')->findOrFail($id);
        $products = Product::where('user_id', $petani->id)->latest()->get();

        return view('petani.produk.etalase', compact('petani', 'products'));
    }

}
