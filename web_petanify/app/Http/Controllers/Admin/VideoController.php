<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::latest()->get();
        return view('admin.videos.index', compact('videos'));
    }

    public function create()
    {
        return view('admin.videos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'           => 'required|max:255',
            'description'     => 'required',
            'youtube_url'     => 'required|url',
            'target_audience' => 'required|in:petani,pembeli,semua',
        ]);

        Video::create($request->only('title', 'description', 'youtube_url', 'target_audience'));

        return redirect()->route('admin.videos.index')->with('success', 'Video berhasil ditambahkan.');
    }

    // Jika ingin fitur edit dan hapus bisa tambahkan method edit, update, destroy di sini.
        public function edit($id)
    {
        $video = Video::findOrFail($id);
        return view('admin.videos.edit', compact('video'));
    }

    public function update(Request $request, $id)
    {
        $video = Video::findOrFail($id);
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'youtube_url' => 'required|url',
            'target_audience' => 'required|in:petani,pembeli,semua',
        ]);
        $video->update($request->only('title', 'description', 'youtube_url', 'target_audience'));
        return redirect()->route('admin.videos.index')->with('success', 'Video berhasil diupdate.');
    }

    public function destroy($id)
    {
        $video = Video::findOrFail($id);
        $video->delete();
        return redirect()->route('admin.videos.index')->with('success', 'Video berhasil dihapus.');
    }

}
