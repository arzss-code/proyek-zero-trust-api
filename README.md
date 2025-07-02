# Proyek API Zero Trust

Proyek ini adalah aplikasi web dan API yang dibangun dengan **Laravel**, dengan fokus pada penerapan prinsip-prinsip **Zero Trust**. Aplikasi ini mencakup fungsionalitas untuk otentikasi pengguna, baik melalui login standar maupun Google, serta menyediakan *endpoint* API yang aman untuk mengakses data pengguna dan laporan keuangan.

---
## 🚀 Fitur Utama

* **Otentikasi Pengguna**: Sistem login dan registrasi standar, serta opsi login menggunakan akun Google.
* **API Terlindungi**: *Endpoint* API diamankan menggunakan **Laravel Passport** dengan *scopes* untuk kontrol akses yang terperinci.
* **Manajemen Peran**: Pengguna dapat memiliki peran yang berbeda (misalnya, `admin` dan `user`), yang menentukan akses mereka ke data sensitif seperti laporan keuangan.
* **Dasbor Pengguna**: Halaman dasbor yang menampilkan informasi profil pengguna setelah berhasil login.
* **Laporan Keuangan**: Halaman khusus untuk menampilkan laporan keuangan yang hanya dapat diakses oleh pengguna dengan peran `admin`.

---
## 🛠️ Teknologi yang Digunakan

* **Backend**: Laravel 12
* **Frontend**: Vite, Tailwind CSS
* **API Otentikasi**: Laravel Passport
* **Login Sosial**: Laravel Socialite (untuk Google)
* **Database**: MySQL

---
## ⚙️ Instalasi dan Pengaturan

1.  ***Clone* Repositori**
    ```bash
    git clone [https://github.com/proyek-zero-trust-api.git](https://github.com/proyek-zero-trust-api.git)
    cd proyek-zero-trust-api
    ```
2.  **Instal *Dependency***
    ```bash
    composer install
    npm install
    ```
3.  **Konfigurasi Lingkungan**
    Salin berkas `.env.example` menjadi `.env` dan sesuaikan variabel lingkungan, terutama untuk koneksi basis data dan kredensial Google.
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```
4.  **Migrasi Basis Data dan *Seeding***
    Jalankan migrasi untuk membuat tabel-tabel yang diperlukan dan *seeder* untuk mengisi data awal (pengguna admin dan biasa).
    ```bash
    php artisan migrate --seed
    ```
5.  **Instalasi Laravel Passport**
    ```bash
    php artisan passport:install
    ```
6.  **Jalankan Aplikasi**
    Gunakan perintah `dev` yang telah dikonfigurasi di `composer.json` untuk menjalankan *server development* dan *compiler asset* secara bersamaan.
    ```bash
    composer run dev
    ```

---
## 🔑 *Endpoint* API

API ini menyediakan beberapa *endpoint* yang dilindungi dan memerlukan token otentikasi.

* `POST /api/v1/register` - Mendaftarkan pengguna baru.
* `POST /api/v1/login` - Melakukan login dan mendapatkan token akses.
* `POST /api/v1/logout` - Melakukan *logout* dan mencabut token saat ini (memerlukan otentikasi).
* `GET /api/v1/user` - Mendapatkan data pengguna yang terotentikasi (memerlukan *scope* `lihat-profil`).
* `GET /api/v1/laporan-keuangan` - Mendapatkan data laporan keuangan (memerlukan *scope* `lihat-laporan-keuangan`).
