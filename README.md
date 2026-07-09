# 💍 EverVow - Premium Digital Invitation SaaS

SaaS Undangan Digital Premium berbasis web dengan sistem kustomisasi tema dinamis. Dibangun menggunakan teknologi **Laravel, Alpine.js, Tailwind CSS**, serta dilengkapi dengan animasi profesional (*AOS*).

Proyek ini telah melalui perombakan arsitektur besar-besaran untuk menjadikannya standar industri SaaS undangan pernikahan (setara dengan platform premium seperti Invisimple).

---

## 🚀 Fitur Utama & Pengembangan (Fase 1-3)

### Fase 1: Core Engine & Database
*   **Migrasi ke Alpine.js:** Menghapus ketergantungan Livewire pada Builder Form untuk mengatasi bug sinkronisasi state. Form kini menggunakan kombinasi Blade murni dan reaktifitas *real-time* dari Alpine.js (bebas lag).
*   **Schema Database Lengkap:** 
    *   Tabel `invitations`: Menyimpan data komprehensif seperti Akad, Resepsi, Link Streaming, Quotes Surat Al-Quran, dan Alamat Kado Fisik.
    *   Tabel `brides`: Menyimpan nama lengkap, panggilan, orang tua, dan foto mempelai pria/wanita.
    *   Tabel `envelopes`, `guests`, dan `guestbooks` (RSVP).

### Fase 2: Sistem Admin & Kontrol Akses (Monetization)
*   **Katalog Tema & Harga:** Admin dapat melihat daftar tema beserta harganya.
*   **Locked Theme System (Premium Model):** Klien tidak bisa sembarangan memilih atau mengganti tema di Builder. Tema **dikunci (locked)** berdasarkan paket yang diberikan oleh Admin saat pembuatan akun klien.
*   **Dashboard Admin:** Penambahan modal *Tambah Klien* yang mewajibkan Admin untuk memilihkan tema bagi klien tersebut.

### Fase 3: Frontend Overhaul & Premium Aesthetics
*   **Dynamic Theme Engine:** Template utama (`show.blade.php`) kini secara otomatis menarik aset (bunga, pembatas, warna) berdasarkan *slug* tema klien.
*   **Efek Visual Mewah (Tanpa Perlu Jago Desain):**
    *   **Paper Texture:** Latar belakang memiliki tekstur serat kertas linen berkat filter SVG Noise.
    *   **Golden Ring:** Foto mempelai secara otomatis dibingkai dengan cincin emas tipis (*CSS trick*).
    *   **Breathing Animation:** Ornamen bunga sudut mengambang dan membesar-mengecil perlahan layaknya tertiup angin.
*   **Smooth UX:** Penambahan *Sticky Bottom Navigation Bar* untuk akses cepat (Beranda, Mempelai, Acara, Galeri, RSVP) persis seperti aplikasi mobile kelas atas. Animasi menggunakan perpustakaan AOS.

---

## 🎨 Panduan Menambah Tema Baru (Untuk Kolaborator / Desainer)

Sistem *Asset Engine* sudah dibuat sangat otomatis. Anda **tidak perlu mengutak-atik kode PHP terlalu dalam** jika hanya ingin membuat tema baru. 

### Langkah 1: Siapkan Aset PNG
Buat folder baru dengan nama *slug* tema (misalnya `bunga-biru` atau `jawa-klasik`) di direktori: `public/assets/themes/{slug}/`

Pastikan nama file dan formatnya sesuai:
1.  `corner.png` (Wajib) : Ornamen sudut (biasanya bunga watercolor) dengan *background transparan*.
2.  `divider.png` (Opsional) : Ornamen garis pembatas antar sesi.

### Langkah 2: Daftarkan Palet Warna Tema (Opsional)
Buka file `resources/views/invitation/show.blade.php`, cari variabel `$themeConfig`, lalu tambahkan *slug* tema baru beserta warna yang diinginkan. Contoh:
```php
'bunga-biru' => [
    'bg_main' => 'bg-blue-50',
    'text_main' => 'text-blue-950',
    'text_muted' => 'text-blue-700',
    'accent' => 'text-blue-600',
    'accent_bg' => 'bg-blue-600',
    'card_bg' => 'bg-white shadow-xl shadow-blue-900/5 border border-blue-100',
    'ornament_color' => '#2563eb', // Fallback warna SVG jika PNG tidak ada
]
```
Selesai! Sistem akan otomatis memasangkan aset gambar dan palet warna ke dalam undangan dan *Live Smartphone Preview* di dalam Builder!

---

## 🛠️ Tech Stack & Setup Installation

*   **Backend:** Laravel 11.x / PHP 8.2+
*   **Frontend Template:** Blade Engine + Tailwind CSS (via CDN/Build)
*   **Frontend Interactivity:** Alpine.js v3
*   **Animations:** AOS (Animate on Scroll)

### Cara Install di Komputer Lokal (Kolaborator):
1.  Clone repository ini dari GitHub.
2.  Buka terminal, jalankan: `composer install`
3.  Copy file env: `cp .env.example .env`
4.  Generate key: `php artisan key:generate`
5.  Setting koneksi database (MySQL) di dalam file `.env`.
6.  Migrasi database beserta seeder (jika ada): `php artisan migrate --seed`
7.  **PENTING!** Link folder storage agar foto/musik bisa diakses publik: `php artisan storage:link`
8.  Jalankan server: `php artisan serve`

---
*Dokumentasi ini ditulis sebagai catatan pengembangan kolaboratif, hasil kerja keras Arsitek AI & Developer.*
