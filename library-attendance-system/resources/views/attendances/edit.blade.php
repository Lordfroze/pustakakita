<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Absensi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form method="POST" action="{{ route('attendances.update', $attendance) }}">
                        @csrf
                        @method('PUT')

                        <!-- Student Selection -->
                        <div class="mb-4">
                            <label for="student_id" class="block font-medium text-sm text-gray-700">Siswa <span class="text-red-600">*</span></label>
                            <select id="student_id" name="student_id" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('student_id') border-red-500 @enderror" required>
                                @foreach($students as $student)
                                    <option value="{{ $student->id }}" {{ old('student_id', $attendance->student_id) == $student->id ? 'selected' : '' }}>
                                        {{ $student->nis }} - {{ $student->nama }} ({{ $student->kelas }})
                                    </option>
                                @endforeach
                            </select>
                            @error('student_id')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Book Selection -->
                        <div class="mb-4">
                            <label for="book_id" class="block font-medium text-sm text-gray-700">Buku yang Dibaca</label>
                            <select id="book_id" name="book_id" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="">-- Pilih Buku (Opsional) --</option>
                                @foreach($books as $book)
                                    <option value="{{ $book->id }}" {{ old('book_id', $attendance->book_id) == $book->id ? 'selected' : '' }}>{{ $book->judul }} - {{ $book->pengarang }}</option>
                                @endforeach
                            </select>
                            @error('book_id')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Tanggal -->
                        <div class="mb-4">
                            <label for="tanggal" class="block font-medium text-sm text-gray-700">Tanggal <span class="text-red-600">*</span></label>
                            <input id="tanggal" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('tanggal') border-red-500 @enderror" type="date" name="tanggal" value="{{ old('tanggal', $attendance->tanggal->format('Y-m-d')) }}" required>
                            @error('tanggal')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Waktu Masuk -->
                        <div class="mb-4">
                            <label for="waktu_masuk" class="block font-medium text-sm text-gray-700">Waktu Masuk <span class="text-red-600">*</span></label>
                            <input id="waktu_masuk" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('waktu_masuk') border-red-500 @enderror" type="time" name="waktu_masuk" value="{{ old('waktu_masuk', $attendance->waktu_masuk) }}" required>
                            @error('waktu_masuk')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Waktu Keluar -->
                        <div class="mb-4">
                            <label for="waktu_keluar" class="block font-medium text-sm text-gray-700">Waktu Keluar</label>
                            <input id="waktu_keluar" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('waktu_keluar') border-red-500 @enderror" type="time" name="waktu_keluar" value="{{ old('waktu_keluar', $attendance->waktu_keluar) }}">
                            @error('waktu_keluar')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Status -->
                        <div class="mb-4">
                            <label for="status" class="block font-medium text-sm text-gray-700">Status <span class="text-red-600">*</span></label>
                            <select id="status" name="status" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('status') border-red-500 @enderror" required>
                                <option value="aktif" {{ old('status', $attendance->status) === 'aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="selesai" {{ old('status', $attendance->status) === 'selesai' ? 'selected' : '' }}>Selesai</option>
                            </select>
                            @error('status')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Catatan -->
                        <div class="mb-4">
                            <label for="catatan" class="block font-medium text-sm text-gray-700">Catatan</label>
                            <textarea id="catatan" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" name="catatan" rows="3">{{ old('catatan', $attendance->catatan) }}</textarea>
                            @error('catatan')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end gap-4 mt-6">
                            <a href="{{ route('attendances.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400 focus:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Batal
                            </a>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
