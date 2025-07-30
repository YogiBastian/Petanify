<?php

namespace App\Http\Controllers\Pembeli;

use App\Http\Controllers\Controller;
use App\Models\Post; // Pastikan ini adalah model yang benar untuk postingan forum Anda
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index()
    {
        // Memuat postingan forum beserta user dan komentar (beserta user komentator)
        $posts = Post::with(['user', 'comments.user'])->latest()->get();

        return view('pembeli.forum.index', compact('posts'));
    }

    /**
     * Menampilkan detail dari satu postingan forum.
     *
     * @param  \App\Models\Post  $post // Laravel akan otomatis menemukan Post berdasarkan ID di URL
     * @return \Illuminate\View\View
     */
    public function show(Post $post) // Metode 'show' yang akan dipanggil saat link diklik
    {
        // Penting: Muat relasi 'user' dan 'comments.user' agar data tersedia di view detail
        $post->load('user', 'comments.user');

        // Mengembalikan view 'pembeli.forum.show' dan meneruskan objek $post
        return view('pembeli.forum.show', compact('post'));
    }
}