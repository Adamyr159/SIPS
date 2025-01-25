<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Proyek Laravel - Instalasi dan Setup

Terima kasih telah meng-clone repository ini! Berikut adalah langkah-langkah untuk menginstall dan menjalankan proyek Laravel ini di komputer kamu.

## Prasyarat

Sebelum mulai, pastikan kamu sudah menginstall hal-hal berikut:

- **PHP** (versi 8.1 atau lebih baru)  
  Kamu bisa mendownload PHP di [https://www.php.net/downloads](https://www.php.net/downloads).  
  Kamu bisa mengecek versi PHP dengan perintah:

  ```bash
  php -v
  ```

- **Composer** (untuk mengelola dependensi PHP)  
  Download Composer di [https://getcomposer.org/download/](https://getcomposer.org/download/) dan ikuti instruksinya.  
  Kamu bisa mengecek versi Composer dengan perintah:

  ```bash
  composer --version
  ```

## Langkah-langkah Instalasi

### 1. Clone Repository

Clone repository ini ke komputer kamu:

```bash
git clone https://github.com/Adamyr159/SIPS.git
cd repository-name
```

### 2. Install Dependensi PHP dengan Composer

Jalankan perintah berikut untuk menginstall dependensi PHP yang diperlukan oleh proyek:

```bash
composer install
```

### 3. Buat File .env

Salin file `.env.example` menjadi file `.env` dengan perintah:

```bash
cp .env.example .env
```

### 4. Generate Key Laravel

Laravel memerlukan aplikasi key yang unik. Jalankan perintah berikut untuk menghasilkan key tersebut:

```bash
php artisan key:generate
```

### 5. Setup Database

Pastikan kamu sudah membuat database untuk aplikasi ini. Setelah itu, sesuaikan pengaturan database di file `.env` seperti berikut:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=root
DB_PASSWORD=
```

### 6. Jalankan Migrasi Database

Jalankan perintah berikut untuk membuat tabel di database:

```bash
php artisan migrate
```

### 7. Jalankan Server Pengembangan Laravel

Sekarang, kamu bisa menjalankan server pengembangan Laravel dengan perintah:

```bash
php artisan serve
```

Aplikasi akan berjalan di `http://localhost:8000`. Kamu dapat mengaksesnya di browser untuk melihat aplikasi berjalan.

## Masalah Umum

- Jika mengalami masalah dengan dependensi atau versi, pastikan PHP dan Composer yang kamu gunakan kompatibel dengan proyek ini.
- Jika ada error terkait database, pastikan pengaturan `.env` sudah benar.

---

Dengan langkah-langkah di atas, kamu seharusnya dapat menjalankan proyek Laravel ini tanpa masalah. Selamat mencoba!