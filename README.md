# Aplikasi Blog

## Identitas Mahasiswa

* Nama : Alfiatu Nurfaizah
* NIM :240605110052

---

## Deskripsi Aplikasi

Aplikasi Blog merupakan sistem manajemen konten (Content Management System/CMS) berbasis Laravel yang digunakan untuk mengelola artikel, penulis, dan kategori artikel. Aplikasi ini menyediakan halaman admin yang hanya dapat diakses oleh pengguna yang telah login serta halaman pengunjung yang dapat diakses secara publik untuk membaca artikel yang telah dipublikasikan.

Fitur utama aplikasi:

* Login dan Logout
* Dashboard Admin
* Kelola Artikel (Tambah, Ubah, Hapus)
* Kelola Penulis
* Kelola Kategori Artikel
* Upload Gambar Artikel
* Halaman Pengunjung (Publik)
* Detail Artikel
* Filter Artikel Berdasarkan Kategori

---

## Langkah Menjalankan Aplikasi Secara Lokal

### 1. Clone Repository

```bash
git clone https://github.com/USERNAME/aplikasi-blog.git
```

### 2. Masuk ke Folder Project

```bash
cd aplikasi-blog
```

### 3. Install Dependency Laravel

```bash
composer install
```

### 4. Buat File Environment

Salin file `.env.example` menjadi `.env`

```bash
copy .env.example .env
```

atau

```bash
cp .env.example .env
```

### 5. Generate APP_KEY

```bash
php artisan key:generate
```

### 6. Konfigurasi Database

Buat database:

```text
db_blog
```

Kemudian sesuaikan konfigurasi database pada file `.env`.

### 7. Jalankan Migrasi (Jika Diperlukan)

```bash
php artisan migrate
```

### 8. Buat Symbolic Link Storage

```bash
php artisan storage:link
```

### 9. Jalankan Aplikasi

```bash
php artisan serve
```

Akses aplikasi melalui:

```text
http://127.0.0.1:8000
```

atau

```text
http://localhost/aplikasi-blog/public
```

---

## Video Demonstrasi

Link YouTube:

[https://youtube.com/ISI_LINK_VIDEO_KAMU](https://youtu.be/vhwOTVp-eks)
