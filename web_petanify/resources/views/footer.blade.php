<footer class="footer-ataraxis">
    <style>
        .footer-ataraxis {
            background: #144e4b;
            color: #f4f4f4;
            border-radius: 18px;
            margin: 48px 18px 0 18px;
            box-shadow: 0 0 24px rgba(0,0,0,0.08);
            overflow: hidden;
            position: relative;
        }
        .footer-content {
            display: flex;
            gap: 48px;
            justify-content: space-between;
            padding: 48px 56px 32px 56px;
            flex-wrap: wrap;
        }
        .footer-col {
            flex: 1 1 220px;
            display: flex;
            flex-direction: column;
            gap: 18px;
            min-width: 180px;
        }
        .footer-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 10px;
        }
        .footer-logo img {
            width: 90px;    /* dari sebelumnya 44px */
            height: 90px;   /* dari sebelumnya 44px */
            border-radius: 8px;
            background: white;
            object-fit: contain;
        }
        .footer-brand {
            font-size: 22px;
            font-weight: bold;
            letter-spacing: 1.5px;
            color: #fff8b2;
        }
        .footer-desc {
            font-size: 14px;
            opacity: 0.9;
            margin-bottom: 14px;
        }
        .footer-socials {
            display: flex;
            gap: 14px;
            margin-bottom: 10px;
        }
        .footer-socials a {
            color: #f4f4f4;
            font-size: 20px;
            transition: color 0.2s;
        }
        .footer-socials a:hover {
            color: #ffb400;
        }
        .back-to-top {
            margin-top: 18px;
            display: inline-block;
            color: #f4f4f4;
            border: 1px solid #f4f4f4;
            padding: 7px 18px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;
            transition: all 0.18s;
            font-weight: 600;
            letter-spacing: 1px;
        }
        .back-to-top:hover {
            background: #ffb400;
            color: #144e4b;
            border-color: #ffb400;
        }
        .footer-title {
            font-weight: bold;
            font-size: 17px;
            color: #fff8b2;
            margin-bottom: 8px;
        }
        .footer-col ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .footer-col ul li {
            margin-bottom: 8px;
        }
        .footer-col ul li a {
            color: #f4f4f4;
            opacity: 0.85;
            text-decoration: none;
            font-size: 15px;
            transition: color 0.18s;
        }
        .footer-col ul li a:hover,
        .footer-col ul li a:focus {
            color: #ffb400;
            opacity: 1;
            text-decoration: underline;
        }
        .footer-bottom {
            background: #ffb400;
            color: #144e4b;
            text-align: center;
            font-size: 15px;
            font-weight: 500;
            padding: 7px 0 7px 0;
            letter-spacing: 0.5px;
        }
        @media (max-width: 900px) {
            .footer-content {
                flex-direction: column;
                gap: 20px;
                padding: 32px 18px 24px 18px;
            }
            .footer-ataraxis {
                margin: 24px 4px 0 4px;
            }
        }
    </style>
    <div class="footer-content">
        <!-- Kolom 1: Logo dan Deskripsi -->
        <div class="footer-col">
            <div class="footer-logo">
                {{-- Ganti dengan logo kamu --}}
                <img src="{{ asset('img/Petanify 2.png') }}" alt="Petanify Logo">
                <span class="footer-brand">PETANIFY</span>
            </div>
            <p class="footer-desc">
                Empowering farmers with advanced marketplace & entrepreneurship tools to improve welfare and modern agriculture.
            </p>
            <div class="footer-socials flex gap-4">
                <a href="https://www.instagram.com/shfl_anam?igsh=M2d2ZHh0YW4xbnE3" target="_blank" class="flex items-center gap-1 hover:underline">
                    <i class="fab fa-instagram text-pink-500"></i> Instagram
                </a>
                <a href="https://github.com/YogiBastian" target="_blank" class="flex items-center gap-1 hover:underline">
                    <i class="fab fa-github text-gray-800"></i> GitHub
                </a>
                <a href="https://discordapp.com/users/620089064363786269" target="_blank" class="flex items-center gap-1 hover:underline">
                    <i class="fab fa-discord text-indigo-600"></i> Discord
                </a>
            </div>
            <a href="#" class="back-to-top">
                <i class="fa-solid fa-arrow-up"></i> BACK TO TOP
            </a>
        </div>
        <!-- Kolom 2: Site Map -->
        <div class="footer-col">
            <div class="footer-title">Site Map</div>
            <ul>
                <li><a href="#home">Homepage</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#team">Our Team</a></li>
                <li><a href="#faq">FAQ</a></li>
                <li><a href="#contact">Contact Us</a></li>
            </ul>
        </div>
        <!-- Kolom 3: Legal -->
        <div class="footer-col">
            <div class="footer-title">Legal</div>
            <ul>
                <li>
    <a href="{{ route('privacy.policy') }}" class="hover:underline">Privacy Policy</a>
</li>
<li>
    <a href="{{ route('terms.service') }}" class="hover:underline">Terms of Service</a>
</li>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        Copyright &copy; {{ date('Y') }}, petanify. All Rights Reserved.
    </div>
    <script>
        // Smooth scroll to top
        document.addEventListener("DOMContentLoaded", function(){
            document.querySelectorAll('.back-to-top').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    window.scrollTo({top:0, behavior:'smooth'});
                });
            });
        });
    </script>
</footer>
