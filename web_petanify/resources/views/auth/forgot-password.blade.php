<x-guest-layout>
     <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="w-full max-w-md bg-white rounded-xl shadow-lg p-8 border border-gray-100">
            <div class="flex flex-col items-center mb-6">
                {{-- Logo Petanify --}}
                <img src="{{ asset('img/Petanify 2.png') }}"
                     alt="Petanify Logo"
                     class="h-16 w-16 object-contain mb-3 rounded-full shadow border border-gray-200 bg-white" />
                <h2 class="text-2xl font-bold text-green-700">Lupa Password?</h2>
                <p class="text-gray-500 mt-2 text-center">
                    Masukkan email akun Petanify Anda dan kami akan mengirimkan link untuk reset password.
                </p>
            </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600 text-center">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-4 font-medium text-sm text-red-600 text-center">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
            @csrf
            <div>
                <x-input-label for="email" :value="__('Email')" class="mb-1" />
                <x-text-input id="email" class="block w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-green-500 focus:ring-green-500 shadow-sm"
                    type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <div>
                <button type="submit"
                    class="w-full py-3 px-4 bg-green-700 text-white font-semibold rounded-lg shadow hover:bg-green-800 transition duration-150">
                    Kirim Link Reset Password
                </button>
            </div>
        </form>

        <div class="mt-6 text-center">
            <a href="{{ route('login') }}" class="text-green-700 hover:underline text-sm">Kembali ke Login</a>
        </div>
    </div>
</x-guest-layout>
