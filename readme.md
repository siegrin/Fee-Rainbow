# 📄 Katalog Toko Buket | Sistem Manajemen Produk Web

Sebuah aplikasi katalog toko berbasis PHP procedural yang memungkinkan pengelolaan produk, kategori, subkategori, serta occasion (acara) dengan fitur CRUD lengkap. Proyek ini cocok untuk toko kecil hingga menengah yang ingin menampilkan produk mereka secara online, dengan sistem login admin dan panel backend sederhana namun efektif.

---

## 🌐 Live Demo

- 👉 **Katalog Produk (User):** [http://katalogbuketnue.infinityfreeapp.com](http://katalogbuketnue.infinityfreeapp.com)
- 👉 **Admin Panel:** [http://katalogbuketnue.infinityfreeapp.com/admin/index.php?page=login](http://katalogbuketnue.infinityfreeapp.com/admin/index.php?page=login)
  - **Username:** `admin123`
  - **Password:** `admin123`

---

## 📖 Fitur Utama

- Sistem autentikasi admin (Login, Register, Logout)
- CRUD (Create, Read, Update, Delete) untuk:
  - Kategori produk
  - Subkategori produk
  - Occasion (acara seperti promo, event khusus)
  - Produk (dengan upload gambar)
- Struktur folder rapi dan mudah dikembangkan
- Layout frontend dan backend terpisah
- Pagination sederhana untuk navigasi produk
- Modularisasi file `config`, `models`, `views`, dan `controllers`

---

## 🚀 Cara Install

### 1. Clone Project

```bash
git clone https://github.com/username/nama-repo.git
```

### 2. Pindahkan ke Web Server Directory (contoh XAMPP)

```bash
C:/xampp/htdocs/katalog-toko
```

### 3. Buat Database

- Masuk ke `phpMyAdmin`
- Buat database bernama: `katalog_toko`
- Import file `katalog_toko.sql` jika tersedia

### 4. Konfigurasi Database

Edit file `config/database.php`

```php
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'katalog_toko';
```

---

## 📅 Workflow Penggunaan

### ✅ 1. Login ke Admin

Masuk ke halaman:

```
/admin/index.php?page=login
```

Login dengan akun admin, atau daftar terlebih dahulu jika fitur register aktif.

### ✔️ 2. Tambahkan Kategori

- Masuk ke menu **Kategori**
- Klik tombol **Tambah**
- Masukkan nama kategori

### ✔️ 3. Tambahkan Subkategori

- Menu **Subkategori** hanya akan muncul jika sudah ada kategori
- Pilih kategori induk
- Masukkan nama subkategori

### ✔️ 4. Tambahkan Occasion

- Digunakan untuk menandai produk dengan event tertentu
  (misalnya: "Promo Akhir Tahun", "Hari Valentine")

### ✔️ 5. Tambahkan Produk

- Masuk ke menu **Produk**
- Klik tambah dan isi seluruh data produk:
  - Nama, deskripsi, harga, gambar
  - Pilih kategori, subkategori, dan occasion terkait

Produk akan muncul di halaman utama katalog setelah disimpan.

---

## 🔄 Modul CRUD

| Modul       | Fungsi                          |
| ----------- | ------------------------------- |
| Kategori    | Tambah, ubah, hapus kategori    |
| Subkategori | Tambah, ubah, hapus subkategori |
| Occasion    | Tambah, ubah, hapus occasion    |
| Produk      | Tambah, ubah, hapus produk      |

---

## 🌐 Struktur URL Penting

| Halaman         | URL Akses                                             |
| --------------- | ----------------------------------------------------- |
| Katalog Produk  | `/index.php`                                          |
| Login Admin     | `/admin/index.php?page=login`                         |
| Register Admin  | `/admin/index.php?page=register`                      |
| Dashboard Admin | `/admin/app/views/dashboard/index.php`                |
| Kategori        | `/admin/app/views/categories/index.php`               |
| Subkategori     | `/admin/app/views/categories/subcategories/index.php` |
| Occasion        | `/admin/app/views/occasions/index.php`                |
| Produk          | `/admin/app/views/products/index.php`                 |

---

## 📁 Struktur Folder (Ringkasan)

```
root/
├── admin/
│   ├── app/
│   │   ├── controllers/
│   │   ├── models/
│   │   └── views/
│   │       ├── auth/
│   │       ├── categories/
│   │       ├── products/
│   │       └── dashboard/
├── config/
├── public/
│   ├── assets/
│   │   ├── css/
│   │   └── js/
├── uploads/          # Folder gambar produk
├── routes/
└── index.php         # Entry point utama
```

---

## 💡 Saran Pengembangan Selanjutnya

- Tambah fitur pencarian produk
- Filter berdasarkan kategori atau occasion
- Export data ke PDF / Excel
- Upload multiple image per produk
- Tambah status produk (aktif/tidak aktif)

---

## 🙏 Kontribusi

Silakan fork repository ini dan buat pull request jika ingin menyumbangkan fitur atau perbaikan bug.

---

## 🌟 Credit

Dibuat oleh randaman dengan semangat belajar PHP procedural dan membangun sistem backend sederhana yang bisa dipakai untuk toko online kecil hingga menengah.

---

## 📆 Lisensi

Proyek ini dilisensikan dengan bebas untuk digunakan dan dimodifikasi.

---

> Jika kamu suka proyek ini, kasih bintang ya di repo GitHub ini!
