<?php

namespace App\Http\Controllers\Pembeli;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artikel;

class ArtikelController extends Controller
{
    /**
     * Tampilkan daftar artikel untuk pembeli.
     */
    public function index(Request $request)
    {
        // Pencarian jika ada
        $query = Artikel::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('judul', 'like', '%' . $search . '%')
                  ->orWhere('kategori', 'like', '%' . $search . '%')
                  ->orWhere('isi', 'like', '%' . $search . '%');
            });
        }

        $artikels = $query->latest()->paginate(8);

        // Slideshow artikel (4 terbaru)
        $slideshowArtikels = Artikel::latest()->take(4)->get();

        // Rekomendasi (5 artikel acak/terbaru)
        $rekomendasiArtikels = Artikel::inRandomOrder()->take(5)->get();

        // Ubah di sini agar sesuai folder view: pembeli/artikel/index.blade.php
        return view('pembeli.artikel.index', compact('artikels', 'slideshowArtikels', 'rekomendasiArtikels'));
    }

    /**
     * Tampilkan detail artikel.
     */
    public function show($id)
    {
        $artikel = Artikel::findOrFail($id);

        // Artikel terkait, selain yang sedang dibaca
        $relatedArtikels = Artikel::where('id', '!=', $id)
            ->latest()
            ->take(4)
            ->get();

        // Ubah di sini agar sesuai folder view: pembeli/artikel/show.blade.php
        return view('pembeli.artikel.show', compact('artikel', 'relatedArtikels'));
    }
}
