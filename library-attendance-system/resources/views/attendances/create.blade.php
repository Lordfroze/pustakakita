<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Absensi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            @if(session('error'))
                <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form method="POST" action="{{ route('attendances.store') }}" id="attendanceForm">
                        @csrf

                        <!-- NIS -->
                        <div class="mb-4">
                            <label for="nis" class="block font-medium text-sm text-gray-700">NIS Siswa <span class="text-red-600">*</span></label>
                            <input id="nis" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('nis') border-red-500 @enderror" type="text" name="nis" value="{{ old('nis') }}" required autofocus>
                            @error('nis')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-xs text-gray-500">Masukkan NIS siswa dan tekan Enter atau klik di luar untuk verifikasi</p>
                        </div>

                        <!-- Student Info Display -->
                        <div id="studentInfo" class="mb-4 p-4 bg-gray-50 rounded-md hidden">
                            <h4 class="font-semibold text-sm text-gray-700 mb-2">Informasi Siswa:</h4>
                            <dl class="space-y-1">
                                <div class="flex">
                                    <dt class="font-medium text-gray-600 text-sm w-24">Nama:</dt>
                                    <dd id="studentName" class="text-gray-900 text-sm"></dd>
                                </div>
                                <div class="flex">
                                    <dt class="font-medium text-gray-600 text-sm w-24">Kelas:</dt>
                                    <dd id="studentClass" class="text-gray-900 text-sm"></dd>
                                </div>
                                <div class="flex">
                                    <dt class="font-medium text-gray-600 text-sm w-24">Jurusan:</dt>
                                    <dd id="studentMajor" class="text-gray-900 text-sm"></dd>
                                </div>
                            </dl>
                        </div>

                        <div id="studentNotFound" class="mb-4 p-4 bg-red-50 border border-red-200 rounded-md hidden">
                            <p class="text-sm text-red-700">Siswa dengan NIS tersebut tidak ditemukan.</p>
                        </div>

                        <!-- Book Selection -->
                        <div class="mb-4">
                            <label for="book_id" class="block font-medium text-sm text-gray-700">Buku yang Dibaca</label>
                            <select id="book_id" name="book_id" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="">-- Pilih Buku (Opsional) --</option>
                                @foreach($books as $book)
                                    <option value="{{ $book->id }}" {{ old('book_id') == $book->id ? 'selected' : '' }}>{{ $book->judul }} - {{ $book->pengarang }}</option>
                                @endforeach
                            </select>
                            @error('book_id')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Catatan -->
                        <div class="mb-4">
                            <label for="catatan" class="block font-medium text-sm text-gray-700">Catatan</label>
                            <textarea id="catatan" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" name="catatan" rows="3">{{ old('catatan') }}</textarea>
                            @error('catatan')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end gap-4 mt-6">
                            <a href="{{ route('attendances.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400 focus:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Batal
                            </a>
                            <button type="submit" id="submitBtn" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150" disabled>
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const nisInput = document.getElementById('nis');
        const studentInfo = document.getElementById('studentInfo');
        const studentNotFound = document.getElementById('studentNotFound');
        const submitBtn = document.getElementById('submitBtn');

        async function checkNIS() {
            const nis = nisInput.value.trim();
            
            if (!nis) {
                studentInfo.classList.add('hidden');
                studentNotFound.classList.add('hidden');
                submitBtn.disabled = true;
                return;
            }

            try {
                const response = await fetch(`/students/check/${nis}`);
                const data = await response.json();

                if (data.found) {
                    document.getElementById('studentName').textContent = data.student.nama;
                    document.getElementById('studentClass').textContent = data.student.kelas;
                    document.getElementById('studentMajor').textContent = data.student.jurusan || '-';
                    
                    studentInfo.classList.remove('hidden');
                    studentNotFound.classList.add('hidden');
                    submitBtn.disabled = false;
                } else {
                    studentInfo.classList.add('hidden');
                    studentNotFound.classList.remove('hidden');
                    submitBtn.disabled = true;
                }
            } catch (error) {
                console.error('Error checking NIS:', error);
                studentInfo.classList.add('hidden');
                studentNotFound.classList.remove('hidden');
                submitBtn.disabled = true;
            }
        }

        nisInput.addEventListener('blur', checkNIS);
        nisInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                checkNIS();
            }
        });
    </script>
</x-app-layout>
