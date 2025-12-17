# Sistem IKM Otomotif

Aplikasi web manajemen untuk Industri Kecil Menengah (IKM) Otomotif yang dibangun dengan Laravel dan AdminLTE.

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

## Instalasi

1. **Clone repository atau extract project**
   ```bash
   cd "path/to/project"
   ```

2. **Install dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Setup environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Konfigurasi database di `.env`**
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=ikm_otomotif
   DB_USERNAME=root
   DB_PASSWORD=
   ```

   Atau gunakan SQLite (default):
   ```env
   DB_CONNECTION=sqlite
   ```

5. **Jalankan migrasi dan seeder**
   ```bash
   php artisan migrate:fresh --seed
   ```

6. **Buat storage link untuk upload gambar**
   ```bash
   php artisan storage:link
   ```

7. **Jalankan server development**
   ```bash
   php artisan serve
   ```

8. **Akses aplikasi di browser**
   ```
   http://localhost:8000
   ```

## Akun Default

### Admin
- **Email:** admin@automotive.com
- **Password:** admin123
- **Akses:** Full access (CRUD semua modul)

### User
- **Email:** user@automotive.com
- **Password:** user123
- **Akses:** Limited access (hanya view produk, pelanggan, dan bisa membuat pesanan)

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
