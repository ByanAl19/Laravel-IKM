# Panduan Testing CRUD

## Akun Login

**Admin:**
- Email: `admin@automotive.com`
- Password: `admin123`

**User:**
- Email: `user@automotive.com`
- Password: `user123`

## Testing CRUD Produk

### 1. CREATE (Tambah Produk)
1. Login sebagai Admin
2. Klik menu "Produk" di sidebar
3. Klik tombol "Tambah Produk Baru"
4. Isi form:
   - Kategori: Pilih salah satu kategori
   - Nama: Masukkan nama produk (contoh: "Kampas Rem Belakang")
   - SKU: Masukkan SKU unik (contoh: "PROD-004")
   - Harga: Masukkan harga (contoh: 200000)
   - Stok: Masukkan stok (contoh: 30)
   - Status: Pilih "Aktif"
   - Brand, Part Number (optional)
5. Klik "Simpan Produk"
6. **Verifikasi:** Data muncul di tabel produk, dashboard produk bertambah

### 2. READ (Lihat Produk)
1. Di halaman daftar produk, klik ikon mata (👁️) pada produk
2. **Verifikasi:** Halaman detail produk muncul dengan semua informasi

### 3. UPDATE (Ubah Produk)
1. Di halaman daftar produk, klik ikon edit (✏️) pada produk
2. Ubah data (contoh: ubah harga menjadi 250000)
3. Klik "Update Produk"
4. **Verifikasi:** Data di tabel berubah sesuai yang diubah

### 4. DELETE (Hapus Produk)
1. Di halaman daftar produk, klik ikon delete (🗑️) pada produk
2. Konfirmasi penghapusan
3. **Verifikasi:** Produk hilang dari tabel, dashboard produk berkurang

## Testing CRUD Kategori

### 1. CREATE
1. Klik menu "Kategori"
2. Klik "Tambah Kategori"
3. Isi nama dan deskripsi
4. Simpan
5. **Verifikasi:** Kategori muncul di tabel

### 2. UPDATE
1. Klik ikon edit pada kategori
2. Ubah data
3. Update
4. **Verifikasi:** Data berubah

### 3. DELETE
1. Klik ikon delete pada kategori
2. Konfirmasi
3. **Verifikasi:** Kategori terhapus

## Testing CRUD Pelanggan

### 1. CREATE
1. Klik menu "Pelanggan"
2. Klik "Tambah Pelanggan Baru"
3. Isi form pelanggan
4. Simpan
5. **Verifikasi:** Pelanggan muncul di tabel

### 2. UPDATE
1. Klik ikon edit
2. Ubah data
3. Update
4. **Verifikasi:** Data berubah

### 3. DELETE
1. Klik ikon delete
2. Konfirmasi
3. **Verifikasi:** Pelanggan terhapus

## Testing CRUD Pesanan

### 1. CREATE
1. Klik menu "Pesanan"
2. Klik "Tambah Pesanan Baru"
3. Pilih pelanggan
4. Tambah item produk
5. Simpan
6. **Verifikasi:** Pesanan muncul di tabel, total penjualan di dashboard bertambah

### 2. UPDATE (Admin only)
1. Klik ikon edit
2. Ubah status atau data lain
3. Update
4. **Verifikasi:** Data berubah

### 3. DELETE (Admin only)
1. Klik ikon delete
2. Konfirmasi
3. **Verifikasi:** Pesanan terhapus

## Testing Dashboard

1. Login dan akses dashboard
2. **Verifikasi:**
   - Total Produk menampilkan jumlah produk
   - Total Pelanggan menampilkan jumlah pelanggan
   - Total Pesanan menampilkan jumlah pesanan
   - Total Penjualan menampilkan total
   - Tabel Produk Terbaru menampilkan 5 produk terbaru
   - Tabel Pesanan Terbaru menampilkan 5 pesanan terbaru
   - Semua data terupdate sesuai perubahan CRUD

## Catatan

- Pastikan semua operasi CRUD menggunakan konfirmasi sebelum delete
- Pastikan flash messages muncul setelah create/update/delete
- Pastikan redirect bekerja dengan benar
- Pastikan authorization bekerja (admin vs user)
- Pastikan dashboard selalu menampilkan data terbaru

