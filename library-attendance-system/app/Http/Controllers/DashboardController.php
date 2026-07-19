<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Book;
use App\Models\Student;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $today = today();
        
        $data = [
            'pengunjung_hari_ini' => Attendance::whereDate('tanggal', $today)->count(),
            'pengunjung_aktif' => Attendance::aktif()->whereDate('tanggal', $today)->count(),
            'total_siswa' => Student::active()->count(),
            'total_buku' => Book::tersedia()->count(),
            'recent_attendances' => Attendance::with(['student', 'book'])
                ->whereDate('tanggal', $today)
                ->latest()
                ->limit(10)
                ->get(),
            'active_visitors' => Attendance::with(['student', 'book'])
                ->aktif()
                ->whereDate('tanggal', $today)
                ->get(),
        ];

        return view('dashboard', $data);
    }
}
