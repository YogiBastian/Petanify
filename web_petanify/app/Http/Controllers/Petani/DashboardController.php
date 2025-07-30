<?php

namespace App\Http\Controllers\Petani;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Kategori;
use App\Models\Post;

class DashboardController extends Controller
{
    public function index(\Illuminate\Http\Request $request)
    {
        $selectedCategoryId = $request->input('category_id');

        // Ambil semua kategori
        $categories = Kategori::all();

        // Ambil produk terbaru (bisa difilter per kategori)
        $productsQuery = Product::latest();
        if ($selectedCategoryId) {
            $productsQuery->where('kategori_id', $selectedCategoryId);
        }
        $products = $productsQuery->take(10)->get();

        // Ambil produk Hot Deal yang aktif (jika ada)
        $hotProduct = Product::where('is_hot_deal', 1)
            ->where(function($q){
                $q->whereNull('hot_deal_expired_at')
                  ->orWhere('hot_deal_expired_at', '>', now());
            })
            ->latest('updated_at')
            ->first();

        $dealProduct = Product::latest()->first();

        $images = [];
        if ($dealProduct) {
            if ($dealProduct->foto)  $images[] = $dealProduct->foto;
            if (isset($dealProduct->foto2) && $dealProduct->foto2) $images[] = $dealProduct->foto2;
            if (isset($dealProduct->foto3) && $dealProduct->foto3) $images[] = $dealProduct->foto3;
        }

        $latestForumPosts = Post::with('user')
            ->withCount('comments')
            ->latest()
            ->take(6)
            ->get();

        $bestSellerProducts = Product::orderByDesc('jumlah_terjual')->take(20)->get();

        $hotDealProducts = Product::where('is_hot_deal', true)
        ->where(function ($q) {
            $q->whereNull('hot_deal_expired_at')->orWhere('hot_deal_expired_at', '>', now());
        })
        ->latest()
        ->get();

        $randomProducts = Product::inRandomOrder()->take(20)->get();

        return view('petani.dashboard', compact(
            'products',
            'categories',
            'dealProduct',
            'hotProduct',
            'images',
            'bestSellerProducts',
            'hotDealProducts',
            'randomProducts',
            'latestForumPosts',
            'selectedCategoryId'
        ) + [
            'featuredPosts' => collect(),
        ]);
    }
} // <-- Tambahkan penutup class di sini!
