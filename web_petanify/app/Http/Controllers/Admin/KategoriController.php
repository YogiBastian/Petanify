<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::latest()->paginate(12);
        return view('admin.kategori.index', compact('kategoris'));
    }

    public function create()
    {
        return view('admin.kategori.create');
    }

    public function store(Request $r)
    {
        $r->validate([
            'nama_kategori' => 'required|string|max:100',
            'foto' => 'nullable|image|max:2048',
        ]);
        $data = $r->only('nama_kategori');
        if ($r->hasFile('foto')) {
            $data['foto'] = $r->file('foto')->store('kategori', 'public');
        }
        Kategori::create($data);
        return redirect()->route('admin.kategori.index')->with('success','Kategori berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('admin.kategori.edit', compact('kategori'));
    }

    public function update(Request $r, $id)
    {
        $kategori = Kategori::findOrFail($id);
        $r->validate([
            'nama_kategori' => 'required|string|max:100',
            'foto' => 'nullable|image|max:2048',
        ]);
        $data = $r->only('nama_kategori');
        if ($r->hasFile('foto')) {
            if ($kategori->foto) Storage::disk('public')->delete($kategori->foto);
            $data['foto'] = $r->file('foto')->store('kategori', 'public');
        }
        $kategori->update($data);
        return redirect()->route('admin.kategori.index')->with('success','Kategori berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        if ($kategori->foto) Storage::disk('public')->delete($kategori->foto);
        $kategori->delete();
        return back()->with('success','Kategori berhasil dihapus.');
    }
}
