<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petanify</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,200..800&family=Delius&display=swap" rel="stylesheet">
    
</head>

<body>
<header>
    <div class="nav-container">
<div class="logo" style="cursor: pointer;" onclick="refreshPage()">
    <img src="{{ asset('img/Petanify 2.png') }}" alt="Petanify Logo" class="logo-img">
    <span>PETANIFY</span>
</div>


        <nav>
            <ul class="nav-menu">
                <li><a href="#home" class="active">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#faq">FAQ</a></li>
                <li><a href="#contact">Contact Us</a></li>
            </ul>
        </nav>
        <div class="navbar-actions">
    <a href="{{ route('login') }}" class="sign-in-link">Sign in</a>
    <a href="{{ route('register') }}" class="get-started-btn">Get Started</a>
</div>

</header>

{{-- Home Section --}}
<section id="home" class="hero">
    <div class="hero-bg bg1"></div>
    <div class="hero-bg bg2"></div>
    <div class="overlay"></div>
    <div class="content">
        <p class="sub-title">SELAMAT DATANG DI SISTEM MANAJEMEN KEWIRAUSAHAAN PRODUK PERTANIAN.</p>
        <h1>PETANIFY</h1>
        <p class="description">
            Memberdayakan impian pedesaan, menumbuhkan pertanian berkelanjutan – Petanify menghadirkan kemakmuran dari akar.
        </p>
    </div>
</section>



    {{-- About Section --}}
    <section id="about" class="about-agriculture">
        <div class="about-container">
            <div class="about-text">
                <h2>Dedikasi Kami untuk Pertanian<br>Menumbuhkan Masa Depan<br>Berkelanjutan</h2>
                <p>Pertanian adalah sumber kehidupan. Kami berkomitmen untuk mendukung petani dengan inovasi modern, memastikan hasil panen berkualitas, dan menjaga keseimbangan alam.</p>
            </div>
            <div class="about-image">
                <img src="{{ asset('img/Image 1.png') }}" alt="Agriculture Field">
                <div class="since-badge">Since 2025</div>
            </div>
        </div>
    </section>

    {{-- Services Section --}}
    <section class="services">
        <h2>Layanan Kami</h2>
        <p>Kami menyediakan berbagai layanan untuk mendukung pertanian modern dan kewirausahaan pertanian.</p>
        <div class="service-container">
            <div class="service-box">
                <i class="fa-solid fa-people-group"></i>
                <h3>Community</h3>
            </div>
            <div class="service-box">
                <i class="fa-solid fa-shop"></i>
                <h3>Marketplace</h3>
            </div>
            <div class="service-box">
                <i class="fa-solid fa-circle-info"></i>
                <h3>Product Information</h3>
            </div>
            <div class="service-box">
                <i class="fa-solid fa-share-nodes"></i>
                <h3>Social Media</h3>
            </div>
        </div>
    </section>

    {{-- Team Section --}}
<section class="team">
    <h2 style="text-align:center; font-weight:bold; color:#014421;">Tentang Kami</h2>
    <div class="team-container">
        <div class="team-box">
            <img src="{{ asset('img/Yogi.png') }}" alt="Yogi Bastian">
            <h3>Yogi Bastian</h3>
            <p>Full Stack Lead Web Developer<br>Petanify</p>
        </div>
        <div class="team-box">
            <img src="{{ asset('img/Vincent.png') }}" alt="Vincent Sammuel Nugraha">
            <h3>Vincent Sammuel Nugraha</h3>
            <p>Full Stack Developer<br>Petanify</p>
        </div>
        <div class="team-box">
            <img src="{{ asset('img/Ipul.png') }}" alt="Shaiful Anam">
            <h3>Shaiful Anam</h3>
            <p>UI/UX Designer<br>Petanify</p>
        </div>
        <div class="team-box">
            <img src="{{ asset('img/Qarel.png') }}" alt="Qarel Irham Hildry Java">
            <h3>Qarel Irham Hildry Java</h3>
            <p>Frontend Developer<br>Petanify</p>
        </div>
    </div>
</section>

    {{-- FAQ Section --}}
<section id="faq" class="faq-section">
    <h2>Frequently Asked Questions</h2>
    <div class="faq-list">
        <div class="faq-item">
            <button class="faq-question">
                Apa itu Petanify?
                <span class="faq-icon"><i class="fa-solid fa-chevron-down"></i></span>
            </button>
            <div class="faq-answer">
                Petanify adalah sistem manajemen kewirausahaan produk pertanian yang mendukung pertumbuhan dan kesejahteraan para petani serta pelaku usaha di sektor pertanian.
            </div>
        </div>
        <div class="faq-item">
            <button class="faq-question">
                Bagaimana cara menjual produk di Petanify?
                <span class="faq-icon"><i class="fa-solid fa-chevron-down"></i></span>
            </button>
            <div class="faq-answer">
                Kamu bisa mendaftar melalui halaman registrasi, kemudian mengikuti panduan yang telah disediakan untuk mengunggah produk dan memasarkan produk pertanian kamu.
            </div>
        </div>
        <div class="faq-item">
            <button class="faq-question">
                Siapa saja yang dapat menggunakan Petanify?
                <span class="faq-icon"><i class="fa-solid fa-chevron-down"></i></span>
            </button>
            <div class="faq-answer">
                Petanify dapat digunakan oleh petani, pembeli, serta admin. Setiap peran memiliki fitur dan akses yang berbeda sesuai kebutuhan masing-masing.
            </div>
        </div>
        <div class="faq-item">
            <button class="faq-question">
                Apakah ada biaya untuk bergabung di Petanify?
                <span class="faq-icon"><i class="fa-solid fa-chevron-down"></i></span>
            </button>
            <div class="faq-answer">
                Tidak, pendaftaran di Petanify gratis. Namun, terdapat ketentuan terkait komisi transaksi yang akan dijelaskan pada saat proses jual beli.
            </div>
        </div>
        <div class="faq-item">
            <button class="faq-question">
                Bagaimana proses pembayaran di marketplace Petanify?
                <span class="faq-icon"><i class="fa-solid fa-chevron-down"></i></span>
            </button>
            <div class="faq-answer">
                Pembeli melakukan transfer ke rekening resmi Petanify. Setelah pembayaran diverifikasi oleh admin, dana akan diteruskan ke penjual (petani) secara manual.
            </div>
        </div>
        <div class="faq-item">
            <button class="faq-question">
                Apakah data pribadi saya aman di Petanify?
                <span class="faq-icon"><i class="fa-solid fa-chevron-down"></i></span>
            </button>
            <div class="faq-answer">
                Petanify berkomitmen menjaga kerahasiaan dan keamanan data pengguna dengan menerapkan standar keamanan sistem dan privasi yang tinggi.
            </div>
        </div>
        <div class="faq-item">
            <button class="faq-question">
                Bagaimana jika saya mengalami masalah saat menggunakan Petanify?
                <span class="faq-icon"><i class="fa-solid fa-chevron-down"></i></span>
            </button>
            <div class="faq-answer">
                Silakan hubungi tim support kami melalui menu Bantuan atau kontak resmi yang tersedia di website untuk mendapatkan solusi atas permasalahan Anda.
            </div>
        </div>
        <div class="faq-item">
            <button class="faq-question">
                Fitur apa saja yang tersedia di Petanify?
                <span class="faq-icon"><i class="fa-solid fa-chevron-down"></i></span>
            </button>
            <div class="faq-answer">
                Petanify menyediakan marketplace produk pertanian, forum diskusi, artikel dan edukasi pertanian, riwayat transaksi, sistem verifikasi pembayaran, serta dashboard khusus untuk admin, petani, dan pembeli.
            </div>
        </div>
        <div class="faq-item">
            <button class="faq-question">
                Bagaimana cara mengikuti forum diskusi di Petanify?
                <span class="faq-icon"><i class="fa-solid fa-chevron-down"></i></span>
            </button>
            <div class="faq-answer">
                Setelah login sebagai petani atau pembeli, Anda dapat mengakses menu forum untuk membuat postingan, memberi komentar, serta memberikan like/dislike pada diskusi yang ada.
            </div>
        </div>
        <div class="faq-item">
            <button class="faq-question">
                Apakah Petanify mendukung edukasi untuk petani?
                <span class="faq-icon"><i class="fa-solid fa-chevron-down"></i></span>
            </button>
            <div class="faq-answer">
                Ya, terdapat fitur artikel dan video pembelajaran yang dapat diakses oleh petani untuk meningkatkan pengetahuan dan keterampilan di bidang pertanian.
            </div>
        </div>
        <!-- Tambahkan item lain sesuai kebutuhan -->
    </div>
</section>

    {{-- Contact Us Section --}}
<div  id="contact" class="contact-section">
    <h2 class="contact-title">Hubungi Kami</h2>
    <p class="contact-subtitle">
        Kami siap membantu Anda membangun koneksi yang kuat dan meningkatkan visibilitas bisnis Anda. Melalui konten berkualitas tinggi dan strategi tautan yang tepat sasaran, Petanify mendukung pertumbuhan peringkat Anda di mesin pencari sekaligus memperkuat citra merek Anda.
    </p>
    <div class="contact-flexbox">
        <!-- Contact Info (Kiri) -->
        <div class="contact-info-box">
            <h3>Informasi Kontak</h3>
            <p class="contact-info-desc">
                Di Petanify, kami bantu Anda tumbuh dengan konten menarik dan strategi digital yang meningkatkan kepercayaan pelanggan dan memperluas jangkauan usaha Anda.
            </p>
            <div class="contact-info-list">
                <div>
                    <i class="fa-solid fa-phone"></i> <span>081224158753</span>
                </div>
                <div>
                    <i class="fa-solid fa-phone"></i> <span>085179717308</span>
                </div>
                <div>
                    <i class="fa-solid fa-envelope"></i> <span>sebastiann@gmail.com</span>
                </div>
                <div>
                    <i class="fa-solid fa-location-dot"></i> <span>Indonesia, Bandung</span>
                </div>
            </div>
            <!-- Dekorasi lingkaran -->
            <div class="info-circle"></div>
        </div>
        <!-- Formulir Kontak (Kanan) -->
        <form action="https://api.web3forms.com/submit" method="POST" class="contact-form-box">
            <input type="hidden" name="access_key" value="529f9290-21d6-4960-8ad2-2bbb44f87788">
            <div class="form-row">
                <div class="form-group">
                    <label>Nama Anda</label>
                    <input type="text" name="name" required>
                </div>
                <div class="form-group">
                    <label>Email Anda</label>
                    <input type="email" name="email" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group" style="width:100%;">
                    <label>Subjek</label>
                    <input type="text" name="subject" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group" style="width:100%;">
                    <label>Pesan</label>
                    <textarea name="message" required placeholder="Tulis pesan Anda di sini"></textarea>
                </div>
            </div>
            <button type="submit" class="send-message-btn">Kirim Pesan</button>
        </form>
    </div>
</div>



    @include('footer')

<script>
    // Smooth scroll on navbar link click
    document.addEventListener("DOMContentLoaded", function () {
        const navLinks = document.querySelectorAll("nav ul li a");

        navLinks.forEach(link => {
            link.addEventListener("click", function (e) {
                // Hanya scroll jika href adalah anchor (#)
                const href = this.getAttribute("href");
                if (href && href.startsWith("#")) {
                    e.preventDefault();
                    const target = document.querySelector(href);
                    if (target) {
                        // Smooth scroll
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                }
            });
        });

        // Highlight menu saat scroll (kode lama tetap bisa)
        const sections = document.querySelectorAll("section");
        window.addEventListener("scroll", () => {
            let current = "";
            sections.forEach((section) => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.clientHeight;
                if (window.scrollY >= sectionTop - sectionHeight / 3) {
                    current = section.getAttribute("id");
                }
            });
            navLinks.forEach((link) => {
                link.classList.remove("active");
                if (link.getAttribute("href").includes(current)) {
                    link.classList.add("active");
                }
            });
        });
    });
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.faq-question').forEach(function(btn) {
        btn.addEventListener('click', function() {
            const item = btn.closest('.faq-item');
            const answer = item.querySelector('.faq-answer');
            const isActive = item.classList.contains('active');

            // Kalau ingin hanya satu terbuka
            document.querySelectorAll('.faq-item').forEach(i => {
                if (i !== item) {
                    i.classList.remove('active');
                    const a = i.querySelector('.faq-answer');
                    a.style.maxHeight = null;
                }
            });

            if (isActive) {
                item.classList.remove('active');
                answer.style.maxHeight = null;
            } else {
                item.classList.add('active');
                answer.style.maxHeight = answer.scrollHeight + "px";
            }
        });
    });
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const bg1 = document.querySelector('.hero-bg.bg1');
    const bg2 = document.querySelector('.hero-bg.bg2');

    const images = [
        "{{ asset('img/sawah1.jpg') }}",
        "{{ asset('img/sawah2.jpg') }}",
        "{{ asset('img/sawah3.jpg') }}",
        "{{ asset('img/sawah4.jpg') }}"
    ];

    let current = 0;
    let showingFirst = true;

    // Set background awal
    bg1.style.backgroundImage = `url('${images[0]}')`;
    bg1.classList.add('active');

    setInterval(() => {
        current = (current + 1) % images.length;
        const nextImage = `url('${images[current]}')`;

        if (showingFirst) {
            bg2.style.backgroundImage = nextImage;
            bg2.classList.add('active');
            bg1.classList.remove('active');
        } else {
            bg1.style.backgroundImage = nextImage;
            bg1.classList.add('active');
            bg2.classList.remove('active');
        }

        showingFirst = !showingFirst;
    }, 5000);
});
</script>


</body>
</html>
