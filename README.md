# Katalog Digital & Direct Order WhatsApp UMKM

Aplikasi katalog produk berbasis web yang dirancang khusus untuk pelaku UMKM. Sistem ini memfasilitasi pemesanan cepat tanpa pendaftaran akun (_guest checkout_) yang terintegrasi langsung dengan generator pesan konfirmasi otomatis via WhatsApp Admin.

## 🛠️ Tech Stack

- **Framework**: Laravel 11 (PHP 8.4)
- **Database**: MySQL
- **Frontend**: Blade Engine, Tailwind CSS
- **Architecture**: MVC Pattern with Form Request Isolation & PRG Pattern

## ✨ Fitur Utama

1. **Katalog & Filter Produk**: Navigasi pencarian produk berdasarkan kategori.
2. **Detail & Stok Real-Time**: Informasi rincian produk dan ketersediaan stok terkini.
3. **Direct Order Form**: Formulir pemesanan langsung (_guest checkout_).
4. **WhatsApp Link Generator**: Pembuatan nota transaksi dan URL konfirmasi pesan otomatis ke admin.
5. **Admin Dashboard**: Pengelolaan CRUD data produk, pembaruan stok, dan manajemen status pesanan.

## 🚀 Langkah Penginstalan (Local Setup)

1. **Clone Repository**
    ```bash
    git clone [https://github.com/username/nama-repository.git](https://github.com/username/nama-repository.git)
    cd nama-repository
    Install Dependensi PHP
    ```
2. Install Dependensi PHP

    ```bash
    composer install
    Konfigurasi Environment
    ```

3. Konfigurasi Environment

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

    <i>Atur koneksi basis data (DB_DATABASE, DB_USERNAME, DB_PASSWORD) di dalam file .env.
    </i>

4. Migrasi Database & Seeder

    ```bash
    php artisan migrate --seed
    ```

5. Jalankan Server Lokal

    ```bash
    php artisan serve
    Akses aplikasi di peramban melalui alamat http://127.0.0.1:8000.
    ```

## 📁 Komponen Arsitektur Saat ini

```
app/Http/Controllers/OrderController.php — Mengelola alur transaksi checkout dan halaman sukses.
```

```
app/Http/Requests/OrderRequest.php — Menangani isolasi validasi input transaksi.
```

```
app/Models/Order.php — Model data pesanan beserta proteksi atribut $fillable.
```

```
resources/views/success.blade.php — Tampilan nota transaksi dan tombol pengalihan WhatsApp.
```

👤 Penulis
Ammar Shafiy
