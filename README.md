# Sistem IKM Otomotif

Aplikasi web manajemen untuk Industri Kecil Menengah (IKM) Otomotif yang dibangun dengan Laravel dan AdminLTE.

## 📋 Untuk Dosen/Penguji

### Repository GitHub
- **URL:** https://github.com/ByanAl19/Laravel-IKM
- **Branch:** main

### Cara Menjalankan Project

1. **Clone atau download project:**
   ```bash
   git clone https://github.com/ByanAl19/Laravel-IKM.git
   cd Laravel-IKM
   ```

2. **Install dependencies:**
   ```bash
   composer install
   npm install
   ```

3. **Setup environment:**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Setup database (pilih salah satu):**

   **Opsi A: Menggunakan MySQL (Recommended)**
   - Buat database: `ikm_otomotif`
   - Edit file `.env`:
     ```env
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=ikm_otomotif
     DB_USERNAME=root
     DB_PASSWORD=
     ```

   **Opsi B: Menggunakan SQLite (Lebih Mudah)**
   - Edit file `.env`:
     ```env
     DB_CONNECTION=sqlite
     ```
   - Pastikan file `database/database.sqlite` ada (Laravel akan buat otomatis)

5. **Jalankan migrasi dan seeder:**
   ```bash
   php artisan migrate:fresh --seed
   ```
   *Perintah ini akan membuat database, tabel, dan data dummy untuk testing*

6. **Buat storage link (untuk upload gambar):**
   ```bash
   php artisan storage:link
   ```

7. **Jalankan server:**
   ```bash
   php artisan serve
   ```

8. **Akses aplikasi:**
   - Buka browser: `http://localhost:8000` atau `http://127.0.0.1:8000`
   - Login dengan akun di bawah

### Akun untuk Testing

#### 🔐 Admin (Full Access)
- **Email:** `admin@automotive.com`
- **Password:** `admin123`
- **Akses:** Full CRUD semua modul (Kategori, Produk, Pelanggan, Pesanan)

#### 👤 User (Limited Access)
- **Email:** `user@automotive.com`
- **Password:** `user123`
- **Akses:** Hanya bisa lihat produk/pelanggan dan membuat pesanan

### Fitur yang Bisa Ditest

#### ✅ Authentication & Authorization
- Login dengan akun admin dan user
- Setiap role memiliki akses berbeda (cek menu sidebar berbeda)

#### ✅ CRUD Kategori (Admin Only)
- Menu: Kategori
- Fitur: Tambah, Edit, Hapus, Lihat kategori

#### ✅ CRUD Produk (Admin Full, User View Only)
- Menu: Produk
- Admin: Tambah, Edit, Hapus, Lihat produk (dengan upload gambar)
- User: Hanya lihat produk

#### ✅ CRUD Pelanggan (Admin Full, User View Only)
- Menu: Pelanggan
- Admin: Tambah, Edit, Hapus, Lihat pelanggan
- User: Hanya lihat pelanggan

#### ✅ CRUD Pesanan
- Menu: Pesanan
- Admin: Full CRUD semua pesanan
- User: Bisa membuat pesanan baru dan lihat detail

#### ✅ Dashboard
- Statistik: Total Produk, Pelanggan, Pesanan, Penjualan
- Latest Products dan Latest Orders
- Welcome message berbeda untuk admin dan user

### Dokumentasi Tambahan

- **PERBEDAAN_AKSES_ADMIN_USER.md** - Penjelasan detail perbedaan akses
- **TESTING_CRUD.md** - Panduan testing CRUD lengkap
- **SOLUSI_CRUD_ERROR.md** - Troubleshooting jika ada error

---

## Fitur

- ✅ **Authentication & Authorization** - Sistem login dengan 2 role: Admin dan User
- ✅ **CRUD Kategori** - Manajemen kategori produk (Admin only)
- ✅ **CRUD Produk** - Manajemen produk otomotif dengan upload gambar
- ✅ **CRUD Pelanggan** - Manajemen data pelanggan
- ✅ **CRUD Pesanan** - Manajemen pesanan dengan multiple items
- ✅ **Role-based Access Control** - Admin memiliki akses penuh, User memiliki akses terbatas
- ✅ **Dashboard** - Ringkasan statistik dan informasi sistem
- ✅ **AdminLTE Template** - Interface modern dan responsif

## Teknologi

- PHP 8.1+
- Laravel 12
- AdminLTE 3
- MySQL/SQLite
- Bootstrap 4

## 🚀 Instalasi (Detailed)

### Requirements
- PHP >= 8.1
- Composer
- Node.js & NPM
- MySQL/SQLite
- Web Server (Apache/Nginx) atau `php artisan serve`

### Step-by-Step Installation

1. **Clone repository:**
   ```bash
   git clone https://github.com/ByanAl19/Laravel-IKM.git
   cd Laravel-IKM
   ```

2. **Install PHP dependencies:**
   ```bash
   composer install
   ```

3. **Install NPM dependencies:**
   ```bash
   npm install
   ```

4. **Setup environment file:**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Konfigurasi database:**

   **Opsi A: MySQL**
   Edit `.env`:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=ikm_otomotif
   DB_USERNAME=root
   DB_PASSWORD=
   ```
   Buat database: `CREATE DATABASE ikm_otomotif;`

   **Opsi B: SQLite (Lebih Mudah)**
   Edit `.env`:
   ```env
   DB_CONNECTION=sqlite
   ```
   File `database/database.sqlite` akan dibuat otomatis saat migrate

6. **Jalankan migrasi dan seeder (membuat tabel & data dummy):**
   ```bash
   php artisan migrate:fresh --seed
   ```

7. **Buat storage link (untuk upload gambar produk):**
   ```bash
   php artisan storage:link
   ```

8. **Jalankan server:**
   ```bash
   php artisan serve
   ```

9. **Akses aplikasi:**
   ```
   http://localhost:8000
   http://127.0.0.1:8000
   ```

## 🔐 Akun Default

**Data akun ini dibuat otomatis saat menjalankan `php artisan migrate:fresh --seed`**

### 👨‍💼 Admin
- **Email:** `admin@automotive.com`
- **Password:** `admin123`
- **Akses:** Full access (CRUD semua modul)
- **Menu yang bisa diakses:** Dashboard, Kategori, Produk, Pelanggan, Pesanan, Profile

### 👤 User
- **Email:** `user@automotive.com`
- **Password:** `user123`
- **Akses:** Limited access (hanya view produk, pelanggan, dan bisa membuat pesanan)
- **Menu yang bisa diakses:** Dashboard, Produk (view only), Pelanggan (view only), Pesanan (create & view), Profile

## Struktur Modul

### Admin
- ✅ Full CRUD Kategori
- ✅ Full CRUD Produk (dengan upload gambar)
- ✅ Full CRUD Pelanggan
- ✅ Full CRUD Pesanan (view, edit, delete semua pesanan)

### User
- ❌ Tidak bisa akses Kategori (CRUD)
- ✅ View Produk (hanya lihat)
- ✅ View Pelanggan (hanya lihat)
- ✅ Create & View Pesanan (bisa membuat pesanan baru dan melihat detail)

## Database Structure

- **roles** - Role pengguna (admin, user)
- **users** - Data pengguna dengan role_id
- **categories** - Kategori produk
- **products** - Produk otomotif (dengan gambar)
- **customers** - Data pelanggan
- **orders** - Pesanan
- **order_items** - Item dalam setiap pesanan

## Routing

- `/dashboard` - Dashboard utama
- `/categories` - Manajemen kategori (Admin only)
- `/products` - Manajemen produk
- `/customers` - Manajemen pelanggan
- `/orders` - Manajemen pesanan
- `/profile` - Edit profil

## File Structure

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── CategoryController.php
│   │   ├── ProductController.php
│   │   ├── CustomerController.php
│   │   └── OrderController.php
│   └── Middleware/
│       └── CheckAdmin.php
├── Models/
│   ├── Category.php
│   ├── Product.php
│   ├── Customer.php
│   ├── Order.php
│   ├── OrderItem.php
│   ├── Role.php
│   └── User.php
database/
├── migrations/
└── seeders/
    └── RoleSeeder.php
resources/
└── views/
    ├── categories/
    ├── products/
    ├── customers/
    ├── orders/
    └── dashboard.blade.php
```

## Git

Repository sudah diinisialisasi dengan git. Commit pertama telah dibuat:
```bash
git log
```

## Catatan

- Pastikan folder `storage/app/public` memiliki permission yang benar untuk upload file
- Untuk production, jangan lupa update `.env` dengan konfigurasi yang sesuai
- Pastikan `APP_URL` di `.env` sesuai dengan domain aplikasi

## License

Proyek ini dibuat untuk keperluan pembelajaran.
