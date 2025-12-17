# Setup Git dan Upload ke Repository

## Status Git Saat Ini

✅ Repository sudah diinisialisasi
✅ Sudah ada 2 commit:
   - Initial commit
   - Sistem IKM Otomotif - CRUD lengkap

## Cara Upload ke GitHub/GitLab

### Opsi 1: Upload ke GitHub (Recommended)

1. **Buat repository baru di GitHub:**
   - Buka https://github.com
   - Klik "New repository"
   - Nama: `ikm-otomotif` (atau nama lain)
   - **JANGAN** centang "Initialize with README"
   - Klik "Create repository"

2. **Tambahkan remote repository:**
   ```bash
   git remote add origin https://github.com/USERNAME/ikm-otomotif.git
   ```
   Ganti `USERNAME` dengan username GitHub Anda.

3. **Push ke GitHub:**
   ```bash
   git branch -M main
   git push -u origin main
   ```

### Opsi 2: Upload ke GitLab

1. **Buat project baru di GitLab**

2. **Tambahkan remote:**
   ```bash
   git remote add origin https://gitlab.com/USERNAME/ikm-otomotif.git
   git branch -M main
   git push -u origin main
   ```

### Opsi 3: Setup Remote Manual

Jika sudah punya URL repository:
```bash
git remote add origin <URL_REPOSITORY_ANDA>
git branch -M main
git push -u origin main
```

## Perintah Lengkap

```bash
# 1. Pastikan semua file sudah di-commit
git status

# 2. Tambahkan remote (jika belum)
git remote add origin <URL_REPOSITORY>

# 3. Rename branch ke main (opsional, GitHub default)
git branch -M main

# 4. Push ke remote
git push -u origin main
```

## File yang Sudah Ter-commit

✅ Semua source code Laravel
✅ Views dengan tema otomotif
✅ Controllers dan Models
✅ Migrations dan Seeders
✅ Custom CSS
✅ Routes dan Middleware
✅ Konfigurasi AdminLTE
✅ Dokumentasi (README, TESTING, dll)

## File yang DI-IGNORE (tidak di-upload)

❌ `.env` file (berisi credentials)
❌ `vendor/` (dependencies - install dengan composer)
❌ `node_modules/` (install dengan npm)
❌ `storage/` files
❌ Cache files

## Catatan Penting

1. **Jangan commit file `.env`** - file ini berisi konfigurasi sensitif
2. **Setup di server baru:**
   - Copy `.env.example` ke `.env`
   - Install dependencies: `composer install` dan `npm install`
   - Run migration: `php artisan migrate:fresh --seed`

## Troubleshooting

Jika error saat push:
- Pastikan sudah login ke GitHub/GitLab
- Pastikan URL repository benar
- Gunakan token jika diperlukan (untuk private repo)

