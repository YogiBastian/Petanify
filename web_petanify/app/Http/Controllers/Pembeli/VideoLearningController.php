<?php

namespace App\Http\Controllers\Pembeli;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideoLearningController extends Controller
{
public function index(Request $request)
{
    $query = Video::query();

    // Filter berdasarkan kategori (petani/pembeli/semua)
    if ($request->filled('kategori')) {
        $kategori = strtolower($request->kategori);
        if (in_array($kategori, ['petani', 'pembeli'])) {
            // Jika kategori petani/pembeli: tampilkan kategori tersebut + 'semua'
            $query->where(function ($q) use ($kategori) {
                $q->where('target_audience', $kategori)
                  ->orWhere('target_audience', 'semua');
            });
        } elseif ($kategori === 'semua') {
            // Jika kategori 'semua': tampilkan hanya yang universal
            $query->where('target_audience', 'semua');
        }
        // Jika kategori diisi selain itu, bisa tambahkan else jika perlu
    }
    // else: TANPA filter target_audience, jadi semua video muncul

    // Pencarian berdasarkan judul atau deskripsi
    if ($request->has('q') && $request->q !== '') {
        $query->where(function ($q) use ($request) {
            $q->where('title', 'like', '%' . $request->q . '%')
              ->orWhere('description', 'like', '%' . $request->q . '%');
        });
    }

    // Ambil video dengan pagination
    $videos = $query->latest()->paginate(12)->withQueryString();

    return view('pembeli.videos.index', compact('videos'));
}


    public function show($id)
    {
        $video = Video::findOrFail($id);

        // Ambil video lain sebagai related videos (maksimal 4)
        $relatedVideos = Video::where('id', '!=', $video->id)
            ->whereIn('target_audience', ['pembeli', 'semua'])
            ->latest()
            ->limit(4)
            ->get();

        return view('pembeli.videos.show', compact('video', 'relatedVideos'));
    }

    public function storeComment(Request $request, $videoId)
    {
        $request->validate([
            'comment' => 'required|string|max:255',
        ]);

        $video = Video::findOrFail($videoId);

        $video->comments()->create([
            'user_id' => Auth::id(),
            'comment' => $request->comment,
        ]);

        return back()->with('success', 'Komentar berhasil ditambahkan.');
    }
}
