<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Informasi Buku</h3>
                            <dl class="space-y-2">
                                <div class="flex">
                                    <dt class="font-medium text-gray-700 w-40">Kode Buku:</dt>
                                    <dd class="text-gray-900">{{ $book->kode_buku }}</dd>
                                </div>
                                <div class="flex">
                                    <dt class="font-medium text-gray-700 w-40">Judul:</dt>
                                    <dd class="text-gray-900">{{ $book->judul }}</dd>
                                </div>
                                <div class="flex">
                                    <dt class="font-medium text-gray-700 w-40">Pengarang:</dt>
                                    <dd class="text-gray-900">{{ $book->pengarang ?? '-' }}</dd>
                                </div>
                                <div class="flex">
                                    <dt class="font-medium text-gray-700 w-40">Penerbit:</dt>
                                    <dd class="text-gray-900">{{ $book->penerbit ?? '-' }}</dd>
                                </div>
                                <div class="flex">
                                    <dt class="font-medium text-gray-700 w-40">Tahun Terbit:</dt>
                                    <dd class="text-gray-900">{{ $book->tahun_terbit ?? '-' }}</dd>
                                </div>
                                <div class="flex">
                                    <dt class="font-medium text-gray-700 w-40">Kategori:</dt>
                                    <dd class="text-gray-900">{{ $book->kategori ?? '-' }}</dd>
                                </div>
                                <div class="flex">
                                    <dt class="font-medium text-gray-700 w-40">Jumlah Halaman:</dt>
                                    <dd class="text-gray-900">{{ $book->jumlah_halaman ?? '-' }}</dd>
                                </div>
                                <div class="flex">
                                    <dt class="font-medium text-gray-700 w-40">Status:</dt>
                                    <dd>
                                        @if($book->status === 'tersedia')
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Tersedia</span>
                                        @else
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Tidak Tersedia</span>
                                        @endif
                                    </dd>
                                </div>
                            </dl>
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('books.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400 focus:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Kembali
                        </a>
                        @can('manage-books')
                            <a href="{{ route('books.edit', $book) }}" class="inline-flex items-center px-4 py-2 bg-yellow-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-700 focus:bg-yellow-700 active:bg-yellow-900 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Edit
                            </a>
                        @endcan
                    </div>
                </div>
            </div>

            <!-- Riwayat Penggunaan -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Riwayat Penggunaan Buku</h3>
                    @if($attendances->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NIS</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Siswa</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kelas</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Waktu Masuk</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Waktu Keluar</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($attendances as $attendance)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $attendance->tanggal->format('d/m/Y') }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $attendance->student->nis }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $attendance->student->nama }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $attendance->student->kelas }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $attendance->waktu_masuk }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $attendance->waktu_keluar ?? '-' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4">
                            {{ $attendances->links() }}
                        </div>
                    @else
                        <p class="text-gray-500">Belum ada riwayat penggunaan buku ini.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
