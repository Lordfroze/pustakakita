<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Siswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Informasi Siswa</h3>
                            <dl class="space-y-2">
                                <div class="flex">
                                    <dt class="font-medium text-gray-700 w-32">NIS:</dt>
                                    <dd class="text-gray-900">{{ $student->nis }}</dd>
                                </div>
                                <div class="flex">
                                    <dt class="font-medium text-gray-700 w-32">Nama:</dt>
                                    <dd class="text-gray-900">{{ $student->nama }}</dd>
                                </div>
                                <div class="flex">
                                    <dt class="font-medium text-gray-700 w-32">Kelas:</dt>
                                    <dd class="text-gray-900">{{ $student->kelas }}</dd>
                                </div>
                                <div class="flex">
                                    <dt class="font-medium text-gray-700 w-32">Jurusan:</dt>
                                    <dd class="text-gray-900">{{ $student->jurusan ?? '-' }}</dd>
                                </div>
                                <div class="flex">
                                    <dt class="font-medium text-gray-700 w-32">No. Telepon:</dt>
                                    <dd class="text-gray-900">{{ $student->no_telp ?? '-' }}</dd>
                                </div>
                                <div class="flex">
                                    <dt class="font-medium text-gray-700 w-32">Status:</dt>
                                    <dd>
                                        @if($student->status === 'aktif')
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Aktif</span>
                                        @else
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Tidak Aktif</span>
                                        @endif
                                    </dd>
                                </div>
                                <div class="flex">
                                    <dt class="font-medium text-gray-700 w-32">Alamat:</dt>
                                    <dd class="text-gray-900">{{ $student->alamat ?? '-' }}</dd>
                                </div>
                            </dl>
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('students.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400 focus:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Kembali
                        </a>
                        @can('manage-students')
                            <a href="{{ route('students.edit', $student) }}" class="inline-flex items-center px-4 py-2 bg-yellow-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-700 focus:bg-yellow-700 active:bg-yellow-900 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Edit
                            </a>
                        @endcan
                    </div>
                </div>
            </div>

            <!-- Riwayat Kunjungan -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Riwayat Kunjungan</h3>
                    @if($attendances->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Buku</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Waktu Masuk</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Waktu Keluar</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($attendances as $attendance)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $attendance->tanggal->format('d/m/Y') }}</td>
                                            <td class="px-6 py-4 text-sm text-gray-500">{{ $attendance->book?->judul ?? '-' }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $attendance->waktu_masuk }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $attendance->waktu_keluar ?? '-' }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @if($attendance->status === 'aktif')
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Aktif</span>
                                                @else
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">Selesai</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4">
                            {{ $attendances->links() }}
                        </div>
                    @else
                        <p class="text-gray-500">Belum ada riwayat kunjungan.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
