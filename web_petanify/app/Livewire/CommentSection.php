<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Comment;
use App\Models\Post; // Import model Post, mungkin Anda akan membutuhkannya
use Illuminate\Support\Facades\Auth; // Pastikan ini diimpor jika Anda menggunakan Auth::id()

class CommentSection extends Component
{
    public $postId; // Properti untuk menyimpan ID Post yang sedang aktif
    public $commentText = ''; // Properti untuk input teks komentar

    // Aturan validasi untuk input komentar
    protected $rules = [
        'commentText' => 'required|string|max:500' // Saya ubah max:255 ke 500 sebagai contoh, sesuaikan kebutuhan
    ];

    /**
     * Metode mount dipanggil saat komponen diinisialisasi.
     * Menerima $postid yang dilewatkan dari view Blade.
     */
    public function mount($postid) // Pastikan parameter ini ada dan namanya sama dengan yang dikirim
    {
        $this->postId = $postid;
    }

    /**
     * Metode ini dipanggil saat form komentar di-submit.
     */
    public function submit()
    {
        // Jalankan validasi
        $this->validate();

        // Buat komentar baru di database
        Comment::create([
            'user_id' => Auth::id(), // Menggunakan ID pengguna yang sedang login
            'post_id' => $this->postId, // Menggunakan postId dari properti komponen
            'comment' => $this->commentText, // ✅ Saya ubah 'content' menjadi 'comment' agar konsisten dengan Blade sebelumnya
        ]);

        // Bersihkan input teks komentar setelah berhasil dikirim
        $this->commentText = '';

        // Opsional: Kirim pesan sukses (akan muncul jika Anda menampilkannya di view komponen Livewire)
        session()->flash('message', 'Komentar berhasil ditambahkan!');
    }

    /**
     * Metode render dipanggil setiap kali komponen dirender.
     * Mengambil komentar terbaru untuk postingan ini.
     */
    public function render()
    {
        // Ambil semua komentar yang terkait dengan postId ini
        $comments = Comment::where('post_id', $this->postId)
            ->with('user') // Muat relasi user untuk setiap komentar
            ->latest() // Urutkan dari yang terbaru
            ->get();

        // Kembalikan view komponen Livewire dengan data komentar
        return view('livewire.comment-section', compact('comments'));
    }
}