<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;

class ForumPostList extends Component
{
    public function render()
    {
        $posts = Post::with(['user', 'comments.user'])->latest()->get();
        return view('livewire.forum-post-list', compact('posts'));
    }
}
