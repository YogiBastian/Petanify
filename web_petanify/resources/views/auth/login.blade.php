<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Petanify Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/login-register.css') }}">
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

    <style>
        html, body {
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            height: 100%;
        }

        .login-split-container {
            display: flex;
            width: 100vw;
            height: 100vh;
            overflow: hidden;
            opacity: 0;
            transform: translateX(-100%);
        }

        .slide-in-left {
            animation: slideInLeft 2s cubic-bezier(0.25, 1, 0.5, 1) forwards;
        }

        .slide-out-right {
            animation: slideOutRight 2s cubic-bezier(0.25, 1, 0.5, 1) forwards;
        }

        @keyframes slideInLeft {
            0% {
                transform: translateX(-100%);
                opacity: 0;
            }
            100% {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes slideOutRight {
            0% {
                transform: translateX(0);
                opacity: 1;
            }
            100% {
                transform: translateX(-100%);
                opacity: 0;
            }
        }
        
        @keyframes slideOutLeft {
    0% {
        transform: translateX(0);
        opacity: 1;
    }
    100% {
        transform: translateX(-100%);
        opacity: 0;
    }
    }
    
    .slide-out-left {
        animation: slideOutLeft 2s cubic-bezier(0.25, 1, 0.5, 1) forwards;
    }

    </style>
</head>
<body>
    <div class="login-split-container" id="container">
        <!-- Panel Kiri: Fitur -->
        <div class="login-panel-left">
            <div class="login-panel-feature-slider">
                <div class="feature-slide" id="feature-slide">
                    <div id="feature-media"></div>
                    <div class="feature-slide-title" id="slider-title"></div>
                    <div class="feature-slide-desc" id="slider-desc"></div>
                </div>
                <div class="feature-slider-dots" id="slider-dots"></div>
            </div>
            <div class="login-panel-brand">
                <img src="{{ asset('img/Petanify 2.png') }}" alt="Petanify Logo">
                <div class="brand-title">PETANIFY</div>
                <div class="brand-desc">Inovasi digital untuk petani Indonesia.</div>
            </div>
        </div>

        <!-- Panel Kanan: Form Login -->
        <div class="login-panel-right">
            <div class="login-card">
                <div class="login-logo-area">
                    <img src="{{ asset('img/Petanify 2.png') }}" alt="Petanify Logo">
                </div>
                <div class="login-welcome">Halo!</div>
                <div class="login-subtitle">Masuk untuk mengakses sistem Petanify.</div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="login-field">
                        <input type="email" name="email" id="email" placeholder="Email" required value="{{ old('email') }}">
                        <span class="login-field-icon"><i class="fa-regular fa-envelope"></i></span>
                    </div>
                    @error('email')<div class="input-error">{{ $message }}</div>@enderror

                    <div class="login-field">
                        <input type="password" name="password" id="password" placeholder="Password" required>
                        <span class="login-field-icon"><i class="fa-solid fa-lock"></i></span>
                        <span class="login-eye-toggle" onclick="togglePassword('password', this)">
                            <i class="fa-regular fa-eye-slash"></i>
                        </span>
                    </div>
                    @error('password')<div class="input-error">{{ $message }}</div>@enderror

                    <div class="login-extra">
                        <label class="remember-me">
                            <input type="checkbox" name="remember" id="remember">
                            <span>Remember Me</span>
                        </label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="forgot-link">Recovery Password</a>
                        @endif
                    </div>

                    <button type="submit" class="login-btn-main">Login</button>
                </form>

                <div class="login-bottom-link">
                    Belum punya akun? <a href="#" id="signUpBtn">Daftar</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        const features = [
            {
                lottie: "https://assets2.lottiefiles.com/packages/lf20_49rdyysj.json",
                title: "Marketplace",
                desc: "Jual beli produk pertanian lebih mudah dan aman."
            },
            {
                lottie: "https://assets3.lottiefiles.com/packages/lf20_EzPrWM.json",
                title: "Komunitas Petani",
                desc: "Forum diskusi dan kolaborasi seluruh Indonesia."
            },
            {
                lottie: "https://assets7.lottiefiles.com/private_files/lf30_wqypnpu5.json",
                title: "Sewa Alat",
                desc: "Sewa alat tani modern hanya lewat aplikasi."
            }
        ];

        let current = 0;
        const media = document.getElementById('feature-media');
        const title = document.getElementById('slider-title');
        const desc = document.getElementById('slider-desc');
        const slide = document.getElementById('feature-slide');
        const dotsContainer = document.getElementById('slider-dots');

        features.forEach((_, i) => {
            const dot = document.createElement('span');
            dot.className = 'feature-slider-dot' + (i === 0 ? ' active' : '');
            dot.addEventListener('click', () => {
                clearInterval(sliderInterval);
                showSlide(i);
                sliderInterval = setInterval(() => {
                    let next = (current + 1) % features.length;
                    showSlide(next);
                }, 4200);
            });
            dotsContainer.appendChild(dot);
        });

        function showSlide(i) {
            slide.style.opacity = 0;
            setTimeout(() => {
                media.innerHTML = `<lottie-player src="${features[i].lottie}" background="transparent" speed="1" style="width:180px;height:180px;" loop autoplay></lottie-player>`;
                title.textContent = features[i].title;
                desc.textContent = features[i].desc;
                dotsContainer.querySelectorAll('span').forEach((d, idx) => d.classList.toggle('active', idx === i));
                slide.style.opacity = 1;
            }, 300);
            current = i;
        }

        let sliderInterval = setInterval(() => {
            let next = (current + 1) % features.length;
            showSlide(next);
        }, 4200);

        showSlide(0);

        function togglePassword(fieldId, el) {
            const input = document.getElementById(fieldId);
            const icon = el.querySelector('i');
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            const container = document.getElementById('container');
            container.classList.add('slide-in-left');

            const signUpBtn = document.getElementById('signUpBtn');
            signUpBtn.addEventListener('click', function(e) {
                e.preventDefault();
                container.classList.remove('slide-in-left', 'slide-out-right'); 
                container.classList.add('slide-out-left'); // animasi keluar ke 

                setTimeout(() => {
                    window.location.href = "{{ route('register') }}?from=login";
                }, 1000);
            });
        });
    </script>
</body>
</html>
