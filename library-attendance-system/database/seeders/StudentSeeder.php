<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = [
            ['nis' => '2024001', 'nama' => 'Ahmad Fauzi', 'kelas' => 'X', 'jurusan' => 'IPA'],
            ['nis' => '2024002', 'nama' => 'Siti Nurhaliza', 'kelas' => 'X', 'jurusan' => 'IPA'],
            ['nis' => '2024003', 'nama' => 'Budi Santoso', 'kelas' => 'XI', 'jurusan' => 'IPS'],
            ['nis' => '2024004', 'nama' => 'Rina Wati', 'kelas' => 'XI', 'jurusan' => 'IPS'],
            ['nis' => '2024005', 'nama' => 'Dedi Kusuma', 'kelas' => 'XII', 'jurusan' => 'IPA'],
            ['nis' => '2024006', 'nama' => 'Maya Sari', 'kelas' => 'XII', 'jurusan' => 'IPA'],
            ['nis' => '2024007', 'nama' => 'Andi Pratama', 'kelas' => 'X', 'jurusan' => 'IPS'],
            ['nis' => '2024008', 'nama' => 'Dewi Lestari', 'kelas' => 'XI', 'jurusan' => 'IPA'],
            ['nis' => '2024009', 'nama' => 'Rizki Ramadhan', 'kelas' => 'XII', 'jurusan' => 'IPS'],
            ['nis' => '2024010', 'nama' => 'Indah Permata', 'kelas' => 'X', 'jurusan' => 'IPA'],
        ];

        foreach ($students as $student) {
            Student::create(array_merge($student, ['status' => 'aktif']));
        }
    }
}
