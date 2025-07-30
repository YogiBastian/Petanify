<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        $user->fill($request->only([
            'name', 'email', 'alamat', 'no_hp', 'kode_pos', 'kota', 'provinsi',
            'nama_bank', 'no_rekening', 'nama_pemilik_rekening',
        ]));

        // Jika role petani, rekening wajib diisi
        if ($user->role == 'petani') {
            $request->validate([
                'nama_bank'             => ['required', 'string', 'max:100'],
                'no_rekening'           => ['required', 'string', 'max:50'],
                'nama_pemilik_rekening' => ['required', 'string', 'max:100'],
            ]);
        }

        // Validasi & simpan foto profil jika ada
        if ($request->hasFile('foto')) {
            $request->validate([
                'foto' => 'image|mimes:jpg,jpeg,png|max:2048',
            ]);

            // Hapus foto lama jika ada
            if ($user->foto && \Storage::disk('public')->exists('foto_profil/' . $user->foto)) {
                \Storage::disk('public')->delete('foto_profil/' . $user->foto);
            }

            // Simpan foto baru ke storage/app/public/foto_profil
            $foto = $request->file('foto');
            $namaFoto = uniqid().'.'.$foto->getClientOriginalExtension();
            $foto->storeAs('foto_profil', $namaFoto, 'public'); // <-- PENTING: disk public!
            $user->foto = $namaFoto;
        }

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
