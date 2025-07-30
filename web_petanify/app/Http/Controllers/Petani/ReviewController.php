<?php

namespace App\Http\Controllers\Petani;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Tampilkan form untuk membuat review baru produk.
     *
     * @param int $productId
     * @return \Illuminate\View\View
     */
    public function create($productId)
    {
        $product = Product::findOrFail($productId);
        return view('petani.orders.review_create', compact('product'));

    }

    /**
     * Simpan atau update review produk dari user yang login.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $productId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, $productId)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
            'rating'  => 'required|integer|min:1|max:5',
        ]);

        Review::updateOrCreate(
            [
                'product_id' => $productId,
                'user_id'    => Auth::id(),
            ],
            [
                'content' => $request->content,
                'rating'  => $request->rating,
            ]
        );

        return redirect()->route('petani.orders.index')->with('success', 'Review berhasil disimpan.');
    }
}
