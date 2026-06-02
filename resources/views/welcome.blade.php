<!DOCTYPE html>
<html class="light" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        primary: "#0ea5e9", // Modern blue
                        secondary: "#0284c7",
                        surface: "#ffffff",
                        background: "#f8fafc",
                        "on-surface-variant": "#64748b",
                        "on-background": "#0f172a",
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    animation: {
                        blob: "blob 7s infinite",
                    },
                    keyframes: {
                        blob: {
                            "0%": {
                                transform: "translate(0px, 0px) scale(1)",
                            },
                            "33%": {
                                transform: "translate(30px, -50px) scale(1.1)",
                            },
                            "66%": {
                                transform: "translate(-20px, 20px) scale(0.9)",
                            },
                            "100%": {
                                transform: "translate(0px, 0px) scale(1)",
                            },
                        },
                    },
                }
            }
        }
    </script>
    <style>
        html {
            scroll-behavior: smooth;
        }
        .material-symbols-outlined {
            font-variation-settings: "FILL" 0, "wght" 400, "GRAD" 0, "opsz" 24;
        }
        .glass-nav {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
        }
        .hero-gradient {
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
        }
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        .animation-delay-2000 {
            animation-delay: 2s;
        }
        .animation-delay-4000 {
            animation-delay: 4s;
        }
    </style>
</head>
<body class="bg-background text-on-background font-sans antialiased selection:bg-primary selection:text-white">

    <header class="glass-nav fixed w-full top-0 z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-6 h-20 flex justify-between items-center">
            <a class="text-2xl font-bold text-primary tracking-tight flex items-center gap-2" href="#">
                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">local_laundry_service</span>
                LaundryKu
            </a>
            <nav class="hidden md:flex gap-8 items-center">
                <a class="text-sm font-medium text-on-surface-variant hover:text-primary transition-colors" href="#services">Services</a>
                <a class="text-sm font-medium text-on-surface-variant hover:text-primary transition-colors" href="#pricing">Pricing</a>
                <a class="text-sm font-medium text-on-surface-variant hover:text-primary transition-colors" href="#testimonials">Testimonials</a>
                <a class="text-sm font-medium text-on-surface-variant hover:text-primary transition-colors" href="#faq">FAQ</a>
            </nav>
            <a href="/login" class="bg-primary hover:bg-secondary text-white px-6 py-2.5 rounded-full text-sm font-semibold shadow-lg shadow-primary/30 transition-all active:scale-95">
                Login / Register
            </a>
        </div>
    </header>

    <main>
        <section class="hero-gradient min-h-screen flex items-center justify-center pt-20 relative overflow-hidden">
            <div class="absolute top-1/4 left-10 w-72 h-72 bg-blue-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
            <div class="absolute top-1/3 right-10 w-72 h-72 bg-cyan-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
            <div class="absolute -bottom-8 left-1/2 w-72 h-72 bg-sky-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-4000"></div>

            <div class="max-w-4xl mx-auto px-6 text-center relative z-10 mt-10">
                <span class="inline-block py-1 px-3 rounded-full bg-blue-100 text-primary text-sm font-semibold mb-6 tracking-wide border border-blue-200">
                    ✨ Premium Laundry Service
                </span>
                <h1 class="text-5xl md:text-7xl font-extrabold text-slate-900 tracking-tight mb-8 leading-tight">
                    Laundry Cepat, Bersih, <br/> <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-cyan-500">Antar Jemput.</span>
                </h1>
                <p class="text-lg md:text-xl text-slate-600 mb-10 max-w-2xl mx-auto leading-relaxed">
                    Nikmati kemudahan layanan laundry profesional dengan standar hotel berbahan premium. Pakaian Anda akan selalu bersih, wangi, dan rapi tanpa perlu keluar rumah.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                    <a href="#pricing" class="w-full sm:w-auto bg-primary text-white px-8 py-4 rounded-full font-semibold shadow-xl shadow-primary/30 hover:bg-secondary hover:-translate-y-1 transition-all duration-300">
                        Pesan Sekarang
                    </a>
                    <a href="#services" class="w-full sm:w-auto bg-white text-slate-700 border border-slate-200 px-8 py-4 rounded-full font-semibold hover:bg-slate-50 hover:-translate-y-1 transition-all duration-300">
                        Lihat Layanan
                    </a>
                </div>
            </div>
        </section>

        <section class="py-24 bg-white relative">
            <div class="max-w-7xl mx-auto px-6">
                <div class="grid md:grid-cols-2 gap-16 items-center">
                    <div class="order-2 md:order-1 relative">
                        <div class="absolute inset-0 bg-gradient-to-tr from-blue-50 to-transparent rounded-3xl -z-10 transform -rotate-3 scale-105"></div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div class="bg-white p-8 rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 card-hover">
                                <div class="w-14 h-14 bg-blue-50 rounded-xl flex items-center justify-center mb-6 text-primary">
                                    <span class="material-symbols-outlined text-3xl">clean_hands</span>
                                </div>
                                <h3 class="text-xl font-bold text-slate-900 mb-3">Higiene Total</h3>
                                <p class="text-slate-600 leading-relaxed">Setiap pelanggan diproses secara terpisah untuk menjaga kebersihan maksimal.</p>
                            </div>
                            <div class="bg-white p-8 rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 card-hover sm:mt-12">
                                <div class="w-14 h-14 bg-green-50 rounded-xl flex items-center justify-center mb-6 text-green-500">
                                    <span class="material-symbols-outlined text-3xl">eco</span>
                                </div>
                                <h3 class="text-xl font-bold text-slate-900 mb-3">Eco Friendly</h3>
                                <p class="text-slate-600 leading-relaxed">Menggunakan deterjen ramah lingkungan yang lembut di serat kain.</p>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-8 order-1 md:order-2">
                        <h2 class="text-4xl md:text-5xl font-bold text-slate-900 leading-tight">Kualitas Profesional untuk Pakaian Kesayangan Anda</h2>
                        <p class="text-lg text-slate-600 leading-relaxed">LaundryKu hadir dengan komitmen memberikan perawatan terbaik untuk setiap helai kain Anda. Dengan teknologi pencucian modern dan tenaga ahli yang berpengalaman, kami memastikan hasil yang tidak hanya bersih, tetapi juga menjaga keawetan pakaian.</p>
                        <ul class="space-y-4">
                            <li class="flex items-center gap-4 text-slate-700 bg-slate-50 p-4 rounded-xl border border-slate-100">
                                <span class="material-symbols-outlined text-primary bg-white rounded-full">check_circle</span>
                                <span class="font-medium">Sistem Antre Terorganisir</span>
                            </li>
                            <li class="flex items-center gap-4 text-slate-700 bg-slate-50 p-4 rounded-xl border border-slate-100">
                                <span class="material-symbols-outlined text-primary bg-white rounded-full">check_circle</span>
                                <span class="font-medium">Quality Control Bertingkat</span>
                            </li>
                            <li class="flex items-center gap-4 text-slate-700 bg-slate-50 p-4 rounded-xl border border-slate-100">
                                <span class="material-symbols-outlined text-primary bg-white rounded-full">check_circle</span>
                                <span class="font-medium">Layanan Antar Jemput Gratis*</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-24 bg-slate-50" id="services">
            <div class="max-w-7xl mx-auto px-6">
                <div class="text-center mb-16 max-w-2xl mx-auto">
                    <h2 class="text-3xl font-bold text-slate-900 mb-4">Layanan Kami</h2>
                    <p class="text-lg text-slate-600">Pilihan perawatan lengkap untuk segala jenis kebutuhan laundry Anda dengan hasil yang memuaskan.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <div class="bg-white rounded-3xl p-8 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 card-hover group cursor-pointer relative overflow-hidden">
                        <div class="absolute top-0 right-0 p-8 opacity-5 group-hover:opacity-10 transition-opacity">
                            <span class="material-symbols-outlined text-9xl">layers</span>
                        </div>
                        <div class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center mb-8 text-primary group-hover:scale-110 transition-transform">
                            <span class="material-symbols-outlined text-4xl">layers</span>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">Cuci Kiloan</h3>
                        <p class="text-slate-600 mb-6">Solusi praktis laundry harian keluarga Anda dengan harga terjangkau.</p>
                        <a href="#" class="inline-flex items-center text-primary font-semibold group-hover:gap-2 transition-all">
                            Selengkapnya <span class="material-symbols-outlined text-sm ml-1">arrow_forward</span>
                        </a>
                    </div>
                    <div class="bg-white rounded-3xl p-8 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 card-hover group cursor-pointer relative overflow-hidden">
                        <div class="absolute top-0 right-0 p-8 opacity-5 group-hover:opacity-10 transition-opacity">
                            <span class="material-symbols-outlined text-9xl">dry_cleaning</span>
                        </div>
                        <div class="w-16 h-16 bg-indigo-50 rounded-2xl flex items-center justify-center mb-8 text-indigo-500 group-hover:scale-110 transition-transform">
                            <span class="material-symbols-outlined text-4xl">dry_cleaning</span>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">Dry Cleaning</h3>
                        <p class="text-slate-600 mb-6">Perawatan khusus untuk jas, gaun, dan kain halus berbahan sensitif.</p>
                        <a href="#" class="inline-flex items-center text-indigo-500 font-semibold group-hover:gap-2 transition-all">
                            Selengkapnya <span class="material-symbols-outlined text-sm ml-1">arrow_forward</span>
                        </a>
                    </div>
                    <div class="bg-white rounded-3xl p-8 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 card-hover group cursor-pointer relative overflow-hidden">
                        <div class="absolute top-0 right-0 p-8 opacity-5 group-hover:opacity-10 transition-opacity">
                            <span class="material-symbols-outlined text-9xl">iron</span>
                        </div>
                        <div class="w-16 h-16 bg-orange-50 rounded-2xl flex items-center justify-center mb-8 text-orange-500 group-hover:scale-110 transition-transform">
                            <span class="material-symbols-outlined text-4xl">iron</span>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">Setrika</h3>
                        <p class="text-slate-600 mb-6">Layanan setrika uap presisi agar pakaian rapi sempurna dan siap pakai.</p>
                        <a href="#" class="inline-flex items-center text-orange-500 font-semibold group-hover:gap-2 transition-all">
                            Selengkapnya <span class="material-symbols-outlined text-sm ml-1">arrow_forward</span>
                        </a>
                    </div>
                    <div class="bg-white rounded-3xl p-8 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 card-hover group cursor-pointer relative overflow-hidden">
                        <div class="absolute top-0 right-0 p-8 opacity-5 group-hover:opacity-10 transition-opacity">
                            <span class="material-symbols-outlined text-9xl">bolt</span>
                        </div>
                        <div class="w-16 h-16 bg-red-50 rounded-2xl flex items-center justify-center mb-8 text-red-500 group-hover:scale-110 transition-transform">
                            <span class="material-symbols-outlined text-4xl">bolt</span>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">Express</h3>
                        <p class="text-slate-600 mb-6">Butuh cepat? Layanan kilat selesai dalam hitungan jam (6-12 jam).</p>
                        <a href="#" class="inline-flex items-center text-red-500 font-semibold group-hover:gap-2 transition-all">
                            Selengkapnya <span class="material-symbols-outlined text-sm ml-1">arrow_forward</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-24 bg-white" id="pricing">
            <div class="max-w-7xl mx-auto px-6">
                <div class="text-center mb-16 max-w-2xl mx-auto">
                    <h2 class="text-3xl font-bold text-slate-900 mb-4">Daftar Harga & Estimasi</h2>
                    <p class="text-lg text-slate-600">Transparansi harga untuk kenyamanan perencanaan keuangan Anda.</p>
                </div>
                <div class="grid md:grid-cols-3 gap-8 max-w-5xl mx-auto">
                    <div class="bg-white p-8 rounded-3xl border border-slate-200 flex flex-col hover:border-slate-300 transition-colors">
                        <div class="mb-8">
                            <h3 class="text-xl font-semibold text-slate-900 mb-2">Standard</h3>
                            <div class="flex items-baseline gap-1">
                                <span class="text-slate-500">Mulai</span>
                                <span class="text-3xl font-bold text-slate-900">Rp 8.000</span>
                                <span class="text-slate-500">/kg</span>
                            </div>
                        </div>
                        <ul class="space-y-4 mb-8 flex-grow">
                            <li class="flex items-center gap-3 text-slate-700">
                                <span class="material-symbols-outlined text-green-500">check_circle</span>
                                <span>Estimasi: 2-3 Hari</span>
                            </li>
                            <li class="flex items-center gap-3 text-slate-700">
                                <span class="material-symbols-outlined text-green-500">check_circle</span>
                                <span>Cuci & Setrika Reguler</span>
                            </li>
                            <li class="flex items-center gap-3 text-slate-400">
                                <span class="material-symbols-outlined">cancel</span>
                                <span>Antar Jemput Berbayar</span>
                            </li>
                        </ul>
                        <button class="w-full py-4 bg-slate-50 text-slate-900 rounded-xl font-semibold hover:bg-slate-100 transition-colors">Pilih Paket</button>
                    </div>
                    <div class="bg-slate-900 p-8 rounded-3xl border border-slate-800 flex flex-col relative transform md:-translate-y-4 shadow-2xl">
                        <div class="absolute top-0 left-1/2 -translate-x-1/2 -translate-y-1/2 bg-gradient-to-r from-primary to-cyan-500 text-white px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider shadow-lg">Recommended</div>
                        <div class="mb-8">
                            <h3 class="text-xl font-semibold text-white mb-2">Premium Bundle</h3>
                            <div class="flex items-baseline gap-1">
                                <span class="text-slate-400">Mulai</span>
                                <span class="text-4xl font-bold text-white">Rp 12.000</span>
                                <span class="text-slate-400">/kg</span>
                            </div>
                        </div>
                        <ul class="space-y-4 mb-8 flex-grow">
                            <li class="flex items-center gap-3 text-slate-300">
                                <span class="material-symbols-outlined text-cyan-400">check_circle</span>
                                <span>Estimasi: 24 Jam</span>
                            </li>
                            <li class="flex items-center gap-3 text-slate-300">
                                <span class="material-symbols-outlined text-cyan-400">check_circle</span>
                                <span>Parfum Grade-A</span>
                            </li>
                            <li class="flex items-center gap-3 text-slate-300">
                                <span class="material-symbols-outlined text-cyan-400">check_circle</span>
                                <span class="text-white font-medium">Gratis Antar Jemput</span>
                            </li>
                        </ul>
                        <button class="w-full py-4 bg-gradient-to-r from-primary to-cyan-500 text-white rounded-xl font-semibold hover:opacity-90 transition-opacity shadow-lg shadow-primary/20">Pesan Sekarang</button>
                    </div>
                    <div class="bg-white p-8 rounded-3xl border border-slate-200 flex flex-col hover:border-slate-300 transition-colors">
                        <div class="mb-8">
                            <h3 class="text-xl font-semibold text-slate-900 mb-2">Super Express</h3>
                            <div class="flex items-baseline gap-1">
                                <span class="text-slate-500">Mulai</span>
                                <span class="text-3xl font-bold text-slate-900">Rp 20.000</span>
                                <span class="text-slate-500">/kg</span>
                            </div>
                        </div>
                        <ul class="space-y-4 mb-8 flex-grow">
                            <li class="flex items-center gap-3 text-slate-700">
                                <span class="material-symbols-outlined text-green-500">check_circle</span>
                                <span>Estimasi: 6-12 Jam</span>
                            </li>
                            <li class="flex items-center gap-3 text-slate-700">
                                <span class="material-symbols-outlined text-green-500">check_circle</span>
                                <span>Prioritas Utama</span>
                            </li>
                            <li class="flex items-center gap-3 text-slate-700">
                                <span class="material-symbols-outlined text-green-500">check_circle</span>
                                <span>Antar Jemput Instan</span>
                            </li>
                        </ul>
                        <button class="w-full py-4 bg-slate-50 text-slate-900 rounded-xl font-semibold hover:bg-slate-100 transition-colors">Pilih Paket</button>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-24 bg-slate-50" id="testimonials">
            <div class="max-w-7xl mx-auto px-6">
                <div class="text-center mb-16 max-w-2xl mx-auto">
                    <h2 class="text-3xl font-bold text-slate-900 mb-4">Kata Mereka</h2>
                    <p class="text-lg text-slate-600">Ribuan pelanggan telah mempercayakan pakaian mereka kepada kami.</p>
                </div>
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="bg-white p-8 rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 relative">
                        <span class="material-symbols-outlined text-blue-100 text-6xl absolute top-6 right-6">format_quote</span>
                        <p class="text-slate-600 italic mb-8 relative z-10">"Layanan laundry terbaik yang pernah saya coba. Wanginya awet dan pakaian beneran rapi seperti baru beli. Sangat membantu untuk yang sibuk."</p>
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center text-primary font-bold text-lg">S</div>
                            <div>
                                <h4 class="font-bold text-slate-900">Sarah J.</h4>
                                <p class="text-sm text-slate-500">Ibu Rumah Tangga</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white p-8 rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 relative">
                        <span class="material-symbols-outlined text-blue-100 text-6xl absolute top-6 right-6">format_quote</span>
                        <p class="text-slate-600 italic mb-8 relative z-10">"Fitur antar jemputnya sangat on-time. Tidak perlu pusing lagi mikirin jemuran kalau lagi banyak deadline kantor. Recommended banget!"</p>
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-full bg-cyan-100 flex items-center justify-center text-cyan-600 font-bold text-lg">B</div>
                            <div>
                                <h4 class="font-bold text-slate-900">Budi Santoso</h4>
                                <p class="text-sm text-slate-500">Graphic Designer</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white p-8 rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 relative">
                        <span class="material-symbols-outlined text-blue-100 text-6xl absolute top-6 right-6">format_quote</span>
                        <p class="text-slate-600 italic mb-8 relative z-10">"Jas kantor saya diproses dengan sangat hati-hati melalui dry cleaning. Hasilnya bersih tanpa merusak bahan. Sangat profesional!"</p>
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 font-bold text-lg">A</div>
                            <div>
                                <h4 class="font-bold text-slate-900">Anita R.</h4>
                                <p class="text-sm text-slate-500">Manager Operasional</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-24 bg-white" id="faq">
            <div class="max-w-3xl mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-bold text-slate-900 mb-4">Pertanyaan Umum</h2>
                    <p class="text-lg text-slate-600">Temukan jawaban untuk pertanyaan yang sering diajukan.</p>
                </div>
                <div class="space-y-4">
                    <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm">
                        <button class="w-full flex justify-between items-center p-6 text-left hover:bg-slate-50 transition-colors">
                            <span class="font-semibold text-slate-900 text-lg">Berapa lama waktu pengerjaan normal?</span>
                            <span class="material-symbols-outlined text-slate-400">expand_more</span>
                        </button>
                        <div class="px-6 pb-6 text-slate-600">
                            Waktu pengerjaan reguler adalah 2-3 hari kerja. Namun kami juga menyediakan layanan Express (24 jam) dan Super Express (6-12 jam) bagi Anda yang membutuhkan pakaian segera.
                        </div>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm">
                        <button class="w-full flex justify-between items-center p-6 text-left hover:bg-slate-50 transition-colors">
                            <span class="font-semibold text-slate-900 text-lg">Apakah ada biaya tambahan untuk antar jemput?</span>
                            <span class="material-symbols-outlined text-slate-400">expand_more</span>
                        </button>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm">
                        <button class="w-full flex justify-between items-center p-6 text-left hover:bg-slate-50 transition-colors">
                            <span class="font-semibold text-slate-900 text-lg">Bagaimana jika pakaian saya rusak atau hilang?</span>
                            <span class="material-symbols-outlined text-slate-400">expand_more</span>
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-24 bg-slate-900 text-white">
            <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-16 items-center">
                <div class="space-y-8">
                    <h2 class="text-4xl font-bold">Kunjungi Workshop Kami</h2>
                    <p class="text-slate-400 text-lg">Kami selalu terbuka untuk pertanyaan dan kunjungan langsung. Hubungi kami melalui kanal berikut:</p>
                    <div class="space-y-6 mt-8">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-white/10 rounded-xl flex items-center justify-center shrink-0">
                                <span class="material-symbols-outlined text-cyan-400">location_on</span>
                            </div>
                            <div>
                                <h4 class="font-semibold text-lg">Alamat</h4>
                                <p class="text-slate-400">Jl. Kebersihan No. 42, Jakarta Selatan, 12345</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-white/10 rounded-xl flex items-center justify-center shrink-0">
                                <span class="material-symbols-outlined text-cyan-400">phone_iphone</span>
                            </div>
                            <div>
                                <h4 class="font-semibold text-lg">WhatsApp</h4>
                                <p class="text-slate-400">+62 812 3456 7890</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-white/10 rounded-xl flex items-center justify-center shrink-0">
                                <span class="material-symbols-outlined text-cyan-400">mail</span>
                            </div>
                            <div>
                                <h4 class="font-semibold text-lg">Email</h4>
                                <p class="text-slate-400">halo@linenandlather.id</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="rounded-3xl overflow-hidden h-[400px] border border-white/10 bg-slate-800 flex items-center justify-center relative">
                    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-slate-700 via-slate-800 to-slate-900"></div>
                    <div class="absolute inset-0 opacity-20 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyMCIgaGVpZ2h0PSIyMCI+PHBhdGggZD0iTTEgMWgxOHYxOEgxeiIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjZmZmIiBzdHJva2Utb3BhY2l0eT0iLjIiLz48L3N2Zz4=')]"></div>
                    
                    <div class="absolute bg-white/10 backdrop-blur-md p-6 rounded-2xl border border-white/20 flex flex-col items-center gap-3">
                        <span class="material-symbols-outlined text-cyan-400 text-4xl">push_pin</span>
                        <span class="font-semibold text-white">LaundryKu Workshop</span>
                        <a href="#" class="mt-2 text-sm text-cyan-400 hover:text-cyan-300 transition-colors">Buka di Maps &rarr;</a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="bg-slate-950 text-slate-400 py-12 border-t border-white/10">
        <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="flex flex-col items-center md:items-start gap-2">
                <span class="text-xl font-bold text-white flex items-center gap-2">
                    <span class="material-symbols-outlined text-cyan-400">local_laundry_service</span>
                    LaundryKu
                </span>
                <p class="text-sm">© 2024 & Lather. Laundry cepat, bersih, antar jemput.</p>
            </div>
            <div class="flex flex-wrap justify-center gap-8">
                <a class="hover:text-white transition-colors" href="#">Privacy Policy</a>
                <a class="hover:text-white transition-colors" href="#">Terms of Service</a>
                <a class="hover:text-white transition-colors" href="#">Location</a>
                <a class="hover:text-white transition-colors" href="#">Contact Support</a>
            </div>
        </div>
    </footer>

    <script>
        // Optional: Add simple scroll spy or navbar background change on scroll
        window.addEventListener('scroll', () => {
            const header = document.querySelector('header');
            if (window.scrollY > 20) {
                header.classList.add('shadow-sm');
            } else {
                header.classList.remove('shadow-sm');
            }
        });
    </script>
</body>
</html>