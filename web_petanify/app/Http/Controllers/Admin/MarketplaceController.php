<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MarketplaceController extends Controller
{
    // INDEX
    public function index()
    {
        $products = Product::with(['user','kategori'])->latest()->paginate(10);
        return view('admin.marketplace.index', compact('products'));
    }

    // FORM TAMBAH
    public function create()
    {
        $petani    = User::where('role', 'petani')->pluck('name','id');
        $kategoris = Kategori::pluck('nama_kategori','id');
        return view('admin.marketplace.create', compact('petani','kategoris'));
    }

    // SIMPAN BARU
    public function store(Request $r)
    {
        $r->validate([
            'nama_produk' => 'required|string|max:120',
            'harga'       => 'required|numeric|min:0',
            'stok'        => 'required|integer|min:0',
            'satuan'      => 'nullable|string|max:20',
            'deskripsi'   => 'nullable|string',
            'foto'        => 'nullable|image|max:2048',
            'user_id'     => 'nullable|exists:users,id',
            'kategori_id' => 'nullable|exists:kategoris,id',
            'status'      => 'required|in:aktif,tidak_aktif',
            'is_verified' => 'nullable|boolean',
            'diskon'      => 'nullable|numeric|min:0',
        ]);

        $data = $r->except('foto');

        // Handle hot deal
        $data['is_hot_deal'] = $r->has('is_hot_deal') ? 1 : 0;
        $data['hot_deal_expired_at'] = $r->hot_deal_expired_at ?? null;

        if ($r->hasFile('foto')) {
            $data['foto'] = $r->file('foto')->store('produk', 'public');
        }
        if (!$r->has('status')) $data['status'] = 'aktif';
        if (!$r->has('is_verified')) $data['is_verified'] = false;

        Product::create($data);

        return redirect()->route('admin.produk.index')
                         ->with('success','Produk berhasil ditambahkan.');
    }

    // FORM EDIT
    public function edit($id)
    {
        $product   = Product::findOrFail($id);
        $petani    = User::where('role','petani')->pluck('name','id');
        $kategoris = Kategori::pluck('nama_kategori','id');
        return view('admin.marketplace.edit', compact('product','petani','kategoris'));
    }

    // UPDATE
    public function update(Request $r, $id)
    {
        $product = Product::findOrFail($id);

        $r->validate([
            'nama_produk' => 'required|string|max:120',
            'harga'       => 'required|numeric|min:0',
            'stok'        => 'required|integer|min:0',
            'satuan'      => 'nullable|string|max:20',
            'deskripsi'   => 'nullable|string',
            'foto'        => 'nullable|image|max:2048',
            'user_id'     => 'nullable|exists:users,id',
            'kategori_id' => 'nullable|exists:kategoris,id',
            'status'      => 'required|in:aktif,tidak_aktif',
            'is_verified' => 'nullable|boolean',
            'diskon'      => 'nullable|numeric|min:0',
        ]);

        $data = $r->except('foto');

        // Handle hot deal
        $data['is_hot_deal'] = $r->has('is_hot_deal') ? 1 : 0;
        $data['hot_deal_expired_at'] = $r->hot_deal_expired_at ?? null;

        if ($r->hasFile('foto')) {
            if ($product->foto) Storage::disk('public')->delete($product->foto);
            $data['foto'] = $r->file('foto')->store('produk', 'public');
        }
        if (!$r->has('status')) $data['status'] = 'aktif';
        if (!$r->has('is_verified')) $data['is_verified'] = false;

        $product->update($data);

        return redirect()->route('admin.produk.index')
                         ->with('success','Produk berhasil diperbarui.');
    }

    // HAPUS
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if ($product->foto) Storage::disk('public')->delete($product->foto);
        $product->delete();

        return back()->with('success','Produk berhasil dihapus.');
    }

    // Aktifkan Hot Deal
    public function enableHotDeal($id)
    {
        $product = Product::findOrFail($id);
        $product->is_hot_deal = true;
        $product->hot_deal_expired_at = now()->addDays(2); // 2 hari hot deal
        $product->save();

        return back()->with('success', 'Produk berhasil dijadikan Hot Deal.');
    }

    // Nonaktifkan Hot Deal
    public function disableHotDeal($id)
    {
        $product = Product::findOrFail($id);
        $product->is_hot_deal = false;
        $product->hot_deal_expired_at = null;
        $product->save();

        return back()->with('success', 'Hot Deal berhasil dimatikan.');
    }

}
