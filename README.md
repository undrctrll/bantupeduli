# 🌟 Aplikasi Donasi Panti Asuhan - Laravel

**Aplikasi Donasi Panti** adalah sebuah platform web berbasis Laravel yang dirancang untuk memudahkan masyarakat dalam menyalurkan bantuan atau donasi kepada panti asuhan yang membutuhkan. Platform ini bertujuan untuk mempertemukan para donatur dengan panti asuhan dan kegiatan sosial lainnya melalui sistem yang transparan, mudah diakses, dan efisien.

Aplikasi ini menampilkan daftar kampanye donasi, informasi panti asuhan, artikel kegiatan sosial, dan menyediakan formulir donasi yang memungkinkan pengguna untuk ikut berkontribusi secara langsung. Admin juga dapat menambahkan kampanye baru, memperbarui informasi panti asuhan, dan mengelola konten dari halaman backend.

---

## ✨ Fitur Utama

- 🔐 **Autentikasi Pengguna**
  - Registrasi dan login untuk pengguna.
  - Middleware untuk membatasi akses ke halaman tertentu.

- 📢 **Kampanye Donasi**
  - Menampilkan daftar kampanye donasi terbaru.
  - Detail kampanye yang mencakup gambar, deskripsi, dan tujuan bantuan.

- 🏠 **Profil Panti Asuhan**
  - Menampilkan informasi 3 panti asuhan terbaru di halaman utama.
  - Detail panti dapat mencakup lokasi, deskripsi, dan kontak.

- 📚 **Berita & Artikel Sosial**
  - Informasi seputar kegiatan sosial dan keberhasilan program bantuan.

- 💸 **Formulir Donasi**
  - Form donasi yang memungkinkan pengguna mengisi data donasi.
  - Gambar dan bukti transfer bisa diunggah.

- 📦 **Manajemen Konten oleh Admin**
  - Admin dapat menambah/mengedit/menghapus kampanye dan panti.
  - Sistem dashboard (jika diaktifkan) untuk pengelolaan konten.

- 📷 **Upload Gambar**
  - Semua kampanye dan panti asuhan mendukung upload gambar melalui Laravel Storage.

---

## 🧱 Teknologi yang Digunakan

- **Laravel 10 / 12+**
- **PHP 8.1 / 8.2**
- **MySQL / MariaDB**
- **Bootstrap 5** untuk tampilan frontend
- **Blade** sebagai template engine Laravel
- **Laravel Breeze / Jetstream** untuk sistem autentikasi (opsional)

---

## 🚀 Panduan Instalasi

1. **Clone Repository**

```bash
git clone https://github.com/namakamu/laravel-donasi-panti.git
cd laravel-donasi-panti
