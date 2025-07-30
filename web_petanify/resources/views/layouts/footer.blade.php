<footer class="bg-[#18191B] py-10 mt-20 text-gray-300 border-t border-gray-800 w-full">
    <div class="w-full">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-7xl mx-auto px-4">
            {{-- Kiri: Logo dan copyright --}}
            <div>
                <div class="flex items-center gap-3 mb-3">
                    <img src="/img/Petanify 2.png" alt="Logo" class="h-8 w-auto">
                </div>
                <div class="mb-2">A better way to take your LLMs online.</div>
                <div class="text-xs text-gray-400 mb-2"></div>
                <div class="flex gap-2 text-xs text-gray-400 mb-2">
                    <a href="{{ route('terms.service') }}" class="hover:underline">Terms of Service</a>
                    <span>&bull;</span>
                    <a href="{{ route('privacy.policy') }}" class="hover:underline">Privacy Policy</a>
                </div>
                <div class="flex items-center gap-2 mt-2">
                    <span class="inline-block w-2 h-2 rounded-full bg-green-400"></span>
                    <span class="text-green-400 text-sm">All Systems Operational</span>
                </div>
            </div>

            {{-- Tengah: Platform --}}
            <div>
                <div class="font-semibold text-white mb-4">Platform</div>
                <ul class="space-y-2 text-sm">
                    <li>
                        <a href="/" class="hover:underline">Beranda</a>
                    </li>
                    <li>
                        <a href="/about" class="hover:underline">Tentang Website</a>
                    </li>
                    <li>
                        <a href="https://drive.google.com/yourlink" target="_blank" class="hover:underline">Dokumentasi Tugas</a>
                    </li>
                    <li>
                        <a href="mailto:tim.petani@example.com" class="hover:underline">Hubungi Tim Pengembang</a>
                    </li>
                </ul>
            </div>


           {{-- Kanan: Community --}}
<div>
    <div class="font-semibold text-white mb-4">Social Media</div>
    <ul class="space-y-2 text-sm">
        <li>
            <a href="https://www.instagram.com/shfl_anam?igsh=M2d2ZHh0YW4xbnE3" target="_blank" class="hover:underline">Instagram</a>
        </li>
        <li>
            <a href="https://github.com/YogiBastian" target="_blank" class="hover:underline">GitHub</a>
        </li>
        <li>
            <a href="https://discordapp.com/users/620089064363786269" target="_blank" class="hover:underline">Discord</a>
        </li>
        <li>
            <a href="https://www.facebook.com/wildam.anam.1" target="_blank" class="hover:underline">Facebook</a>
        </li>
    </ul>
</div>

        </div>
    </div>
</footer>
