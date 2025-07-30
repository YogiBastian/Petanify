<x-app-layout>
    <<x-slot name="header">
    <div style="display:flex;justify-content:center;align-items:center;">
        <h2 style="
            font-family: 'Bricolage Grotesque', 'Delius', sans-serif;
            font-size: 2.2rem;
            font-weight: 800;
            color: #34963A;
            letter-spacing: 2px;
            margin: 0;
            text-shadow: 0 3px 10px #d3f7da66, 0 1px 0 #fff;
        ">
            <i class="fa-solid fa-comments" style="margin-right:12px;color:#FFB800"></i>
            Forum Pembeli
        </h2>
    </div>
</x-slot>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/forum-community.css') }}" />
        <style>
            .preview-img {
                max-height: 200px;
                margin-top: 10px;
                display: none;
            }
            .alert {
                margin: 10px 0;
                padding: 10px;
                border-radius: 5px;
            }
            .alert-success {
                background-color: #d4edda;
                color: #155724;
            }
            .alert-danger {
                background-color: #f8d7da;
                color: #721c24;
            }
        </style>
    @endpush

    <div class="py-6 forum-wrapper">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 forum-main">

            {{-- Flash messages --}}
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul style="margin:0;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Posting Form -->
            <form method="POST" action="{{ route('admin.post.store') }}" enctype="multipart/form-data" class="forum-post-form">
                @csrf
                <div class="forum-post-input" style="position:relative;">
                    <textarea name="content" rows="2" placeholder="Bagikan sesuatu..." required>{{ old('content') }}</textarea>
                    <input type="file" name="image" accept="image/*" onchange="previewImage(event)">
                    <img id="img-preview" class="preview-img" />
                    <!-- Tombol Emoji disini, posisinya bareng input -->
                    <button type="button" id="emoji-btn" title="Tambah Emoji"><i class="fa-regular fa-face-smile"></i></button>
                </div>
                <div class="forum-post-action">
                    <button class="forum-btn" type="submit">Posting</button>
                </div>
            </form>

            <!-- List of Posts -->
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

                        <form method="POST" action="{{ route('admin.comment.store', $post->id) }}" class="forum-comment-form">
                            @csrf
                            <input type="text" name="comment" placeholder="Tulis komentar..." required />
                            <button type="submit" class="forum-btn forum-btn-sm"><i class="fa fa-paper-plane"></i></button>
                        </form>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

@push('scripts')
<script type="module">
import 'https://cdn.jsdelivr.net/npm/emoji-picker-element@^1/index.min.js';
window.emojiPickerReady = true;
</script>

<script>
const emojiBtn = document.getElementById('emoji-btn');
const textarea = document.querySelector('textarea[name="content"]');
let picker = null;

emojiBtn.addEventListener('click', function(e){
    e.preventDefault();
    if (!picker) {
        picker = document.createElement('emoji-picker');
        picker.style.position = 'absolute';
        picker.style.top = '60px';
        picker.style.left = '50px';
        picker.addEventListener('emoji-click', event => {
            textarea.value += event.detail.unicode;
            picker.remove();
            picker = null;
        });
        emojiBtn.parentNode.appendChild(picker);
    } else {
        picker.remove();
        picker = null;
    }
});

function previewImage(event) {
    const input = event.target;
    const preview = document.getElementById('img-preview');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endpush

</x-app-layout>