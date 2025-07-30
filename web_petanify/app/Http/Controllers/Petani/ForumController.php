<?php

namespace App\Http\Controllers\Petani;

use App\Http\Controllers\Controller;
use App\Models\Post;

class ForumController extends Controller
{
    public function index()
    {
    $posts = Post::with(['user', 'comments.user'])->latest()->get();

    return view('petani.forum.index', compact('posts'));
    }

    public function show($id)
    {
        $post = \App\Models\Post::with(['user', 'comments.user'])->findOrFail($id);
        return view('petani.forum.show', compact('post'));
    }


}
