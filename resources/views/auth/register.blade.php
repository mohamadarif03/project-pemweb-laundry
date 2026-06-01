<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Premium Laundry</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        outfit: ['Outfit', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            200: '#bae6fd',
                            300: '#7dd3fc',
                            400: '#38bdf8',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            800: '#075985',
                            900: '#0c4a6e',
                        },
                        secondary: {
                            100: '#e0f2fe',
                            500: '#0ea5e9',
                            600: '#0284c7',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Outfit', sans-serif; }
    </style>
</head>
<body class="bg-gradient-to-br from-brand-50 via-white to-secondary-100 min-h-screen flex items-center justify-center p-4 font-outfit">

    <div class="w-full max-w-5xl bg-white rounded-3xl shadow-xl overflow-hidden grid grid-cols-1 lg:grid-cols-2 min-h-[600px]">

        <div class="relative hidden lg:flex flex-col justify-end overflow-hidden rounded-2xl m-3">
            <img src="https://images.unsplash.com/photo-1545173168-9f1947eebb7f?q=80&w=1200&auto=format&fit=crop" alt="Laundry Background" class="absolute inset-0 w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-brand-900/95 via-brand-800/70 to-brand-700/40 rounded-2xl"></div>

            <div class="relative z-10 p-8 pb-10">
                <span class="inline-flex items-center gap-2 bg-white/15 backdrop-blur-sm text-white text-xs font-medium px-4 py-1.5 rounded-full mb-6 border border-white/20">
                    <span class="w-2 h-2 bg-secondary-100 rounded-full animate-pulse"></span>
                    #1 Laundry Terpercaya
                </span>
                <h2 class="text-3xl font-bold text-white leading-tight mb-1">Gabung Sekarang,</h2>
                <h2 class="text-3xl font-bold text-secondary-100 leading-tight mb-4">Cuci Tanpa Ribet.</h2>
                <p class="text-sm text-white/70 leading-relaxed max-w-xs">Daftarkan dirimu dan nikmati kemudahan order laundry kapan saja. Cucian bersih, hidup lebih tenang.</p>
            </div>
        </div>

        <div class="flex flex-col justify-center px-8 sm:px-12 lg:px-14 py-12">
            <div class="w-full max-w-sm mx-auto">
                <h1 class="text-3xl font-bold text-gray-800 mb-8">Buat Akun Baru</h1>

                <form action="{{ route('register') }}" method="POST" class="space-y-5">
                    @csrf

                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-700 mb-1.5">Nama Lengkap</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-secondary-500/40 focus:border-secondary-500 transition-all duration-200"
                            placeholder="Masukkan nama lengkap">
                        @error('name')
                            <p class="mt-1.5 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-1.5">Email Address</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-secondary-500/40 focus:border-secondary-500 transition-all duration-200"
                            placeholder="anda@email.com">
                        @error('email')
                            <p class="mt-1.5 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-semibold text-gray-700 mb-1.5">Password</label>
                        <div class="relative">
                            <input type="password" id="password" name="password" required
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-secondary-500/40 focus:border-secondary-500 transition-all duration-200"
                                placeholder="Minimal 8 karakter">
                            <button type="button" onclick="togglePassword('password', 'eyeIcon1')" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors">
                                <svg id="eyeIcon1" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>
                        @error('password')
                            <p class="mt-1.5 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-1.5">Konfirmasi Password</label>
                        <div class="relative">
                            <input type="password" id="password_confirmation" name="password_confirmation" required
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-secondary-500/40 focus:border-secondary-500 transition-all duration-200"
                                placeholder="Ulangi password">
                            <button type="button" onclick="togglePassword('password_confirmation', 'eyeIcon2')" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors">
                                <svg id="eyeIcon2" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full py-3 bg-gradient-to-r from-brand-600 to-brand-500 hover:from-brand-700 hover:to-brand-600 text-white rounded-xl font-semibold shadow-lg shadow-brand-500/25 hover:shadow-brand-600/30 transform hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200">
                        Daftar & Mulai Order
                    </button>
                </form>

                <div class="mt-6 bg-brand-50 border border-brand-100 rounded-xl p-4">
                    <p class="text-sm font-semibold text-brand-800 mb-1">✨ Keuntungan Member</p>
                    <p class="text-xs text-brand-700/70 leading-relaxed">Diskon 20% order pertama, tracking cucian real-time, dan promo eksklusif setiap bulannya!</p>
                </div>

                <p class="mt-6 text-center text-sm text-gray-500">
                    Sudah punya akun?
                    <a href="{{ route('login') }}" class="font-semibold text-secondary-500 hover:text-secondary-600 transition-colors">Masuk di sini</a>
                </p>
            </div>
        </div>

    </div>

    <script>
        function togglePassword(inputId, iconId) {
            const input = document.getElementById(inputId);
            const icon = document.getElementById(iconId);
            if (input.type === 'password') {
                input.type = 'text';
                icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L6.59 6.59m7.532 7.532l3.29 3.29M3 3l18 18" />';
            } else {
                input.type = 'password';
                icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />';
            }
        }
    </script>
</body>
</html>
