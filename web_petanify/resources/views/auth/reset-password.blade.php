<x-guest-layout>
    <div class="max-w-md mx-auto mt-16 bg-white shadow-xl rounded-xl p-8 border border-gray-100">
        <div class="flex flex-col items-center mb-6">
            <img src="{{ asset('img/Petanify 2.png') }}"
                 alt="Petanify Logo"
                 class="h-16 w-16 object-contain mb-3 rounded-full shadow border border-gray-200 bg-white" />
            <h2 class="text-2xl font-bold text-green-700">Reset Password</h2>
            <p class="text-gray-500 mt-2 text-center">
                Silakan masukkan password baru Anda.
            </p>
        </div>

        @if ($errors->any())
            <div class="mb-4 font-medium text-sm text-red-600 text-center">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.store') }}" class="space-y-5">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address (readonly) -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="mb-1" />
                <x-text-input
                    id="email"
                    class="block w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-gray-200 focus:ring-0 bg-gray-100 text-gray-500 cursor-not-allowed shadow-sm"
                    type="email"
                    name="email"
                    value="{{ old('email', $request->email) }}"
                    required
                    autocomplete="username"
                    readonly
                    tabindex="-1"
                />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div x-data="{ show: false }" class="relative">
                <x-input-label for="password" :value="__('Password')" class="mb-1" />
                <input :type="show ? 'text' : 'password'"
                       id="password"
                       name="password"
                       required
                       autocomplete="new-password"
                       class="block w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-green-500 focus:ring-green-500 shadow-sm pr-12"
                />
                <button type="button" @click="show = !show"
                        class="absolute right-3 top-9 text-gray-500 hover:text-green-700 focus:outline-none"
                        tabindex="-1">
                    <i :class="show ? 'fa-solid fa-eye-slash' : 'fa-solid fa-eye'"></i>
                </button>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div x-data="{ show: false }" class="relative">
                <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" class="mb-1" />
                <input :type="show ? 'text' : 'password'"
                       id="password_confirmation"
                       name="password_confirmation"
                       required
                       autocomplete="new-password"
                       class="block w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-green-500 focus:ring-green-500 shadow-sm pr-12"
                />
                <button type="button" @click="show = !show"
                        class="absolute right-3 top-9 text-gray-500 hover:text-green-700 focus:outline-none"
                        tabindex="-1">
                    <i :class="show ? 'fa-solid fa-eye-slash' : 'fa-solid fa-eye'"></i>
                </button>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div>
                <button type="submit"
                    class="w-full py-3 px-4 bg-green-700 text-white font-semibold rounded-lg shadow hover:bg-green-800 transition duration-150">
                    Reset Password
                </button>
            </div>
        </form>
    </div>

    {{-- Tambahkan Alpine.js CDN jika belum ada --}}
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</x-guest-layout>
