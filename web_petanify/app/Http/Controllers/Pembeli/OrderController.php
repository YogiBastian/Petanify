<?php

namespace App\Http\Controllers\Pembeli;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status'); // Ambil status dari URL

        $orders = Order::with('orderItems')
            ->where('user_id', Auth::id())
            ->when($status && $status != 'all', function($query) use ($status) {
                $query->where('status', $status);
            })
            ->latest()
            ->paginate(10);

        // GANTI nama view ke pembeli
        return view('pembeli.orders.index', compact('orders', 'status'));
    }

    public function show($id)
    {
        $order = Order::where('user_id', Auth::id())->findOrFail($id);
        // GANTI nama view ke pembeli
        return view('pembeli.orders.show', compact('order'));
    }

    public function bayarForm($orderId)
    {
        $order = Order::with('orderItems.product')->where('id', $orderId)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        // List bank Petanify (bisa juga config/global)
        $banks = [
            'bca' => ['name' => 'BCA', 'no_rek' => '1234567890', 'an' => 'PT Petanify BCA'],
            'mandiri' => ['name' => 'Mandiri', 'no_rek' => '9876543210', 'an' => 'PT Petanify Mandiri'],
            'bri' => ['name' => 'BRI', 'no_rek' => '888877776666', 'an' => 'PT Petanify BRI'],
            'bni' => ['name' => 'BNI', 'no_rek' => '1122334455', 'an' => 'PT Petanify BNI'],
        ];

        // GANTI nama view ke pembeli
        return view('pembeli.orders.bayar', compact('order', 'banks'));
    }

    public function uploadBukti(Request $request, $orderId)
    {
        $request->validate([
            'bukti_transfer' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'catatan'        => 'nullable|string|max:200',
        ]);
        $order = Order::where('id', $orderId)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        // Simpan file
        if ($request->hasFile('bukti_transfer')) {
            $path = $request->file('bukti_transfer')->store('bukti_transfer', 'public');
            $order->bukti_transfer = $path;
            $order->status = 'paid'; // atau tetap pending, sesuai alur verifikasi admin
            $order->catatan = $request->catatan;
            $order->save();
        }

        // GANTI nama route ke pembeli
        return redirect()->route('pembeli.orders.index')->with('success', 'Bukti transfer berhasil diupload. Tunggu verifikasi admin.');
    }
}
