<div wire:poll.5s>
    @foreach($posts as $post)
        <div class="forum-post-card">
            <div class="forum-post-header">
                <img src="https://ui-avatars.com/api/?name={{ urlencode($post->user->name) }}" class="forum-avatar" />
                <div>
                    <b>{{ $post->user->name }}</b>
                    <div class="forum-time">{{ $post->created_at->diffForHumans() }}</div>
                </div>
            </div>

            <div class="forum-post-body">
                {!! nl2br(e($post->content)) !!}
                @if($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="forum-img" />
                @endif
            </div>

            <div class="forum-comments">
                @foreach($post->comments as $comment)
                    <div class="forum-comment">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($comment->user->name) }}" class="forum-avatar-small" />
                        <div class="forum-comment-content">
                            <b>{{ $comment->user->name }}</b>
                            <span class="forum-time">{{ $comment->created_at->diffForHumans() }}</span>
                            <div>{!! nl2br(e($comment->comment)) !!}</div>
                        </div>
                    </div>
                @endforeach

                <form method="POST" action="{{ route('petani.comment.store', $post->id) }}" class="forum-comment-form">
                    @csrf
                    <input type="text" name="comment" placeholder="Tulis komentar..." required />
                    <button type="submit" class="forum-btn forum-btn-sm"><i class="fa fa-paper-plane"></i></button>
                </form>
            </div>

            <div class="forum-post-action mt-3">
                <a href="{{ route('petani.forum.show', $post->id) }}" class="forum-btn">Lihat Detail</a>
            </div>
        </div>
    @endforeach
</div>
