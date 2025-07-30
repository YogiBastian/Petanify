@component('mail::message')
<div style="text-align:center;">
    <img src="{{ asset('img/Petanify 2.png') }}" alt="Petanify Logo" style="width:120px; margin-bottom: 24px; border-radius:12px;">
</div>

# Reset Password Akun Anda

Halo, {{ $user->name ?? 'Pengguna' }}!

Kami menerima permintaan untuk reset password akun Petanify Anda.<br>
Klik tombol di bawah untuk melanjutkan proses reset password:

@component('mail::button', ['url' => $url, 'color' => 'success'])
Atur Ulang Password
@endcomponent

Tautan ini berlaku selama 60 menit.<br>
Jika Anda tidak meminta reset password, abaikan saja email ini.

Terima kasih,<br>
**Tim Petanify**
@endcomponent
