<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;

class AdminOrderController extends Controller
{
public function index()
{
    // Ambil semua pesanan dengan relasi user dan orderItems.product.user (petani)
    $orders = Order::with(['user', 'orderItems.product.user'])->latest()->paginate(20);

    // Rekap seluruh penjualan per petani
    $rekapPetani = [];
    foreach ($orders as $order) {
        foreach ($order->orderItems as $item) {
            $petani = $item->product->user ?? null;
            $subtotal = ($item->harga ?? $item->harga_satuan ?? 0) * ($item->qty ?? $item->quantity ?? 0);

            if ($petani) {
                if (!isset($rekapPetani[$petani->id])) {
                    $rekapPetani[$petani->id] = [
                        'nama' => $petani->name ?? $petani->nama ?? '-',
                        'total' => 0
                    ];
                }
                $rekapPetani[$petani->id]['total'] += $subtotal;
            }
        }
    }

    return view('admin.orders.index', compact('orders', 'rekapPetani'));
}


    public function show($id)
    {
    $order = Order::with(['user', 'orderItems.product.user'])->findOrFail($id);
    
    $rekapPetani = [];
    foreach ($order->orderItems as $item) {
        $petani = $item->product->user ?? null;
        $subtotal = ($item->harga ?? $item->harga_satuan ?? 0) * ($item->qty ?? $item->quantity ?? 0);
    
        if ($petani) {
            if (!isset($rekapPetani[$petani->id])) {
                $rekapPetani[$petani->id] = [
                    'nama' => $petani->name ?? $petani->nama ?? '-',
                    'total' => 0
                ];
            }
            $rekapPetani[$petani->id]['total'] += $subtotal;
        }
    }
    
        return view('admin.orders.show', compact('order', 'rekapPetani'));
    }

    public function verify($id)
    {
        $order = Order::findOrFail($id);
    
        if ($order->status === 'paid') {
            $order->status = 'verified';
            $order->save();
            return redirect()->route('admin.orders.show', $id)->with('success', 'Pesanan telah diverifikasi.');
        }
        return redirect()->back()->with('error', 'Status pesanan tidak valid untuk diverifikasi.');
    }


    public function cancel($id)
    {
        $order = Order::findOrFail($id);

        if ($order->status !== 'verified') {
            $order->status = 'cancelled';
            $order->save();
            return redirect()->route('admin.orders.show', $id)->with('success', 'Pesanan telah dibatalkan.');
        }
        return redirect()->back()->with('error', 'Pesanan yang sudah diverifikasi tidak dapat dibatalkan.');
    }
    

}
