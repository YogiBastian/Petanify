<?php

namespace App\Http\Controllers\Petani;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KelolaProdukController extends Controller
{
    public function index()
    {
        $products = Product::where('user_id', Auth::id())->latest()->get();
        return view('petani.kelola-produk.index', compact('products'));
    }

    public function create()
    {
        $kategoris = Kategori::pluck('nama_kategori', 'id');
        return view('petani.kelola-produk.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:120',
            'harga'       => 'required|numeric|min:0',
            'stok'        => 'required|integer|min:0',
            'satuan'      => 'nullable|string|max:20',
            'deskripsi'   => 'nullable|string',
            'foto'        => 'nullable|image|max:2048',
            'kategori_id' => 'required|exists:kategoris,id',
            'diskon'      => 'nullable|numeric|min:0',
        ]);

        $data = $request->except('foto');
        $data['user_id'] = Auth::id();
        $data['status'] = 'aktif';
        $data['is_verified'] = false;

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('produk', 'public');
        }

        Product::create($data);

        return redirect()->route('petani.kelola-produk.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    // (Tambahkan edit, update, destroy jika diperlukan)
    public function edit($id)
    {
        // Hanya izinkan edit produk milik petani yang login
        $product = \App\Models\Product::where('user_id', Auth::id())->findOrFail($id);
        $kategoris = \App\Models\Kategori::pluck('nama_kategori', 'id');

        return view('petani.kelola-produk.edit', compact('product', 'kategoris'));
    }

    // Jangan lupa tambahkan method update juga untuk proses simpan edit:
    public function update(Request $request, $id)
    {
        $product = \App\Models\Product::where('user_id', Auth::id())->findOrFail($id);

        $request->validate([
            'nama_produk' => 'required|string|max:120',
            'harga'       => 'required|numeric|min:0',
            'stok'        => 'required|integer|min:0',
            'satuan'      => 'nullable|string|max:20',
            'deskripsi'   => 'nullable|string',
            'foto'        => 'nullable|image|max:2048',
            'kategori_id' => 'required|exists:kategoris,id',
            'diskon'      => 'nullable|numeric|min:0',
        ]);

        $data = $request->except('foto');
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($product->foto) \Storage::disk('public')->delete($product->foto);
            $data['foto'] = $request->file('foto')->store('produk', 'public');
        }
        $product->update($data);

        return redirect()->route('petani.kelola-produk.index')->with('success', 'Produk berhasil diupdate!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if ($product->foto) Storage::disk('public')->delete($product->foto);
        $product->delete();

        return back()->with('success','Produk berhasil dihapus.');
    }


}
