<div>
    <form wire:submit.prevent="submit" class="mb-4">
        <textarea wire:model.defer="commentText" placeholder="Tulis komentar..." class="w-full border rounded p-2"></textarea>
        <button type="submit" class="bg-green-600 text-white px-4 py-2 mt-2 rounded">Kirim</button>
    </form>

    <div>
        @foreach($comments as $comment)
            <div class="border-t py-2">
                <strong>{{ $comment->user->name }}</strong>:
                <span>{{ $comment->content }}</span>
            </div>
        @endforeach
    </div>
</div>
