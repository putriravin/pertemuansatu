# Praktikum Web II - Modul 1
## Instalasi dan Konfigurasi Environment Laravel

---

### 📋 Identitas Mahasiswa

| Field | Detail |
|-------|--------|
| **Nama** | PUTRI RAVIN NAULI |
| **NPM** | 238160073 |
| **Alamat** | Jalan Pancing, Sekitar Universitas Medan Area |
| **Mata Kuliah** | Praktikum Aplikasi Berbasis Web II |
| **Prodi** | Teknik Informatika |
| **Fakultas** | Fakultas Teknik |
| **Universitas** | Universitas Medan Area |
| **Tahun** | 2024 |

---

### 🎯 Tujuan Pembelajaran

- Memahami apa itu Laravel dan kelebihannya
- Menginstall Laravel dan menyiapkan lingkungan pengembangan
- Repository GIT-HUB source

### ⚙️ Aktivitas Praktikum

- ✅ Instalasi Laravel melalui Composer
- ✅ Konfigurasi file `.env` untuk database dan environment lainnya
- ✅ Menjalankan Laravel development server
- ✅ First Commit ke GitHub

---

### 🛠️ Requirement Sistem

| Komponen | Versi |
|----------|-------|
| PHP | 8.2.12 |
| Composer | 2.x |
| Laravel | 12.x |
| MySQL/MariaDB | 10.4.32 (via XAMPP) |

---

### 🚀 Cara Instalasi

#### 1. Install Composer
Unduh dan instal dari [https://getcomposer.org/](https://getcomposer.org/)

Verifikasi instalasi:
```bash
composer -v
```

#### 2. Install Laravel
```bash
composer create-project laravel/laravel putri_ravin_nauli
```

#### 3. Konfigurasi File `.env`
Sesuaikan konfigurasi database pada file `.env`:
```env
APP_NAME=putri_ravin_nauli
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=putri_ravin_nauli
DB_USERNAME=root
DB_PASSWORD=
```

#### 4. Generate App Key
```bash
php artisan key:generate
```

#### 5. Buat Database
Buat database `putri_ravin_nauli` melalui PhpMyAdmin atau jalankan:
```sql
CREATE DATABASE IF NOT EXISTS putri_ravin_nauli 
  CHARACTER SET utf8mb4 
  COLLATE utf8mb4_unicode_ci;
```

#### 6. Jalankan Migrasi
```bash
php artisan migrate
```

#### 7. Jalankan Development Server
```bash
php artisan serve
```

Akses di browser: [http://localhost:8000](http://localhost:8000)

---

### 📁 Struktur Direktori Laravel

```
putri_ravin_nauli/
├── app/                    # Logika utama aplikasi (Models, Controllers, dll)
│   ├── Console/            # Perintah Artisan kustom
│   ├── Exceptions/         # Exception handler
│   ├── Http/               # Controllers, Middleware, Requests
│   └── Models/             # Model Eloquent ORM
├── bootstrap/              # File bootstrap dan cache aplikasi
├── config/                 # File konfigurasi aplikasi
├── database/               # Migrasi, seeder, dan factory
│   ├── factories/          # Factory untuk data dummy
│   ├── migrations/         # File migrasi tabel database
│   └── seeders/            # Data awal (seeder)
├── public/                 # Entry point aplikasi (index.php, aset publik)
├── resources/              # Views (Blade), CSS, JS sumber
│   ├── css/                # File CSS
│   ├── js/                 # File JavaScript
│   └── views/              # Template Blade
├── routes/                 # Definisi rute aplikasi
│   ├── api.php             # Rute API
│   ├── console.php         # Rute konsol
│   └── web.php             # Rute web
├── storage/                # File yang di-generate, log, cache, upload
├── tests/                  # Unit dan Feature test
├── vendor/                 # Dependensi Composer (jangan diedit)
├── .env                    # Konfigurasi environment (tidak di-commit)
├── .gitignore              # File yang diabaikan Git
├── artisan                 # CLI Laravel
├── composer.json           # Dependensi PHP
└── vite.config.js          # Konfigurasi Vite (asset bundler)
```

---

### 🗃️ Konfigurasi Database

Database yang digunakan: **putri_ravin_nauli**

Tabel yang dibuat setelah migrasi:
- `users` - Data pengguna aplikasi
- `cache` - Penyimpanan cache
- `jobs` - Queue jobs

---

### 📤 Git & GitHub

```bash
# Inisialisasi repositori
git init

# Tambahkan semua file ke staging
git add .

# Commit pertama
git commit -m "Initial commit - Modul 1 Praktikum Web II"

# Tambahkan remote GitHub
git remote add origin https://github.com/putriravin/putri_ravin_nauli.git

# Push ke GitHub
git push -u origin main
```

---

### 📌 Referensi

- [Laravel Documentation](https://laravel.com/docs)
- [Composer](https://getcomposer.org)
- [GitHub](https://github.com)

---

*Modul Praktikum Aplikasi Berbasis Web II | Teknik Informatika | Universitas Medan Area | 2024*
