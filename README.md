# 🖨️ Sistem Manajemen Percetakan & ATK

Aplikasi web berbasis Laravel 12 untuk manajemen toko percetakan dan alat tulis kantor (ATK) dengan fitur lengkap CRUD, autentikasi, dan dashboard admin.

![Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.2-777BB4?style=for-the-badge&logo=php&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql&logoColor=white)

## 📋 Daftar Isi

- [Fitur Utama](#-fitur-utama)
- [Teknologi](#-teknologi)
- [Persyaratan Sistem](#-persyaratan-sistem)
- [Instalasi](#-instalasi)
- [Konfigurasi Database](#-konfigurasi-database)
- [Setup Project](#-setup-project)
- [Login Default](#-login-default)
- [Screenshot](#-screenshot)
- [Struktur Database](#-struktur-database)
- [Kontribusi](#-kontribusi)
- [Lisensi](#-lisensi)

## ✨ Fitur Utama

### 🔐 Autentikasi & Keamanan
- ✅ Sistem Login & Register
- ✅ Password Hashing (Bcrypt)
- ✅ Session Management
- ✅ Protected Routes (Middleware)
- ✅ CSRF Protection

### 📊 Dashboard Admin
- ✅ Statistik Real-time (Total Kategori, Produk, Pesanan)
- ✅ Grafik Pesanan Pending
- ✅ Tabel Pesanan Terbaru
- ✅ Quick Actions Menu

### 📦 Manajemen Kategori
- ✅ CRUD Kategori (Create, Read, Update, Delete)
- ✅ Upload Gambar Kategori
- ✅ List Produk per Kategori
- ✅ Counter Jumlah Produk

### 🛍️ Manajemen Produk
- ✅ CRUD Produk Lengkap
- ✅ Upload Gambar Produk
- ✅ Kategori Produk
- ✅ Manajemen Harga & Stok
- ✅ Pencarian & Filter

### 📋 Manajemen Pesanan
- ✅ Form Pemesanan Lengkap
- ✅ Data Pelanggan (Nama, Email, Telepon, Alamat)
- ✅ Kalkulasi Otomatis Total Harga
- ✅ Update Stok Otomatis
- ✅ Status Pesanan (Pending, Processing, Completed, Cancelled)
- ✅ Detail Pesanan Lengkap

### 🎨 User Interface
- ✅ Responsive Design (Mobile, Tablet, Desktop)
- ✅ Bootstrap 5.3 UI Framework
- ✅ Gradient Design Modern
- ✅ Alert & Notification System
- ✅ Form Validation

## 🛠 Teknologi

- **Backend:** Laravel 12.x
- **Frontend:** Bootstrap 5.3 (Downloaded/Offline)
- **Database:** MySQL 8.0
- **PHP Version:** 8.2+
- **Server:** Apache/Nginx

## 📌 Persyaratan Sistem

Pastikan sistem Anda memiliki:

- PHP >= 8.2
- Composer
- MySQL >= 8.0
- Apache/Nginx Web Server
- PHP Extensions:
  - OpenSSL
  - PDO
  - Mbstring
  - Tokenizer
  - XML
  - Ctype
  - JSON
  - BCMath
  - Fileinfo

## 🚀 Instalasi

### 1. Clone Repository

```bash
git clone https://github.com/username/percetakan-atk.git
cd percetakan-atk
```

### 2. Install Dependencies

```bash
composer install
```

### 3. Copy Environment File

```bash
cp .env.example .env
```

### 4. Generate Application Key

```bash
php artisan key:generate
```

## 🗄️ Konfigurasi Database

### Metode 1: Menggunakan phpMyAdmin

1. **Buka phpMyAdmin** di browser: `http://localhost/phpmyadmin`

2. **Buat Database Baru:**
   - Klik tab "Databases"
   - Masukkan nama database: `percetakan_atk`
   - Pilih Collation: `utf8mb4_unicode_ci`
   - Klik tombol "Create"

3. **Update File `.env`:**
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=percetakan_atk
   DB_USERNAME=root
   DB_PASSWORD=
   ```

### Metode 2: Menggunakan Command Line MySQL

```bash
# Login ke MySQL
mysql -u root -p

# Buat database
CREATE DATABASE percetakan_atk CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

# Keluar dari MySQL
EXIT;
```

### Metode 3: Menggunakan Laragon/XAMPP

**Untuk Laragon:**
```bash
# Buka Terminal Laragon
mysql -u root
CREATE DATABASE percetakan_atk;
EXIT;
```

**Untuk XAMPP:**
- Start Apache & MySQL dari XAMPP Control Panel
- Buka phpMyAdmin
- Ikuti langkah Metode 1

## ⚙️ Setup Project

### 1. Jalankan Migration

```bash
php artisan migrate
```

Migration akan membuat tabel:
- `users` - Data pengguna/admin
- `categories` - Kategori produk
- `products` - Data produk
- `orders` - Data pesanan

### 2. Jalankan Seeder (Data Awal)

```bash
php artisan db:seed
```

Seeder akan mengisi:
- ✅ 1 User Admin default
- ✅ 3 Kategori (Alat Tulis, Percetakan, Perlengkapan Kantor)
- ✅ 9 Produk sample

### 3. Link Storage (untuk Upload Gambar)

```bash
php artisan storage:link
```

### 4. Download Bootstrap 5.3

1. Kunjungi: https://getbootstrap.com/docs/5.3/getting-started/download/
2. Download "Compiled CSS and JS"
3. Extract file zip
4. Copy folder `css` dan `js` ke `public/bootstrap/`

**Struktur folder:**
```
public/
└── bootstrap/
    ├── css/
    │   └── bootstrap.min.css
    └── js/
        └── bootstrap.bundle.min.js
```

### 5. Jalankan Server Development

```bash
php artisan serve
```

Akses aplikasi di: **http://127.0.0.1:8000**

## 🔑 Login Default

Setelah menjalankan seeder, gunakan kredensial berikut:

| Role  | Email | Password |
|-------|-------|----------|
| Admin | admin@gmail.com | 123 |

## 📊 Struktur Database

### Tabel: `users`
```sql
- id (Primary Key)
- name (VARCHAR 255)
- email (VARCHAR 255, UNIQUE)
- password (VARCHAR 255, HASHED)
- created_at, updated_at (TIMESTAMP)
```

### Tabel: `categories`
```sql
- id (Primary Key)
- name (VARCHAR 255)
- description (TEXT, NULLABLE)
- image (VARCHAR 255, NULLABLE)
- created_at, updated_at (TIMESTAMP)
```

### Tabel: `products`
```sql
- id (Primary Key)
- category_id (Foreign Key -> categories.id)
- name (VARCHAR 255)
- description (TEXT, NULLABLE)
- price (DECIMAL 10,2)
- stock (INTEGER)
- image (VARCHAR 255, NULLABLE)
- created_at, updated_at (TIMESTAMP)
```

### Tabel: `orders`
```sql
- id (Primary Key)
- customer_name (VARCHAR 255)
- customer_email (VARCHAR 255)
- customer_phone (VARCHAR 20)
- customer_address (TEXT)
- product_id (Foreign Key -> products.id)
- quantity (INTEGER)
- total_price (DECIMAL 10,2)
- status (ENUM: pending, processing, completed, cancelled)
- created_at, updated_at (TIMESTAMP)
```

### Relasi Database
```
categories (1) ──→ (N) products
products (1) ──→ (N) orders
```

## 📁 Struktur Project

```
percetakan-atk/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Auth/
│   │   │   │   ├── LoginController.php
│   │   │   │   └── RegisterController.php
│   │   │   ├── CategoryController.php
│   │   │   ├── ProductController.php
│   │   │   ├── OrderController.php
│   │   │   └── DashboardController.php
│   │   └── Middleware/
│   │       └── Authenticate.php
│   └── Models/
│       ├── User.php
│       ├── Category.php
│       ├── Product.php
│       └── Order.php
├── database/
│   ├── migrations/
│   └── seeders/
│       └── DatabaseSeeder.php
├── public/
│   └── bootstrap/
│       ├── css/
│       └── js/
├── resources/
│   └── views/
│       ├── auth/
│       │   ├── login.blade.php
│       │   └── register.blade.php
│       ├── categories/
│       ├── products/
│       ├── orders/
│       ├── layouts/
│       │   └── app.blade.php
│       ├── dashboard.blade.php
│       └── welcome.blade.php
└── routes/
    └── web.php
```

## 🐛 Troubleshooting

### Error: "SQLSTATE[HY000] [1045] Access denied"
**Solusi:** Periksa kredensial database di file `.env`

### Error: "Class 'Storage' not found"
**Solusi:** Jalankan `php artisan storage:link`

### Error: Bootstrap tidak muncul
**Solusi:** 
1. Pastikan folder `public/bootstrap/` ada
2. Check path di `layouts/app.blade.php`
3. Clear cache: `php artisan cache:clear`

### Error: "No application encryption key"
**Solusi:** Jalankan `php artisan key:generate`

### Gambar upload tidak muncul
**Solusi:**
1. Jalankan `php artisan storage:link`
2. Pastikan folder `storage/app/public/` writable
3. Check `.env`: `FILESYSTEM_DISK=public`

## 🔄 Update & Maintenance

```bash
# Clear semua cache
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

# Regenerate autoload
composer dump-autoload

# Fresh install (HATI-HATI: Menghapus semua data!)
php artisan migrate:fresh --seed
```

## 📝 Membuat Admin Baru

### Cara 1: Via Tinker
```bash
php artisan tinker
```
```php
use App\Models\User;
use Illuminate\Support\Facades\Hash;

User::create([
    'name' => 'Admin Baru',
    'email' => 'newadmin@email.com',
    'password' => Hash::make('password123')
]);
```

### Cara 2: Via Register
Akses: `http://127.0.0.1:8000/register` dan isi form pendaftaran.


## 📄 Lisensi

Project ini menggunakan lisensi MIT. Lihat file `LICENSE` untuk detail lebih lanjut.

## 👨‍💻 Author

**Your Name**
- GitHub: [@raihanzackyluthfii](https://github.com/raihanzackyluthfii)
- Email: raihanzacky515@gmail.com

## 🙏 Acknowledgments

- [Laravel Framework](https://laravel.com)
- [Bootstrap](https://getbootstrap.com)
- [Font Awesome](https://fontawesome.com)


⭐ Jika project ini membantu, berikan star di GitHub!

**Made with ❤️ using Laravel & Bootstrap**
