# Perbedaan Akses Admin dan User

## Akses Admin (Full Access)

### Dashboard
- ✅ Akses penuh ke dashboard dengan semua statistik

### Kategori
- ✅ Lihat daftar kategori
- ✅ Tambah kategori baru
- ✅ Edit kategori
- ✅ Hapus kategori

### Produk
- ✅ Lihat daftar produk
- ✅ Lihat detail produk
- ✅ Tambah produk baru
- ✅ Edit produk
- ✅ Hapus produk
- ✅ Upload gambar produk

### Pelanggan
- ✅ Lihat daftar pelanggan
- ✅ Lihat detail pelanggan
- ✅ Tambah pelanggan baru
- ✅ Edit pelanggan
- ✅ Hapus pelanggan

### Pesanan
- ✅ Lihat semua pesanan
- ✅ Lihat detail pesanan
- ✅ Buat pesanan baru
- ✅ Edit pesanan
- ✅ Ubah status pesanan
- ✅ Hapus pesanan

## Akses User (Limited Access)

### Dashboard
- ✅ Akses ke dashboard dengan statistik (hanya view)

### Kategori
- ❌ **TIDAK BISA AKSES** - Menu kategori tidak muncul di sidebar

### Produk
- ✅ Lihat daftar produk
- ✅ Lihat detail produk
- ❌ **TIDAK BISA** tambah produk baru
- ❌ **TIDAK BISA** edit produk
- ❌ **TIDAK BISA** hapus produk
- ❌ Tombol "Tambah Produk" disembunyikan
- ❌ Tombol Edit dan Hapus disembunyikan

### Pelanggan
- ✅ Lihat daftar pelanggan
- ✅ Lihat detail pelanggan
- ❌ **TIDAK BISA** tambah pelanggan baru
- ❌ **TIDAK BISA** edit pelanggan
- ❌ **TIDAK BISA** hapus pelanggan
- ❌ Tombol "Tambah Pelanggan" disembunyikan
- ❌ Tombol Edit dan Hapus disembunyikan

### Pesanan
- ✅ Lihat daftar pesanan
- ✅ Lihat detail pesanan
- ✅ Buat pesanan baru
- ❌ **TIDAK BISA** edit pesanan
- ❌ **TIDAK BISA** hapus pesanan
- ❌ Tombol Edit dan Hapus disembunyikan

## Keamanan

1. **Route Protection**: Semua route untuk create/edit/delete dilindungi dengan middleware `admin`
2. **Controller Check**: Setiap controller method check `isAdmin()` dan return 403 jika bukan admin
3. **View Protection**: Views menyembunyikan tombol-tombol aksi untuk user biasa
4. **Menu Filtering**: Menu sidebar menggunakan Gate filter untuk menyembunyikan item menu

## Testing

**Test sebagai Admin:**
- Login dengan: `admin@automotive.com` / `admin123`
- Semua fitur CRUD harus bisa diakses

**Test sebagai User:**
- Login dengan: `user@automotive.com` / `user123`
- Menu "Kategori" tidak muncul
- Tombol "Tambah/Edit/Hapus" tidak muncul di Produk dan Pelanggan
- Jika mencoba akses langsung URL (contoh: `/products/create`), akan mendapat error 403

