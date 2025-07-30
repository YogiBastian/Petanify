<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information, shipping address, and (if you are a farmer) bank account.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">

        @csrf
        @method('patch')

                {{-- Foto Profil --}}
        <div>
            <x-input-label for="foto" :value="'Foto Profil'" />
            <div class="flex items-center gap-4 mb-2">
                @if ($user->foto)
                    <img src="{{ asset('storage/foto_profil/'.$user->foto) }}" class="w-16 h-16 rounded-full object-cover border" alt="Foto Profil">
                @else
                    <img src="{{ asset('img/default-user.png') }}" class="w-16 h-16 rounded-full object-cover border" alt="Foto Profil">
                @endif
                <input id="foto" name="foto" type="file" accept="image/*" class="block text-sm" />
            </div>
            <x-input-error class="mt-2" :messages="$errors->get('foto')" />
        </div>

        {{-- Nama --}}
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        {{-- Email --}}
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}
                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>
                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        {{-- ALAMAT PENGIRIMAN --}}
        <div class="border-t pt-6 mt-6">
            <h3 class="font-semibold text-gray-700 mb-2">Alamat Pengiriman</h3>

            <div class="mb-3">
                <x-input-label for="alamat" :value="'Alamat Lengkap'" />
                <x-text-input id="alamat" name="alamat" type="text" class="mt-1 block w-full" :value="old('alamat', $user->alamat)" required />
                <x-input-error class="mt-2" :messages="$errors->get('alamat')" />
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <x-input-label for="no_hp" :value="'Nomor HP'" />
                    <x-text-input id="no_hp" name="no_hp" type="text" class="mt-1 block w-full" :value="old('no_hp', $user->no_hp)" required />
                    <x-input-error class="mt-2" :messages="$errors->get('no_hp')" />
                </div>
                <div>
                    <x-input-label for="kode_pos" :value="'Kode Pos'" />
                    <x-text-input id="kode_pos" name="kode_pos" type="text" class="mt-1 block w-full" :value="old('kode_pos', $user->kode_pos)" />
                    <x-input-error class="mt-2" :messages="$errors->get('kode_pos')" />
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-3">
                <div>
                    <x-input-label for="kota" :value="'Kota/Kabupaten'" />
                    <x-text-input id="kota" name="kota" type="text" class="mt-1 block w-full" :value="old('kota', $user->kota)" required />
                    <x-input-error class="mt-2" :messages="$errors->get('kota')" />
                </div>
                <div>
                    <x-input-label for="provinsi" :value="'Provinsi'" />
                    <x-text-input id="provinsi" name="provinsi" type="text" class="mt-1 block w-full" :value="old('provinsi', $user->provinsi)" required />
                    <x-input-error class="mt-2" :messages="$errors->get('provinsi')" />
                </div>
            </div>
        </div>

        {{-- INFORMASI REKENING (Khusus Petani) --}}
        @if (Auth::user()->role == 'petani')
        <div class="border-t pt-6 mt-6">
            <h3 class="font-semibold text-gray-700 mb-2">Informasi Rekening (Wajib untuk Petani)</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <x-input-label for="nama_bank" :value="'Nama Bank'" />
                    <x-text-input id="nama_bank" name="nama_bank" type="text" class="mt-1 block w-full" :value="old('nama_bank', $user->nama_bank)" required />
                    <x-input-error class="mt-2" :messages="$errors->get('nama_bank')" />
                </div>
                <div>
                    <x-input-label for="no_rekening" :value="'Nomor Rekening'" />
                    <x-text-input id="no_rekening" name="no_rekening" type="text" class="mt-1 block w-full" :value="old('no_rekening', $user->no_rekening)" required />
                    <x-input-error class="mt-2" :messages="$errors->get('no_rekening')" />
                </div>
                <div>
                    <x-input-label for="nama_pemilik_rekening" :value="'Atas Nama Rekening'" />
                    <x-text-input id="nama_pemilik_rekening" name="nama_pemilik_rekening" type="text" class="mt-1 block w-full" :value="old('nama_pemilik_rekening', $user->nama_pemilik_rekening)" required />
                    <x-input-error class="mt-2" :messages="$errors->get('nama_pemilik_rekening')" />
                </div>
            </div>
        </div>
        @endif

        {{-- BUTTON --}}
        <div class="flex items-center gap-4 mt-8">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
