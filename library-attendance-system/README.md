# Library Attendance System (Pustaka Kita)

Aplikasi absensi perpustakaan berbasis web untuk mencatat aktivitas kunjungan siswa, buku yang dibaca, dan memudahkan petugas memonitor aktivitas perpustakaan.

## Technology Stack

- **Backend:** Laravel 11
- **Frontend:** Blade + Tailwind CSS
- **Database:** SQLite (default) / MySQL
- **Authentication:** Laravel Breeze

## Features

### 1. Authentication
- Login system dengan role-based access (Administrator & Petugas)
- Profile management

### 2. Dashboard
- Statistik pengunjung hari ini
- Jumlah pengunjung aktif
- Total siswa dan buku
- Riwayat kunjungan terbaru
- Daftar pengunjung aktif saat ini

### 3. Master Data Siswa
- CRUD siswa (Create, Read, Update, Delete)
- Data: NIS, Nama, Kelas, Jurusan, Alamat, No. Telp, Status
- Search & filter siswa
- Riwayat kunjungan per siswa

### 4. Master Data Buku
- CRUD buku
- Data: Kode Buku, Judul, Pengarang, Penerbit, Tahun Terbit, Kategori, Jumlah Halaman, Status
- Search & filter buku berdasarkan kategori
- Riwayat penggunaan per buku

### 5. Absensi
- Input absensi dengan verifikasi NIS otomatis
- Pilih buku yang dibaca (opsional)
- Checkout otomatis mencatat waktu keluar
- Filter berdasarkan tanggal, status, dan nama/NIS
- Edit dan hapus data absensi

### 6. Monitoring
- Real-time monitoring pengunjung aktif
- Statistik hari ini (Total, Aktif, Selesai)
- Durasi kunjungan
- Quick checkout dari halaman monitoring

### 7. User Management (Administrator only)
- CRUD users
- Role management (Administrator / Petugas)
- Password management

## Installation

### Prerequisites
- PHP 8.2 or higher
- Composer
- Node.js & NPM

### Steps

1. **Clone atau masuk ke direktori project:**
   ```bash
   cd library-attendance-system
   ```

2. **Install PHP dependencies:**
   ```bash
   composer install
   ```

3. **Install Node dependencies:**
   ```bash
   npm install
   ```

4. **Setup environment:**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Configure database di `.env`:**
   
   **Untuk SQLite (default):**
   ```env
   DB_CONNECTION=sqlite
   ```
   
   **Untuk MySQL:**
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=pustakakita
   DB_USERNAME=root
   DB_PASSWORD=
   ```

6. **Run migrations & seeders:**
   ```bash
   php artisan migrate --seed
   ```

7. **Build assets:**
   ```bash
   npm run build
   ```
   
   **Atau untuk development:**
   ```bash
   npm run dev
   ```

8. **Start development server:**
   ```bash
   php artisan serve
   ```

9. **Access aplikasi:**
   ```
   http://localhost:8000
   ```

## Default Users

Setelah menjalankan seeder, tersedia 2 user default:

### Administrator
- Email: `admin@pustaka.test`
- Password: `password`
- Role: Administrator (Full access)

### Petugas
- Email: `petugas@pustaka.test`
- Password: `password`
- Role: Petugas (Limited access)

## User Roles & Permissions

### Administrator
- Kelola user (CRUD)
- Kelola siswa (CRUD)
- Kelola buku (CRUD)
- Kelola absensi (CRUD)
- Melihat dashboard & monitoring
- Melihat laporan

### Petugas
- Monitoring pengunjung aktif
- Kelola absensi
- Melihat data siswa (View only)
- Melihat data buku (View only)
- Melihat dashboard

## Project Structure

```
library-attendance-system/
├── app/
│   ├── Http/Controllers/
│   │   ├── AttendanceController.php
│   │   ├── BookController.php
│   │   ├── DashboardController.php
│   │   ├── StudentController.php
│   │   └── UserController.php
│   ├── Models/
│   │   ├── Attendance.php
│   │   ├── Book.php
│   │   ├── Student.php
│   │   └── User.php
│   └── Providers/
│       └── AppServiceProvider.php (Gates & Policies)
├── database/
│   ├── migrations/
│   │   ├── *_create_students_table.php
│   │   ├── *_create_books_table.php
│   │   ├── *_create_attendances_table.php
│   │   └── *_add_role_to_users_table.php
│   └── seeders/
│       ├── UserSeeder.php
│       ├── StudentSeeder.php
│       └── BookSeeder.php
├── resources/
│   └── views/
│       ├── attendances/
│       ├── books/
│       ├── students/
│       ├── users/
│       └── dashboard.blade.php
└── routes/
    └── web.php
```

## Development

### Run development server with hot reload:
```bash
npm run dev
php artisan serve
```

### Clear cache:
```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear
```

### Run migrations fresh:
```bash
php artisan migrate:fresh --seed
```

## Attendance Flow

1. Siswa datang ke perpustakaan
2. Petugas/Siswa input NIS di halaman absensi
3. Sistem otomatis verifikasi dan menampilkan data siswa
4. Pilih buku yang akan dibaca (opsional)
5. Sistem menyimpan waktu masuk dan status "Aktif"
6. Petugas dapat memonitor di halaman Monitoring
7. Saat siswa selesai, petugas melakukan Checkout
8. Sistem mencatat waktu keluar dan mengubah status menjadi "Selesai"

## API Endpoints

### Check NIS
```
GET /students/check/{nis}
Response: { "found": true, "student": {...} }
```

### Checkout Attendance
```
POST /attendances/{attendance}/checkout
```

## Future Improvements

- QR Code scanning untuk NIS
- Barcode NIS
- RFID integration
- Export laporan ke Excel/PDF
- Dashboard statistik lanjutan
- Notifikasi email/SMS
- Multi-bahasa support

## License

This project is proprietary software developed for library management purposes.

## Support

Untuk pertanyaan dan dukungan, silakan hubungi tim pengembang.

---

**Developed with ❤️ for Pustaka Kita**
