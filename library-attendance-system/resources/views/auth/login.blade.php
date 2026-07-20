<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login - Perpustakaan - SDN Pagotan 02</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen flex flex-col lg:flex-row">
        <!-- Left Section - Information Panel -->
        <div class="lg:w-1/2 bg-gradient-to-br from-blue-600 via-blue-700 to-teal-600 text-white p-8 lg:p-12 flex flex-col justify-center relative overflow-hidden">
            <!-- Background Pattern -->
            <div class="absolute inset-0 opacity-10">
                <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg">
                    <pattern id="pattern" x="0" y="0" width="40" height="40" patternUnits="userSpaceOnUse">
                        <rect x="0" y="0" width="2" height="2" fill="white" />
                    </pattern>
                    <rect x="0" y="0" width="100%" height="100%" fill="url(#pattern)" />
                </svg>
            </div>

            <div class="relative z-10 max-w-xl mx-auto lg:mx-0">
                <!-- Logo & Brand -->
                <div class="mb-8 animate-fade-in">
                    <div class="flex items-center gap-3 mb-4">
                        <img src="{{ asset('images/logo.png') }}" alt="Pustaka Kita Logo" style="height:90px;">

                        <!-- <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2L3 7v10c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V7l-9-5z" />
                            <path d="M12 4.18l7 3.82v7c0 4.27-2.91 8.26-7 9.32-4.09-1.06-7-5.05-7-9.32v-7l7-3.82z" fill="white" opacity="0.3" />
                            <path d="M9 12l2 2 4-4" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none" />
                        </svg> -->
                        <div>
                            <h1 class="text-3xl font-bold">Perpustakaan SDN Pagotan 02</h1>
                            <p class="text-blue-100 text-sm">Perpustakaan Digital Sekolah</p>
                        </div>
                    </div>
                    <p class="text-xl font-semibold text-blue-100 italic">Dari Sekolah, Oleh Sekolah, untuk Kita Semua</p>
                </div>

                <!-- Description -->
                <div class="mb-10 animate-fade-in-delay-1">
                    <p class="text-lg leading-relaxed text-blue-50">
                        PustakaKita adalah aplikasi perpustakaan digital resmi yang dirancang khusus untuk memudahkan seluruh warga sekolah—baik siswa, guru, maupun staf—dalam mengakses dunia literasi.
                    </p>
                    <p class="text-lg leading-relaxed text-blue-50 mt-4">
                        Dengan semangat "Dari Sekolah, Oleh Sekolah, untuk Kita Semua", aplikasi ini membawa perpustakaan konvensional langsung ke dalam layar ponsel pintar Anda secara praktis, cepat, dan modern.
                    </p>
                </div>

                <!-- Features -->
                <div class="grid grid-cols-2 gap-4 animate-fade-in-delay-2">
                    <div class="flex items-start gap-3">
                        <div class="bg-white/20 p-2 rounded-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold">Koleksi Digital</h3>
                            <p class="text-sm text-blue-100">Akses ribuan buku</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3">
                        <div class="bg-white/20 p-2 rounded-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold">Pencarian Cepat</h3>
                            <p class="text-sm text-blue-100">Temukan buku favorit</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3">
                        <div class="bg-white/20 p-2 rounded-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold">Riwayat Lengkap</h3>
                            <p class="text-sm text-blue-100">Pantau aktivitas</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3">
                        <div class="bg-white/20 p-2 rounded-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold">Real-time</h3>
                            <p class="text-sm text-blue-100">Update otomatis</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Section - Login Form -->
        <div class="lg:w-1/2 bg-gray-50 flex items-center justify-center p-8 lg:p-12">
            <div class="w-full max-w-md">
                <!-- Login Card -->
                <div class="bg-white rounded-2xl shadow-xl p-8 lg:p-10 animate-slide-in">
                    <!-- Header -->
                    <div class="text-center mb-8">
                        <h2 class="text-3xl font-bold text-gray-900 mb-2">Selamat Datang</h2>
                        <p class="text-gray-600">Masuk ke akun Perpustakaan Anda</p>
                    </div>

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Login Form -->
                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf

                        <!-- Email Address -->
                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                    </svg>
                                </div>
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                                    class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150"
                                    placeholder="nama@sekolah.com">
                            </div>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div>
                            <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
                            <div class="relative" x-data="{ show: false }">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                </div>
                                <input id="password" :type="show ? 'text' : 'password'" name="password" required autocomplete="current-password"
                                    class="block w-full pl-10 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150"
                                    placeholder="••••••••">
                                <button type="button" @click="show = !show" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                    <svg x-show="!show" class="h-5 w-5 text-gray-400 hover:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    <svg x-show="show" class="h-5 w-5 text-gray-400 hover:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                    </svg>
                                </button>
                            </div>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Remember Me & Forgot Password -->
                        <div class="flex items-center justify-between">
                            <label for="remember_me" class="flex items-center">
                                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500" name="remember">
                                <span class="ml-2 text-sm text-gray-600">Ingat saya</span>
                            </label>

                            @if (Route::has('password.request'))
                            <a class="text-sm text-blue-600 hover:text-blue-800 font-medium" href="{{ route('password.request') }}">
                                Lupa password?
                            </a>
                            @endif
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-teal-600 text-white font-semibold py-3 px-4 rounded-lg hover:from-blue-700 hover:to-teal-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transform transition hover:scale-[1.02] active:scale-[0.98]">
                            Masuk ke Dashboard
                        </button>
                    </form>

                    <!-- Footer -->
                    <div class="mt-8 text-center">
                        <p class="text-xs text-gray-500">
                            © 2026 Perpustakaan SDN Pagotan 02. All rights reserved.
                        </p>
                    </div>
                </div>

                <!-- Additional Info -->
                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600">
                        Butuh bantuan?
                        <a href="mailto:yogaadipratama22@gmail.com" class="text-blue-600 hover:text-blue-800 font-medium">Hubungi Admin</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes fade-in {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slide-in {
            from {
                opacity: 0;
                transform: translateX(20px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .animate-fade-in {
            animation: fade-in 0.6s ease-out;
        }

        .animate-fade-in-delay-1 {
            animation: fade-in 0.6s ease-out 0.2s both;
        }

        .animate-fade-in-delay-2 {
            animation: fade-in 0.6s ease-out 0.4s both;
        }

        .animate-slide-in {
            animation: slide-in 0.6s ease-out;
        }
    </style>
</body>

</html>