<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TransferPetani;
use App\Models\User;
use Illuminate\Http\Request;

class TransferPetaniController extends Controller
{
    public function index()
    {
        $transfers = TransferPetani::with('petani')->latest()->paginate(20);
        return view('admin.transfer_petani.index', compact('transfers'));
    }

    public function create()
    {
        $petaniList = User::where('role', 'petani')->get();
        return view('admin.transfer_petani.create', compact('petaniList'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'petani_id'      => 'required|exists:users,id',
            'nominal'        => 'required|numeric|min:1000',
            'catatan'        => 'nullable|string',
            'foto_transfer'  => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        // Jika file diupload, simpan file dan path-nya
        if ($request->hasFile('foto_transfer')) {
            $validated['foto_transfer'] = $request->file('foto_transfer')->store('foto_transfer', 'public');
        } else {
            // Optional: Set foto_transfer ke null jika tidak upload file
            $validated['foto_transfer'] = null;
        }

        TransferPetani::create($validated);

        return redirect()->route('admin.transfer_petani.index')->with('success', 'Transfer berhasil dicatat.');
    }
    
    public function edit($id)
{
    $transfer = TransferPetani::findOrFail($id);
    $petaniList = User::where('role', 'petani')->get();
    return view('admin.transfer_petani.edit', compact('transfer', 'petaniList'));
}

public function update(Request $request, $id)
{
    $transfer = TransferPetani::findOrFail($id);

    $validated = $request->validate([
        'petani_id'      => 'required|exists:users,id',
        'nominal'        => 'required|numeric|min:1000',
        'catatan'        => 'nullable|string',
        'foto_transfer'  => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
    ]);

    // Jika ada upload baru, hapus file lama dan simpan yang baru
    if ($request->hasFile('foto_transfer')) {
        // Hapus file lama jika ada
        if ($transfer->foto_transfer && \Storage::disk('public')->exists($transfer->foto_transfer)) {
            \Storage::disk('public')->delete($transfer->foto_transfer);
        }
        $validated['foto_transfer'] = $request->file('foto_transfer')->store('foto_transfer', 'public');
    } else {
        // Jangan timpa jika tidak upload baru
        unset($validated['foto_transfer']);
    }

    $transfer->update($validated);

    return redirect()->route('admin.transfer_petani.index')->with('success', 'Data transfer berhasil diperbarui.');
}

    
}
