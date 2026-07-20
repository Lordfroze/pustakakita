<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                    📚 Dashboard Perpustakaan
                </h2>
                <p class="text-sm text-gray-600 mt-1">Selamat datang di Perpustakaan SDN Pagotan 02</p>
            </div>
            <div class="text-sm text-gray-600">
                <span class="font-medium">{{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y') }}</span>
            </div>
        </div>
    </x-slot>

    <div class="py-8 bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Welcome Banner -->
            <div class="bg-gradient-to-r from-blue-600 to-indigo-600 rounded-2xl shadow-xl p-8 mb-8 text-white transform hover:scale-[1.02] transition-all duration-300">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <h3 class="text-3xl font-bold mb-2">Halo, Sahabat Literasi! 👋</h3>
                        <p class="text-blue-100 text-lg">Mari kita isi hari dengan membaca dan menambah wawasan bersama</p>
                    </div>
                    <div class="hidden md:block">
                        <svg class="w-32 h-32 opacity-20" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Card 1: Pengunjung Hari Ini -->
                <div class="bg-white overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex-shrink-0 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl p-4 shadow-lg">
                                <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                            <span class="text-4xl">👥</span>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-gray-600 uppercase tracking-wide mb-1">Pengunjung Hari Ini</p>
                            <p class="text-4xl font-bold text-gray-900 mb-1">{{ $pengunjung_hari_ini }}</p>
                            <p class="text-xs text-blue-600 font-medium">🔥 Ayo kunjungi perpustakaan!</p>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Pengunjung Aktif -->
                <div class="bg-white overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex-shrink-0 bg-gradient-to-br from-green-500 to-green-600 rounded-xl p-4 shadow-lg">
                                <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <span class="text-4xl">✅</span>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-gray-600 uppercase tracking-wide mb-1">Sedang Membaca</p>
                            <p class="text-4xl font-bold text-gray-900 mb-1">{{ $pengunjung_aktif }}</p>
                            <p class="text-xs text-green-600 font-medium">✨ Siswa aktif saat ini</p>
                        </div>
                    </div>
                </div>

                <!-- Card 3: Total Siswa -->
                <div class="bg-white overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex-shrink-0 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-xl p-4 shadow-lg">
                                <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </div>
                            <span class="text-4xl">🎓</span>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-gray-600 uppercase tracking-wide mb-1">Total Siswa</p>
                            <p class="text-4xl font-bold text-gray-900 mb-1">{{ $total_siswa }}</p>
                            <p class="text-xs text-orange-600 font-medium">🌟 Siswa terdaftar</p>
                        </div>
                    </div>
                </div>

                <!-- Card 4: Buku Tersedia -->
                <div class="bg-white overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex-shrink-0 bg-gradient-to-br from-purple-500 to-pink-500 rounded-xl p-4 shadow-lg">
                                <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                            </div>
                            <span class="text-4xl">📖</span>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-gray-600 uppercase tracking-wide mb-1">Koleksi Buku</p>
                            <p class="text-4xl font-bold text-gray-900 mb-1">{{ $total_buku }}</p>
                            <p class="text-xs text-purple-600 font-medium">📚 Buku tersedia</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Active Visitors -->
            <div class="bg-white overflow-hidden rounded-2xl shadow-lg mb-8">
                <div class="bg-gradient-to-r from-green-500 to-emerald-500 px-8 py-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-2xl font-bold text-white flex items-center gap-2">
                                <span>✨</span> Siswa Yang Sedang Membaca
                            </h3>
                            <p class="text-green-100 text-sm mt-1">Daftar siswa yang sedang aktif di perpustakaan</p>
                        </div>
                        <div class="hidden md:block bg-white bg-opacity-20 rounded-full px-4 py-2">
                            <span class="text-white font-bold text-lg">{{ $active_visitors->count() }} Siswa</span>
                        </div>
                    </div>
                </div>
                <div class="p-8">
                    @if($active_visitors->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach($active_visitors as $attendance)
                                <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-xl p-5 border-2 border-green-200 hover:border-green-400 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                                    <div class="flex items-start justify-between mb-3">
                                        <div class="bg-green-500 text-white rounded-full w-12 h-12 flex items-center justify-center text-xl font-bold shadow-lg">
                                            {{ substr($attendance->student->nama, 0, 1) }}
                                        </div>
                                        <span class="bg-green-500 text-white text-xs font-bold px-3 py-1 rounded-full">Aktif 🟢</span>
                                    </div>
                                    <h4 class="font-bold text-gray-900 text-lg mb-1">{{ $attendance->student->nama }}</h4>
                                    <div class="space-y-1 text-sm">
                                        <p class="text-gray-600"><span class="font-semibold">NIS:</span> {{ $attendance->student->nis }}</p>
                                        <p class="text-gray-600"><span class="font-semibold">Kelas:</span> <span class="bg-blue-100 text-blue-800 px-2 py-0.5 rounded-md font-medium">{{ $attendance->student->kelas }}</span></p>
                                        <p class="text-gray-600"><span class="font-semibold">📖 Buku:</span> {{ $attendance->book?->judul ?? 'Belum memilih buku' }}</p>
                                        <p class="text-gray-500 text-xs mt-2"><span class="font-semibold">⏰ Masuk:</span> {{ \Carbon\Carbon::parse($attendance->waktu_masuk)->format('H:i') }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-12">
                            <div class="text-6xl mb-4">📚</div>
                            <p class="text-gray-500 text-lg font-medium">Belum ada siswa yang sedang membaca</p>
                            <p class="text-gray-400 text-sm mt-2">Ayo kunjungi perpustakaan dan mulai membaca!</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Recent Attendances -->
            <div class="bg-white overflow-hidden rounded-2xl shadow-lg">
                <div class="bg-gradient-to-r from-indigo-500 to-purple-500 px-8 py-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-2xl font-bold text-white flex items-center gap-2">
                                <span>📋</span> Riwayat Kunjungan Hari Ini
                            </h3>
                            <p class="text-indigo-100 text-sm mt-1">Semua aktivitas kunjungan perpustakaan hari ini</p>
                        </div>
                        <div class="hidden md:block bg-white bg-opacity-20 rounded-full px-4 py-2">
                            <span class="text-white font-bold text-lg">{{ $recent_attendances->count() }} Kunjungan</span>
                        </div>
                    </div>
                </div>
                <div class="p-8">
                    @if($recent_attendances->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                                    <tr>
                                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                            <div class="flex items-center gap-2">
                                                <span>🎓</span> NIS
                                            </div>
                                        </th>
                                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                            <div class="flex items-center gap-2">
                                                <span>👤</span> Nama Siswa
                                            </div>
                                        </th>
                                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                            <div class="flex items-center gap-2">
                                                <span>📚</span> Buku
                                            </div>
                                        </th>
                                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                            <div class="flex items-center gap-2">
                                                <span>⏰</span> Masuk
                                            </div>
                                        </th>
                                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                            <div class="flex items-center gap-2">
                                                <span>🚪</span> Keluar
                                            </div>
                                        </th>
                                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                            <div class="flex items-center gap-2">
                                                <span>📊</span> Status
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-100">
                                    @foreach($recent_attendances as $attendance)
                                        <tr class="hover:bg-gradient-to-r hover:from-indigo-50 hover:to-purple-50 transition-colors duration-200">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="text-sm font-bold text-gray-900 bg-gray-100 px-3 py-1 rounded-lg">{{ $attendance->student->nis }}</span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 h-10 w-10 bg-gradient-to-br from-indigo-500 to-purple-500 rounded-full flex items-center justify-center text-white font-bold shadow-md">
                                                        {{ substr($attendance->student->nama, 0, 1) }}
                                                    </div>
                                                    <div class="ml-3">
                                                        <p class="text-sm font-bold text-gray-900">{{ $attendance->student->nama }}</p>
                                                        <p class="text-xs text-gray-500">Kelas {{ $attendance->student->kelas }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-700 max-w-xs">
                                                <div class="flex items-center gap-2">
                                                    @if($attendance->book?->judul)
                                                        <span class="bg-purple-100 text-purple-800 px-3 py-1 rounded-lg font-medium">{{ $attendance->book->judul }}</span>
                                                    @else
                                                        <span class="bg-gray-100 text-gray-500 px-3 py-1 rounded-lg italic">Belum memilih</span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                                <span class="font-semibold">{{ \Carbon\Carbon::parse($attendance->waktu_masuk)->format('H:i') }}</span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                                @if($attendance->waktu_keluar)
                                                    <span class="font-semibold">{{ \Carbon\Carbon::parse($attendance->waktu_keluar)->format('H:i') }}</span>
                                                @else
                                                    <span class="text-gray-400 italic">Belum keluar</span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @if($attendance->status === 'aktif')
                                                    <span class="px-4 py-2 inline-flex text-xs leading-5 font-bold rounded-full bg-gradient-to-r from-green-400 to-emerald-500 text-white shadow-md">
                                                        🟢 Aktif
                                                    </span>
                                                @else
                                                    <span class="px-4 py-2 inline-flex text-xs leading-5 font-bold rounded-full bg-gradient-to-r from-gray-400 to-gray-500 text-white shadow-md">
                                                        ✓ Selesai
                                                    </span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-16">
                            <div class="text-7xl mb-4">📖</div>
                            <p class="text-gray-500 text-xl font-bold">Belum ada kunjungan hari ini</p>
                            <p class="text-gray-400 text-sm mt-2">Jadilah yang pertama mengunjungi perpustakaan hari ini! 🌟</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
