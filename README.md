# Toko Online CodeIgniter 4

Proyek ini adalah platform toko online yang dibangun menggunakan [CodeIgniter 4](https://codeigniter.com/). Sistem ini menyediakan beberapa fungsionalitas untuk toko online, termasuk manajemen produk, keranjang belanja, dan sistem transaksi.

## Daftar Isi

- [Fitur](#fitur)
- [Persyaratan Sistem](#persyaratan-sistem)
- [Instalasi](#instalasi)
- [Struktur Proyek](#struktur-proyek)

## Fitur

- Katalog Produk
  - Tampilan produk dengan gambar
  - Pencarian produk
- Keranjang Belanja
  - Tambah/hapus produk
  - Update jumlah produk
- Sistem Transaksi
  - Proses checkout
  - Riwayat transaksi
- Panel Admin
  - Manajemen produk (CRUD)
  - Manajemen kategori
  - Laporan transaksi
  - Export data ke PDF
- Sistem Autentikasi
  - Login/Register pengguna
  - Manajemen akun
- UI Responsif dengan NiceAdmin template
- Diskon Otomatis
  - Admin dapat menambahkan diskon berdasarkan tanggal tertentu
  - Diskon otomats diterapkan pada checkout jika tanggal berlaku
- Perhitungan Ongkir Otomatis
  - Checkout menggunakan Select2 AJAX untuk memilih kelurahan
  - Perhitungan ongkir menggunakan API Komerce (RajaOngkir)
- Dashboard Toko (Admin)
  - Menampilkan data transaksi secara realtime dari API
  - Data ditampilkan menggunakan CURL dengan autentifikasi header
  - Kolom : Username, Alamat, Total Harga, Jumlah Item, Status, Tanggal 

## Persyaratan Sistem

- PHP >= 8.2
- Composer
- Web server (XAMPP)

## Instalasi

1. **Clone repository ini**
   ```bash
   git clone [URL repository]
   cd belajar-ci-tugas
   ```
2. **Install dependensi**
   ```bash
   composer install
   ```
3. **Konfigurasi database**

   - Start module Apache dan MySQL pada XAMPP
   - Buat database **db_ci4** di phpmyadmin.
   - copy file .env dari tutorial https://www.notion.so/april-ns/Codeigniter4-Migration-dan-Seeding-045ffe5f44904e5c88633b2deae724d2

4. **Jalankan migrasi database**
   ```bash
   php spark migrate
   ```
5. **Seeder data**
   ```bash
   php spark db:seed ProductSeeder
   ```
   ```bash
   php spark db:seed UserSeeder
   ```
6. **Jalankan server**
   ```bash
   php spark serve
   ```
7. **Akses aplikasi**
   Buka browser dan akses `http://localhost:8080` untuk melihat aplikasi.
8. **Konfigurasi API Dashboard**
   File `dashboard-toko` dapat diakses di `http://localhost/dashboard-toko/`


## Struktur Proyek

Proyek menggunakan struktur MVC CodeIgniter 4:

- app/Controllers - Logika aplikasi dan penanganan request
  - AuthController.php - Autentikasi pengguna
  - ProdukController.php - Manajemen produk
  - TransaksiController.php - Proses transaksi
  - TambahDiskonController.php - Manajemen Diskon
  - ApiController.php - API untuk dashboard toko
- app/Models - Model untuk interaksi database
  - ProductModel.php - Model produk
  - UserModel.php - Model pengguna
  - TambahDiskonModel.php - Model Diskon
  - TransactionModel.php - Model Transaksi
  - TransactionDetailModel.php - Detail Transaksi
- app/Views - Template dan komponen UI
  - v_produk.php - Tampilan produk
  - v_keranjang.php - Halaman keranjang
  - v_diskon.php - Halaman Diskon Admin
  - v_checkout.php - Form Checkout dan Ongkir
- public/img - Gambar produk dan aset
- public/NiceAdmin - Template admin
- Dashbord-toko/ - Halaman admin eksternal dashboard
  - index.php - Tabel Transaksi dari API