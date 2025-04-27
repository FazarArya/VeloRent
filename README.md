## About VeloRent

<p align="center">
  <img src="public/images/Logo VeloRent (1).png" width="300" alt="VeloRent Logo">
</p>

VeloRent adalah project website sederhana untuk layanan penyewaan kendaraan sepeda motor dan mobil, dibangun menggunakan framework Laravel.  
Project ini bertujuan untuk memudahkan pengguna dalam melakukan reservasi kendaraan dengan cepat dan efisien melalui sistem online.

## Getting Started

Ikuti langkah-langkah di bawah ini untuk menjalankan project VeloRent di lokal.

### Prerequisites

Pastikan software berikut sudah terpasang di komputer kamu:

- PHP (versi 8.2.22 atau lebih baru)
- Composer
- Laravel (versi 11.x)

### Installation

Clone repository ini:

```bash
git clone https://github.com/FazarArya/VeloRent.git
```

Masuk ke direktori project:

```bash
cd VeloRent
```

Install semua dependencies menggunakan Composer:

```bash
composer install
```

Salin file environment:

```bash
cp .env.example .env
```
*(Jika di Windows, bisa rename manual: `.env.example` ➔ `.env`)*

Update konfigurasi yang diperlukan di file `.env`, terutama bagian database.

Generate application key:

```bash
php artisan key:generate
```

Buat database baru, lalu jalankan migrasi database:

```bash
php artisan migrate:fresh --seed
```

### Running the Project

Jalankan server lokal:

```bash
php artisan serve
```

Akses aplikasi di browser:

```
http://localhost:8000
```

### Admin Credentials

Untuk login sebagai admin, silakan cek kredensial yang ada di file berikut:

```
database/seeders/UserSeeder.php
```

> Dibuat dengan ❤️‍🔥🧑‍💻 oleh [Fazar Arya](https://github.com/FazarArya)
