<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Absensi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Informasi Siswa</h3>
                            <dl class="space-y-2">
                                <div class="flex">
                                    <dt class="font-medium text-gray-700 w-32">NIS:</dt>
                                    <dd class="text-gray-900">{{ $attendance->student->nis }}</dd>
                                </div>
                                <div class="flex">
                                    <dt class="font-medium text-gray-700 w-32">Nama:</dt>
                                    <dd class="text-gray-900">{{ $attendance->student->nama }}</dd>
                                </div>
                                <div class="flex">
                                    <dt class="font-medium text-gray-700 w-32">Kelas:</dt>
                                    <dd class="text-gray-900">{{ $attendance->student->kelas }}</dd>
                                </div>
                                <div class="flex">
                                    <dt class="font-medium text-gray-700 w-32">Jurusan:</dt>
                                    <dd class="text-gray-900">{{ $attendance->student->jurusan ?? '-' }}</dd>
                                </div>
                            </dl>
                        </div>

                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Informasi Kunjungan</h3>
                            <dl class="space-y-2">
                                <div class="flex">
                                    <dt class="font-medium text-gray-700 w-32">Tanggal:</dt>
                                    <dd class="text-gray-900">{{ $attendance->tanggal->format('d/m/Y') }}</dd>
                                </div>
                                <div class="flex">
                                    <dt class="font-medium text-gray-700 w-32">Waktu Masuk:</dt>
                                    <dd class="text-gray-900">{{ $attendance->waktu_masuk }}</dd>
                                </div>
                                <div class="flex">
                                    <dt class="font-medium text-gray-700 w-32">Waktu Keluar:</dt>
                                    <dd class="text-gray-900">{{ $attendance->waktu_keluar ?? '-' }}</dd>
                                </div>
                                <div class="flex">
                                    <dt class="font-medium text-gray-700 w-32">Status:</dt>
                                    <dd>
                                        @if($attendance->status === 'aktif')
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Aktif</span>
                                        @else
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">Selesai</span>
                                        @endif
                                    </dd>
                                </div>
                            </dl>
                        </div>
                    </div>

                    <div class="mt-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Buku yang Dibaca</h3>
                        <p class="text-gray-900">{{ $attendance->book?->judul ?? 'Tidak ada buku yang dipilih' }}</p>
                        @if($attendance->book)
                            <p class="text-sm text-gray-600">Pengarang: {{ $attendance->book->pengarang ?? '-' }}</p>
                        @endif
                    </div>

                    @if($attendance->catatan)
                        <div class="mt-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Catatan</h3>
                            <p class="text-gray-900">{{ $attendance->catatan }}</p>
                        </div>
                    @endif

                    <div class="mt-6 flex gap-2">
                        <a href="{{ route('attendances.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400 focus:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Kembali
                        </a>
                        @if($attendance->status === 'aktif')
                            <form action="{{ route('attendances.checkout', $attendance) }}" method="POST" class="inline-block">
                                @csrf
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    Checkout
                                </button>
                            </form>
                        @endif
                        <a href="{{ route('attendances.edit', $attendance) }}" class="inline-flex items-center px-4 py-2 bg-yellow-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-700 focus:bg-yellow-700 active:bg-yellow-900 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Edit
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
