<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Petanify Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/login-register.css') }}">
  
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
            transform: translateX(50%);
        }
        .slide-in-right {
            animation: slideInRight 2s cubic-bezier(0.25, 1, 0.5, 1) forwards;
            will-change: transform, opacity;
        }
        .slide-out-right {
            animation: slideOutRight 1.2s ease-in-out forwards;
        }
        @keyframes slideInRight {
            0% {
                transform: translateX(100%);
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
                transform: translateX(100%);
                opacity: 0;
            }
        }
    </style>

</head>
<body>
    <div class="login-split-container slide-in-start">
        <!-- Panel KANAN: Form Register (Putih) -->
    <div class="login-panel-right">
        <div class="login-card">
            <div class="login-logo-area">
                <img src="{{ asset('img/Petanify 2.png') }}" alt="Petanify Logo">
            </div>
            <div class="login-welcome">Register</div>
            <div class="login-subtitle">
                Daftar untuk bergabung bersama ekosistem Petanify.
            </div>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="login-field">
                    <input id="name" type="text" name="name" placeholder="Nama Lengkap" required autofocus>
                    <span class="login-field-icon"><i class="fa-regular fa-user"></i></span>
                </div>
                @error('name')<div class="input-error">{{ $message }}</div>@enderror

                <div class="login-field">
                    <input id="email" type="email" name="email" placeholder="Email" required>
                    <span class="login-field-icon"><i class="fa-regular fa-envelope"></i></span>
                </div>
                @error('email')<div class="input-error">{{ $message }}</div>@enderror

                <div class="login-field">
                    <input id="password" type="password" name="password" placeholder="Password" required>
                    <span class="login-field-icon"><i class="fa-solid fa-lock"></i></span>
                    <span class="login-eye-toggle" onclick="togglePassword('password', this)">
                        <i class="fa-solid fa-eye-slash"></i>
                    </span>
                </div>
                @error('password')<div class="input-error">{{ $message }}</div>@enderror

                <div class="login-field">
                    <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>
                    <span class="login-field-icon"><i class="fa-solid fa-lock"></i></span>
                    <span class="login-eye-toggle" onclick="togglePassword('password_confirmation', this)">
                        <i class="fa-solid fa-eye-slash"></i>
                    </span>
                </div>
                @error('password_confirmation')<div class="input-error">{{ $message }}</div>@enderror

                <div class="login-field">
                    <select name="role" id="role" required>
                        <option value="petani">Petani</option>
                        <option value="pembeli">Pembeli</option>
                    </select>
                    <span class="login-field-icon"><i class="fa-solid fa-users"></i></span>
                </div>
                @error('role')<div class="input-error">{{ $message }}</div>@enderror

                <button type="submit" class="login-btn-main">Register</button>
            </form>
            <div class="login-bottom-link">
                Sudah punya akun? <a href="#" id="loginBtn">Login</a>
            </div>
        </div>
    </div>
    <!-- Panel KIRI: Slider Fitur -->
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
</div>

<!-- JS Slider dan Show/Hide Password -->
<script>
    const features = [
        { lottie: "https://assets2.lottiefiles.com/packages/lf20_49rdyysj.json", title: "Marketplace", desc: "Jual beli produk pertanian lebih mudah dan aman." },
        { lottie: "https://assets3.lottiefiles.com/packages/lf20_EzPrWM.json", title: "Komunitas Petani", desc: "Forum diskusi dan kolaborasi seluruh Indonesia." },
        { lottie: "https://assets7.lottiefiles.com/private_files/lf30_wqypnpu5.json", title: "Sewa Alat", desc: "Sewa alat tani modern hanya lewat aplikasi." }
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
    }, 320);
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
    const container = document.querySelector('.login-split-container');
    requestAnimationFrame(() => {
        container.classList.remove('slide-in-start');
        container.classList.add('slide-in-right');
    });

    const loginBtn = document.getElementById('loginBtn');
    loginBtn.addEventListener('click', function(e) {
        e.preventDefault();
        container.classList.add('slide-out-right');
        setTimeout(() => {
            window.location.href = "{{ route('login') }}";
        }, 1200);
    });
});
</script>
</body>
</html>
