<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form method="POST" action="{{ route('books.update', $book) }}">
                        @csrf
                        @method('PUT')

                        <!-- Kode Buku -->
                        <div class="mb-4">
                            <label for="kode_buku" class="block font-medium text-sm text-gray-700">Kode Buku <span class="text-red-600">*</span></label>
                            <input id="kode_buku" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('kode_buku') border-red-500 @enderror" type="text" name="kode_buku" value="{{ old('kode_buku', $book->kode_buku) }}" required autofocus>
                            @error('kode_buku')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Judul -->
                        <div class="mb-4">
                            <label for="judul" class="block font-medium text-sm text-gray-700">Judul <span class="text-red-600">*</span></label>
                            <input id="judul" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('judul') border-red-500 @enderror" type="text" name="judul" value="{{ old('judul', $book->judul) }}" required>
                            @error('judul')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Pengarang -->
                        <div class="mb-4">
                            <label for="pengarang" class="block font-medium text-sm text-gray-700">Pengarang</label>
                            <input id="pengarang" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('pengarang') border-red-500 @enderror" type="text" name="pengarang" value="{{ old('pengarang', $book->pengarang) }}">
                            @error('pengarang')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Penerbit -->
                        <div class="mb-4">
                            <label for="penerbit" class="block font-medium text-sm text-gray-700">Penerbit</label>
                            <input id="penerbit" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('penerbit') border-red-500 @enderror" type="text" name="penerbit" value="{{ old('penerbit', $book->penerbit) }}">
                            @error('penerbit')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Tahun Terbit -->
                        <div class="mb-4">
                            <label for="tahun_terbit" class="block font-medium text-sm text-gray-700">Tahun Terbit</label>
                            <input id="tahun_terbit" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('tahun_terbit') border-red-500 @enderror" type="number" name="tahun_terbit" value="{{ old('tahun_terbit', $book->tahun_terbit) }}" min="1900" max="{{ date('Y') }}">
                            @error('tahun_terbit')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Kategori -->
                        <div class="mb-4">
                            <label for="kategori" class="block font-medium text-sm text-gray-700">Kategori</label>
                            <input id="kategori" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('kategori') border-red-500 @enderror" type="text" name="kategori" value="{{ old('kategori', $book->kategori) }}">
                            @error('kategori')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Jumlah Halaman -->
                        <div class="mb-4">
                            <label for="jumlah_halaman" class="block font-medium text-sm text-gray-700">Jumlah Halaman</label>
                            <input id="jumlah_halaman" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('jumlah_halaman') border-red-500 @enderror" type="number" name="jumlah_halaman" value="{{ old('jumlah_halaman', $book->jumlah_halaman) }}" min="1">
                            @error('jumlah_halaman')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Status -->
                        <div class="mb-4">
                            <label for="status" class="block font-medium text-sm text-gray-700">Status <span class="text-red-600">*</span></label>
                            <select id="status" name="status" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('status') border-red-500 @enderror" required>
                                <option value="tersedia" {{ old('status', $book->status) === 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                                <option value="tidak_tersedia" {{ old('status', $book->status) === 'tidak_tersedia' ? 'selected' : '' }}>Tidak Tersedia</option>
                            </select>
                            @error('status')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end gap-4 mt-6">
                            <a href="{{ route('books.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400 focus:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
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
