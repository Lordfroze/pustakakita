<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            ['kode_buku' => 'BK001', 'judul' => 'Laskar Pelangi', 'pengarang' => 'Andrea Hirata', 'penerbit' => 'Bentang Pustaka', 'tahun_terbit' => 2005, 'kategori' => 'Novel'],
            ['kode_buku' => 'BK002', 'judul' => 'Bumi Manusia', 'pengarang' => 'Pramoedya Ananta Toer', 'penerbit' => 'Hasta Mitra', 'tahun_terbit' => 1980, 'kategori' => 'Novel'],
            ['kode_buku' => 'BK003', 'judul' => 'Sang Pemimpi', 'pengarang' => 'Andrea Hirata', 'penerbit' => 'Bentang Pustaka', 'tahun_terbit' => 2006, 'kategori' => 'Novel'],
            ['kode_buku' => 'BK004', 'judul' => 'Habis Gelap Terbitlah Terang', 'pengarang' => 'R.A. Kartini', 'penerbit' => 'Balai Pustaka', 'tahun_terbit' => 1911, 'kategori' => 'Biografi'],
            ['kode_buku' => 'BK005', 'judul' => 'Ronggeng Dukuh Paruk', 'pengarang' => 'Ahmad Tohari', 'penerbit' => 'Gramedia', 'tahun_terbit' => 1982, 'kategori' => 'Novel'],
            ['kode_buku' => 'BK006', 'judul' => 'Perahu Kertas', 'pengarang' => 'Dee Lestari', 'penerbit' => 'Bentang Pustaka', 'tahun_terbit' => 2009, 'kategori' => 'Novel'],
            ['kode_buku' => 'BK007', 'judul' => 'Negeri 5 Menara', 'pengarang' => 'Ahmad Fuadi', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2009, 'kategori' => 'Novel'],
            ['kode_buku' => 'BK008', 'judul' => 'Matematika Kelas X', 'pengarang' => 'Tim Guru Indonesia', 'penerbit' => 'Erlangga', 'tahun_terbit' => 2020, 'kategori' => 'Pelajaran'],
            ['kode_buku' => 'BK009', 'judul' => 'Fisika Dasar', 'pengarang' => 'Dr. Yohanes Surya', 'penerbit' => 'Pustaka Ilmu', 'tahun_terbit' => 2018, 'kategori' => 'Pelajaran'],
            ['kode_buku' => 'BK010', 'judul' => 'Sejarah Indonesia Modern', 'pengarang' => 'Prof. Sartono Kartodirdjo', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2015, 'kategori' => 'Sejarah'],
        ];

        foreach ($books as $book) {
            Book::create(array_merge($book, ['status' => 'tersedia', 'jumlah_halaman' => rand(150, 500)]));
        }
    }
}
