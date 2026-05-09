@extends('owner.layouts.app')

@section('title', 'Detail Order #INV-001 - LaundroMetrics')
@section('header_title', 'Detail Order')

@section('content')
<div class="max-w-5xl mx-auto space-y-6 animate-fade-in">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white dark:bg-inverse-surface rounded-2xl p-5 shadow-sm border border-slate-100 dark:border-slate-800">
        <div class="flex items-center gap-4">
            <a href="/owner/orders" class="w-10 h-10 rounded-full border border-slate-200 dark:border-slate-700 flex items-center justify-center text-slate-500 hover:bg-slate-50 hover:text-primary transition-colors">
                <span class="material-symbols-outlined">arrow_back</span>
            </a>
            <div>
                <h1 class="text-2xl font-bold text-slate-900 dark:text-white flex items-center gap-3">
                    INV-001
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full border border-orange-200 dark:border-orange-800 bg-orange-50 dark:bg-orange-900/20 text-orange-600 dark:text-orange-400 font-semibold text-sm">
                        <div class="w-1.5 h-1.5 rounded-full bg-orange-500 animate-pulse"></div>
                        Sedang Dicuci
                    </span>
                </h1>
                <p class="text-sm text-slate-500 mt-1">Dibuat pada 24 Okt 2024, 08:30 WIB</p>
            </div>
        </div>
        <div class="flex items-center gap-3">
            <button class="bg-white border border-slate-200 text-slate-700 px-4 py-2 rounded-xl font-semibold hover:bg-slate-50 transition-colors flex items-center gap-2">
                <span class="material-symbols-outlined text-[20px]">print</span> Print Nota
            </button>
            <button class="bg-primary text-white px-4 py-2 rounded-xl font-semibold shadow-lg shadow-primary/30 hover:bg-secondary transition-colors flex items-center gap-2">
                <span class="material-symbols-outlined text-[20px]">sync</span> Update Status
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 space-y-6">
            
            <div class="bg-white dark:bg-inverse-surface rounded-2xl p-6 shadow-sm border border-slate-100 dark:border-slate-800">
                <h2 class="text-lg font-bold text-slate-900 dark:text-white mb-6 flex items-center gap-2">
                    <span class="material-symbols-outlined text-primary">timeline</span> Status Laundry
                </h2>
                
                <div class="relative">
                    <div class="absolute left-[1.1rem] top-2 bottom-6 w-0.5 bg-slate-200 dark:bg-slate-700 z-0"></div>
                    <div class="absolute left-[1.1rem] top-2 h-1/2 w-0.5 bg-primary z-0"></div>

                    <div class="relative z-10 flex gap-4 mb-8 opacity-100">
                        <div class="w-9 h-9 rounded-full bg-primary text-white flex items-center justify-center shrink-0 border-4 border-white dark:border-inverse-surface shadow-sm">
                            <span class="material-symbols-outlined text-[16px]">check</span>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-900 dark:text-white">Order Masuk</h4>
                            <p class="text-sm text-slate-500">24 Okt 2024, 08:30 WIB</p>
                            <p class="text-sm text-slate-600 mt-1">Pakaian telah diterima oleh admin.</p>
                        </div>
                    </div>

                    <div class="relative z-10 flex gap-4 mb-8 opacity-100">
                        <div class="w-9 h-9 rounded-full bg-white dark:bg-inverse-surface border-4 border-primary text-primary flex items-center justify-center shrink-0 shadow-sm relative">
                            <span class="absolute inline-flex h-full w-full rounded-full bg-primary opacity-20 animate-ping"></span>
                            <span class="material-symbols-outlined text-[16px]">local_laundry_service</span>
                        </div>
                        <div>
                            <h4 class="font-bold text-primary">Sedang Dicuci</h4>
                            <p class="text-sm text-slate-500">24 Okt 2024, 10:15 WIB</p>
                            <p class="text-sm text-slate-600 mt-1">Pakaian sedang dalam proses pencucian dengan deterjen premium.</p>
                        </div>
                    </div>

                    <div class="relative z-10 flex gap-4 mb-8 opacity-40">
                        <div class="w-9 h-9 rounded-full bg-slate-100 dark:bg-surface-dim/50 border-4 border-white dark:border-inverse-surface text-slate-400 flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-[16px]">iron</span>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-700 dark:text-slate-300">Sedang Disetrika</h4>
                            <p class="text-sm text-slate-500">Menunggu</p>
                        </div>
                    </div>

                    <div class="relative z-10 flex gap-4 opacity-40">
                        <div class="w-9 h-9 rounded-full bg-slate-100 dark:bg-surface-dim/50 border-4 border-white dark:border-inverse-surface text-slate-400 flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-[16px]">task_alt</span>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-700 dark:text-slate-300">Selesai</h4>
                            <p class="text-sm text-slate-500">Menunggu</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-inverse-surface rounded-2xl p-6 shadow-sm border border-slate-100 dark:border-slate-800">
                <h2 class="text-lg font-bold text-slate-900 dark:text-white mb-6 flex items-center gap-2">
                    <span class="material-symbols-outlined text-primary">info</span> Informasi Layanan
                </h2>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-6 gap-x-8">
                    <div>
                        <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1">Jenis Layanan</p>
                        <p class="font-bold text-slate-900 flex items-center gap-2">
                            <span class="material-symbols-outlined text-blue-500 text-lg">local_laundry_service</span>
                            Cuci Setrika Reguler
                        </p>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1">Berat Timbangan</p>
                        <p class="font-bold text-slate-900 text-lg">3.0 <span class="text-sm font-medium text-slate-500">kg</span></p>
                    </div>
                    <div class="sm:col-span-2">
                        <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1">Catatan Tambahan</p>
                        <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-4 mt-1">
                            <p class="text-sm text-yellow-800">Tolong pisahkan baju putih, kemeja jangan dilipat (di-hanger saja).</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="space-y-6">
            
            <div class="bg-gradient-to-br from-primary to-blue-700 rounded-2xl p-6 shadow-lg shadow-primary/20 text-white relative overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full blur-2xl -translate-y-1/2 translate-x-1/3"></div>
                <h2 class="text-lg font-bold mb-6 flex items-center gap-2 relative z-10">
                    <span class="material-symbols-outlined">person</span> Customer Info
                </h2>
                <div class="space-y-4 relative z-10">
                    <div>
                        <p class="text-blue-200 text-xs font-semibold uppercase tracking-wider mb-0.5">Nama Lengkap</p>
                        <p class="font-bold text-lg">Arif Kurniawan</p>
                    </div>
                    <div>
                        <p class="text-blue-200 text-xs font-semibold uppercase tracking-wider mb-0.5">Nomor WhatsApp</p>
                        <p class="font-semibold flex items-center gap-2">
                            0812-3456-7890
                            <a href="#" class="w-6 h-6 rounded bg-white/20 flex items-center justify-center hover:bg-white/30 transition-colors tooltip" title="Hubungi via WA">
                                <span class="material-symbols-outlined text-[14px]">forum</span>
                            </a>
                        </p>
                    </div>
                    <div>
                        <p class="text-blue-200 text-xs font-semibold uppercase tracking-wider mb-0.5">Alamat Pengiriman</p>
                        <p class="text-sm text-blue-50 leading-relaxed">
                            Jl. Mawar Bodas No. 42, RT 01/RW 03, Kel. Suka Maju, Kec. Ceria, Kota Bandung.
                        </p>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-inverse-surface rounded-2xl p-6 shadow-sm border border-slate-100 dark:border-slate-800">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-lg font-bold text-slate-900 dark:text-white flex items-center gap-2">
                        <span class="material-symbols-outlined text-primary">payments</span> Pembayaran
                    </h2>
                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-green-100 text-green-700 font-bold text-xs uppercase tracking-wide">
                        <span class="material-symbols-outlined text-[14px]">check_circle</span> Paid
                    </span>
                </div>
                
                <div class="space-y-3 text-sm text-slate-600 dark:text-slate-400">
                    <div class="flex justify-between">
                        <span>Cuci Setrika (3kg x 9.000)</span>
                        <span class="font-semibold text-slate-900 dark:text-white">Rp 27.000</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Biaya Antar Jemput</span>
                        <span class="font-semibold text-slate-900 dark:text-white">Gratis</span>
                    </div>
                    <div class="pt-3 border-t border-slate-200 dark:border-slate-700 flex justify-between items-center">
                        <span class="font-bold text-slate-900 dark:text-white">Total Bayar</span>
                        <span class="text-2xl font-extrabold text-primary">Rp 27.000</span>
                    </div>
                </div>

                <div class="mt-6 pt-6 border-t border-slate-100 dark:border-slate-800">
                    <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Metode Pembayaran</p>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center">
                            <span class="material-symbols-outlined">qr_code_2</span>
                        </div>
                        <div>
                            <p class="font-bold text-slate-900">QRIS (Bank BCA)</p>
                            <p class="text-xs text-slate-500">Dibayar pada 24 Okt, 08:35 WIB</p>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

<style>
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in {
        animation: fadeIn 0.4s ease-out forwards;
    }
    .tooltip {
        position: relative;
    }
    .tooltip:hover::after {
        content: attr(title);
        position: absolute;
        bottom: 100%;
        left: 50%;
        transform: translateX(-50%);
        background-color: #1e293b;
        color: white;
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 10px;
        white-space: nowrap;
        margin-bottom: 5px;
        z-index: 10;
    }
</style>
@endsection
