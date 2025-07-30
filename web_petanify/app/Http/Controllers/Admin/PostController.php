<?php

namespace App\Http\Controllers\Admin; // atau sesuaikan dengan namespace Anda

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    // Halaman forum (jika perlu)
    public function index()
    {
        return redirect()->route('admin.forum.index'); // sesuaikan nama route
    }

    // Simpan postingan baru dengan gambar opsional
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('forum_images', 'public');
        }

        Post::create([
            'user_id' => Auth::id(),
            'content' => $request->content,
            'image'   => $imagePath,   // <-- Pastikan baris ini ADA!
        ]);

        return redirect()->route('admin.forum.index')->with('success', 'Postingan berhasil ditambahkan!');
    }

    // Simpan komentar baru ke post tertentu
    public function storeComment(Request $request, $postId)
    {
        $request->validate([
            'comment' => 'required|string|max:500',
        ]);

        Comment::create([
            'user_id' => Auth::id(),
            'post_id' => $postId,
            'comment' => $request->comment,
        ]);

        return redirect()->route('admin.forum.index')->with('success', 'Komentar berhasil ditambahkan!');
    }
}