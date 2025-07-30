@extends('layouts.app')

@section('title', 'Syarat dan Ketentuan')

@section('content')
<div class="min-h-screen py-6 bg-gray-100 flex flex-col justify-center">
    <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
        <div class="flex items-center gap-3 mb-6">
            <i class="fas fa-file-contract text-green-600 text-3xl"></i>
            <div>
                <h2 class="text-3xl font-extrabold mb-1 text-green-700">Syarat dan Ketentuan</h2>
                <p class="text-gray-500 text-sm">Tanggal Berlaku: <span class="font-semibold">{{ date('d F Y') }}</span></p>
            </div>
        </div>

        <p class="text-gray-700 mb-6 leading-relaxed">
            Selamat datang di platform kami. Dengan mengakses atau menggunakan website ini, Anda dianggap telah menyetujui Syarat dan Ketentuan berikut (“Syarat”). Mohon baca dengan saksama sebelum menggunakan layanan kami. <span class="text-green-700 font-semibold">Jika Anda tidak setuju, mohon untuk tidak menggunakan website ini.</span>
        </p>

        <hr class="my-4">

        <div class="space-y-8">
            <div>
                <div class="flex items-center gap-2 mb-2">
                    <i class="fas fa-check-circle text-green-600"></i>
                    <h3 class="text-xl font-bold text-green-700 mb-0">1. Persetujuan Syarat</h3>
                </div>
                <p class="text-gray-700">Dengan mendaftar, mengakses, atau menggunakan website kami, Anda dianggap telah menyetujui Syarat ini beserta setiap perubahan di kemudian hari. Penggunaan berkelanjutan setelah perubahan berarti Anda menyetujui Syarat yang baru.</p>
            </div>

            <div>
                <div class="flex items-center gap-2 mb-2">
                    <i class="fas fa-user-shield text-green-600"></i>
                    <h3 class="text-xl font-bold text-green-700 mb-0">2. Kelayakan &amp; Akun Pengguna</h3>
                </div>
                <ul class="list-disc pl-6 text-gray-700 space-y-1">
                    <li>Pengguna minimal berusia 18 tahun atau telah mendapat izin dari orang tua/wali.</li>
                    <li>Harus memberikan data pendaftaran yang akurat, terkini, dan lengkap.</li>
                    <li>Bertanggung jawab menjaga kerahasiaan akun dan kata sandi.</li>
                    <li>Segera perbarui data jika terdapat perubahan.</li>
                </ul>
            </div>

            <div>
                <div class="flex items-center gap-2 mb-2">
                    <i class="fas fa-user-cog text-green-600"></i>
                    <h3 class="text-xl font-bold text-green-700 mb-0">3. Tanggung Jawab Pengguna</h3>
                </div>
                <ul class="list-disc pl-6 text-gray-700 space-y-1">
                    <li>Tidak menggunakan platform untuk tujuan ilegal, penipuan, atau penyalahgunaan.</li>
                    <li>Dilarang mencoba mengakses sistem atau jaringan kami secara tidak sah.</li>
                    <li>Dilarang mengunggah atau menyebarkan konten yang melanggar hak orang lain atau hukum.</li>
                    <li>Pelanggaran dapat berakibat penangguhan atau penghapusan akun.</li>
                </ul>
            </div>

            <div>
                <div class="flex items-center gap-2 mb-2">
                    <i class="fas fa-copyright text-green-600"></i>
                    <h3 class="text-xl font-bold text-green-700 mb-0">4. Konten &amp; Hak Kekayaan Intelektual</h3>
                </div>
                <ul class="list-disc pl-6 text-gray-700 space-y-1">
                    <li>Seluruh konten, merek dagang, dan logo merupakan milik perusahaan atau mitra kami dan dilindungi undang-undang.</li>
                    <li>Dilarang menyalin, memodifikasi, atau mendistribusikan tanpa izin tertulis.</li>
                    <li>Konten yang dikirim pengguna dapat digunakan oleh kami sehubungan dengan layanan.</li>
                </ul>
            </div>

            <div>
                <div class="flex items-center gap-2 mb-2">
                    <i class="fas fa-money-bill-wave text-green-600"></i>
                    <h3 class="text-xl font-bold text-green-700 mb-0">5. Transaksi &amp; Pembayaran</h3>
                </div>
                <ul class="list-disc pl-6 text-gray-700 space-y-1">
                    <li>Setiap transaksi tunduk pada proses verifikasi dan persetujuan.</li>
                    <li>Harga dan ketersediaan produk dapat berubah sewaktu-waktu tanpa pemberitahuan.</li>
                    <li>Silakan pelajari ketentuan biaya dan pembayaran sebelum melakukan transaksi.</li>
                </ul>
            </div>

            <div>
                <div class="flex items-center gap-2 mb-2">
                    <i class="fas fa-shield-alt text-green-600"></i>
                    <h3 class="text-xl font-bold text-green-700 mb-0">6. Penafian Jaminan</h3>
                </div>
                <p class="text-gray-700">Layanan kami disediakan “sebagaimana adanya” dan “sebagaimana tersedia”, tanpa jaminan apa pun, baik tersurat maupun tersirat.</p>
            </div>

            <div>
                <div class="flex items-center gap-2 mb-2">
                    <i class="fas fa-exclamation-triangle text-green-600"></i>
                    <h3 class="text-xl font-bold text-green-700 mb-0">7. Batasan Tanggung Jawab</h3>
                </div>
                <p class="text-gray-700">Kami tidak bertanggung jawab atas kerugian langsung maupun tidak langsung akibat penggunaan layanan kami, sejauh diperbolehkan oleh hukum.</p>
            </div>

            <div>
                <div class="flex items-center gap-2 mb-2">
                    <i class="fas fa-ban text-green-600"></i>
                    <h3 class="text-xl font-bold text-green-700 mb-0">8. Penghentian Akses</h3>
                </div>
                <p class="text-gray-700">Kami berhak menangguhkan atau mengakhiri akses Anda sewaktu-waktu apabila melanggar Syarat ini atau alasan lain sesuai kebijakan kami.</p>
            </div>

            <div>
                <div class="flex items-center gap-2 mb-2">
                    <i class="fas fa-sync-alt text-green-600"></i>
                    <h3 class="text-xl font-bold text-green-700 mb-0">9. Perubahan Syarat</h3>
                </div>
                <p class="text-gray-700">Syarat dapat diperbarui sewaktu-waktu. Penggunaan layanan secara berkelanjutan dianggap menerima perubahan Syarat.</p>
            </div>

            <div>
                <div class="flex items-center gap-2 mb-2">
                    <i class="fas fa-balance-scale text-green-600"></i>
                    <h3 class="text-xl font-bold text-green-700 mb-0">10. Hukum yang Berlaku</h3>
                </div>
                <p class="text-gray-700">Syarat ini diatur dan ditafsirkan sesuai dengan hukum Republik Indonesia. Sengketa akan diselesaikan di pengadilan yang berlaku di Indonesia.</p>
            </div>
        </div>

        <hr class="my-6">

        <div class="flex items-center gap-2">
            <i class="fas fa-envelope text-green-600"></i>
            <span class="text-gray-700 font-semibold">
                Jika ada pertanyaan, silakan hubungi kami: 
                <a href="mailto:support@yourwebsite.com" class="text-green-700 hover:underline">Petanify.my.id@gmail.com</a>
            </span>
        </div>
    </div>
</div>
@endsection
