<?php

namespace App\Http\Controllers\Pembeli;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Kategori;

class MarketplaceController extends Controller
{
    /**
     * Tampilkan halaman marketplace untuk pembeli.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        // Ambil semua kategori untuk dropdown filter
        $categories = Kategori::all();

        // Ambil parameter dari query string
        $search     = $request->input('search');
        $kategoriId = $request->input('kategori_id');
        $sort       = $request->input('sort');

        // Query produk dengan relasi dan filter
        $products = Product::with('kategori')
            ->withCount('reviews')                    // hitung jumlah review
            ->withAvg('reviews', 'rating')            // hitung rata-rata rating
            ->withSum('orderItems', 'quantity')       // jumlah produk terjual (pastikan kolom = quantity)
            ->when($search, function ($query) use ($search) {
                $query->where('nama_produk', 'like', '%' . $search . '%');
            })
            ->when($kategoriId, function ($query) use ($kategoriId) {
                $query->where('kategori_id', $kategoriId);
            })
            ->when($sort, function ($query) use ($sort) {
                return match ($sort) {
                    'price'  => $query->orderBy('harga', 'asc'),
                    'name'   => $query->orderBy('nama_produk', 'asc'),
                    'rating' => $query->orderByDesc('reviews_avg_rating'),
                    'sold'   => $query->orderByDesc('order_items_sum_quantity'),
                    default  => $query->orderBy('created_at', 'desc'),
                };
            }, function ($query) {
                $query->orderBy('created_at', 'desc');
            })
            ->paginate(20)
            ->appends([
                'search'      => $search,
                'kategori_id' => $kategoriId,
                'sort'        => $sort,
            ]);

        // Tampilkan ke view
        return view('pembeli.marketplace.index', [
            'products'   => $products,
            'categories' => $categories,
            'kategoriId' => $kategoriId,
            'search'     => $search,
            'sort'       => $sort,
        ]);
    }
}
