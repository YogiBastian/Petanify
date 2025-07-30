<?php

namespace App\Http\Controllers\Petani;

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
            // Tampilkan kategori itu + universal
            $query->where(function ($q) use ($kategori) {
                $q->where('target_audience', $kategori)
                  ->orWhere('target_audience', 'semua');
            });
        } elseif ($kategori === 'semua') {
            // Hanya universal
            $query->where('target_audience', 'semua');
        }
        // Kategori lain abaikan, atau tambahkan else jika perlu
    }
    // else: tanpa filter => tampilkan semua video

    // Pencarian berdasarkan judul atau deskripsi
    if ($request->has('q') && $request->q !== '') {
        $query->where(function ($q) use ($request) {
            $q->where('title', 'like', '%' . $request->q . '%')
              ->orWhere('description', 'like', '%' . $request->q . '%');
        });
    }

    $videos = $query->latest()->paginate(12)->withQueryString();

    return view('petani.videos.index', compact('videos'));
}


    public function show($id)
    {
        $video = Video::findOrFail($id);

        // Ambil video lain sebagai related videos (maksimal 4)
        $relatedVideos = Video::where('id', '!=', $video->id)
            ->whereIn('target_audience', ['petani', 'semua'])
            ->latest()
            ->limit(4)
            ->get();

        return view('petani.videos.show', compact('video', 'relatedVideos'));
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
