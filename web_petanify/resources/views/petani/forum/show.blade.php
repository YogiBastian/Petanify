<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail Postingan
        </h2>
    </x-slot>

    <div class="py-8 max-w-3xl mx-auto">
        <div class="bg-white p-6 rounded shadow">
            <h3 class="font-bold text-lg">{{ $post->user->name }}</h3>
            <p class="mt-2">{{ $post->content }}</p>
            @if($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="Gambar Postingan" class="mt-4 rounded">
            @endif
        </div>

        {{-- Komentar Dinamis --}}
        <div class="mt-6">
          @livewire('comment-section', ['postid' => $post->id])
        </div>
    </div>

</x-app-layout>
