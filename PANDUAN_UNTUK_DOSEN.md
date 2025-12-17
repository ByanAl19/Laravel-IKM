# 📚 Panduan Lengkap untuk Dosen/Penguji

## 🎯 Informasi Project

**Nama Project:** Sistem IKM Otomotif  
**Framework:** Laravel 12  
**Template:** AdminLTE 3  
**Database:** MySQL/SQLite  
**Repository:** https://github.com/ByanAl19/Laravel-IKM

---

## ✅ Checklist Fitur yang Sudah Diimplementasikan

### 1. Authentication & Authorization ✅
- [x] Sistem login dengan Laravel Breeze
- [x] 2 Role: Admin dan User
- [x] Middleware untuk role-based access control
- [x] Gate untuk menu filtering

### 2. CRUD Kategori ✅
- [x] Create - Tambah kategori baru (Admin only)
- [x] Read - Lihat daftar kategori (Admin only)
- [x] Update - Edit kategori (Admin only)
- [x] Delete - Hapus kategori (Admin only)

### 3. CRUD Produk ✅
- [x] Create - Tambah produk dengan upload gambar (Admin only)
- [x] Read - Lihat daftar produk (Admin & User)
- [x] Update - Edit produk (Admin only)
- [x] Delete - Hapus produk (Admin only)
- [x] Image upload functionality

### 4. CRUD Pelanggan ✅
- [x] Create - Tambah pelanggan baru (Admin only)
- [x] Read - Lihat daftar pelanggan (Admin & User)
- [x] Update - Edit pelanggan (Admin only)
- [x] Delete - Hapus pelanggan (Admin only)

### 5. CRUD Pesanan ✅
- [x] Create - Buat pesanan baru (Admin & User)
- [x] Read - Lihat daftar pesanan (Admin lihat semua, User lihat sendiri)
- [x] Update - Edit pesanan (Admin only)
- [x] Delete - Hapus pesanan (Admin only)
- [x] Order items dengan multiple products

### 6. Dashboard ✅
- [x] Statistik: Total Produk, Pelanggan, Pesanan, Total Penjualan
- [x] Latest Products (5 produk terbaru)
- [x] Latest Orders (5 pesanan terbaru)
- [x] Welcome message berbeda untuk Admin dan User

---

## 🚀 Cara Menjalankan Project

### Prerequisites
- PHP >= 8.1
- Composer
- Node.js & NPM
- MySQL atau SQLite

### Step 1: Clone Repository
```bash
git clone https://github.com/ByanAl19/Laravel-IKM.git
cd Laravel-IKM
```

### Step 2: Install Dependencies
```bash
# Install PHP dependencies
composer install

# Install NPM dependencies
npm install
```

### Step 3: Setup Environment
```bash
# Copy file .env
cp .env.example .env

# Generate application key
php artisan key:generate
```

### Step 4: Konfigurasi Database

**Opsi A: MySQL (Recommended)**
1. Buat database: `CREATE DATABASE ikm_otomotif;`
2. Edit file `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ikm_otomotif
DB_USERNAME=root
DB_PASSWORD=
```

**Opsi B: SQLite (Lebih Mudah - Default)**
1. Edit file `.env`:
```env
DB_CONNECTION=sqlite
```
2. File `database/database.sqlite` akan dibuat otomatis

### Step 5: Setup Database
```bash
# Jalankan migrasi dan seeder (membuat tabel + data dummy)
php artisan migrate:fresh --seed
```

**Data yang dibuat:**
- 2 Role: Admin dan User
- 2 User default (admin@automotive.com dan user@automotive.com)
- 5 Kategori dummy
- 3 Produk dummy
- 2 Pelanggan dummy
- 2 Pesanan dummy dengan order items

### Step 6: Setup Storage
```bash
# Buat symbolic link untuk upload gambar
php artisan storage:link
```

### Step 7: Jalankan Server
```bash
php artisan serve
```

### Step 8: Akses Aplikasi
```
http://localhost:8000
atau
http://127.0.0.1:8000
```

---

## 🔐 Akun untuk Testing

### Akun Admin (Full Access)
- **Email:** `admin@automotive.com`
- **Password:** `admin123`
- **Akses:**
  - ✅ Dashboard
  - ✅ CRUD Kategori
  - ✅ CRUD Produk (tambah, edit, hapus, upload gambar)
  - ✅ CRUD Pelanggan
  - ✅ CRUD Pesanan (lihat semua pesanan)
  - ✅ Profile

### Akun User (Limited Access)
- **Email:** `user@automotive.com`
- **Password:** `user123`
- **Akses:**
  - ✅ Dashboard
  - ❌ Kategori (tidak bisa akses)
  - ✅ Produk (hanya lihat, tidak bisa tambah/edit/hapus)
  - ✅ Pelanggan (hanya lihat, tidak bisa tambah/edit/hapus)
  - ✅ Pesanan (bisa buat pesanan baru dan lihat detail)
  - ✅ Profile

---

## 📋 Testing Checklist

### 1. Test Authentication
- [ ] Login dengan akun admin → berhasil
- [ ] Login dengan akun user → berhasil
- [ ] Logout → berhasil
- [ ] Akses halaman tanpa login → redirect ke login

### 2. Test Authorization (Admin)
- [ ] Login sebagai admin
- [ ] Cek menu sidebar → harus muncul semua menu (Kategori, Produk, Pelanggan, Pesanan)
- [ ] Akses `/categories` → bisa akses
- [ ] Tambah kategori → berhasil
- [ ] Edit kategori → berhasil
- [ ] Hapus kategori → berhasil
- [ ] Tambah produk dengan gambar → berhasil
- [ ] Edit produk → berhasil
- [ ] Hapus produk → berhasil
- [ ] Tambah pelanggan → berhasil
- [ ] Edit pelanggan → berhasil
- [ ] Hapus pelanggan → berhasil
- [ ] Lihat semua pesanan → berhasil
- [ ] Edit pesanan → berhasil
- [ ] Hapus pesanan → berhasil

### 3. Test Authorization (User)
- [ ] Login sebagai user
- [ ] Cek menu sidebar → tidak ada menu "Kategori"
- [ ] Akses `/categories` → error 403 (forbidden)
- [ ] Akses `/products` → bisa lihat produk
- [ ] Cek tombol "Tambah Produk" → tidak muncul
- [ ] Cek tombol edit/hapus produk → tidak muncul
- [ ] Akses `/customers` → bisa lihat pelanggan
- [ ] Cek tombol "Tambah Pelanggan" → tidak muncul
- [ ] Akses `/orders` → bisa lihat pesanan
- [ ] Buat pesanan baru → berhasil
- [ ] Cek tombol edit/hapus pesanan → tidak muncul

### 4. Test CRUD Kategori
- [ ] Tambah kategori baru
- [ ] Edit kategori
- [ ] Hapus kategori
- [ ] Validasi form (nama harus unik)
- [ ] Pagination (jika banyak data)

### 5. Test CRUD Produk
- [ ] Tambah produk dengan gambar
- [ ] Edit produk
- [ ] Hapus produk (gambar juga terhapus)
- [ ] Upload gambar produk
- [ ] Lihat gambar produk
- [ ] Validasi form (SKU harus unik)
- [ ] Filter berdasarkan kategori
- [ ] Pagination

### 6. Test CRUD Pelanggan
- [ ] Tambah pelanggan
- [ ] Edit pelanggan
- [ ] Hapus pelanggan
- [ ] Validasi form (email harus unik)
- [ ] Search/filter pelanggan
- [ ] Pagination

### 7. Test CRUD Pesanan
- [ ] Buat pesanan baru
- [ ] Tambah multiple items dalam satu pesanan
- [ ] Edit pesanan
- [ ] Hapus pesanan
- [ ] Lihat detail pesanan dengan order items
- [ ] Update status pesanan
- [ ] Perhitungan total amount otomatis

### 8. Test Dashboard
- [ ] Statistik menampilkan data benar
- [ ] Latest products menampilkan 5 produk terbaru
- [ ] Latest orders menampilkan 5 pesanan terbaru
- [ ] Welcome message berbeda untuk admin dan user

---

## 🗂️ Struktur File Penting

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── CategoryController.php    # CRUD Kategori
│   │   ├── ProductController.php     # CRUD Produk
│   │   ├── CustomerController.php    # CRUD Pelanggan
│   │   └── OrderController.php       # CRUD Pesanan
│   └── Middleware/
│       └── CheckAdmin.php            # Middleware untuk admin
├── Models/
│   ├── Category.php
│   ├── Product.php
│   ├── Customer.php
│   ├── Order.php
│   ├── OrderItem.php
│   ├── Role.php
│   └── User.php
database/
├── migrations/                       # Schema database
└── seeders/
    ├── RoleSeeder.php               # Seeder untuk role dan user default
    └── DatabaseSeeder.php           # Seeder untuk data dummy
resources/
└── views/
    ├── categories/                  # Views untuk kategori
    ├── products/                    # Views untuk produk
    ├── customers/                   # Views untuk pelanggan
    ├── orders/                      # Views untuk pesanan
    └── dashboard.blade.php          # Dashboard
routes/
└── web.php                          # Routing aplikasi
public/
└── css/
    └── custom-automotive.css        # Custom CSS tema otomotif
```

---

## 🐛 Troubleshooting

### Error: "SQLSTATE[HY000] [2002]"
**Solusi:** Pastikan MySQL server berjalan atau gunakan SQLite

### Error: "Class 'PDO' not found"
**Solusi:** Install PHP extension PDO: `sudo apt-get install php8.1-pdo php8.1-mysql`

### Error: "Storage link tidak bisa dibuat"
**Solusi:** Jalankan sebagai administrator atau manual:
```bash
php artisan storage:link
# Jika error, hapus folder public/storage dulu
```

### Error: "404 Not Found" saat akses routes
**Solusi:** Clear cache:
```bash
php artisan optimize:clear
php artisan route:clear
php artisan config:clear
```

### Error: "Permission denied" untuk upload gambar
**Solusi:** Set permission folder storage:
```bash
chmod -R 775 storage
chmod -R 775 bootstrap/cache
```

### Image tidak muncul
**Solusi:** Pastikan sudah jalankan `php artisan storage:link`

---

## 📝 Dokumentasi Tambahan

- **README.md** - Dokumentasi utama
- **PERBEDAAN_AKSES_ADMIN_USER.md** - Penjelasan detail perbedaan akses admin dan user
- **TESTING_CRUD.md** - Panduan testing CRUD
- **SOLUSI_CRUD_ERROR.md** - Troubleshooting CRUD

---

## 📞 Kontak

Jika ada pertanyaan atau masalah saat testing, silakan hubungi:
- **Repository:** https://github.com/ByanAl19/Laravel-IKM
- **Issues:** https://github.com/ByanAl19/Laravel-IKM/issues

---

**Selamat Testing! 🎉**

