<?php

namespace App\Http\Controllers\Petani;

use App\Http\Controllers\Controller;
use App\Models\TransferPetani;
use Illuminate\Support\Facades\Auth;

class TransferPetaniController extends Controller
{
    public function index()
    {
        // Ambil semua transfer ke petani yang sedang login
        $transfers = TransferPetani::where('petani_id', Auth::id())->latest()->paginate(20);

        return view('petani.transfer.index', compact('transfers'));
    }
}
