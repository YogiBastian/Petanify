<x-app-layout>
<div class="max-w-lg mx-auto py-8">
    <h1 class="text-2xl font-semibold mb-6">Review Produk: {{ $product->nama_produk }}</h1>
    <form action="{{ route('petani.review.store', $product->id) }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="rating" class="block font-semibold mb-1">Rating (1-5):</label>
            <select name="rating" id="rating" required class="border rounded w-full py-2 px-3">
                @for ($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}" {{ old('rating') == $i ? 'selected' : '' }}>
                        {{ $i }} {{ $i == 1 ? 'bintang' : 'bintang' }}
                    </option>
                @endfor
            </select>
            @error('rating')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="content" class="block font-semibold mb-1">Komentar:</label>
            <textarea name="content" id="content" rows="4" required class="border rounded w-full py-2 px-3">{{ old('content') }}</textarea>
            @error('content')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            Kirim Review
        </button>
    </form>
</div>
</x-app-layout>
