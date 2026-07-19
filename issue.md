# Library Attendance System - issue.md

## Project Overview

Membangun aplikasi absensi perpustakaan berbasis web untuk mencatat
aktivitas kunjungan siswa, buku yang dibaca, dan memudahkan petugas
memonitor aktivitas perpustakaan.

## Technology Stack

-   Backend: Laravel
-   Frontend: Blade + Tailwind CSS
-   Database: MySQL
-   Authentication: Laravel Authentication

## User Roles

### Administrator

-   Kelola user
-   Kelola siswa
-   Kelola buku
-   Kelola absensi
-   Melihat laporan

### Petugas

-   Monitoring pengunjung aktif
-   Melihat riwayat kunjungan
-   Mengubah status kunjungan bila diperlukan

### Siswa

-   Input NIS
-   Memilih / memasukkan judul buku yang dibaca

## Core Modules

-   Authentication
-   Master Data Siswa
-   Master Data Buku
-   Master User
-   Attendance
-   Dashboard
-   Monitoring
-   Reports

## Attendance Flow

1.  Siswa datang ke perpustakaan.
2.  Input NIS.
3.  Sistem memverifikasi data siswa.
4.  Sistem menampilkan identitas siswa.
5.  Siswa memilih atau memasukkan judul buku.
6.  Sistem menyimpan tanggal, waktu, siswa, dan buku.
7.  Petugas dapat memonitor pengunjung aktif.

## Dashboard

-   Jumlah pengunjung hari ini
-   Pengunjung aktif
-   Buku yang sedang dibaca
-   Statistik kunjungan

## Search & Filter

-   Nama
-   NIS
-   Kelas
-   Buku
-   Rentang tanggal

## Reports

-   Harian
-   Bulanan
-   Berdasarkan siswa
-   Berdasarkan buku
-   Export data

## Future Improvements

-   QR Code
-   Barcode NIS
-   RFID
-   Integrasi sistem perpustakaan
-   Dashboard statistik lanjutan

## Development Phases

### Phase 1

-   Authentication
-   Master Data
-   User Management

### Phase 2

-   Attendance
-   Validasi NIS
-   Pencatatan aktivitas membaca

### Phase 3

-   Dashboard
-   Monitoring
-   Riwayat kunjungan

### Phase 4

-   Reports
-   Export
-   UI/UX Improvement

## Notes

-   Utamakan proses absensi yang cepat.
-   Pisahkan master data, transaksi, dan laporan.
-   Desain sistem agar mudah dikembangkan di masa depan.
