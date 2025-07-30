<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user', 'comments.user'])->latest()->get();
        return view('admin.forum.index', compact('posts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $post = new Post();
        $post->user_id = Auth::id();
        $post->content = $request->input('content');

        if ($request->hasFile('image')) {
            $post->image = $request->file('image')->store('post-images', 'public');
        }

        $post->save();

        return redirect()->back()->with('success', 'Postingan berhasil ditambahkan oleh admin.');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->back()->with('success', 'Postingan berhasil dihapus.');
    }

    public function dashboard()
        {
            $totalPembeli = User::where('role', 'pembeli')->count();
            $totalPetani = User::where('role', 'petani')->count();
            $totalPosts = Post::count();
            $totalComments = Comment::count();

            return view('admin.dashboard', compact(
                'totalPembeli',
                'totalPetani',
                'totalPosts',
                'totalComments'
            ));
        }

        public function manageComments()
        {
            $comments = Comment::with('user', 'post')->latest()->get();

            return view('admin.forum.comments', compact('comments'));
        }

        public function deleteComment($id)
        {
            $comment = Comment::findOrFail($id);
            $comment->delete();

            return redirect()->back()->with('success', 'Komentar berhasil dihapus.');
        }


        public function managePosts()
        {
            $posts = Post::with('user', 'comments')->latest()->get();
            return view('admin.forum.posts', compact('posts'));
        }


}
