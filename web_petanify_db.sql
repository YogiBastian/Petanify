-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 30 Jul 2025 pada 17.43
-- Versi server: 10.11.13-MariaDB-cll-lve-log
-- Versi PHP: 8.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zzopswdt_web_petanify_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikels`
--

CREATE TABLE `artikels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `artikels`
--

INSERT INTO `artikels` (`id`, `judul`, `kategori`, `isi`, `gambar`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 'Produksi beras nasional Januari Juli 2025 naik 14,49 menjadi 21,76 juta ton.', 'Pertanian', 'JAKARTA – Produksi beras nasional mengalami lonjakan signifikan sepanjang Januari hingga Juli 2025. Badan Pusat Statistik (BPS) mencatat produksi beras mencapai 21,76 juta ton, meningkat 2,83 juta ton atau 14,49 persen dibandingkan periode yang sama tahun sebelumnya.\r\nKenaikan ini sejalan dengan peningkatan produksi gabah kering giling (GKG) yang juga meroket menjadi 37,77 juta ton, naik 4,91 juta ton atau 14,93 persen dibandingkan Januari–Juli 2024.\r\nDeputi Statistik Bidang Distribusi dan Jasa BPS, Pudji Ismartini, menjelaskan bahwa lonjakan produksi ini dipicu oleh panen raya serentak yang berlangsung sejak awal tahun di hampir seluruh sentra produksi padi nasional.\r\n“Panen raya terjadi secara merata di berbagai kabupaten/kota di Pulau Jawa, terutama di Jawa Barat, Banten, Jawa Timur, dan Jawa Tengah. Sementara di luar Jawa, panen juga berlangsung di sejumlah daerah di Sumatera, Kalimantan, dan Sulawesi,” ujar Pudji dalam konferensi pers Berita Resmi Statistik, Senin, 2 Juni 2025.\r\nBeberapa daerah dengan kontribusi panen tertinggi antara lain Subang, Indramayu, Cirebon, Cianjur, dan Bekasi.\r\nSelain peningkatan produksi, BPS juga mencatat Nilai Tukar Petani (NTP) pada Mei 2025 sebesar 121,15, atau naik 0,07 persen dibandingkan April 2025. NTP merupakan indikator kesejahteraan petani yang mencerminkan daya beli mereka terhadap barang dan jasa.\r\nPeningkatan produksi beras nasional ini tidak lepas dari upaya pemerintah yang bekerja keras bersama para petani. Menteri Pertanian Andi Amran Sulaiman menegaskan bahwa peningkatan produksi merupakan hasil nyata kebijakan afirmatif di sektor hulu pertanian, termasuk penambahan pupuk subsidi, bantuan alat mesin pertanian (alsintan), serta program pompanisasi masif yang digencarkan sejak awal tahun.\r\n“Lonjakan produksi ini tidak terjadi begitu saja. Ini adalah hasil kerja konkret di lapangan sesuai arahan Presiden Prabowo Subianto, untuk menjamin ketersediaan pangan dan meningkatkan kesejahteraan petani,” tegas Amran.\r\nIa menambahkan, tingginya produksi padi turut memperkuat stok beras nasional yang kini mencapai lebih dari 4 juta ton, tertinggi dalam sejarah Indonesia.\r\n“Kita sudah bisa lihat tanda-tanda swasembada pangan yang berdaulat. Produksi naik, stok kuat, dan petani untung. Ini sinyal positif untuk ketahanan pangan Indonesia ke depan,” tutup Mentan Amran.', 'artikel/Rby2IXAZQt7FjoGRGMhAnGc97nBeHU7Sg9K1sQ84.jpg', 1, '2025-07-20 09:30:56', '2025-07-28 21:01:22'),
(6, 'Polres Serang Panen 845 Ton Jagung hingga Kuartal II 2025', 'Pertanian', 'Serang – Polres Serang memanen hasil panen jagung hingga mencapai 845 ton sepanjang kuartal II tahun 2025. Panen ini merupakan bagian dari program ketahanan pangan yang digagas oleh Kapolres Serang.\r\nKapolres Serang, AKBP Wiwin Setiawan, mengatakan bahwa panen dilakukan di sejumlah lahan pertanian milik Polres maupun lahan masyarakat yang dijadikan binaan oleh kepolisian. Kegiatan ini, kata dia, bertujuan mendukung program pemerintah dalam menjaga ketahanan pangan nasional.\r\n\"Kami berupaya mendukung program pemerintah dengan memanfaatkan lahan yang ada, baik milik kami maupun masyarakat, untuk ditanami jagung. Hasilnya cukup menggembirakan,\" kata AKBP Wiwin kepada wartawan, Rabu (24/7/2025).\r\nPanen jagung tersebut berasal dari sejumlah wilayah di Kabupaten Serang, di antaranya Kecamatan Tunjung Teja, Petir, dan Kramatwatu. Penanaman dilakukan sejak akhir tahun 2024 lalu, dan panen dimulai pada awal tahun 2025 hingga kuartal kedua.\r\nDalam program ini, Polres Serang juga menggandeng kelompok tani dan warga sekitar. Polisi tidak hanya membantu dalam penyediaan bibit dan pupuk, tetapi juga turut serta dalam proses penanaman dan perawatan tanaman jagung.\r\n\"Kami ingin menunjukkan bahwa polisi bukan hanya menjaga keamanan, tapi juga bisa berkontribusi dalam pembangunan, termasuk sektor pertanian,\" ujarnya.\r\nWiwin menyebut, selain jagung, ada juga program penanaman tanaman pangan lain seperti cabai dan singkong yang dikelola secara swadaya. Ia berharap ke depan kegiatan ini bisa menjadi inspirasi bagi instansi lain untuk memanfaatkan lahan tidur secara produktif.', 'artikel/7V4unL0PQaIO4NMgEQEfEbOE2DVqYRrB2xkctFHY.jpg', 1, '2025-07-24 08:51:26', '2025-07-28 20:55:34'),
(7, 'Harga Bawang Merah di Sumut Terus Naik, Cabai Masih Lesu', 'Kenaikan Harga', 'Medan – medanbisnisdaily.com\r\nHarga bawang merah di sejumlah pasar tradisional di Sumatera Utara (Sumut) dilaporkan terus mengalami kenaikan signifikan. Kenaikan ini terjadi sejak beberapa pekan terakhir dan belum menunjukkan tanda-tanda penurunan. Sementara itu, harga cabai merah justru masih bertahan di level rendah atau stagnan.\r\nMenurut pantauan di beberapa pasar seperti Pasar Petisah dan Pasar Simpang Limun di Kota Medan, harga bawang merah saat ini berkisar antara Rp40.000 hingga Rp45.000 per kilogram, naik dari sebelumnya di kisaran Rp30.000 per kilogram.\r\nKenaikan harga ini disebut akibat berkurangnya pasokan dari daerah sentra produksi seperti Brebes dan Enrekang, serta cuaca ekstrem yang mengganggu masa panen. Pedagang mengeluhkan penurunan pasokan yang menyebabkan harga di tingkat distributor melonjak.\r\n“Bawang merah dari Jawa sedikit masuk. Kami beli sudah mahal dari agen,” kata Linda, seorang pedagang di Pasar Petisah.\r\nSementara itu, untuk cabai merah, justru harganya masih rendah, yakni sekitar Rp20.000–Rp25.000 per kilogram, meskipun pasokan melimpah dari berbagai daerah. Harga ini jauh lebih murah dibanding bulan-bulan sebelumnya yang sempat menyentuh Rp60.000 per kilogram.\r\nMenurut pengamat pertanian, kondisi ini mencerminkan ketidakseimbangan antara distribusi dan permintaan pasar. Ketika produksi melimpah, tapi daya serap pasar rendah, maka harga komoditas seperti cabai bisa terpuruk. Sebaliknya, komoditas seperti bawang merah yang terganggu pasokannya akan mengalami lonjakan harga.\r\nDinas Perdagangan Sumut menyebutkan pihaknya terus memantau pergerakan harga dan akan berkoordinasi dengan kementerian terkait untuk menjaga stabilitas pangan jelang perayaan besar keagamaan.', 'artikel/Yh2lFJmChRdnTZ02BpV6o2LEIQOHtJ9QOGxsNl8D.jpg', 1, '2025-07-24 08:55:59', '2025-07-28 21:02:01'),
(8, 'Wamentan Sampaikan Penyebab Harga Singkong Petani Masih di Bawah Rp 1.000', 'Penurunan Harga', 'TEMPO.CO, Jakarta - Pemerintah telah menetapkan harga singkong terendah di tingkat petani senilai Rp 1.350 per kilogram. Namun dalam implementasinya, Wakil Menteri Pertanian mengakui harga jual singkong petani masih di bawah Rp 1.000 per kilogram.\r\nMenurut Sudaryono, ada sejumlah persoalan yang menyebabkan singkong petani dihargai murah. Ia menjelaskan, pemerintah menetapkan harga Rp 1.350 per kilogram untuk singkong dengan kandungan tapioka 24 persen. Sementara itu, kebanyakan petani masih menanam singkong berukuran besar tetapi presentase tapiokanya kecil. Walhasil, pabrik pengolah singkong lebih memilih singkong impor.\r\n\"Ini menjadi pelajaran bagi petani kita dan penyuluh kami di lapangan,\" kata Sudaryono kepada wartawan di Kantor Kemenko Pangan pada Jumat, 13 Juni 2025. \"Kami ingin mengedukasi petani untuk menanam singkong bukan gede-gedean, berat-beratan, tapi yang kandungan tapiokanya tinggi.\"\r\nKementerian Pertanian menetapkan harga singkong terendah Rp 1.350 per kilogram sejak 31 Januari 2025. Kebijakan ini diambil usai harga pangan ini anjlok ke angka Rp 1.000 per kilogram. Menteri Pertanian Amran Sulaiman mengatakan penetapan harga tersebut mengacu pada kesepakatan antara petani dan pengusaha usai rapat koordinasi di Kementerian Pertanian pada Jumat, 31 Januari 2025.\r\n\"Petani singkong Indonesia yang hadir pada hari ini ada lebih dari 100, bersepakat, harga sudah ditetapkan. Tidak boleh diganggu gugat,\" kata Amran, dikutip dari Antara. Ia juga mengatakan kementeriannya akan melakukan pengawasan harga bersama Satuan Tugas Pangan Polri.\r\nAmran berharap harga baru ini tidak merugikan petani. Selain itu, bisa mendorong petani untuk berkolaborasi dengan para pengusaha. \"Perusahaan harus untung tetapi petani harus tersenyum,\" ujarnya.\r\nSebagai informasi, Amran menetapkan  harga singkong Rp 1.350 per kilogram usai petani singkong di Lampung menggelar unjuk rasa. Saat itu, petani menuntut agar pemerintah menaikkan harga singkong dari Rp 1.000 per kilogram menjadi Rp 1.400 per kilogram.', 'artikel/GL2cfw1mMNHXp9OPsGmvT2u04n0noWNjirvTiheA.jpg', 1, '2025-07-28 22:49:08', '2025-07-28 22:49:08'),
(9, 'Subak dan Kelompok Tani di Buleleng Dapat Bantuan 47 Ton Benih Padi-Jagung', 'Pertanian', '\"Subak dan kelompok tani (poktan) dari tujuh kecamatan di Buleleng, Bali, mendapatkan bantuan benih padi dan jagung. Total bantuan benih padi dan jagung untuk semua subak dan poktan itu mencapai 47 ton. Bantuan 47 ton bibit padi dan jagung dari Pemerintah Kabupaten (Pemkab) Buleleng itu akan dipergunakan pada Masa Tanam Indeks Pertanaman 2 (IP2). Bantuan diberikan sebanyak 20 kilogram (kg) untuk setiap hektare (Ha) lahan yang dimiliki masing-masing subak.\" \r\nBupati Buleleng, I Nyoman Sutjidra, mengatakan pemerintahannya sangat berfokus dan berkomitmen mewujudkan kemandirian pangan di Gumi Panji Sakti. Pemkab Buleleng juga berkolaborasi dengan berbagai pihak dalam mewujudkan kemandirian pangan.\"\r\n\"Kolaborasi salah satunya dilakukan dengan Polres Buleleng, utamanya dalam penanaman pangan hortikultura, yakni jagung. Polres Buleleng telah menanam varietas jagung hibrida unggulan yang dikembangkan di Buleleng, Jagung Goak Poleng.\" \r\n\"Sutjidra menegaskan ketersediaan benih padi dan jagung di Buleleng dalam keadaan cukup dan telah disebarluaskan. Pemkab Buleleng dalam waktu dekat juga akan memanen padi varietas baru asli Buleleng… Ia berpesan kepada para petani untuk mempertahankan sawahnya dan tidak melakukan alih fungsi lahan.\" \r\nKepala Dinas Pertanian Buleleng, Gede Melandrat, mengungkapkan capaian hasil produksi di Buleleng selalu mencapai target. \"Sudah dilakukan panen gabah pada lahan seluas 9 ribu hektare pada masa tanam pertama atau IP1 dan sebanyak 57 ton di antaranya diambil oleh Bulog.\"', 'artikel/WSPymdI7u5woVLeHXAb45RS1bx3ceToh2rGEvjRz.jpg', 1, '2025-07-28 22:54:23', '2025-07-28 22:54:23'),
(10, 'Khofifah: Produksi Padi Jatim Tertinggi, Siap Wujudkan Kedaulatan Pangan', 'Pertanian', 'Gubernur Jawa Timur (Jatim) Khofifah Indar Parawansa menyatakan bahwa potensi produksi padi di Jatim pada periode Januari-Juli 2025 diprediksi mencapai 8,78 juta ton Gabah Kering Panen (GKP). Angka ini menunjukkan kenaikan signifikan dibandingkan periode yang sama tahun sebelumnya, yakni 7.754.335 ton GKP di tahun 2024. Pencapaian ini merujuk pada data sementara yang dirilis oleh Badan Pusat Statistik (BPS) per 2 Juni 2025.\r\nDengan potensi produksi ini, Jawa Timur menempati peringkat tertinggi secara nasional, mengungguli provinsi lain seperti Jawa Tengah (8,89 juta ton), Jawa Barat (8,63 juta ton), Sulawesi Selatan (4,82 juta ton), dan Sumatera Selatan (2,91 juta ton).\r\nKhofifah menegaskan bahwa Jawa Timur siap memberikan upaya maksimal untuk bersama-sama mewujudkan ketahanan pangan nasional, bahkan bergerak menuju kedaulatan pangan. Kedaulatan pangan ini dapat diraih berkat peran, dukungan, kekompakan, dan kerja keras seluruh bupati, wali kota, Gabungan Kelompok Tani (Gapoktan), termasuk Himpunan Kerukunan Tani Indonesia (HKTI).\r\nBeliau juga mengapresiasi peran aktif HKTI dalam mendukung produksi pangan nasional, menyebutkan bahwa Bojonegoro mencatat produksi padi tertinggi di Jawa Timur, sementara Ngawi memiliki produktivitas tertinggi. Selain itu, Jatim juga mencetak rekor dengan menyumbang 25% luas tanam padi nasional pada April 2025.\r\nSelain itu, Gubernur Khofifah juga menyebutkan komitmen dalam menyediakan pangan berkualitas untuk masyarakat Jatim, yang dibuktikan dengan diraihnya peringkat pertama nasional Indeks Keamanan Pangan Segar. Ia juga menyoroti pentingnya bibit unggul untuk tanaman pangan dan upaya regenerasi bibit unggul di bidang peternakan, termasuk mendorong program inseminasi buatan untuk meningkatkan kualitas genetika sapi lokal.', 'artikel/vGEsSJlVNmaFRDwKDs8Y7PsT2B4r7YivR2DxAb9H.jpg', 1, '2025-07-28 23:00:32', '2025-07-28 23:00:32'),
(11, '50 Hektare Padi-Tambak Udang di Lombok Tengah Terendam Banjir', 'Gagal Panen', 'Sekitar 50 hektare tanaman padi milik warga di Desa Kidang, Kecamatan Praya Timur, Lombok Tengah, terendam banjir sejak Senin (10/2/2025). Selain itu, tambak ikan dan udang milik masyarakat di sana juga terdampak.\r\n\r\n\"Banjir kali ini, bukan hanya mengakibatkan 120 lebih rumah warga kami terendam banjir. Tapi mengakibatkan kerugian materi yang cukup besar,\" kata Kepala Desa Kidang, Tarnadi, kepada detikBali, Rabu (12/2/2025).\r\n\r\nMenurut Tarnadi, banjir paling parah terjadi di tiga dusun, yakni Dusun Batu Berungguk, Belonsong, dan Dusun Peras. Di sana, ketinggian air hampir mencapai dua meter.\r\n\r\n\"Sekitar 95 persen dari tambak ini juga ada isinya. Dan tak sedikit, sebentar lagi akan panen,\" ujarnya.\r\n\r\nTarnadi menaksir kerugian yang dialami masyarakat berkisar ratusan juta rupiah. Ia pun berharap agar banjir yang melanda desanya segera surut dan tidak terulang kembali.\r\n\r\n\"Bisa dibayangkan kerugian warga, ada ratusan juta. Untuk sementara, kami hanya bisa berharap agar bencana ini bisa segera reda,\" imbuhnya.\r\n\r\nDiberitakan sebelumnya, Badan Meteorologi, Klimatologi dan Geofisika (BMKG) Mataram mengeluarkan peringatan dini ancaman cuaca buruk tanggal 10-13 Februari 2025. Peringatan dini itu berlaku di 10 kabupaten kota di NTB.\r\n\r\n\"Hasil analisis bibit siklon tropis 96S ada di perairan sebelah barat Australia. Ada perlambatan kecepatan angin (konvergensi), serta pertemuan dan belokan angin di wilayah NTB,\" terang Kepala Stasiun Meteorologi Zainul Abdul Majid Satria Topan Primadi.', 'artikel/1jlXqNvETUAH60C6gZt23U3arnqjwl5v83WV24mW.jpg', 1, '2025-07-28 23:10:24', '2025-07-28 23:10:24'),
(12, 'Ratusan Hektare Sawah di Kudus Gagal Panen Akibat Terendam Banjir', 'Gagal Panen', 'Ratusan hektare lahan pertanian atau sawah di Desa Wonosoco, Kecamatan Undaan, Kabupaten Kudus, terendam banjir. Akibatnya, para petani mengalami gagal panen dengan perkiraan kerugian mencapai ratusan juta rupiah.\r\n\r\nKepala Desa Wonosoco, Setiya Budi, pada Rabu (1/12/2021) menjelaskan bahwa banjir ini merupakan bencana rutin. Genangan di sawah tersebut berdampak pada banyak kelompok tani, meliputi sekitar 150-200 hektare lahan. Banjir sudah menggenangi lahan pertanian warga selama hampir satu bulan, diawali oleh banjir bandang pada awal November 2021. Kondisi ini diperparah oleh dangkalnya Sungai Londo yang berada di sekitar persawahan.\r\n\r\nTanaman padi milik petani yang terendam banjir baru berusia sekitar 1,5 bulan dan mengalami gagal total. Kerugian diperkirakan mencapai ratusan juta rupiah.\r\n\r\nSetiya Budi berharap adanya perhatian dari pemerintah daerah, seperti bantuan bagi petani dan normalisasi Sungai Londo. Normalisasi sungai sangat penting karena sungai tersebut merupakan satu-satunya jalur untuk melancarkan aliran genangan. Tanpa normalisasi, petani akan terus terancam gagal panen, meskipun mereka sudah berupaya semangat untuk menanam.', 'artikel/Nw4AVWDH5Ou4ZMhsTvrSv6cFcdr70ye2tt18s1Oi.jpg', 1, '2025-07-28 23:13:25', '2025-07-28 23:14:42'),
(13, 'Mari Tepuk Tangan! RI Ternyata Penghasil Jambu Terbesar di Dunia', 'Indonesia Emas', 'Jakarta, CNBC Indonesia - Siapa sangka buah yang tampak sederhana di pasar tradisional ini ternyata jadi primadona global? Ya, guava atau jambu biji, bukan hanya sekadar camilan sehat, tapi juga komoditas agrikultur yang menggerakkan perekonomian berbagai negara tropis. Indonesia kini tercatat sebagai produsen guava terbesar di dunia, mengalahkan negara-negara besar lain.\r\n\r\nIndonesia, Raja Guava Dunia\r\nDengan iklim tropis yang stabil dan tanah vulkanik subur, Indonesia memanen sekitar 26,3 juta ton guava setiap tahun, jauh meninggalkan pesaingnya. Jambu biji tumbuh hampir di seluruh wilayah, dari kebun komersial hingga pekarangan rumah. Guava di Indonesia sudah menjadi bagian dari keseharian; buah ini dianggap \"penjaga imun\" alami, kaya vitamin C, antioksidan, dan serat. Daya adaptasinya yang tinggi membuat petani mudah membudidayakannya sepanjang tahun, baik di lahan kering maupun irigasi.\r\n\r\nMeskipun Indonesia mendominasi, beberapa negara lain juga memainkan peran penting di pasar global:\r\n\r\nIran menanam guava di kawasan subtropis selatan seperti Hormozgan, mengubah iklim kering menjadi peluang agrikultur.\r\n\r\nChina fokus di provinsi selatan seperti Guangdong, tidak hanya untuk konsumsi segar tetapi juga bahan teh herbal dan obat tradisional.\r\n\r\nTaiwan terkenal dengan teknik budidaya modern dan kualitas premium, menjadi eksportir utama di Asia.\r\n\r\nPalestina justru menjadikan guava simbol ketahanan, meskipun lahan terbatas dan akses air minim.\r\n\r\nMeski bukan lagi juara produksi global, India tetap menjadi ikon guava klasik, menghasilkan lebih dari 17 juta ton per tahun. Varietas seperti Allahabad Safeda dan Lucknow 49 terkenal manis dan aromatik, banyak diekspor ke Asia dan Timur Tengah. India menggabungkan tradisi dengan teknologi modern untuk meningkatkan kualitas dan produktivitas. Guava di sana bukan hanya buah, tetapi juga bagian dari budaya kuliner dan pengobatan Ayurveda.\r\n\r\nTernyata kandungan Vitamin C guava empat kali lebih banyak dari jeruk, satu buah cukup untuk memenuhi 200% kebutuhan harian. Selain itu, guava diketahui serbaguna dan merupakan anti-diabetik alami; daun guava sering digunakan dalam teh herbal untuk mengontrol gula darah.\r\n\r\nDengan karakteristik panen sepanjang tahun, jambu biji menjadi sumber penghasilan stabil bagi petani kecil. Guava juga menjadi komoditas ekspor bernilai tambah. India dan Thailand, misalnya, mengekspor pulp, nektar, dan selai guava ke lebih dari 30 negara. Dengan statusnya sebagai produsen terbesar dunia, Indonesia memiliki peluang emas untuk memperkuat rantai nilai. Selain konsumsi domestik, pengembangan produk turunan bernilai tinggi dari jus premium, camilan sehat, hingga ekstrak daun untuk herbal bisa memperluas pasar ekspor.', 'artikel/MXIrI3vR16rccmOP1dW98awStNxzzfK1Y3B4fCC0.jpg', 1, '2025-07-28 23:25:57', '2025-07-28 23:26:54'),
(14, '5 Negara Penghasil Lengkeng Terbesar Dunia, RI Bersaing dengan China', 'Indonesia Emas', 'Indonesia masuk dalam jajaran lima besar negara penghasil longan atau lengkeng terbesar di dunia, sebuah pencapaian yang menandai potensi besar sektor hortikultura nasional, khususnya dalam komoditas buah tropis.\r\n\r\nChina masih menjadi raksasa dalam industri longan global, dengan produksi mencapai 1,9 juta ton per tahun. Angka ini lebih dari 30 kali lipat produksi Indonesia. Keberhasilan China didukung oleh wilayah subtropis yang ideal, terutama di provinsi-provinsi seperti Guangxi, Guangdong, Fujian, Yunnan, Sichuan, dan Hainan. Iklim hangat dan lembap dengan suhu rata-rata 22-30°C serta tanah subur menciptakan kondisi budidaya optimal. Budidaya longan di China sendiri telah berlangsung lebih dari 2.000 tahun.\r\n\r\nMeskipun demikian, sebagian besar hasil panen longan di China digunakan untuk konsumsi pasar domestik, dengan ekspor yang masih sangat terbatas. Permintaan dalam negeri yang besar menjadi fokus utama, sehingga ekspor belum menjadi prioritas.\r\n\r\nDi sisi lain, Indonesia masih kalah bersaing dengan Thailand dan Vietnam yang telah lebih dulu menembus pasar Eropa dan Asia Timur. Tantangan yang dihadapi Indonesia termasuk metode budidaya longan yang sebagian besar masih tradisional, minimnya penggunaan teknologi pertanian modern, terbatasnya fasilitas penyimpanan berpendingin, dan lemahnya manajemen pascapanen. Produksi longan di Indonesia juga sangat bergantung pada kondisi cuaca.\r\n\r\nMeskipun menghadapi tantangan tersebut, posisi Indonesia di urutan kelima dunia membuktikan bahwa ada potensi besar untuk berkembang di masa mendatang.', 'artikel/jzKxbihDGsf8NA6jYM0veHRNqJjs1zPBFdzZeUk1.jpg', 1, '2025-07-28 23:30:55', '2025-07-28 23:30:55'),
(15, 'RI Mau Borong Gandum AS Rp24,34 Triliun Sampai Tahun 2030, Demi Apa?', 'Impor Pertanian', 'Jakarta, CNBC Indonesia - Sejumlah pabrik tepung terigu di Indonesia berencana membeli setidaknya 1 juta ton gandum dari Amerika Serikat (AS). Rencana ini akan ditegaskan dalam kesepakatan yang akan ditandatangani atas nama Asosiasi Produsen Tepung Terigu Indonesia (APTIND).\r\n\r\nKesepakatan ini disebut sebagai bagian dari upaya pemerintah Indonesia untuk menghindari dampak buruk kebijakan tarif tinggi yang diberlakukan oleh Presiden AS Donald Trump terhadap impor dari berbagai negara, termasuk Indonesia. Hal ini diungkapkan oleh Menko Perekonomian RI Airlangga Hartarto, seperti dilansir kantor berita AFP pada Senin, 7 Juli 2025.\r\n\r\nMenurut Airlangga, peningkatan impor pertanian oleh Indonesia dari AS dilakukan untuk menghindari tarif yang lebih ketat jika tidak ada kesepakatan baru, yang rencananya akan mulai berlaku pada 1 Agustus 2025.\r\n\r\nKesepakatan tersebut akan memuat komitmen mengimpor 1 juta ton gandum dari AS setiap tahun selama 5 tahun ke depan, dengan nilai ditaksir mencapai US$1,25 miliar. Angka ini setara dengan Rp24,34 triliun dengan kurs Rp16.225 per dolar AS pada penutupan perdagangan Senin, 7 Juli 2025.\r\n\r\n\"Kami telah memiliki kesepakatan antara APTINDO dengan asosiasi gandum di AS, untuk pembelian 1 juta ton gandum mulai tahun 2026-2030,\" kata Ketua Umum APTINDO Franciscus (Franky) Welirang.\r\n\r\nNilai kesepakatan itu diproyeksikan mencapai US$250 juta per tahun dan rencananya akan ditandatangani di Jakarta pada Senin, 7 Juli 2025. \"Dalam konteks negosiasi tarif Indonesia, kami sebagai pelaku usaha swasta bersama pelaku usaha Amerika sepakat membuat kesepakatan,\" tambah Franky.\r\n\r\nSebelumnya, Donald Trump menyatakan akan mengumumkan tarif baru terhadap berbagai negara dan mengingatkan bahwa pungutan akan kembali dikenakan ke posisi yang lebih tinggi dari pengumuman April 2025 lalu. Tarif yang diumumkan Trump pada April 2025 lalu ditunda masa berlakunya selama 90 hari.\r\n\r\nIndonesia sendiri, meskipun merupakan mitra dagang utama AS, berpotensi menghadapi tarif sebesar 32% di luar tarif dasar sebesar 10%. Kantor perwakilan perdagangan AS mencatat bahwa pada tahun 2024, nilai perdagangan antara Indonesia dan AS menunjukkan defisit AS sebesar US$17,9 miliar, naik sekitar 5,4% dari tahun sebelumnya.\r\n\r\nDi tengah negosiasi yang masih berlangsung, Menko Airlangga berjanji akan menaikkan impor energi dan barang dari AS demi menutup defisit tersebut.', 'artikel/nehNgC0arXdPwidRQWiRfiexHpWF1xSLRvBihGv9.jpg', 1, '2025-07-28 23:34:01', '2025-07-28 23:34:01'),
(16, 'Data Baru Ungkap Produksi Jagung Terus Turun, Awal Pertanda Buruk?', 'Gagal Panen', 'Jakarta, CNBC Indonesia - Badan Pusat Statistik (BPS) mencatatkan realisasi luas panen jagung pada Mei 2025 menurun dari bulan yang sama tahun lalu menjadi 170 ribu hektare dari sebelumnya 200 ribu hektare.\r\n\r\nTak hanya itu, potensi luas panen jagung sepanjang Juni hingga Agustus 2025 pun juga diperkirakan menurun.\r\n\r\n\"Berdasarkan hasil amatan Mei 2025, potensi luas panen jagung sepanjang Juni hingga Agustus 2025 diperkirakan mencapai 0,66 juta hektare atau mengalami penurunan sebesar 0,01 juta hektare atau 2,17% dibandingkan dengan periode yang sama tahun lalu,\" ujar Deputi Statistik Bidang Distribusi dan Jasa Pudji Ismartini dalam konferensi pers BPS, Selasa (1/7/2025).\r\n\r\nSebelumnya, Senin (2/6/2025), BPS juga melaporkan telah terjadi penurunan luas panen jagung pada April 2025 menurun, diiringi dengan potensi kelanjutan penurunan pada Mei-Juli 2025. Kondisi ini memicu perkiraan produksi jagung pipilan kering yang juga akan menurun sampai Juli 2025. Terungkap, berdasarkan survei kerangka sampel area atau KSA jagung per April 2025, realisasi luas panen jagung pipilan pada April 2025 sebesar 0,23 juta hektare atau turun 19,28% dibanding April 2024.\r\n\r\nJanuari-Agustus 2025 Berpotensi Naik\r\n\r\nDi sisi lain, total luas panen jagung pipilan sepanjang Januari hingga Agustus 2025 diperkirakan seluas 1,90 juta hektare atau mengalami peningkatan sebesar 0,14 juta hektare atau 7,68% dibandingkan dengan periode yang sama tahun lalu. Perkiraan peningkatan luas panen jagung disebabkan oleh hasil dari luas panen yang tinggi pada awal tahun 2025.\r\n\r\nDengan mempertimbangkan luasan panen itu, BPS mencatat, produksi jagung pipilan kering dengan kadar air 14% (JPK KA 14%) diperkirakan akan mencapai 980 ribu ton atau turun 9,01% dibandingkan Mei tahun lalu. Sementara potensi produksi JPK KA 14% sepanjang Juni hingga Agustus pun diperkirakan mencapai 3,85 juta ton atau menurun sebesar 1,98% dibandingkan periode yang sama tahun lalu.\r\n\r\n\"Namun secara keseluruhan produksi JPK KA 14% Januari hingga Agustus diperkirakan mencapai 10,84 juta ton atau meningkat sebesar 8,16% dibandingkan Januari hingga Agustus 2024,\" ujarnya.\r\n\r\nPenurunan ini bisa jadi tantangan bagi pemerintah optimistis tidak akan ada impor jagung pada tahun 2026 nanti.', 'artikel/DpN19nZIyfiUSUZ5dA7Yu3tkwwH5W8cbqSpUzqWq.jpg', 1, '2025-07-28 23:36:39', '2025-07-28 23:36:39'),
(17, 'BPS Warning Ada Bahaya Intai Panen Padi RI', 'Ancaman Gagal Panen', 'Jakarta, 1 Juli 2025 - Badan Pusat Statistik (BPS) mengeluarkan peringatan terkait potensi bahaya yang mengintai hasil panen padi di Indonesia dalam beberapa waktu ke depan. Peringatan ini didasarkan pada analisis dan prediksi curah hujan yang berpotensi sangat tinggi di sejumlah wilayah antara bulan Mei hingga Agustus 2025, yang dikhawatirkan dapat mengganggu keberlangsungan tanaman padi.\r\n\r\nDeputi Statistik Bidang Distribusi dan Jasa BPS, Pudji Ismartini, dalam konferensi pers pada Selasa (1/7/2025), menjelaskan bahwa perlu diwaspadai perkiraan curah hujan dengan kriteria \"tinggi\" hingga \"sangat tinggi\" di beberapa daerah selama periode tersebut. Kondisi ini tentunya dapat berdampak negatif pada pertumbuhan dan hasil panen padi.\r\n\r\nMeskipun demikian, Pudji menambahkan bahwa secara umum curah hujan di seluruh wilayah Indonesia masih berada pada kriteria \"rendah sekali\" hingga \"menengah\", yang sebenarnya mendukung kegiatan budidaya tanaman padi sepanjang Mei hingga Agustus 2025. Namun, ancaman tetap ada di wilayah-wilayah tertentu.\r\n\r\nPeta Curah Hujan Berpotensi Tinggi:\r\n\r\nBerdasarkan pemaparan BPS, pada Juli 2025, curah hujan yang lebih tinggi hingga sangat tinggi diperkirakan akan terjadi di:\r\n\r\nSebagian kecil Pulau Sulawesi\r\n\r\nSebagian Maluku\r\n\r\nSebagian Maluku Utara\r\n\r\nSebagian besar Papua Barat\r\n\r\nPapua Tengah bagian Selatan\r\n\r\nPapua Selatan bagian utara\r\n\r\nSementara itu, curah hujan rendah hingga menengah diprediksi akan terjadi di sebagian besar Pulau Sumatera, sebagian besar Pulau Jawa, sebagian besar Pulau Bali-Nusra, sebagian besar Pulau Kalimantan, dan sebagian kecil Pulau Sulawesi.\r\n\r\nUntuk bulan Agustus 2025, curah hujan yang lebih tinggi hingga sangat tinggi diperkirakan akan melanda:\r\n\r\nSebagian kecil Pulau Sumatera\r\n\r\nSebagian Pulau Kalimantan\r\n\r\nSebagian kecil Maluku\r\n\r\nSebagian besar Papua Barat\r\n\r\nSebagian Papua Tengah\r\n\r\nPapua bagian barat\r\n\r\nSebagian kecil Papua Selatan\r\n\r\nSedangkan curah hujan rendah hingga menengah akan terjadi di sebagian besar Pulau Sumatera, sebagian besar Pulau Jawa, Pulau Bali-Nusra, sebagian Pulau Kalimantan, dan sebagian Pulau Sulawesi serta Papua.\r\n\r\nPeringatan dari BPS ini menjadi perhatian serius bagi sektor pertanian dan pemerintah untuk mengantisipasi potensi gangguan panen padi demi menjaga ketahanan pangan nasional.', 'artikel/zT6VRGuULI5TSoM81gPgNc9oDgQ84oSNC0YHDPT7.jpg', 1, '2025-07-29 00:20:51', '2025-07-29 00:20:51'),
(18, 'Ribuan Petani Panen Raya Melon DAVINA F1 di Nganjuk Cetak Rekor MURI test', 'rekor muri', 'Lebih dari 1.000 petani di berbagai wilayah Jawa Timur berpartisipasi dalam kegiatan panen melon DAVINA F1 di Desa Getas, Kecamatan Tanjunganom, Kabupaten Nganjuk. Kegiatan yang dilakukan serentak di lahan seluas satu hektare tersebut meraih Rekor MURI sebagai \'Panen Melon dengan Peserta Terbanyak di Indonesia.\r\nManaging Director PT East West Seed Indonesia (EWINDO), Glenn Pardede menyebut keikutsertaan para petani dalam kegiatan ini jadi ajang pembuktian langsung keunggulan melon DAVINA F1, sebagai benih unggulan dari produsen Cap Panah Merah.\r\n\r\n\"Petani perlu bukti, inilah bukti yang bisa kami berikan. Semoga nantinya bisa lebih banyak petani yang menanam melon DAVINA F1, karena hasilnya nyata,\" ungkap Glenn dalam keterangan tertulis, Jumat, (18/72025).\r\n\r\nPerwakilan Museum Rekor Dunia Indonesia (MURI), Sri Widayati menyampaikan bahwa ini kali pertama pihaknya menerima pengajuan rekor pada kategori panen melon dengan jumlah peserta atau petani terbanyak.\r\n\r\n\"MURI berkesempatan hadir langsung di Kabupaten Nganjuk untuk menyaksikan sebuah kegiatan yang luar biasa yaitu panen melon secara serentak oleh lebih dari seribu petani, tepat saat buah telah mencapai usia panen. Hal ini merupakan peristiwa yang sangat Istimewa dan layak dianugerahi Rekor MURI,\" ujar Wida.\r\n\r\nPerwakilan Museum Rekor Dunia Indonesia (MURI), Sri Widayati menyampaikan bahwa ini kali pertama pihaknya menerima pengajuan rekor pada kategori panen melon dengan jumlah peserta atau petani terbanyak.\r\n\r\n\"MURI berkesempatan hadir langsung di Kabupaten Nganjuk untuk menyaksikan sebuah kegiatan yang luar biasa yaitu panen melon secara serentak oleh lebih dari seribu petani, tepat saat buah telah mencapai usia panen. Hal ini merupakan peristiwa yang sangat Istimewa dan layak dianugerahi Rekor MURI,\" ujar Wida.', 'artikel/jSAOvDZY9x9OO90yiPJCpxEBrVmmWWBvOMUSCzI3.jpg', 1, '2025-07-30 02:02:46', '2025-07-30 02:03:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel_cache_admin1@gmail.com|125.164.24.208', 'i:1;', 1753805227),
('laravel_cache_admin1@gmail.com|125.164.24.208:timer', 'i:1753805227;', 1753805227),
('laravel_cache_cent@gmail.com|125.164.25.184', 'i:1;', 1753504255),
('laravel_cache_cent@gmail.com|125.164.25.184:timer', 'i:1753504255;', 1753504255),
('laravel_cache_pull@gmail.compull1234|180.244.139.252', 'i:2;', 1753869518),
('laravel_cache_pull@gmail.compull1234|180.244.139.252:timer', 'i:1753869518;', 1753869518),
('laravel_cache_sen@gmail.com|103.184.52.38', 'i:1;', 1753698013),
('laravel_cache_sen@gmail.com|103.184.52.38:timer', 'i:1753698013;', 1753698013);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(27, 13, 7, 1, '2025-07-25 00:01:16', '2025-07-25 00:01:16'),
(35, 9, 56, 1, '2025-07-29 09:16:15', '2025-07-29 09:16:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `comment`, `created_at`, `updated_at`) VALUES
(4, 2, 12, 'iya tahun ini adalah tahunnya petani', '2025-07-30 03:34:50', '2025-07-30 03:34:50'),
(5, 7, 12, 'aku mau 5 bibit', '2025-07-30 03:35:09', '2025-07-30 03:35:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategoris`
--

INSERT INTO `kategoris` (`id`, `nama_kategori`, `foto`, `created_at`, `updated_at`) VALUES
(11, 'Sayuran', 'kategori/19NA92KEiVSIuyeFDi0rRuhlGe9SD6YHkjIvCiSf.jpg', '2025-07-13 08:26:30', '2025-07-13 08:42:15'),
(12, 'Daging', 'kategori/0BY0OjqmyR2K7Z0gGtBwwKo9VwVGjC5nuZn7zxPz.jpg', '2025-07-13 08:41:07', '2025-07-13 08:41:07'),
(13, 'Buah Buahan', 'kategori/CUcbjFdOagy0JvdutfTBiqhxcgg6Y8k2IlIAO2wc.jpg', '2025-07-13 08:41:23', '2025-07-13 08:41:23'),
(14, 'Telur', 'kategori/h1638ceqphbQ6gKHsY66d5UzKJnAkduE9WZ2wIqc.jpg', '2025-07-13 08:41:37', '2025-07-13 08:41:37'),
(15, 'Ikan', 'kategori/9CdWaLZwlJFi1FmTi2TZYWOcJInCNfo7qyXaWK4G.jpg', '2025-07-13 08:42:08', '2025-07-13 08:42:08'),
(16, 'Susu', 'kategori/4K8pyEVSb88GaURifGOdmhJ3IRpTqGFiHHm63gkg.jpg', '2025-07-13 08:42:25', '2025-07-13 08:42:25'),
(17, 'Beras', 'kategori/iiJ9w3SPUdmlYsUSR0Vmab5TRFrWJ3LL6hhX9r7y.jpg', '2025-07-13 08:44:15', '2025-07-13 08:44:15'),
(18, 'Umbi-Umbian', 'kategori/hro9dlheofIwQt3juBHtVUBLowKe3V3hzhoBdqF4.jpg', '2025-07-14 04:54:01', '2025-07-14 04:54:01'),
(19, 'Bibit', 'kategori/TgshkPegQCcK6gYFZgUMfOfl2Hlgd8qvyBtL3ThH.jpg', '2025-07-23 21:56:55', '2025-07-23 21:56:55'),
(20, 'Minyak & Lemak', 'kategori/7HEeiPjFkUxzOdxW9w8tcWRFdoyjFCn17g5dcrbR.jpg', '2025-07-24 07:47:25', '2025-07-24 07:47:25'),
(21, 'Kacang - Kacangan', 'kategori/Sg41KPF6UKvVvypmVDMxBPfxTG7y0lkGGB5fBdIG.jpg', '2025-07-24 07:48:36', '2025-07-24 07:48:49'),
(22, 'Rempah & Herbal', 'kategori/UrLgpdAks63R5R3BMROdFdpZFcyDDT1LvJ1DLdzn.jpg', '2025-07-24 07:52:35', '2025-07-24 07:52:35'),
(23, 'Pupuk & Bibit', 'kategori/H1BipiHCfgPvMPtJhSsvZfjqGCZma8HVWszgO9OM.jpg', '2025-07-30 00:55:30', '2025-07-30 00:55:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_07_06_141529_add_role_to_users_table', 1),
(5, '2025_07_06_152732_create_posts_table', 1),
(6, '2025_07_06_161534_create_comments_table', 1),
(7, '2025_07_06_205424_add_image_to_posts_table', 1),
(8, '2025_07_10_034242_create_kategoris_table', 1),
(9, '2025_07_10_162612_create_products_table', 1),
(10, '2025_07_13_103329_add_is_featured_to_posts_table', 1),
(12, '2025_07_13_132332_drop_slug_from_products_table', 2),
(13, '2025_07_13_134742_drop_username_from_users_table', 2),
(14, '2025_07_13_151122_drop_slug_from_kategoris_table', 3),
(15, '2025_07_13_164901_create_reviews_table', 4),
(16, '2025_07_14_140503_create_carts_table', 5),
(17, '2025_07_14_165339_add_alamat_rekening_to_users_table', 6),
(19, '2025_07_14_182156_create_orders_table', 7),
(20, '2025_07_14_184917_create_order_items_table', 8),
(21, '2025_07_14_185132_add_ongkir_to_orders_table', 9),
(22, '2025_07_14_185306_add_bank_code_to_orders_table', 10),
(23, '2025_07_15_171824_add_bukti_transfer_to_orders_table', 11),
(24, '2025_07_17_182313_add_foto_to_users_table', 12),
(25, '2025_07_19_180735_create_artikels_table', 13),
(26, '2025_07_20_171233_create_videos_table', 14),
(27, '2025_07_20_171320_create_video_comments_table', 14),
(28, '2025_07_20_171344_create_video_likes_table', 14),
(29, '2025_07_23_225026_add_otp_to_users_table', 15),
(30, '2025_07_23_225320_add_otp_columns_to_users_table', 16),
(31, '2025_07_24_012918_add_is_hot_deal_to_products_table', 17),
(32, '2025_07_24_013909_add_promo_columns_to_products_table', 18),
(33, '2025_07_24_014219_add_promo_diskon_to_products_table', 19),
(34, '2025_07_24_020836_add_hotdeal_fields_to_products_table', 20),
(35, '2025_07_24_021246_drop_promo_columns_from_products_table', 21),
(36, '2025_07_24_022659_add_jumlah_terjual_to_products_table', 22),
(37, '2025_07_28_183237_create_transfer_petani_table', 23),
(38, '2025_07_28_183456_add_transfer_petani_id_to_order_items_table', 24),
(39, '2025_07_28_194237_drop_transfer_petani_table', 25),
(40, '2025_07_28_194930_drop_transfer_petani_id_from_order_items_table', 25),
(41, '2025_07_28_195051_drop_transfer_petani_id_from_order_items_table', 25),
(43, '2025_07_28_195853_create_transfer_petani_table', 26),
(44, '2025_07_28_202500_add_bukti_transfer_to_transfer_petani_table', 27),
(45, '2025_07_28_203555_rename_bukti_transfer_to_foto_transfer_on_transfer_petani_table', 28),
(46, '2025_07_29_154731_add_is_promo_to_products_table', 29);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nama_penerima` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `kode_pos` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `total` decimal(15,2) NOT NULL DEFAULT 0.00,
  `ongkir` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `bukti_transfer` varchar(255) DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `bank_code` varchar(32) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `nama_penerima`, `alamat`, `kota`, `provinsi`, `kode_pos`, `no_hp`, `total`, `ongkir`, `status`, `bukti_transfer`, `payment_method`, `catatan`, `bank_code`, `created_at`, `updated_at`) VALUES
(1, 2, 'Yogi', 'Mekarjaya', 'Subang', 'Jawa Barat', '41258', '081224158753', 102000.00, 25000, 'pending', NULL, NULL, NULL, 'bca', '2025-07-14 11:57:40', '2025-07-14 11:57:40'),
(2, 2, 'Yogi', 'Mekarjaya', 'Subang', 'Jawa Barat', '41258', '081224158753', 135000.00, 25000, 'pending', NULL, NULL, NULL, 'bca', '2025-07-14 12:00:04', '2025-07-14 12:00:04'),
(3, 2, 'Yogi', 'Mekarjaya', 'Subang', 'Jawa Barat', '41258', '081224158753', 54000.00, 25000, 'pending', NULL, NULL, NULL, 'mandiri', '2025-07-14 20:17:00', '2025-07-14 20:17:00'),
(4, 2, 'Yogi', 'Mekarjaya', 'Subang', 'Jawa Barat', '41258', '081224158753', 58000.00, 25000, 'paid', 'bukti_transfer/qXnCfyzP2UheScARnuycVV8i7WfqXM1U665CGCfg.jpg', NULL, NULL, 'bca', '2025-07-15 09:56:29', '2025-07-29 09:34:55'),
(5, 2, 'Yogi', 'Mekarjaya', 'Subang', 'Jawa Barat', '41258', '081224158753', 50000.00, 25000, 'verified', 'bukti_transfer/HNKDrdTVgQd1rH12s3VPJGV696IYRPgJGB8kjJev.jpg', NULL, NULL, 'bri', '2025-07-15 10:06:20', '2025-07-15 11:23:19'),
(6, 2, 'Yogi', 'Mekarjaya', 'Subang', 'Jawa Barat', '41258', '081224158753', 43000.00, 25000, 'cancelled', 'bukti_transfer/Q9nXzp3WjjezgZx2oX7bLJ2TsHWXNhenRlGzj2ip.jpg', NULL, 'Pembayaran Lewat agen', 'bri', '2025-07-15 10:36:37', '2025-07-15 11:26:04'),
(7, 2, 'Yogi', 'Mekarjaya', 'Subang', 'Jawa Barat', '41258', '081224158753', 242000.00, 25000, 'cancelled', 'bukti_transfer/CZoD5nOLbbG6nK05P6EIW1RQWjDbky1HFn9JDX8p.png', NULL, 'bayar Pakai foto ini boleh ngk?', 'mandiri', '2025-07-15 11:32:02', '2025-07-15 11:33:02'),
(8, 2, 'Yogi', 'Mekarjaya', 'Subang', 'Jawa Barat', '41258', '081224158753', 58000.00, 25000, 'cancelled', 'bukti_transfer/waCyPxSNGjbYMkicwD7NzLV8ZXrDKOESjnSyGdVo.jpg', NULL, 'buat nyambel', 'bca', '2025-07-16 02:18:34', '2025-07-16 02:23:36'),
(9, 3, 'Elsa', 'Subang', 'Subang', 'Jawa Barat', '24145', '081222222', 91000.00, 25000, 'verified', 'bukti_transfer/TojrNoRfrZCaXvuqIidf7OZ8lEnZz4LwFzrEWIux.jpg', NULL, NULL, 'bca', '2025-07-18 11:35:22', '2025-07-28 11:19:38'),
(10, 3, 'Elsa', 'Subang', 'Subang', 'Jawa Barat', '24145', '081222222', 225000.00, 25000, 'cancelled', 'bukti_transfer/OoQeterGZKbhUJg5teUmhd1mNfzPLzjhIq7gnicc.png', NULL, 'memberikan daging yang premium', 'mandiri', '2025-07-23 00:31:08', '2025-07-28 11:17:35'),
(11, 9, 'qarel', 'utb', '.', '.', '.', '.', 36000.00, 25000, 'verified', 'bukti_transfer/qSlR6Y4fmVD2yVbsaUnz8fE99wrRGYbsgaYJSTOa.png', NULL, 'berasnya yang bagus ya buat anak ayam saya', 'bca', '2025-07-24 06:20:10', '2025-07-24 06:22:15'),
(12, 9, 'qarel', 'utb', '.', '.', '.', '.', 45000.00, 25000, 'cancelled', 'bukti_transfer/907bdRWgPK41PJWUQ3QHBHzcd0kqcvWCmiRaA81R.jpg', NULL, 'yang panjang panjang yah pisangnya kayak punya saya', 'bca', '2025-07-24 06:23:27', '2025-07-24 06:23:49'),
(13, 3, 'Elsa', 'Subang', 'Subang', 'Jawa Barat', '24145', '081222222', 225000.00, 25000, 'pending', NULL, NULL, 'tes', 'bca', '2025-07-24 06:34:50', '2025-07-24 06:34:50'),
(14, 3, 'Elsa', 'Subang', 'Subang', 'Jawa Barat', '24145', '081222222', 225000.00, 25000, 'pending', NULL, NULL, NULL, 'bca', '2025-07-24 06:43:16', '2025-07-24 06:43:16'),
(15, 2, 'Yogi', 'Mekarjaya', 'Subang', 'Jawa Barat', '41258', '081224158753', 250000.00, 25000, 'verified', 'bukti_transfer/puOAQmmj58ViQDfsUiz8HTilRj1XOaG8JGKz62wG.jpg', NULL, NULL, 'bca', '2025-07-28 11:08:30', '2025-07-28 11:19:18'),
(16, 2, 'Yogi', 'Mekarjaya', 'Subang', 'Jawa Barat', '41258', '081224158753', 1089000.00, 25000, 'paid', 'bukti_transfer/N0tVeuO3jdzB4AdIyFwNMWwdGm1MjV44tmeavgyd.png', NULL, NULL, 'bca', '2025-07-28 11:24:32', '2025-07-28 11:25:00'),
(17, 2, 'Yogi', 'Mekarjaya', 'Subang', 'Jawa Barat', '41258', '081224158753', 1025000.00, 25000, 'verified', 'bukti_transfer/ildSnAttZAjb2HYPUTyaL5pS4e0YGQ6VLwC5TLwe.png', NULL, NULL, 'bca', '2025-07-28 11:25:26', '2025-07-29 08:25:33'),
(18, 2, 'Yogi', 'Mekarjaya', 'Subang', 'Jawa Barat', '41258', '081224158753', 1025000.00, 25000, 'verified', 'bukti_transfer/sAK6IO7JcPk5sd6FoNoS08LNMUlalG9Z0zahExYx.jpg', NULL, NULL, 'bca', '2025-07-28 12:15:48', '2025-07-29 08:24:22'),
(19, 3, 'Elsa', 'Subang', 'Subang', 'Jawa Barat', '24145', '081222222', 1036000.00, 25000, 'verified', 'bukti_transfer/uuWIcbv9oAoMu3r5vBmNblOlvlnxIaOsESr1lfZQ.jpg', NULL, 'Pull', 'mandiri', '2025-07-29 08:24:10', '2025-07-29 08:25:15'),
(20, 2, 'Yogi', 'Mekarjaya', 'Subang', 'Jawa Barat', '41258', '081224158753', 115000.00, 25000, 'paid', 'bukti_transfer/2yReqETRJSJaGwnq4oBn9d187nTclmqY3Ujc2o9M.jpg', NULL, NULL, 'bca', '2025-07-29 09:33:51', '2025-07-29 09:34:10'),
(21, 12, 'pull', 'uyyuu', 'kkkkk', 'kkklk', 'jjjj9999', '887888', 130000.00, 25000, 'pending', NULL, NULL, NULL, 'bca', '2025-07-29 10:17:01', '2025-07-29 10:17:01'),
(22, 2, 'Yogi', 'Mekarjaya', 'Subang', 'Jawa Barat', '41258', '081224158753', 35000.00, 25000, 'verified', 'bukti_transfer/bbHMcp4OkAU1Hhm5gZcorbjln6Fl0dr3F888Kurj.jpg', NULL, NULL, 'bca', '2025-07-30 00:57:27', '2025-07-30 00:58:15'),
(23, 2, 'Yogi', 'Mekarjaya', 'Subang', 'Jawa Barat', '41258', '081224158753', 65000.00, 25000, 'pending', NULL, NULL, NULL, 'mandiri', '2025-07-30 01:04:38', '2025-07-30 01:04:38'),
(24, 2, 'Yogi', 'Mekarjaya', 'Subang', 'Jawa Barat', '41258', '081224158753', 275000.00, 25000, 'verified', 'bukti_transfer/MV4mQ4sUWgkGXr662XsubzJTb36IFd1nT9vMc9Wd.jpg', NULL, NULL, 'bri', '2025-07-30 01:15:24', '2025-07-30 01:16:19'),
(25, 12, 'Ipul', 'uyyuu', 'kkkkk', 'kkklk', 'jjjj9999', '887888', 100025000.00, 25000, 'paid', 'bukti_transfer/1Q1RAV8A2cu2oxUCUD4hVYSX0kdQLoRw5075I761.jpg', NULL, 'aku mau 100', 'bca', '2025-07-30 03:41:10', '2025-07-30 03:41:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `harga_satuan` bigint(20) UNSIGNED NOT NULL,
  `subtotal` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `harga_satuan`, `subtotal`, `created_at`, `updated_at`) VALUES
(1, 1, 6, 3, 11000, 33000, '2025-07-14 11:57:41', '2025-07-14 11:57:41'),
(3, 2, 6, 10, 11000, 110000, '2025-07-14 12:00:04', '2025-07-14 12:00:04'),
(4, 3, 6, 1, 11000, 11000, '2025-07-14 20:17:00', '2025-07-14 20:17:00'),
(5, 3, 7, 1, 18000, 18000, '2025-07-14 20:17:00', '2025-07-14 20:17:00'),
(7, 5, 5, 1, 25000, 25000, '2025-07-15 10:06:20', '2025-07-15 10:06:20'),
(8, 6, 7, 1, 18000, 18000, '2025-07-15 10:36:37', '2025-07-15 10:36:37'),
(12, 9, 6, 6, 11000, 66000, '2025-07-18 11:35:22', '2025-07-18 11:35:22'),
(13, 10, 15, 1, 200000, 200000, '2025-07-23 00:31:08', '2025-07-23 00:31:08'),
(14, 11, 6, 1, 11000, 11000, '2025-07-24 06:20:10', '2025-07-24 06:20:10'),
(15, 12, 71, 1, 20000, 20000, '2025-07-24 06:23:27', '2025-07-24 06:23:27'),
(16, 13, 15, 1, 200000, 200000, '2025-07-24 06:34:50', '2025-07-24 06:34:50'),
(17, 14, 15, 1, 200000, 200000, '2025-07-24 06:43:16', '2025-07-24 06:43:16'),
(18, 15, 15, 1, 200000, 200000, '2025-07-28 11:08:30', '2025-07-28 11:08:30'),
(19, 15, 5, 1, 25000, 25000, '2025-07-28 11:08:30', '2025-07-28 11:08:30'),
(20, 16, 76, 1, 1000000, 1000000, '2025-07-28 11:24:32', '2025-07-28 11:24:32'),
(21, 16, 53, 8, 8000, 64000, '2025-07-28 11:24:32', '2025-07-28 11:24:32'),
(22, 17, 76, 1, 1000000, 1000000, '2025-07-28 11:25:26', '2025-07-28 11:25:26'),
(23, 18, 76, 1, 1000000, 1000000, '2025-07-28 12:15:48', '2025-07-28 12:15:48'),
(24, 19, 76, 1, 1000000, 1000000, '2025-07-29 08:24:10', '2025-07-29 08:24:10'),
(25, 19, 6, 1, 11000, 11000, '2025-07-29 08:24:10', '2025-07-29 08:24:10'),
(26, 20, 81, 3, 30000, 90000, '2025-07-29 09:33:51', '2025-07-29 09:33:51'),
(27, 21, 86, 3, 35000, 105000, '2025-07-29 10:17:01', '2025-07-29 10:17:01'),
(28, 22, 87, 1, 10000, 10000, '2025-07-30 00:57:27', '2025-07-30 00:57:27'),
(29, 23, 87, 4, 10000, 40000, '2025-07-30 01:04:38', '2025-07-30 01:04:38'),
(30, 24, 87, 1, 10000, 10000, '2025-07-30 01:15:24', '2025-07-30 01:15:24'),
(31, 24, 82, 1, 20000, 20000, '2025-07-30 01:15:24', '2025-07-30 01:15:24'),
(32, 24, 47, 1, 20000, 20000, '2025-07-30 01:15:24', '2025-07-30 01:15:24'),
(33, 24, 15, 1, 200000, 200000, '2025-07-30 01:15:24', '2025-07-30 01:15:24'),
(34, 25, 76, 100, 1000000, 100000000, '2025-07-30 03:41:10', '2025-07-30 03:41:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('vincentsammuel00@gmail.com', '$2y$12$bPqSi6Zae4KAkvRH10Lqpu2qetOOpKZVZsVYChJsKpXM0vhGbLug2', '2025-07-30 00:31:32'),
('wildamanam@gmail.com', '$2y$12$GTKFe.hOpfs8TSAPH64j9e2BnV5Y2V0JdvezR6/MqAgTnRoHXY3ti', '2025-07-30 00:33:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `content`, `is_featured`, `created_at`, `updated_at`, `image`) VALUES
(2, 2, NULL, 'Untuk Panen Hari ini sangat untung', 0, '2025-07-15 11:42:45', '2025-07-15 11:42:45', NULL),
(7, 3, NULL, 'Bibit padi unggul untuk hasil panen yang maksimal! 🌾💚 Dengan kualitas yang terjamin dan produktivitas yang tinggi, bibit padi ini dapat membantu meningkatkan hasil panen Anda. Bagikan dengan teman-teman petani dan mari kita tingkatkan produktivitas pertanian bersama! 🌟', 0, '2025-07-29 08:34:06', '2025-07-29 08:34:06', 'forum_images/A2hL6RA9Bp4U5xdnlRNY93NmNG1itXL3quNE2cos.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga` decimal(12,2) NOT NULL,
  `stok` int(11) NOT NULL DEFAULT 0,
  `jumlah_terjual` int(11) NOT NULL DEFAULT 0,
  `satuan` varchar(20) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kategori_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('aktif','tidak_aktif') NOT NULL DEFAULT 'aktif',
  `is_verified` tinyint(1) NOT NULL DEFAULT 0,
  `diskon` decimal(12,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_hot_deal` tinyint(1) NOT NULL DEFAULT 0,
  `hot_deal_expired_at` timestamp NULL DEFAULT NULL,
  `is_promo` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `nama_produk`, `harga`, `stok`, `jumlah_terjual`, `satuan`, `deskripsi`, `foto`, `user_id`, `kategori_id`, `status`, `is_verified`, `diskon`, `created_at`, `updated_at`, `is_hot_deal`, `hot_deal_expired_at`, `is_promo`) VALUES
(5, 'Bawang Merah', 25000.00, 30, 0, 'kg', 'Bawang merah segar langsung dari petani.', 'produk/Rdu5FqchZUQyQHpIAr2O9vgkPyzc19V8JtfV6p0I.jpg', 6, 18, 'aktif', 1, NULL, '2025-07-13 14:23:54', '2025-07-23 18:57:42', 0, NULL, 0),
(6, 'Beras Super', 11000.00, 50, 0, 'kg', 'Selamat datang di toko kami!', 'produk/Wx0PMObpsZvwPcQTSE7sxeb7b2fGKkd96psdeq23.jpg', 2, 17, 'tidak_aktif', 1, NULL, '2025-07-13 14:23:54', '2025-07-29 08:37:25', 1, '2025-07-31 08:37:25', 0),
(7, 'Brokoli Segar', 18000.00, 20, 0, 'kg', 'Brokoli hijau segar dan sehat.', 'produk/67kM8NjmrE173G5CwoAwI7MR13q4VDEvawSYVK6K.jpg', 2, 11, 'aktif', 1, NULL, '2025-07-13 14:23:54', '2025-07-29 08:05:29', 0, NULL, 0),
(15, 'Daging Sapi Premium', 200000.00, 100, 0, 'kg', 'Daging sapi menjadi salah satu sumber zat besi yang baik untuk kesehatan tubuh. Saat kebutuhan zat besi dalam tubuh terpenuhi, kondisi ini membuat tubuh mampu memproduksi hemoglobin secara optimal. Adapun, hemoglobin adalah protein yang membantu darah membawa oksigen dari paru-paru ke seluruh tubuh.', 'produk/rKmuNNfYHU3xhgvVDWjmCrMDOZ2rerZlwic9WwMW.jpg', 2, 12, 'aktif', 1, NULL, '2025-07-17 10:21:28', '2025-07-28 11:20:51', 0, '2025-07-25 19:10:44', 0),
(46, 'Bawang Merah', 25000.00, 30, 0, 'kg', 'Bawang merah segar langsung dari petani.', 'produk/sPSeg8y3mov0QPn6OVF1N8Gw6Nb1PZ7J37P7Ueoc.jpg', 2, 18, 'aktif', 1, NULL, NULL, '2025-07-23 21:30:32', 0, NULL, 0),
(47, 'Bawang Putih', 20000.00, 25, 2, 'kg', 'Bawang putih segar langsung dari petani.', 'produk/W7HskqTEnUHx7sTtfJhLjdUEL4SsjYkQo16qH7EW.jpg', 2, 18, 'aktif', 1, NULL, NULL, '2025-07-23 21:33:35', 0, NULL, 0),
(48, 'Cabe Rawit', 35000.00, 10, 5, 'kg', 'Cabe rawit merah pedas.', 'produk/z6Hc8nShDd1TXvZSuTMMeG8Lx2f889PkbCF5VCHR.jpg', 2, 11, 'aktif', 1, NULL, NULL, '2025-07-23 21:35:43', 0, NULL, 0),
(49, 'Tomat Segar', 12000.00, 20, 8, 'kg', 'Tomat segar dan manis.', 'produk/lopZYPKPkfdPE69SJ0Rp1apfYsQXu009XTxhcsMO.jpg', 2, 11, 'aktif', 1, 100000.00, NULL, '2025-07-29 08:05:35', 0, NULL, 0),
(50, 'Kentang', 15000.00, 40, 10, 'kg', 'Kentang kualitas super.', 'produk/J7pLfCvhUYZ16V7vqQL8UgiZMPqJ7ogMfOwgQaYM.jpg', 2, 18, 'aktif', 1, NULL, NULL, '2025-07-23 21:36:00', 0, NULL, 0),
(51, 'Brokoli Segar', 18000.00, 20, 2, 'kg', 'Brokoli hijau segar dan sehat.', 'produk/qDjR4iOFO1gzVeFCjeuf5eVr5x868Rx3nmi9kq4q.jpg', 2, 11, 'aktif', 1, NULL, NULL, '2025-07-23 21:36:12', 0, NULL, 0),
(52, 'Jagung Manis', 10000.00, 15, 7, 'kg', 'Jagung manis siap panen.', 'produk/MP880VlAjyrN1byaNSU3UVBvHIhkxMbyZwSKbD7V.jpg', 2, 11, 'aktif', 1, NULL, NULL, '2025-07-23 21:37:43', 0, NULL, 0),
(53, 'Bayam Organik', 8000.00, 18, 4, 'ikat', 'Bayam organik tanpa pestisida.', 'produk/wysNnaExmTaPBhMdUo9GFiNNRdYipCSk9b2dEEas.png', 9, 11, 'aktif', 1, NULL, NULL, '2025-07-28 11:20:29', 0, NULL, 0),
(54, 'Kangkung', 9000.00, 13, 2, 'ikat', 'Kangkung segar siap masak.', 'produk/Y4w2m4GTVJaWafpy7KYCrYpbeeh777R6zzBLZIHW.jpg', 2, 11, 'aktif', 1, NULL, NULL, '2025-07-23 21:39:45', 0, NULL, 0),
(55, 'Wortel', 14000.00, 22, 5, 'kg', 'Wortel manis dan renyah.', 'produk/BxpXMVNjJemWBuzC5hcFOXDDHITjZA56vUC3ncB9.jpg', 2, 11, 'aktif', 1, NULL, NULL, '2025-07-23 21:40:33', 0, NULL, 0),
(56, 'Sawi Hijau', 7000.00, 17, 3, 'ikat', 'Sawi hijau segar.', 'produk/zTeGaOvqt6EhVpSqMF0vK7glNAeetmr5MRLrMyQX.png', 2, 11, 'aktif', 1, NULL, NULL, '2025-07-29 08:06:42', 1, '2025-07-31 08:06:42', 0),
(57, 'Daun Bawang', 9000.00, 9, 1, 'ikat', 'Daun bawang siap olah.', 'produk/nI5w21Mvwz22TRG5OdrscINvRq1iHewAyuKNSElP.jpg', 2, 11, 'aktif', 1, NULL, NULL, '2025-07-23 21:42:11', 0, NULL, 0),
(58, 'Selada', 11000.00, 14, 4, 'ikat', 'Selada hijau segar.', 'produk/diRy3nsGRZfpKpYLzl7ZX2Sk2550crr04TrhVTx4.jpg', 2, 11, 'aktif', 1, NULL, NULL, '2025-07-23 21:43:16', 0, NULL, 0),
(59, 'Paprika Merah', 35000.00, 8, 1, 'kg', 'Paprika merah manis.', 'produk/8nrcSPnXejA8VjInRifbCoVlxEVZaQ3nEiTPTIWY.png', 2, 11, 'aktif', 1, NULL, NULL, '2025-07-23 21:43:58', 0, NULL, 0),
(60, 'Timun', 8000.00, 20, 5, 'kg', 'Timun segar dan renyah.', 'produk/Bszx7RPxZgGAiqvbhZ4bKiZaojttLWR8x5ChKGbI.jpg', 2, 11, 'aktif', 1, NULL, NULL, '2025-07-23 21:44:24', 0, NULL, 0),
(61, 'Terong', 12000.00, 11, 2, 'kg', 'Terong ungu besar.', 'produk/x2FEpVF6eB4O2d5er8bnPbViTDmHxLwAYJKd9JJ2.jpg', 2, 11, 'aktif', 1, NULL, NULL, '2025-07-23 21:44:53', 0, NULL, 0),
(62, 'Buncis', 10000.00, 13, 4, 'kg', 'Buncis segar dan muda.', 'produk/7rCz20RplK6nTS7s0jSGjIFhg7tKjocGn4PT9h64.jpg', 2, 11, 'aktif', 1, NULL, NULL, '2025-07-23 21:49:57', 0, NULL, 0),
(63, 'Labu Kuning', 16000.00, 10, 3, 'kg', 'Labu kuning manis.', 'produk/XpUjZ4uhRJzX7qvceKUKnBfjiSQYyxehrQVfjp5v.jpg', 2, 13, 'aktif', 1, NULL, NULL, '2025-07-23 21:50:43', 0, NULL, 0),
(64, 'Kacang Panjang', 9000.00, 15, 4, 'ikat', 'Kacang panjang segar.', 'produk/iYVP8ThK2z5Was2NMWfCaDI2YZDDgVF66VA1cstF.jpg', 2, 11, 'aktif', 1, NULL, NULL, '2025-07-23 21:51:02', 0, NULL, 0),
(65, 'Seledri', 8000.00, 8, 1, 'ikat', 'Seledri segar siap konsumsi.', 'produk/TYU8XSfIQEvFksxyAVgV9jK2qvPRg7RaHdonc5rB.jpg', 2, 11, 'aktif', 1, NULL, NULL, '2025-07-23 21:51:17', 0, NULL, 0),
(66, 'Salak', 22000.00, 20, 2, 'kg', 'Salak manis dan segar.', 'produk/lG5xo6IlgiofiZoTjhGbX2pkQF1fw3iFO8gX5IOZ.jpg', 2, 13, 'aktif', 1, NULL, NULL, '2025-07-29 08:05:44', 0, NULL, 0),
(67, 'Pepaya', 17000.00, 12, 3, 'kg', 'Pepaya matang dan manis.', 'produk/T87gMYGsIzLaoJuaU4EXocd2pMKvO0vdfwMBGEQG.jpg', 2, 13, 'aktif', 1, NULL, NULL, '2025-07-23 21:52:01', 0, NULL, 0),
(68, 'Semangka', 25000.00, 6, 1, 'kg', 'Semangka merah segar.', 'produk/fPlE86WuBpHpLCU3a2nq5RH03yLF8M8ezS4D6Yhh.jpg', 2, 13, 'aktif', 1, NULL, NULL, '2025-07-23 21:52:18', 0, NULL, 0),
(69, 'Melon', 23000.00, 7, 2, 'kg', 'Melon hijau manis.', 'produk/U2tjpwUqqf2KAEoHZLniTMDekZT438nAdrLSwdAu.jpg', 2, 13, 'aktif', 1, NULL, NULL, '2025-07-23 21:52:33', 0, NULL, 0),
(70, 'Alpukat', 28000.00, 10, 3, 'kg', 'Alpukat mentega berkualitas.', 'produk/sNS1vmBPnQpigB0kQYB4D7XuSH603dg3PwNhmllt.jpg', 2, 13, 'aktif', 1, NULL, NULL, '2025-07-23 21:52:45', 0, NULL, 0),
(71, 'Pisang Raja', 20000.00, 20, 2, 'sisir', 'Pisang Raja matang pohon.', 'produk/09TTGHA0FoZAnyloosbJrwhq8clmrvYCwOHkNQUx.jpg', 2, 13, 'aktif', 1, NULL, NULL, '2025-07-23 21:53:03', 0, NULL, 0),
(72, 'Mangga Manalagi', 26000.00, 18, 4, 'kg', 'Mangga manis dan harum.', 'produk/6iAwVD6IkZAkEfA92nnSLnLgQpKnkLT3Yf72ksjr.png', 2, 13, 'aktif', 1, NULL, NULL, '2025-07-23 21:48:39', 0, NULL, 0),
(73, 'Jeruk Medan', 22000.00, 19, 3, 'kg', 'Jeruk Medan segar dan manis.', 'produk/Xrc4WaGW29ua9Gm2Yf50nWCG260XoCJNQHyzdVSY.jpg', 2, 13, 'aktif', 1, NULL, NULL, '2025-07-23 21:48:58', 0, NULL, 0),
(74, 'Nanas Madu', 18000.00, 8, 1, 'kg', 'Nanas madu segar.', 'produk/o0yanuF0uAuvr2qTkGcFxzc9vwRkHQdUEM8PAbXt.jpg', 2, 13, 'aktif', 1, NULL, NULL, '2025-07-23 21:49:24', 0, NULL, 0),
(75, 'Anggur', 55000.00, 12, 2, 'kg', 'Anggur manis import.', 'produk/lXZCT8zXB5KevhfDIm3BYSlMsUhAuFG8tFhcZIT0.jpg', 2, 13, 'aktif', 1, NULL, NULL, '2025-07-29 08:06:26', 1, '2025-07-31 08:06:26', 0),
(76, 'Daging Sapi Segar Potong Dadu', 1000000.00, 100, 0, 'kg', 'Daging sapi segar potong dadu adalah pilihan ideal bagi Anda yang menginginkan bahan masakan berkualitas tinggi untuk hidangan sehari-hari maupun spesial. Potongan ini berasal dari bagian daging sapi pilihan, dipotong dalam bentuk kubus seragam untuk memudahkan dalam proses memasak.\r\n\r\nCiri-ciri:\r\nWarna: Merah cerah menandakan kesegaran alami tanpa bahan pengawet.\r\nTekstur: Kenyal dan padat, cocok untuk berbagai metode memasak seperti ditumis, dibuat sup, semur, atau sate.\r\nUkuran Potongan: Seragam, sekitar 2–3 cm, memudahkan pematangan merata.\r\nAroma: Mengeluarkan aroma khas daging sapi segar, tanpa bau amis atau asam.\r\n\r\nManfaat:\r\nSumber protein hewani yang tinggi untuk membangun otot dan jaringan tubuh.\r\nMengandung zat besi, seng, dan vitamin B12 yang penting untuk kesehatan darah dan sistem saraf.\r\n\r\nSaran Penyajian:\r\nCocok untuk dibuat semur daging, sop daging, rendang, tongseng, atau ditumis dengan sayuran dan saus favorit Anda.\r\nSimpan di lemari pendingin maksimal 2 hari atau bekukan untuk pemakaian jangka panjang.\r\n\r\nKeterangan Tambahan:\r\nTanpa pengawet\r\nTelah melalui proses higienis dan pemotongan halal\r\nBisa dipesan sesuai berat yang diinginkan', 'produk/Jo3ZxrP94Om1PWGXWHyu6zX0uu0dn34v9Vv0m3V8.jpg', 11, 12, 'aktif', 1, 1000.00, '2025-07-24 05:39:37', '2025-07-24 08:20:38', 0, NULL, 0),
(77, 'Telur Ayam Negeri', 24000.00, 100, 0, 'kg', 'Asli Pertanian Jombang', 'produk/ZCpuyxpGldM8orVRB20lq9usmZ9wWflmT8sL0yQw.jpg', 6, 14, 'aktif', 1, NULL, '2025-07-29 08:49:50', '2025-07-29 08:53:33', 1, '2025-07-31 08:53:33', 0),
(78, 'Telor Asin Premium', 80000.00, 200, 0, 'kg', 'Telur Asin Premium – Cita Rasa Gurih, Kualitas Istimewa\r\nNikmati kelezatan Telur Asin Premium yang dibuat dari telur bebek pilihan, melalui proses pengasinan tradisional yang higienis dan terkontrol. Setiap butir telur asin diproses secara hati-hati untuk menghasilkan rasa gurih yang seimbang, tekstur kuning telur yang lembut, dan tampilan yang menggugah selera.\r\n✅ Bahan Berkualitas Tinggi\r\nMenggunakan telur bebek segar dari peternakan terbaik, dipilih secara manual untuk memastikan ukuran, kebersihan, dan kesegaran.\r\n✅ Rasa Gurih Alami\r\nDibuat dengan metode pengasinan alami tanpa bahan pengawet buatan, menghasilkan rasa asin yang pas dan kuning telur yang berminyak sempurna.\r\n✅ Cocok untuk Berbagai Hidangan\r\nSajikan sebagai lauk pendamping nasi, isian kue, pelengkap salad, topping bubur, atau bahan olahan kreatif lainnya.\r\n✅ Kemasan Higienis dan Eksklusif\r\nDikemas rapi dan aman untuk menjaga kesegaran, cocok dijadikan oleh-oleh, hampers, atau stok dapur harian Anda.', 'produk/BqZwow2WjCu4v9YLikJFEAMNTxm3qGK7N5k3vkG0.jpg', 9, 14, 'aktif', 1, 2000.00, '2025-07-29 08:55:47', '2025-07-29 09:26:50', 0, NULL, 0),
(79, 'Telor Bebek', 30000.00, 300, 0, 'kg', 'Telur Bebek Segar – Kaya Nutrisi & Rasa Lezat\r\nNikmati kualitas terbaik dari telur bebek segar yang dihasilkan langsung dari peternakan lokal terpercaya. Cocok untuk berbagai hidangan seperti telur asin, martabak, nasi goreng, hingga bahan kue premium.\r\n\r\n✅ Keunggulan Produk:\r\nUkuran besar & kuning telur lebih pekat\r\n\r\nKaya protein, omega-3, dan vitamin B12\r\n\r\nLebih gurih dibanding telur ayam\r\n\r\nCocok untuk dikonsumsi langsung atau diolah jadi telur asin\r\n\r\n🧺 Keterangan:\r\nBerat rata-rata: ±65–75 gram/butir\r\n\r\nKemasan: Tersedia 1kg\r\n\r\nKondisi: Segar, belum diasinkan\r\n\r\nAsal peternakan: [Isi nama daerah/peternakan]\r\n\r\n📦 Dikirim dengan pengemasan aman untuk menjaga kesegaran dan mencegah retak selama pengiriman.', 'produk/mFdhKGirBbmwb7c6iofUuwUbWooSbncp7gsg6BuQ.jpg', 9, 14, 'aktif', 1, 1000.00, '2025-07-29 09:01:22', '2025-07-29 09:01:22', 0, NULL, 0),
(80, 'Minyak Sawit', 80000.00, 100, 0, 'liter', 'Minyak Sawit Murni adalah pilihan tepat untuk kebutuhan memasak sehari-hari Anda. Diproses dari buah kelapa sawit segar pilihan dengan teknologi modern, minyak ini memiliki warna keemasan alami dan kaya akan vitamin E serta pro-vitamin A (karoten).\r\n\r\nDengan titik asap tinggi, minyak sawit sangat cocok untuk menggoreng, menumis, dan memasak berbagai hidangan favorit keluarga. Teksturnya yang jernih dan tidak mudah berbau tengik membuat hasil masakan lebih renyah dan tahan lama.\r\n\r\nKeunggulan Produk:\r\n\r\n100% minyak sawit murni, tanpa campuran\r\n\r\nWarna keemasan alami, tidak melalui proses pemucatan berlebihan\r\n\r\nMengandung antioksidan alami (vitamin E & karoten)\r\n\r\nCocok untuk menggoreng, menumis, dan memasak\r\n\r\nEkonomis, higienis, dan dikemas aman\r\n\r\nKemasan:\r\n\r\nUkuran: 1 Liter\r\n\r\nBotol plastik tebal dengan tutup ulir anti tumpah\r\n\r\nPenyimpanan:\r\nSimpan di tempat sejuk dan kering, hindari paparan sinar matahari langsung agar kualitas tetap terjaga.\r\n\r\nKalau kamu ingin versi yang lebih pendek untuk e-commerce atau marketplace seperti Tokopedia/Shopee, berikut versi ringkasnya:\r\n\r\nMinyak Sawit Murni 1 Liter\r\nMinyak goreng berkualitas dari buah kelapa sawit pilihan. Jernih, tidak mudah tengik, cocok untuk segala jenis masakan. Kaya akan vitamin E & A. Dikemas higienis dan aman.', 'produk/QuIGRHQKTBLx7G9B3YKPzEkWzeugDdcbdCqbEDdW.jpg', 11, 20, 'aktif', 1, NULL, '2025-07-29 09:11:06', '2025-07-29 09:11:06', 0, NULL, 0),
(81, 'Jambu Mete', 30000.00, 20, 0, 'kg', 'Jambu Mete Segar Berkualitas Tinggi\r\nNikmati kelezatan alami dan manfaat kesehatan dari Jambu Mete segar pilihan, dipanen langsung dari kebun petani lokal yang terjaga kualitasnya. Jambu mete (Anacardium occidentale) dikenal dengan rasa manis-asam yang menyegarkan serta biji mete bernutrisi tinggi yang dapat diolah menjadi camilan sehat.\r\n\r\nSpesifikasi Produk:\r\n\r\nJenis: Jambu Mete Segar (Buah & Biji)\r\n\r\nAsal: Kebun organik lokal\r\n\r\nBerat Bersih: ± 1 kg\r\n\r\nKondisi: Segar (bisa juga tersedia dalam bentuk kering atau olahan biji mete)\r\n\r\nKemasan: Plastik food grade atau keranjang anyaman (custom sesuai permintaan)\r\n\r\nKeunggulan Produk:\r\n\r\nDipanen saat matang pohon untuk rasa maksimal\r\n\r\nBebas pestisida & bahan kimia berbahaya\r\n\r\nDapat dikonsumsi langsung atau diolah\r\n\r\nSumber vitamin C, antioksidan, dan mineral\r\n\r\nCocok untuk jus, salad, atau bahan baku kacang mete\r\n\r\nManfaat Jambu Mete:\r\n\r\nMembantu meningkatkan daya tahan tubuh\r\n\r\nMenjaga kesehatan kulit dan pencernaan\r\n\r\nMenyegarkan dan menghidrasi tubuh secara alami', 'produk/LVsG7Sq3JFogSSrAL7qKIisMMLa0q2QtpnyaQS5g.jpg', 6, 13, 'aktif', 1, 500.00, '2025-07-29 09:17:49', '2025-07-29 09:26:39', 0, NULL, 0),
(82, 'Udang Segar', 20000.00, 18, 0, 'kg', 'Udang Segar Pilihan – Kualitas Premium\r\nNikmati kelezatan Udang Segar Pilihan dengan cita rasa laut yang autentik dan kualitas premium. Diambil langsung dari tambak terbaik dan diproses dengan standar kebersihan tinggi, udang kami cocok untuk berbagai hidangan seperti tumis udang, udang goreng tepung, bakwan udang, hingga olahan seafood modern.\r\n\r\n📦 Detail Produk:\r\nJenis: Udang Windu / Udang Vaname (bisa disesuaikan)\r\n\r\nUkuran: Medium – Jumbo (40–60 ekor/kg)\r\n\r\nBerat Bersih: 1 kg\r\n\r\nKondisi: Segar / Beku (Frozen)\r\n\r\nAsal: Tambak lokal berkualitas / Laut Indonesia\r\n\r\nPenyimpanan: Simpan di suhu -18°C untuk menjaga kesegaran\r\n\r\n✅ Keunggulan:\r\nBersih dan bebas bahan kimia\r\n\r\nRasa manis alami khas udang segar\r\n\r\nSiap masak, hemat waktu di dapur\r\n\r\nCocok untuk kebutuhan rumah tangga atau usaha kuliner\r\n\r\nRasakan kenikmatan seafood asli Indonesia dengan Udang Segar Pilihan – praktis, higienis, dan bergizi tinggi.', 'produk/OnSl3jHGWihfDgD7SjNdbMNiU6pOtHx8Y4yIvJBX.jpg', 9, 15, 'aktif', 0, NULL, '2025-07-29 09:39:28', '2025-07-29 09:39:28', 0, NULL, 0),
(83, 'Ikan Asin', 20000.00, 10, 0, 'kg', 'Cita Rasa Tradisi, Ikan Asin Asli Laut Indonesia!\r\nRindu masakan rumah? Ikan asin kami menghadirkan rasa khas tradisional yang menggugah selera. Dibuat dari ikan segar yang dijemur di bawah matahari tropis dan diasinkan secara alami, tanpa bahan pengawet kimia. Renyah, gurih, dan cocok disantap kapan saja!', 'produk/SiYR7MLChPWutggq7k7AguBM80DolYJrfM0wLSIU.jpg', 2, 15, 'aktif', 1, 700.00, '2025-07-29 09:48:05', '2025-07-29 09:48:05', 0, NULL, 0),
(84, 'Susu Sapi Murni', 40000.00, 30, 0, 'kg', 'Nikmati kebaikan alami dari Susu Sapi Murni, langsung dari peternakan pilihan. Diproses secara higienis tanpa campuran bahan pengawet atau pemanis buatan, susu ini mempertahankan rasa segar, lembut, dan kaya nutrisi alami.\r\n\r\n✅ Komposisi: 100% susu sapi segar\r\n✅ Tanpa pengawet\r\n✅ Tanpa gula tambahan\r\n✅ Kaya kalsium & protein alami\r\n✅ Baik untuk tulang, gigi, dan daya tahan tubuh\r\n\r\nCocok dikonsumsi oleh seluruh anggota keluarga, baik diminum langsung atau sebagai campuran kopi, teh, sereal, atau bahan masakan favorit Anda.\r\n\r\n📦 Kemasan tersedia:\r\nBotol 1 liter\r\n\r\nSimpan di suhu 2–4°C dan habiskan dalam 3 hari setelah dibuka.', 'produk/PjI82Ba7IWrEaCPE6K0f9EsYVWawJYnRhtSUb9rN.jpg', NULL, 16, 'aktif', 1, 2000.00, '2025-07-29 09:54:35', '2025-07-29 09:54:35', 0, NULL, 0),
(85, 'Susu Kambing Etawa', 100000.00, 123, 0, 'liter', 'Nikmati kebaikan alam dalam setiap tegukan Susu Kambing Etawa Premium, minuman sehat yang dihasilkan dari kambing Etawa pilihan. Dikenal sebagai \"rajanya susu kambing\", susu Etawa kaya akan nutrisi penting yang dibutuhkan tubuh.\r\n\r\n✅ Tinggi Protein & Kalsium\r\n✅ Rendah Laktosa – Cocok untuk Penderita Alergi Susu Sapi\r\n✅ Membantu Memelihara Stamina & Imunitas\r\n✅ Baik untuk Pertumbuhan Anak & Kesehatan Tulang\r\n✅ Cocok untuk Lansia, Ibu Hamil & Menyusui\r\n\r\nKomposisi:\r\n100% Susu Kambing Etawa murni – tanpa pengawet, tanpa pewarna, tanpa pemanis buatan.\r\n\r\nManfaat Susu Kambing Etawa:\r\n\r\nMenjaga daya tahan tubuh\r\n\r\nMembantu proses penyembuhan berbagai penyakit (asma, maag, kolesterol, dll)\r\n\r\nMeningkatkan nafsu makan dan energi\r\n\r\nMenyehatkan kulit dan memperbaiki pencernaan', 'produk/B9uTYH7awvF4wFdDrB5SA4lwZFw6uIVIg0YKAFPj.jpg', 5, 16, 'aktif', 1, 2000.00, '2025-07-29 10:01:06', '2025-07-29 10:01:06', 0, NULL, 0),
(86, 'Bibit Cabe Rawit', 35000.00, 32, 0, 'Gram', 'CABE JAYA F1 adalah benih cabe unggulan yang dirancang untuk menghasilkan panen maksimal dengan daya tahan tinggi terhadap penyakit. Cocok ditanam di dataran rendah hingga menengah, benih ini menghasilkan buah cabe merah cerah, berukuran panjang, dan pedas menggigit — sempurna untuk kebutuhan pasar dan industri kuliner.\r\n\r\n🌱 Keunggulan Produk:\r\n\r\nTingkat tumbuh > 90%\r\n\r\nTahan terhadap penyakit layu bakteri dan virus mozaik\r\n\r\nUmur panen: ±75 hari setelah tanam\r\n\r\nProduksi tinggi: bisa mencapai 1,2 kg per tanaman\r\n\r\nCocok untuk budidaya terbuka maupun greenhouse\r\n\r\n📦 Kemasan Tersedia:\r\n\r\n10 gram (±1.200 benih)\r\n\r\n50 gram\r\n\r\n100 gram\r\n\r\n📍 Rekomendasi Tanam:\r\n\r\nJarak tanam: 60x60 cm\r\n\r\nPenyinaran: Penuh\r\n\r\nMedia: Tanah gembur, subur, dan drainase baik', 'produk/UprPgBJvdTom3HeD2tP1BY2O1epvk672vJKDf67B.jpg', 6, 19, 'aktif', 1, NULL, '2025-07-29 10:06:03', '2025-07-29 10:06:03', 0, NULL, 0),
(87, 'Anggur', 10000.00, 100, 0, 'kg', 'Telur Ayam Kampung', 'produk/43obOoaVvVfMF0chfNGQVYIidhsG3XLNpMvBmdde.jpg', 9, 13, 'aktif', 1, 100.00, '2025-07-30 00:53:41', '2025-07-30 00:54:25', 1, '2025-08-01 00:54:25', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `rating` int(11) NOT NULL DEFAULT 5,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `user_id`, `content`, `rating`, `created_at`, `updated_at`) VALUES
(10, 5, 2, 'Bawang merahnya segar dan pengiriman cepat!', 5, '2025-07-13 17:06:52', '2025-07-13 17:06:52'),
(11, 5, 3, 'Produk bagus, namun kemasan kurang rapi.', 4, '2025-07-13 17:06:52', '2025-07-13 17:06:52'),
(12, 6, 6, 'Beras super sesuai deskripsi. Akan beli lagi.', 5, '2025-07-13 17:06:52', '2025-07-13 17:06:52'),
(13, 15, 2, 'Enak buat makan di sate', 3, '2025-07-28 14:34:45', '2025-07-28 14:35:31'),
(14, 76, 2, 'mantap dagingnya empuk', 5, '2025-07-29 09:34:39', '2025-07-29 09:34:39'),
(15, 87, 2, 'Segar', 4, '2025-07-30 01:16:43', '2025-07-30 01:16:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('74auYUKpuWH26G2CalEVgYRRXMGzBjCRNoaO6NhW', NULL, '103.189.123.5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYVRGNm1hazZ0Rm1FUFN4MERlZUpaNVNEMjk1VmVpajRWTHFzSW9VcyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTM1OiJodHRwczovL3BldGFuaWZ5Lm15LmlkL3Jlc2V0LXBhc3N3b3JkLzgwZDRlMDQxNjgzYTI4NDAzOGRmMTYxYWVjODY2MTA4NmE4YjZlMWRhYzhlMjg0NWNmYjExMGQ3NzNkMmZhMDU/ZW1haWw9c2ViYXN0aWFubjg4MTclNDBnbWFpbC5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1753865098),
('7Wgz5D3yQTXycLq48zH0Vf04NNWvWD7I10tpYPCw', NULL, '103.189.123.6', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUlFTMjZqNUVMazNNRjNwTFd1MUpVZVZsWTNwbDVYSnRvUkFqOWFkaSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0NDoiaHR0cHM6Ly9wZXRhbmlmeS5teS5pZC9hZG1pbi90cmFuc2Zlcl9wZXRhbmkiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyODoiaHR0cHM6Ly9wZXRhbmlmeS5teS5pZC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1753872149),
('AUi3TRs12v0uP844Zp0rvvcJVz9B1bthbiyVKVgQ', NULL, '36.50.157.4', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibE1MQk9LN05PUHFqQ0tnbHdpMlIxb2gxOFQ0R3N0NkI5amIxYXR4TCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNzoiaHR0cHM6Ly9wZXRhbmlmeS5teS5pZC9hZG1pbi9rYXRlZ29yaSI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI4OiJodHRwczovL3BldGFuaWZ5Lm15LmlkL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1753871917),
('BMZGp5x4YAw7eQpfsZzSAwBBEwWwT4sX2nrPyMc3', NULL, '150.129.59.4', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSzlFMDFVWTVoeTE3ZkxhN0ZlMXczWm5DYlIyMmRwYzhwaERuVlpwRiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNToiaHR0cHM6Ly9wZXRhbmlmeS5teS5pZC9hZG1pbi9vcmRlcnMiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyODoiaHR0cHM6Ly9wZXRhbmlmeS5teS5pZC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1753872017),
('DDqorqdaJ3idpVH3h4v56wCdTg4RJdmQ8s4nWDZw', NULL, '117.103.171.7', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTmVtY0RoZFdhRDJmc3hDMTM2Z1VNa3B5QnB1eVl1NUJ3V1oxT1NMaCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0MzoiaHR0cHM6Ly9wZXRhbmlmeS5teS5pZC9hZG1pbi9mb3J1bS9jb21tZW50cyI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI4OiJodHRwczovL3BldGFuaWZ5Lm15LmlkL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1753871650),
('DN2B5ExOm9O8YPp7k1853FwDLjVH7BdWQafU6nPo', 12, '180.244.139.252', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZXQ3YjF5Vnd1OER5MUY1RlRsUjdHZzJ3a08yN20yMVhLYTM5NFBOOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHBzOi8vcGV0YW5pZnkubXkuaWQvcGV0YW5pLzkvZXRhbGFzZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjEyO30=', 1753869804),
('GpSHRRjrFFgWQR8SwIj9Vp9A8x5wq7AefQVHsMn1', 1, '180.244.139.252', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36 Edg/138.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMnNLMTFjSkVtcGIxYmNyd09iMnlpTktoYzRVOENUcXBLeDk3WDhFbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHBzOi8vcGV0YW5pZnkubXkuaWQvYWRtaW4vZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1753869551),
('J2xBYKWx8pyt9BSijDAO3aOWzxUQjZ3BKswWu7An', NULL, '202.43.172.4', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Mobile Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoieElUazByN1dZTDd5ODEwS3B5ZDJ4S3JXMXM3RnhRb0pkM0dkd21ROCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNjoiaHR0cHM6Ly9wZXRhbmlmeS5teS5pZC9wZW1iZWxpL2ZvcnVtIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHBzOi8vcGV0YW5pZnkubXkuaWQvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1753871676),
('l5A4b6z9bKmuYBOWWAWZdg4qjJPStLaFP2U1w08U', NULL, '38.43.64.36', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN2o4SFhkSndrckhxaU9BOHBJT3JPZEtnTG16aUdBS2tCV0RrOThkZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTM1OiJodHRwczovL3BldGFuaWZ5Lm15LmlkL3Jlc2V0LXBhc3N3b3JkLzBkNTExYzliZDgzMWVlMWM2ZTdjZmZlMWIyYmQzYTMyYjIwOTlhODYzYWZhOWU0ZjliODJhYjExOWEzNWFlNzI/ZW1haWw9c2ViYXN0aWFubjg4MTclNDBnbWFpbC5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1753865131),
('Nn9EeZNeZdtJCsgn5CjmZpk5smFZ8LzgRy8jASxQ', NULL, '103.175.82.68', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYXFHWkpITFJIQ3E1NnN0Wm93VDV6VkJFQU5OZmhrWVl4N2hIYkNRaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTM1OiJodHRwczovL3BldGFuaWZ5Lm15LmlkL3Jlc2V0LXBhc3N3b3JkLzU0ODNmNjdiNTk2MzFjNGU4NWE4MzIyN2IxNTlmOTQxNThkYjBhMjRmNDA4ZmQwYTk3MjExMmEzNTU4NmY0ZmU/ZW1haWw9c2ViYXN0aWFubjg4MTclNDBnbWFpbC5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1753865163),
('odcPwtuDHwtHeEVsFhUu7CLXpCVDs5K0GaOpEkRO', 15, '180.244.139.252', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMXY5NjFaeGpXY0htaDBoVmRSYTdMcWRWVGZLTWhTNDIyUnVhZWRMVSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHBzOi8vcGV0YW5pZnkubXkuaWQvcGV0YW5pL2tlbG9sYS1wcm9kdWsiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxNTt9', 1753871969),
('omLx43gfpS6Wm26cYdM1zj7z4qtkUDHAFU53hTOD', 1, '180.244.139.252', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibmJJYWNrY1JZTTdFTHlQWGxsV21jU2MzcFhBUlRUYU1Ta0c2T1RtUCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHBzOi8vcGV0YW5pZnkubXkuaWQvYWRtaW4vdmlkZW9zIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1753866391),
('ORbRaomXeCJ5F4kjfncv8TQvAMeeCxycl37V23t7', 2, '180.244.139.252', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSWsxS1NGZnNjR3k1empGN2dXMlZ4SU54dkd3UDh0YmE3cUs3TW5QcCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDg6Imh0dHBzOi8vcGV0YW5pZnkubXkuaWQvcGV0YW5pL3ZpZGVvLXBlbWJlbGFqYXJhbiI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1753866427),
('QELd2mPuL3e0DjCjhAwoZa6QKzhXfZF0RK0PNgj9', NULL, '180.244.139.252', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoic1lYUkpjSHdOR0N0TzB4Q2NYeXZlQklONGRjQW1SalhoZEQ5NUpqcSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vcGV0YW5pZnkubXkuaWQiO319', 1753871780),
('rWCd6jl3fNpzjM6DkAEW8AvtV56obZxeCuOTtSw6', NULL, '38.43.64.37', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiOVJFTXQ3RkdFWTd1RUdQMDlsRElDU0dZTGkweFVhcHlvUk9mNTllZyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0MDoiaHR0cHM6Ly9wZXRhbmlmeS5teS5pZC9hZG1pbi9mb3J1bS9wb3N0cyI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI4OiJodHRwczovL3BldGFuaWZ5Lm15LmlkL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1753871613),
('rzNEpDklPjjgzZwpXzdFZDK17X8SnYVY6lfJp3dQ', NULL, '103.189.123.6', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSGxjYjVFQnZhTGtscDhncFlNVzZacDZvb2pZYXJ3ckhqeHhJZzJsdCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTM1OiJodHRwczovL3BldGFuaWZ5Lm15LmlkL3Jlc2V0LXBhc3N3b3JkLzI0NGQ5NWU1MTYwYzY3MWIxZjVjZTkyZTE0ZWY1NDQxOGJjNDgyYzZjN2EwZTYwOGFhYjBiOTU0MTE1ODlkNWM/ZW1haWw9c2ViYXN0aWFubjg4MTclNDBnbWFpbC5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1753865439),
('sbcsmZUBLbn28gcB0d6a1oKUrTA1byggQ1TJOoi5', 1, '180.244.139.252', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVmxieDd5cU1hR2JucVZSZEVjVjhjdmRQSVVmSExDUzhpZUhJZmNaRCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDQ6Imh0dHBzOi8vcGV0YW5pZnkubXkuaWQvYWRtaW4vYXJ0aWtlbC8xOC9lZGl0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1753872190),
('Vb0hGxyr7FAN0c9aGW30IUJqsDsesmP9fQPjs6ra', NULL, '36.50.157.22', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWHptd1A5Zm5uVnowb1VQb1dLczg2clZnN1c4aVBUVWxCOGVuVDJMVyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHBzOi8vcGV0YW5pZnkubXkuaWQvcmVnaXN0ZXIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1753864877),
('VoONxZX8snIfftfw77KSy4prNcoUpJqjbxxTKBel', 12, '180.244.139.252', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiUE9zY2ZlWUY0aURTSFR6Wk9NQzZnTDlmS2NHMDlWTUZMdkRUZ21CVyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHBzOi8vcGV0YW5pZnkubXkuaWQvcGVtYmVsaS9vcmRlcnMiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxMjtzOjEwOiJjYXJ0X2NvdW50IjtpOjE7fQ==', 1753872088);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transfer_petani`
--

CREATE TABLE `transfer_petani` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `petani_id` bigint(20) UNSIGNED NOT NULL,
  `nominal` decimal(15,2) NOT NULL,
  `foto_transfer` varchar(255) DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transfer_petani`
--

INSERT INTO `transfer_petani` (`id`, `petani_id`, `nominal`, `foto_transfer`, `catatan`, `created_at`, `updated_at`) VALUES
(1, 2, 1000000.00, NULL, 'Done', '2025-07-28 13:23:36', '2025-07-28 13:23:36'),
(2, 2, 1000000.00, NULL, 'Bulan 1', '2025-07-28 13:28:29', '2025-07-28 13:28:29'),
(3, 6, 20000000.00, NULL, 'Coba', '2025-07-28 13:34:14', '2025-07-28 13:34:14'),
(5, 2, 1131313.00, 'foto_transfer/YGfGsejJeU1wRC50pJUm0wKLcn3lC7xo8x7qW3Ir.jpg', 'aaa', '2025-07-28 13:42:04', '2025-07-28 14:02:27'),
(6, 6, 2000000.00, 'foto_transfer/mXvyj3TbAXKHorXS4w49I7tkqwUWIHpLgI5UlQnR.jpg', 'Cobss', '2025-07-28 13:45:27', '2025-07-28 13:45:27'),
(7, 9, 144000.00, 'foto_transfer/zSfUnfHLozny5IF7IEdye2gFYtryIKbRpFCyPk9e.jpg', 'Sudah dibayar', '2025-07-30 01:17:43', '2025-07-30 01:17:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'pembeli',
  `alamat` varchar(255) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `kode_pos` varchar(10) DEFAULT NULL,
  `kota` varchar(100) DEFAULT NULL,
  `provinsi` varchar(100) DEFAULT NULL,
  `nama_bank` varchar(100) DEFAULT NULL,
  `no_rekening` varchar(30) DEFAULT NULL,
  `nama_pemilik_rekening` varchar(100) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `otp_code` varchar(10) DEFAULT NULL,
  `otp_expires_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `alamat`, `no_hp`, `kode_pos`, `kota`, `provinsi`, `nama_bank`, `no_rekening`, `nama_pemilik_rekening`, `email_verified_at`, `password`, `foto`, `remember_token`, `created_at`, `updated_at`, `otp_code`, `otp_expires_at`) VALUES
(1, 'Admin1', 'admin1@gmail.com', 'admin', 'Bandung', '08123456789', '41234', 'Bandung', 'Jawa Barat', NULL, NULL, NULL, NULL, '$2y$12$DtKvGnPz1rX.K0bbXlXsHuCxtZYH/JPtB24UFzbrg4bxuG94Eflr6', '687dbfec8faf4.png', 'lowVdqOSsS87hPUXUxrnVf0yUbdaSpTUnzRW4IJUnCGnLK4kXDt2WT4wwim1', '2025-07-13 06:14:02', '2025-07-23 15:47:10', NULL, NULL),
(2, 'Yogi', 'yogi@gmail.com', 'petani', 'Mekarjaya', '081224158753', '41258', 'Subang', 'Jawa Barat', 'BRI', '4334540100455674', 'Yogi Bastian', NULL, '$2y$12$El6y4040hJ5P16PwoeIKBO9USj7kl9z8hT7lwD.9Csu0mnp8A/3iS', '687946583d87f.jpg', NULL, '2025-07-13 06:34:03', '2025-07-17 11:52:08', NULL, NULL),
(3, 'Elsa', 'elsa@gmail.com', 'pembeli', 'Subang', '081222222', '24145', 'Subang', 'Jawa Barat', NULL, NULL, NULL, NULL, '$2y$12$/eOkUXHqQNMz2uOjyUZNd.245w8Ltm2wLnToHvB6jLQHo2T77V1ju', '687a93e1c5f84.jpg', NULL, '2025-07-13 06:56:34', '2025-07-18 11:35:13', NULL, NULL),
(4, 'coba', 'coba@gmail.com', 'pembeli', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$12$jyza1XUiOREniXuLIMYaLucE6//cLRY7VAOaissGSx3s2xi61p42y', NULL, NULL, '2025-07-13 07:02:26', '2025-07-13 07:02:26', NULL, NULL),
(5, 'a', 'a@gmail.com', 'petani', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$12$ahlW0nrrVahUcdveLNHq5eyy4zHp.bX662vCRoQo8q3GaK5ZedCZC', NULL, NULL, '2025-07-13 07:07:18', '2025-07-13 07:07:18', NULL, NULL),
(6, 'yelena', 'yelana@gmail.com', 'petani', 'Jakarta', '081221221221', '41258', 'Subang', 'Jawa Barat', 'BCA', '3244663', 'YELENA', NULL, '$2y$12$9Hcmq1BcS12IY9VNYBMQmejrUGSEZneTGbVVQJjSNexSKCvGZY1jG', '687947cc2e6df.jpeg', NULL, '2025-07-13 07:10:41', '2025-07-17 11:58:20', NULL, NULL),
(8, 'Ipul', 'wildamanam@gmail.com', 'pembeli', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$12$YI4AJJDHasBlMW8wuknm7uYwm7xErGMEPaKmKxcfr7swVsDIiH9ay', NULL, NULL, '2025-07-23 17:03:59', '2025-07-23 17:03:59', NULL, NULL),
(9, 'qarel', 'qarelirham@gmail.com', 'petani', 'utb', '.', '.', '.', '.', '/', '/', '/', NULL, '$2y$12$XWyhPAgkGUL.IIRIWAY62uBTgbo8w3V5NOPKq6F.crRXT1ahmd0He', '6882328f5c258.jpg', 'OkBsG3GRpTDVzLzoYp7rSwBSfterj8scUAcpLFJrwVuMT8EfxQ5ASckyEFfE', '2025-07-23 17:06:08', '2025-07-24 06:18:07', NULL, NULL),
(10, 'vincent', 'vincentsammuel00@gmail.com', 'pembeli', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$12$4n0NylfhWnXTst4PFRFNuekIixY3mTLhPsPkMabAh0cN8ylDHz21.', NULL, 'cMy1pltVP4cmW7VOStqmBtN1ykqfwth66xEk7f4bPkKgFBmLWy2QCwamdHps', '2025-07-23 17:06:55', '2025-07-28 03:20:50', NULL, NULL),
(11, 'Cent', 'vincent@gmail.com', 'petani', '.', '.', '.', '.', '.', '.', '.', '.', NULL, '$2y$12$ZapjiWLL7RF5AFvQEBRS7eSXRTFlgiNXNsCBJyBlqMBOIOkUeTJai', '6882321723d6e.jpeg', NULL, '2025-07-24 06:13:58', '2025-07-24 06:17:56', NULL, NULL),
(12, 'Ipul', 'pull@gmail.com', 'pembeli', 'uyyuu', '887888', 'jjjj9999', 'kkkkk', 'kkklk', NULL, NULL, NULL, NULL, '$2y$12$f0ti.ftqihMM.BbbLJ5RtemKTqoj.eyVcqv9Dry04.Y5DVaTzdBDi', '6889f58b7b056.jpg', NULL, '2025-07-24 06:29:17', '2025-07-30 03:35:55', NULL, NULL),
(13, 'paw', 'findingsparklight@gmail.com', 'pembeli', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$12$zhjl.0c9RuJYlOylB.hIieD434nIiDWmYYhfOWlgbfyZRlDT49n1O', NULL, NULL, '2025-07-25 00:00:22', '2025-07-25 00:00:22', NULL, NULL),
(14, 'Sen', 'sen@gmail.com', 'pembeli', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$12$uBXT/.4pcOEurZuTW4iP3usa9poK3YqL60ddtHx/Mg5HmhaCEjZAy', NULL, NULL, '2025-07-25 21:28:32', '2025-07-25 21:28:32', NULL, NULL),
(15, 'anam@gmail.com', 'anam@gmail.com', 'petani', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$12$tgwMWFbgdcdhCJDoBDmglurGzTj01IW5ZuG3iLHREIYIrcbzTzB/e', NULL, NULL, '2025-07-29 10:21:28', '2025-07-29 10:21:28', NULL, NULL),
(16, 'Yogi Bastian', 'sebastiann8817@gmail.com', 'petani', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$12$41iRFH9ojqY704cipCAGaO9obo63mmXLwlNvnrWUImFtBoLqFKBRq', NULL, 'l2kv3iRcH2R3UoGqcXhBOUG815TOOL5UDqXFrej9PieOQTpJ0tLyC16W5QY8', '2025-07-30 00:28:41', '2025-07-30 01:48:12', NULL, NULL),
(17, 'Shaiful Anam', 'pull123@gmail.com', 'pembeli', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$12$x2iZpZYwnYcf5BbIYAHeoOC2tmtKUwlZLC1XjQMdJN7CESiAxBtam', NULL, NULL, '2025-07-30 00:44:38', '2025-07-30 00:44:38', NULL, NULL),
(18, 'shaiful anam', 'shaiful@gmail.com', 'petani', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$12$8AR9Z1N0wLCKPOIUfFoyL.UuR0NX164DdGt/Xqwn2KnVKvHiTexQG', NULL, NULL, '2025-07-30 01:50:17', '2025-07-30 01:50:17', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `youtube_url` varchar(255) NOT NULL,
  `target_audience` enum('petani','pembeli','semua') NOT NULL DEFAULT 'semua',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `views` bigint(20) UNSIGNED DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `videos`
--

INSERT INTO `videos` (`id`, `title`, `description`, `youtube_url`, `target_audience`, `created_at`, `updated_at`, `views`) VALUES
(6, 'SISTEM PERTANIAN BERKELANJUTAN : SOLUSI MASA DEPAN', 'Di video kali ini, kita akan mengetahui lebih dalam tentang pentingnya pertanian berkelanjutan. Kami akan menjelaskan bagaimana pertanian berkelanjutan dapat memelihara lingkungan, meningkatkan kesejahteraan petani, dan memastikan ketersediaan pangan yang aman untuk masa depan. Kami juga akan menunjukkan contoh praktis dari pertanian berkelanjutan yang dapat dilakukan. Jangan lewatkan kesempatan untuk belajar bagaimana kita dapat berkontribusi dalam mewujudkan pertanian yang lebih baik untuk semua orang', 'https://youtu.be/0cGDOSW4W28?si=4a0jDMmU1_B2ovFi', 'petani', '2025-07-28 10:47:07', '2025-07-28 10:47:07', 0),
(7, 'Petani Muda 22 Tahun Punya Lahan Berhektar dari Tanam Cabai', 'Mas Happy, pemuda 22 tahun asal Desa Pulotondo, Tulungagung, tumbuh dari keluarga broken home. Sejak kecil diasuh oleh kakek, nenek, dan pamannya yang menjadi sosok paling berjasa dalam hidupnya. Meski penuh luka masa kecil, Mas Happy memilih berdamai dengan keadaan dan menemukan jalannya di dunia pertanian. Sejak sekolah, ia sudah terbiasa mencari rumput untuk ternak, hingga akhirnya jatuh cinta pada bertani.\r\n\r\nMas Happy dikenal sebagai petani cabai keriting yang juga menanam tomat dan semangka. Ia mengelola beberapa lahan kecil dengan sistem bergulir. Proses tanam ia jalani penuh perhitungan—dari olah tanah, pemberian pupuk, hingga perawatan rutin dengan insektisida dan nutrisi. Ia menghadapi berbagai tantangan seperti hama, penyakit, dan naik-turunnya harga. Meski begitu, Mas Happy percaya, rezeki selalu ada bagi yang mau berusaha.\r\n\r\nLewat media sosial, Mas Happy mulai dikenal hingga akhirnya diliput Pecah Telur. Ia mengajak anak muda untuk tidak gengsi bertani dan berharap pemerintah lebih peduli pada kebutuhan petani kecil, seperti akses pupuk dan benih. Prinsip hidupnya sederhana: semua akan berlalu, yang penting terus berjuang, berbagi, dan tidak cepat puas.', 'https://youtu.be/xX1HTRdbxV8?si=jbnkhXFCu8mMDJQk', 'semua', '2025-07-28 23:40:56', '2025-07-28 23:40:56', 0),
(8, 'SUDAH SAATNYA PETANI CABAI TAHU TRIK INI!! DILUAR DUGAAN, TERNYATA SANGAT MUDAH', 'Narasumber = Mas Didik\r\nElevasi = 250 mdpl\r\nVarietas = Sakagen 2\r\nLuas lahan = 1150 m2\r\nDolomit = 15 karung\r\nLubang tanam = Kompos 3 karung + 1 liter M 21\r\nSterilisasi lahan = trichoderma + asam humat', 'https://youtu.be/5HdBK-bVJ4s?si=kJ3UcRuOlufuURKQ', 'petani', '2025-07-28 23:42:39', '2025-07-28 23:42:39', 0),
(9, '💧Cara Membangun Sistem Hidroponik di Rumah dengan Semua Rahasianya', '➤Saat menyiapkan sistem hidroponik di rumah, penting untuk mempertimbangkan beberapa faktor.\r\n➤Salah satu hal yang saya anggap paling penting adalah menjaga level air di tabung tanam, bahkan saat pompa tidak bekerja.\r\n➤Hal ini terutama berlaku saat terjadi pemadaman listrik. Dengan menjaga air di tabung, tanaman tidak akan mengalami dehidrasi.\r\n➤Di sisi lain, penting agar tangki tempat kita menyimpan air setidaknya 3 hingga 4 kali volume total sistem.\r\n➤Hal ini akan membantu kita lebih mandiri dalam mengganti air yang menguap.\r\n➤Namun, penting juga agar tidak pernah kekurangan air, karena pompa submersible harus selalu terendam.\r\n➤➤Dalam video mendatang, saya akan membahas solusi yang kita butuhkan, cara mengadaptasi bibit yang ada di tanah agar dapat ditanam di air, dan banyak trik lainnya.', 'https://youtu.be/JUKUuLcA83s?si=TEf9ORs05Mdl8guD', 'petani', '2025-07-28 23:47:12', '2025-07-28 23:47:12', 0),
(10, 'Informasi Terbaru Kenaikan Harga Bahan Pangan di Jakarta | Kabar Pagi tvOne', 'Jakarta, https://www.tvOnenews.com - Informasi Terbaru Kenaikan Harga Bahan Pangan di Jakarta | Kabar Pagi tvOne\r\n\r\nSaksikan live streaming tvOne hanya di https://www.tvonenews.com/live', 'https://youtu.be/YaEWvyicFhg?si=hNPFo3wCJKfnFIDl', 'semua', '2025-07-28 23:49:48', '2025-07-28 23:49:48', 0),
(11, 'Menelusuri Faktor Penyebab Harga Bahan Pangan Melonjak Drastis', 'Setiap jelang hari besar keagamaan maupun tahun baru, harga setiap bahan pangan secara nasional mengalami lonjakan cukup signifikan. Ada beberapa faktor yang memicu kenaikan harga pangan ini di antaranya peningkatan permintaan, adanya kartel bahan pokok, rantai distribusi panjang dan faktor cuaca.', 'https://youtu.be/SiCAstAUqq4?si=tFl7tDx3LyGmmNp8', 'semua', '2025-07-28 23:52:39', '2025-07-28 23:52:39', 0),
(12, 'Pabrik Penggilingan Padi di Cirebon Tutup Gara Gara Gagal Panen.Begini Dampaknya', 'BANDUNG, KOMPAS.TV - Sejumlah pabrik penggilingan padi di Kecamatan Gegesik, Kabupaten Cirebon, Jawa Barat berhenti beroperasi. Pasalnya mereka tidak mendapat gabah karena gagal panen, dan harganya mahal. Hal ini mempengaruhi ketersediaan stok gabah.\r\n\r\nUntuk lebih tahu berita terupdate seputar Jawa Barat, \r\nbisa klink link di bawah: \r\nIG : https:  / kompastvjabar  \r\nYoutube :    / @kompastvjawabarat  \r\nTwitter :   / kompastv_jabar  \r\nFacebook :   / kompastvjawabarat  \r\nTikTok:   / kompastvjabar', 'https://youtu.be/vNndVebXnI8?si=aZ0ZBjDZovHPt1v7', 'semua', '2025-07-28 23:54:14', '2025-07-28 23:54:14', 0),
(13, 'Beras Premium Oplosan? Begini Hasil Uji Bersama IPB!', 'Ramai dugaan beras oplosan yang disebutkan Kementerian Pertanian mengundang perhatian publik. Namun, apakah benar merek beras premium yang masuk dalam daftar Kementerian Pertanian tersebut dioplos? Bagaimana cara mendeteksinya dan apa dampaknya?\r\nBerikut pembuktian yang dilakukan tim liputan CNN Indonesia bersama Guru Besar Fakultas Pertanian IPB. Temuannya bisa menjawab pertanyaan Anda!\r\n\r\n\r\nWebsite: www.cnnindonesia.com\r\nFacebook:   / cnnindonesia  \r\nInstagram:   / cnnindonesiatv  \r\nTwitter:   / cnniddaily  \r\nTikTok:   / cnnindonesia  \r\nSpotify: CNN Indonesia', 'https://youtu.be/Z_8qFYCU_78?si=i1dQZjoFh37G8mnQ', 'semua', '2025-07-28 23:55:41', '2025-07-28 23:55:41', 0),
(14, 'Kenaikan Harga Cabai Mencapai 100%', 'Setelah daging, kini harga bawang dan cabai, ikutan melonjak, di sejumlah daerah. \r\n\r\nKenaikan harga yang cukup signifikan dan terjadi berturut-turut ini, tentunya sangat memberatkan bagi warga. \r\n\r\nYa, omset pedagang pun ikutan menurun, dikarenakan berkurangnya daya beli masyarakat.', 'https://youtu.be/KJVH-BckLb0?si=k3zqXmGEQyDDRqzm', 'semua', '2025-07-28 23:57:22', '2025-07-28 23:57:22', 0),
(15, 'modal atau biaya awal tanam cabai', 'modal atau biaya tersebut tidaklah baku, karna bisa saja harga dan barang2 yg digunakan berbeda disetiap daerah.', 'https://youtu.be/w3TTftfyvkI?si=jWKpfP9YapbRxrNc', 'semua', '2025-07-28 23:58:50', '2025-07-28 23:58:50', 0),
(16, 'CARA HASILKAN RATUSAN JUTA DARI BUDIDAYA CABE MERAH | CERITA SUKSES ANAK MUDA', 'Cabai atau cabai merah atau lombok adalah buah dan tumbuhan anggota genus Capsicum. Buahnya dapat digolongkan sebagai sayuran maupun bumbu, tergantung bagaimana pemanfaatannya. Sebagai bumbu, buah cabai yang pedas sangat populer di Asia Tenggara sebagai penguat rasa makanan.\r\n\r\nBerikut kisah sukses anak muda yang berhasil membudidayakan cabe merah dan bisa menghasilkan ratusan juta sekali panen.\r\n#deditv #cabe #pertanian \r\n#ceritasuksespetanimuda\r\n#petanimuda \r\n#cabemerah \r\n#cabai', 'https://youtu.be/JWw4Lllk5zw?si=YULhxPvIAkwto51N', 'petani', '2025-07-28 23:59:48', '2025-07-28 23:59:48', 0),
(17, 'Pupuk Dasar Cabe Paling Aman Musim Hujan!', '0:00 Opening\r\n1:24 Kapur Dolomit\r\n3:08 Fertiphos\r\n4:52 NPK Phonska\r\n6:18 Cara dan Dosis Campuran\r\n\r\n\r\nLink Produk :\r\nKapur Dolomit : https://shope.ee/4pp0HZrS2i   \r\nFertiphos : https://shope.ee/4fVa5Gs5Nh \r\nNPK Phonska : https://shope.ee/5ARqgBqBMo \r\n\r\nKritik dan Saran \r\nWa 0812 - 9109 - 9109\r\n\r\nhttps://tokodeeres.com/\r\n\r\n\r\npupuk dasar cabe paling aman musim hujan\r\npupuk dasar cabe keriting\r\npupuk dasar cabe musim hujan\r\nracikan pupuk dasar cabe musim hujan\r\npupuk cabe musim hujan\r\npemupukan cabe dimusim hujan\r\ncara pemupukan cabe dimusim hujan\r\npupuk fertiphos\r\npupuk fertiphos pak tani\r\ncara aplikasi pupuk fertiphos pak tani\r\nfertiphos pak tani\r\npupuk npk phonska\r\nmanfaat pupuk npk phonska\r\npupuk npk phonska subsidi\r\npupuk subsidi\r\ncara menaikan ph tanah\r\nPupuk Dasar Cabe Paling Aman Musim Hujan!', 'https://youtu.be/BGfHBPMqSZY?si=K7SdTNszxFDM5bRu', 'petani', '2025-07-29 00:02:45', '2025-07-29 00:02:45', 0),
(18, '🟢 I DOUBLE BOL GUAMU SEEDS NATURALLY‼️ Without CUPBOARDS and STACKS', 'Title: I MULTIPLY GUAVA SEASONS NATURALLY‼️ Without GRAFTING or CUTTINGS\r\n\r\n🌱 Video Description:\r\nWho says multiplying guava seedlings has to involve grafting or cuttings? In this video, I show you a simple yet effective way to produce 4 fertile guava seedlings from just 1 seed!\r\nNo expensive tools, no complicated techniques — just the right planting medium, a little patience, and a simple trick that\'s rarely shared. Perfect for those of you who want to propagate your own guava seedlings at home. 📌 In this video, you will learn:\r\n✔️ How to select good guava seeds\r\n✔️ Suitable planting medium for sowing\r\n✔️ Safe seedling separation process\r\n✔️ Care tips for healthy, strong seedlings\r\n\r\n🌿 Support natural and cost-effective farming by liking, commenting, and subscribing to @penaGarden\r\n👉Click: https://bit.ly/penaGarden to stay updated on other exciting agricultural content!\r\n\r\n📅 Uploads every Sunday at 7:00 PM WIB\r\n📲 Shorts every day at 11:00 AM, 7:00 PM & 9:00 PM\r\n♨️ Posts every day at 9:00 AM and 3:00 PM\r\n\r\n-----------------------------------------\r\nRelated Videos:\r\n♻️How to Make a SUPER Powerful Organic PESTICIDE ‼️ Complete: TIPS on How to Use!\r\n   • ♻️Cara Membuat PESTISIDA Organik SUPER Amp...  \r\nIn this video, I\'ll show you how to make a natural pesticide, how to use it, and how to effectively repel insects like aphids, caterpillars, and thrips.\r\n\r\nHow to Create a Fertile and Loose Planting Medium for Plants\r\n   • Cara Membuat Media Tanam yang Subur dan Ge...  \r\nIn this video, we\'ll learn about the best planting medium composition, the organic ingredients that must be used, and tips for keeping the planting medium loose and not compacting quickly.\r\n\r\n🟢 TRY MY WAY TO MAKE LIQUID ORGANIC FERTILIZER | CELERY & ALL MY PLANTS GROW VERY FAST‼️\r\n   • 🟢 COBA CARA SAYA MEMBUAT PUPUK ORGANIK CAI...  \r\nIn this video, we\'ll learn how to make liquid organic fertilizer (POC), which has extraordinary properties, and how to use it properly to ensure your plants thrive.\r\n\r\n-----------------------------------------\r\n🔥 Popular Videos:\r\n🟢 FOLLOW MY WAY TO PLANTS CELERY IN POLYBAGS IN A SMALL PLACE 🍀:\r\n   • 🟢 IKUTI CARA SAYA TANAM SELEDRI DI POLYBAG...  \r\nIn this video, we\'ll learn how to plant celery in polybags in a small space at home so it grows well and yields a quick harvest.\r\n\r\n🌶🐞 How to Identify & Control Chili Plant Pests Naturally - 🐞 Leaf Beetle Attacks:\r\n   • 🌶 Cara Mengidentifikasi & Mengendalikan HA...  \r\nIn this video, we\'ll learn how to recognize ladybugs on chili plants, signs of attack and damage to chili plants, organic pest control methods, and how to prevent recurrent attacks.\r\n\r\n🌱 THE SECRET OF PLANTING JAMAICAN GUAVA FROM SEED - GROWING THRILY WITHOUT CHEMICALS ‼️\r\n   • 🌱 RAHASIA CARA MENANAM JAMBU BOL JAMAIKA D...  \r\nThis video explains the complete steps for growing guava from seed, which will thrive in 20 days, how to seed guava, and how to plant guava or Jamaican guava in polybags. This video includes important tips on planting media, how to prepare and select seeds, how to transplant, and how to care for your plants to ensure they thrive.\r\n\r\n-----------------------------------------\r\n\r\nHere\'s our playlist:\r\n✅How to grow Scallions: https://bit.ly/4eiGWb5\r\n✅How to grow Chili Peppers: https://bit.ly/TanamanCabeKu\r\n✅How to grow Guava: https://bit.ly/3HNvTdX\r\n✅How to grow Turmeric: https://bit.ly/tanamanKunyitKu\r\n✅How to grow Pumpkin: https://s.id/Tanaman_Labu\r\n✅How to grow Mango: https://bit.ly/tanamanManggaKu\r\n✅How to grow Pakcoy: https://bit.ly/tanamanPakcoyKu\r\n✅How to grow Lemongrass: https://bit.ly/4knEK3u\r\n✅How to grow Eggplant: https://bit.ly/3Ifs69c\r\n✅How to grow Flowers: https://s.id/Tanaman_Bunga\r\n✅How to make Organic Fertilizer: https://s.id/Pupuk_Organik\r\n✅Good Mulch for Plants: https://s.id/fxmf6\r\n✅Pest or Plant Pest Control: https://s.id/pbxyh\r\n✅Gardening Equipment: https://s.id/DWmci\r\n✅@penaGarden Gallery: https://s.id/Kb5l0\r\n-----------------------------------------\r\n\r\nKEYWORDS: shorts, guava plants, guava care, round guava, how to plant, how to care for, guava cultivation, urban farming, how to grow guava, fruit harvest, red round guava, farming tips, plant care, guava harvest, fruit cultivation, tropical plants,\r\n\r\n-----------------------------------------\r\nEquipment I use:\r\n1. Recording Equipment:\r\n• Camera: Samsung Android smartphone camera A50\r\n• Microphone: Samsung built-in microphone.\r\n• Lighting: Ambient lighting.\r\n• Tripod/Gimbal: To stabilize the camera and achieve smooth, unshaky footage.\r\n\r\n2. Editing Equipment:\r\n• Video Editing Software: PowerDirector.\r\n• Audio Editing Software: SpechLab.\r\n• Image Editing/Design Software: PixelLab.\r\n\r\n3. Supporting Equipment:\r\n• Research and SEO Tools: YouTube Studio, VidIQ, ChatGPT, Google Trends.\r\n\r\n-----------------------------------------\r\nGreen Greetings,\r\nSustainable Agriculture Greetings,\r\nGreetings @penaGarden.\r\n\r\n#penaGarden #MyGuavaPlant #guava\r\n#howtocare #guavaplant #guavabol #howtoplant #howtoplantguava #howtocare #guavacare #JamaicanGuava #guavafruit #fruitplants #guavacultivation #guavapests', 'https://youtu.be/-plrXxzdB-0?si=thLUiGmhf8TI4DfV', 'petani', '2025-07-29 00:04:33', '2025-07-29 00:04:33', 0),
(19, 'PEMUPUKAN PADI YANG TEPAT', 'Pemupukan padi yg tepat akan pengaruhi anakan banyak, pertumbuhan daun yang segar, akan terhindar dari penyakit blast daun.\r\n\r\n#PemupukanPadiYangTepat', 'https://youtu.be/6Y8rLToYfrw?si=iw1JCbDEet_OcbiX', 'petani', '2025-07-29 00:06:35', '2025-07-29 00:06:35', 0),
(20, 'HANYA PETANI BERKUALITAS YG TAU INI‼️ Cara agar tanaman tumbuh subur dengan cepat', 'Cara agar tanaman tumbuh subur deng cepat mengunakan Pupuk cair untuk tanaman padi yaitu Cara membuat pupuk organik cair dan cara memperbanyak anakan padi pupuk cair untuk tanaman padi ini sanggup menggantika pupuk urea yg hanya untuk menghijaukan daun nah pupuk cair untuk tanaman padi sawah bahanya itu sederhana tapi hasilnya luar biasa pupuk cair untuk tanaman padi yang bagus ini adalah dari satu buah kelapa yg ampuh mengatasi peyakit pada tanaman padi akibat hawar daun bakteri dan jamur patogen yg mengakibatkan daun padi menguning kemerahan \r\nUntuk lebih jelasnya silahkan simak videonya sampai selesai\r\nTENTANG VIDEO INI:\r\npupuk organik cair,cara memperbanyak anakan padi,ogieq gd,pupuk cair untuk tanaman padi,pupuk cair untuk tanaman padi sawah,pupuk cair untuk tanaman padi yang bagus,tanaman padi,pupuk mkp untuk padi,pemupukan padi yang tepat,pupuk padi agar hasil melimpah,pupuk padi agar hasil melimpah dengan campuran,pupuk padi pertama agar hasil melimpah,cara agar tanaman padi tumbuh subur \r\nDUKUNG CHANNEL OGIEQ GD Dengan cara Like komen dan subscribe di setiap videonya', 'https://youtu.be/kB78rjZgoqM?si=eXhnUcyFb0Y44dnZ', 'petani', '2025-07-29 00:08:03', '2025-07-29 00:08:03', 0),
(21, 'Cara Pemupukan Padi dari Awal hingga Panen', 'Cara pemupukan tanaman padi yang tepat akan berpengaruh pada hasil panen padi. Pemupukan berimbang pada tanaman padi bermanfaat untuk meningkatkan produksi dan mutu hasil, menjaga kesuburan tanah, dan menghindari pencemaran lingkungan.\r\nDalam video ini menjelaskan tentang cara pemupukan tanaman padi pada umur :\r\n1. Sepuluh (10) sampai dengan 15 Hari setelah Tanam\r\n2. 25 Sampai 30 Hari Setelah Tanam\r\n3. 45 Hari Setelah Tanam\r\n4. 60 Hari Setelah Tanam\r\n\r\nAdapun Manfaat pemupukan berimbang pada tanaman padi adalah:\r\n1. Memperkuat akar tanaman padi\r\n2. Memperkuat vigor anakan padi sehingga tidak mudah rebah\r\n3. Memacu terbentuknya bunga dan bulir pada malai padi\r\n4. Memicu pertumbuhan daun baru tanaman padi\r\n5. Memperbesar batang padi\r\n6. Meningkatkan pertumbuhan akar tanaman padi\r\n7. Membuat warna daun lebih tampak hijau\r\n8. Memperbanak anakan tanaman padi', 'https://youtu.be/aXop1MhvgsA?si=--4WbDSaRVWqkXaW', 'petani', '2025-07-29 00:09:08', '2025-07-29 00:09:08', 0),
(22, 'Cara Sukses Menjadi Petani Semangka, Hasilkan Ratusan Juta', 'Hallo sahabat DEDI TV\r\nJangan lupa subscribe,like,komen dan share ya. Biar semangat bikin konten tentang pertanian\r\n\r\nLink pembelian bibit semangka ada di bawah\r\n\r\nSemangka Kuning\r\nhttps://shope.ee/6UlWtLOLpb\r\n\r\nSemangka Lonjong\r\nhttps://shope.ee/2psEWkyrmE\r\n\r\nKamera yang saya gunakan\r\nhttps://shope.ee/5pVi2r99RB\r\n\r\nLensa Sigma 30mm f1.4\r\nhttps://shope.ee/3KoN4N33QG\r\n\r\n#deditv #pertanian #petani #petanimilenial #petanimuda #petaniindonesia #petanisukses #budidayasemangka #semangka #carabudidayasemangka', 'https://youtu.be/72G9ZJCf09I?si=PFU1OD9tcQUfIwXD', 'semua', '2025-07-29 00:10:49', '2025-07-29 00:10:49', 0),
(23, 'Buktikan Petani Bisa Sukses, Mbah Kerto Memotivasi para Pemuda Desa #BuletiniNewsPagi 07/07', 'Program berita harian yang menyajikan berbagai peristiwa terkini secara cepat dan akurat dari seluruh Indonesia. Mengupas berbagai masalah yang tengah hangat di masyarakat, baik di bidang sosial, ekonomi, perkotaan, hingga dunia hukum dan politik. Semuanya dikemas secara mendalam, menyentuh tapi tetap kritis. \r\n\r\nBuletin iNews Pagi, Siang, dan Malam juga dilengkapi dengan berita-berita hiburan serta feature unik baik dari dalam dan luar negeri yang disajikan secara humanis.\r\n\r\nSubscribe iNews Official Youtube Channel:\r\n   / officialinews  \r\n\r\nSubscribe Buletin iNews Youtube Channel:\r\n   / gtvnewsindonesia  \r\n\r\nFollow Our Official Twitter:   / gtvid_news  \r\nCheck Our Official Website: https://www.inews.id\r\nLike Our Official Facebook:   / gtvindonesianews  \r\nFollow Our Official Instagram:\r\n  / gtvindonesia_news  \r\n\r\nSaksikan info berita terkini di:\r\nBuletin iNews Pagi: Senin – Jumat Pukul 03.45 WIB\r\nBuletin iNews Siang: Setiap Hari Pukul 10.30 WIB \r\nBuletin iNews Malam: Senin – Jumat 01.00 WIB\r\nBuletin iNews: Senin – Jumat 12.00 | 14.00 | 00.00', 'https://youtu.be/e1MBFYyDdeM?si=amOpTmrsTiVnXh8v', 'semua', '2025-07-29 00:11:54', '2025-07-29 00:11:54', 0),
(24, 'KISAH PETANI MILENIAL BANDUNG SUKSES EKSPOR KOPI ARABIKA KE TIMUR TENGAH HINGGA EROPA', 'Satrea Amambi, petani milenial asal Bandung ini sukses memanfaatkan potensi besar dari komoditas kopi arabika yang ada di wilayahnya menjadi produk bernilai ekonomi dengan menembus pasar global.\r\n\r\nSejak tahun 2014, pemuda asal Desa Laksana, Kecamatan Ibun, Kabupaten Bandung, Jawa Barat ini mengelola Kopi Wanoja dari yang hanya 1,5 hektar kini berkembang menjadi 20 hektar.\r\n\r\nDimulai dari menjual di pasar roastery, agregator, hingga e-commerce, Satrea mengembangkan usahanya ke pasar ekspor di tahun 2020. Kerja kerasnya terbayar, ia pun berhasil mengekspor kopi olahannya hingga ke Jepang, Uni Emirat Arab, dan Jerman.\r\n\r\nTonton Kisah Lengkapngnya\r\nJangan Lupa Tonton Kisah Tani lainya ya !', 'https://youtu.be/eMFc59UpLfk?si=YHAsyQprG0TWJtKY', 'semua', '2025-07-29 00:13:36', '2025-07-29 00:13:36', 0),
(25, 'Rahasia Pertanian Modern Buah Apel Organik di Amerika', 'Hallo sahabat rekayasa teknologi,\r\nsetelah pada episode sebelumnya kita membahas proses pertanian buah pir, tidak kumplit rasanya jika tidak langsung membahas proses pertanian buah apel. hal ini buka soal buah pir dan buah apel yang sering dijejerkan di toko buah, tapi lebih karena biasanya petani yang membudidayakan buah pir, juga menanam buah apel. sehingga tidak heran, baik cara perawatan, prilaku dan metode tanamanya pun cenderung sama. Namun untuk menghindari kebosanan dari penonton, akhirnya rekayasa teknologi putuskan untuk melihat perkebunan buah apel yang organik, yang bebas dari bahan kimia, dan bagaimana proses perkebunan ini memenuhi nutrisi yang dibutuhkan buah apel untuk musim panen berikutnya. Yuk langsung simak saja langsung liputannya kali ini, pertanian buah apel organik bebas bahan kimia.\r\n\r\njika kamu menyukainya, silahkan klik tombol like dan share,\r\nDan jika kamu ada masukan, atau ingin request cukup tuliskan dalam komen, nanti mimin masukan ke daftar episode berikutnya, tapi wajib sabar ya. satu-satu kita nanti bahas, dan juga diselingi dengan beberapa episode menarik lainnya.\r\n\r\n#rekayasateknologi, #apel, #apple, #panenapel, #harvestingapple, #buahapel, #perkebunanmodern, #pertanianmodern, #PERKEBUNANAPELDENGANTEKNOLOGIMODERN, #PERTANIANAPELTRADISIONAL, #carabudidaya, #cultivation, #farm, #caramenanam, #kejadiananeh, #kebunapel, #pertanianorganikmodernterpadu, #teknologipertanian, #pertanianmodern, #alatpertanianmodern, #caramenanamapeldaribiji, #caramenanamapel, #pertanianmodern, #farm, #harvestingapplesvideo, #harvestingapples', 'https://youtu.be/EjIQcRbIuVw?si=7mANNzG67rxo-2eg', 'petani', '2025-07-29 00:15:53', '2025-07-29 00:15:53', 0),
(26, 'Jarak Tanam Padi Di Negara Maju (Taiwan)', 'Jarak Tanam Padi Di Negara Maju (Taiwan) adalah 30 cm x 20cm. Penanaman padi di Taiwan ditanam dengan menggunakan mesin traktor, bukan dengan tenaga manusia, jadi jarak tanamnya rata-rata sama. Penanaman padi di Taiwan tidak ada jarak yang lebih lebar yang digunakan orang untuk jalan pemupukan atau penyemprotan. Karena pemupukan dan penyemprotan semua menggunakan mesin.', 'https://youtu.be/NHvWT8obi64?si=YKFA6FQmpL_0f_MJ', 'petani', '2025-07-29 08:46:08', '2025-07-29 08:46:08', 0),
(27, 'My[VLOG] Cara Cepat Tanam Padi Jajar Legowo Secara Manual', 'Tentunya jika kita memahami dan mengerti cara tanam padi yang tepat, tentunya akan lebih mempermudah dan jauh menghemat waktu dari cara yang biasanya..\r\n\r\n\r\nSelamat Mencoba yah ...Sobat Tani... Semoga Bermanfaat', 'https://youtu.be/Pi4vAuScl60?si=zgANd9PXEG54Yzpn', 'petani', '2025-07-29 08:48:02', '2025-07-29 08:48:02', 0),
(28, 'Informasi harga cabai hari ini!! Koperasi cabe Kab. Magelang', 'Seputar Seputar liputan info harga lelang cabai \r\nCHAMPION CABE KAB. MAGELANG \r\nKOPERASI PANCARGA TANI GEMILANG Jateng Info harga lelang cabai hari ini atau info lokasi tanggal 27 & 28  juli 2025 KORWIL Kec. Pakis Kab. Magelang Jawa Tengah\r\n\r\nLiputan info harga lelang cabai lokal\r\n\r\nCHAMPION CABE KAB.MAGELANG\r\nKOPERASI PANCA ARGA TANI GEMILANG\r\nMeliput dan menginformasikan tentang harga lelang cabai hari ini\r\nSahabat tani agar tidak ketinggalan info setiap harinya khususnya petani cabai terus ikuti channel saya dan jangan lupa like, komen dan subscribe nya(@Sariftanichannel6685) \r\n\r\n\r\n\r\nTag\r\n\r\n\r\n\r\nBerita terkini\r\nInfo harga cabai hari ini, koperasi cabe, Champion cabe kabupaten magelang, koperasi jasa pancarga tani gemilang, Champion cabe Indonesia, \r\nharga cabai di pasar induk kramat jati hari ini,harga cabai di pasar induk pare hari ini,harga cabai rawit merah hari ini,harga cabai hari ini,harga cabai kriting hari ini,harga cabai di jawa timur hari ini,harga cabai di jateng hari ini,harga cabai di Bogor hari ini,info harga cabai pasar induk hari ini,petani cabai temanggung,Champion cabe Kab. Magelang,Harga cabai Kab. Temanggung,harga cabai Sleman jogja,harga cabai pasar johar semarang,harga cabai lampung\r\n\r\n\r\nHarga cabai tidak stabil kadang naik kadang turun\r\nMenurut sejumlah pedagang di pasar tradisional, kenaikan ini terutama terjadi pada jenis cabai merah yang semuanya mengalami lonjakan cukup drastis.\r\n\r\n\r\nkenaikan harga terjadi baik pada rawit merah, cabai keriting merah, maupun cabai pilar atau cabai teropong\r\nJangan sampai ketinggalan informasi terupdate info harga cabai\r\nPrediksi harga cabai\r\nprediksi harga cabai rawit tahun 2025\r\nprediksi harga cabai rawit merah,\r\nprediksi harga cabai rawit merah hari ini,\r\n\r\nprediksi harga cabai rawit,\r\nprediksi harga cabai rawit mahal,\r\n\r\n\r\nprediksi harga cabai rawit di pasar induk hari ini,\r\nharga cabai rawit merah hari ini di pasar induk cibitung,\r\nprediksi harga cabe,\r\nprediksi harga cabe hari ini, prediksi harga cabai rawit anjlok,\r\nprediksi harga cabai rawit di pasar induk pare,\r\nprediksi harga cabai rawit di pasar induk hari ini', 'https://youtu.be/e1TDefjnVJk?si=XI0HkBxbEHl76hv0', 'pembeli', '2025-07-29 08:50:21', '2025-07-29 08:50:21', 0),
(29, 'Pengusaha Muda 21 Tahun, Sukses Hasilkan RATUSAN JUTA Dari Bertani Cabe', 'Pengusaha Muda 21 Tahun, Sukses Hasilkan RATUSAN JUTA Dari Bertani Cabe\r\nDi episode ke 2 naik kelas, kami mengangkat kisah sukses Ujang Solehudin, pengusaha muda sukses di bidang pertanian\r\nPetani muda sukses yang berasal dari Panjalu Ciamis ini berhasil budidaya cabe grade supermarket\r\nDi usia nya yang baru 21 Tahun, Ujang bisa menghasilkan ratusan juta dalam satu kali panen\r\nUjang akan menceritakan bagaimana awal mula perjalanannya, dan akan membagikan tips untuk bertani cabe', 'https://youtu.be/krgsiXqA8-o?si=CsEEbAXJgzs6XHQj', 'semua', '2025-07-30 02:05:17', '2025-07-30 02:06:31', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `video_comments`
--

CREATE TABLE `video_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `video_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `video_likes`
--

CREATE TABLE `video_likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `video_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('like','dislike') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `artikels`
--
ALTER TABLE `artikels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artikels_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Indeks untuk tabel `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_post_id_foreign` (`post_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_user_id_foreign` (`user_id`),
  ADD KEY `products_kategori_id_foreign` (`kategori_id`);

--
-- Indeks untuk tabel `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `transfer_petani`
--
ALTER TABLE `transfer_petani`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transfer_petani_petani_id_foreign` (`petani_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `video_comments`
--
ALTER TABLE `video_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `video_comments_video_id_foreign` (`video_id`),
  ADD KEY `video_comments_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `video_likes`
--
ALTER TABLE `video_likes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `video_likes_video_id_user_id_unique` (`video_id`,`user_id`),
  ADD KEY `video_likes_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `artikels`
--
ALTER TABLE `artikels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT untuk tabel `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT untuk tabel `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `transfer_petani`
--
ALTER TABLE `transfer_petani`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `video_comments`
--
ALTER TABLE `video_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `video_likes`
--
ALTER TABLE `video_likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `artikels`
--
ALTER TABLE `artikels`
  ADD CONSTRAINT `artikels_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategoris` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transfer_petani`
--
ALTER TABLE `transfer_petani`
  ADD CONSTRAINT `transfer_petani_petani_id_foreign` FOREIGN KEY (`petani_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `video_comments`
--
ALTER TABLE `video_comments`
  ADD CONSTRAINT `video_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `video_comments_video_id_foreign` FOREIGN KEY (`video_id`) REFERENCES `videos` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `video_likes`
--
ALTER TABLE `video_likes`
  ADD CONSTRAINT `video_likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `video_likes_video_id_foreign` FOREIGN KEY (`video_id`) REFERENCES `videos` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
