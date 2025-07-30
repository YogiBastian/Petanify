@extends('layouts.app')

@section('title', 'Kebijakan Privasi')

@section('content')
<div class="min-h-screen py-6 bg-gray-100 flex flex-col justify-center">
    <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
        <div class="flex items-center gap-3 mb-6">
            <i class="fas fa-user-secret text-green-600 text-3xl"></i>
            <div>
                <h2 class="text-3xl font-extrabold mb-1 text-green-700">Kebijakan Privasi</h2>
                <p class="text-gray-500 text-sm">Tanggal Berlaku: <span class="font-semibold">{{ date('d F Y') }}</span></p>
            </div>
        </div>

        <p class="text-gray-700 mb-6 leading-relaxed">
            Kami berkomitmen untuk melindungi privasi Anda. Kebijakan Privasi ini menjelaskan bagaimana kami mengumpulkan, menggunakan, menyimpan, dan melindungi informasi Anda saat Anda menggunakan website atau layanan kami. Dengan mengakses atau menggunakan layanan kami, Anda dianggap telah membaca dan menyetujui kebijakan ini.
        </p>

        <hr class="my-4">

        <div class="space-y-8">

            <div>
                <div class="flex items-center gap-2 mb-2">
                    <i class="fas fa-database text-green-600"></i>
                    <h3 class="text-xl font-bold text-green-700 mb-0">1. Informasi yang Kami Kumpulkan</h3>
                </div>
                <ul class="list-disc pl-6 text-gray-700 space-y-1">
                    <li>Informasi identitas pribadi (nama, alamat email, nomor telepon, dll.)</li>
                    <li>Data transaksi dan pembayaran</li>
                    <li>Data penggunaan dan analitik dari interaksi Anda dengan platform kami</li>
                    <li>Informasi perangkat dan browser yang digunakan</li>
                </ul>
            </div>

            <div>
                <div class="flex items-center gap-2 mb-2">
                    <i class="fas fa-cogs text-green-600"></i>
                    <h3 class="text-xl font-bold text-green-700 mb-0">2. Cara Kami Menggunakan Informasi Anda</h3>
                </div>
                <ul class="list-disc pl-6 text-gray-700 space-y-1">
                    <li>Menyediakan, mengoperasikan, dan memelihara layanan kami</li>
                    <li>Memproses transaksi dan mengirimkan notifikasi</li>
                    <li>Meningkatkan dan mempersonalisasi pengalaman pengguna</li>
                    <li>Mengirimkan pembaruan dan penawaran promosi (Anda dapat berhenti berlangganan kapan saja)</li>
                    <li>Memenuhi kewajiban hukum dan peraturan</li>
                </ul>
            </div>

            <div>
                <div class="flex items-center gap-2 mb-2">
                    <i class="fas fa-share-alt text-green-600"></i>
                    <h3 class="text-xl font-bold text-green-700 mb-0">3. Pembagian Informasi Anda</h3>
                </div>
                <p class="text-gray-700 mb-2">Kami tidak menjual atau menyewakan data pribadi Anda kepada pihak ketiga. Data Anda dapat dibagikan kepada:</p>
                <ul class="list-disc pl-6 text-gray-700 space-y-1">
                    <li>Penyedia layanan yang membantu operasional platform kami (dengan perjanjian kerahasiaan)</li>
                    <li>Otoritas hukum, jika diwajibkan oleh undang-undang atau untuk melindungi hak kami</li>
                </ul>
            </div>

            <div>
                <div class="flex items-center gap-2 mb-2">
                    <i class="fas fa-shield-alt text-green-600"></i>
                    <h3 class="text-xl font-bold text-green-700 mb-0">4. Keamanan Data</h3>
                </div>
                <p class="text-gray-700">Kami menerapkan langkah-langkah keamanan yang sesuai untuk melindungi data Anda dari akses, perubahan, pengungkapan, atau perusakan yang tidak sah. Namun, tidak ada metode transmisi data melalui internet yang sepenuhnya aman.</p>
            </div>

            <div>
                <div class="flex items-center gap-2 mb-2">
                    <i class="fas fa-user-check text-green-600"></i>
                    <h3 class="text-xl font-bold text-green-700 mb-0">5. Hak Anda</h3>
                </div>
                <ul class="list-disc pl-6 text-gray-700 space-y-1">
                    <li>Anda berhak mengakses, memperbaiki, atau menghapus data pribadi Anda kapan saja, sesuai ketentuan hukum yang berlaku.</li>
                    <li>Anda dapat memilih untuk tidak menerima komunikasi promosi.</li>
                    <li>Untuk permintaan terkait privasi, silakan hubungi kami melalui kontak di bawah ini.</li>
                </ul>
            </div>

            <div>
                <div class="flex items-center gap-2 mb-2">
                    <i class="fas fa-sync-alt text-green-600"></i>
                    <h3 class="text-xl font-bold text-green-700 mb-0">6. Perubahan Kebijakan</h3>
                </div>
                <p class="text-gray-700">Kebijakan Privasi ini dapat diperbarui dari waktu ke waktu. Setiap perubahan akan diumumkan di halaman ini dengan tanggal berlaku terbaru. Penggunaan layanan secara berkelanjutan berarti Anda menerima perubahan tersebut.</p>
            </div>
        </div>

        <hr class="my-6">

        <div class="flex items-center gap-2">
            <i class="fas fa-envelope text-green-600"></i>
            <span class="text-gray-700 font-semibold">
                Jika Anda memiliki pertanyaan atau permintaan terkait privasi, silakan hubungi kami di: 
                <a href="mailto:support@yourwebsite.com" class="text-green-700 hover:underline">Petanify.my.id@gmail.com</a>
            </span>
        </div>
    </div>
</div>
@endsection
