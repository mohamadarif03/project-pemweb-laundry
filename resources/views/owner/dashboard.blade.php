@extends('owner.layouts.app')

@section('title', 'LaundroMetrics - Owner Dashboard')
@section('header_title', 'Dashboard Overview')

@section('content')
<div class="max-w-container-max mx-auto space-y-8 animate-fade-in">
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 bg-gradient-to-r from-primary to-cyan-600 rounded-3xl p-8 text-white shadow-xl shadow-primary/20 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl -translate-y-1/2 translate-x-1/3"></div>
        <div class="relative z-10">
            <h1 class="text-3xl font-bold mb-2">Selamat Datang, Owner! 👋</h1>
            <p class="text-primary-fixed-dim">Berikut adalah ringkasan performa bisnis laundry Anda hari ini.</p>
        </div>
        <div class="relative z-10">
            <button class="bg-white text-primary px-6 py-2.5 rounded-full font-semibold shadow-lg hover:bg-surface-bright transition-colors flex items-center gap-2">
                <span class="material-symbols-outlined" data-icon="download">download</span>
                Download Laporan
            </button>
        </div>
    </div>

    <section>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white dark:bg-inverse-surface rounded-2xl p-6 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 border border-slate-100 dark:border-slate-800 group relative overflow-hidden">
                <div class="absolute -right-4 -top-4 w-24 h-24 bg-blue-50 dark:bg-blue-900/20 rounded-full group-hover:scale-150 transition-transform duration-500 ease-out z-0"></div>
                <div class="relative z-10">
                    <div class="flex justify-between items-center mb-4">
                        <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/40 text-blue-600 dark:text-blue-400 rounded-xl flex items-center justify-center">
                            <span class="material-symbols-outlined text-2xl" data-icon="receipt_long">receipt_long</span>
                        </div>
                        <span class="bg-green-100 text-green-700 text-xs font-bold px-2.5 py-1 rounded-full flex items-center gap-1">
                            <span class="material-symbols-outlined text-[14px]" data-icon="trending_up">trending_up</span> 12%
                        </span>
                    </div>
                    <p class="text-slate-500 dark:text-slate-400 font-medium text-sm mb-1">Total Order Hari Ini</p>
                    <h3 class="text-3xl font-bold text-slate-900 dark:text-white">42</h3>
                </div>
            </div>
            
            <div class="bg-white dark:bg-inverse-surface rounded-2xl p-6 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 border border-slate-100 dark:border-slate-800 group relative overflow-hidden">
                <div class="absolute -right-4 -top-4 w-24 h-24 bg-orange-50 dark:bg-orange-900/20 rounded-full group-hover:scale-150 transition-transform duration-500 ease-out z-0"></div>
                <div class="relative z-10">
                    <div class="flex justify-between items-center mb-4">
                        <div class="w-12 h-12 bg-orange-100 dark:bg-orange-900/40 text-orange-600 dark:text-orange-400 rounded-xl flex items-center justify-center">
                            <span class="material-symbols-outlined text-2xl" data-icon="local_laundry_service">local_laundry_service</span>
                        </div>
                    </div>
                    <p class="text-slate-500 dark:text-slate-400 font-medium text-sm mb-1">Laundry Diproses</p>
                    <h3 class="text-3xl font-bold text-slate-900 dark:text-white">18</h3>
                </div>
            </div>

            <div class="bg-white dark:bg-inverse-surface rounded-2xl p-6 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 border border-slate-100 dark:border-slate-800 group relative overflow-hidden">
                <div class="absolute -right-4 -top-4 w-24 h-24 bg-green-50 dark:bg-green-900/20 rounded-full group-hover:scale-150 transition-transform duration-500 ease-out z-0"></div>
                <div class="relative z-10">
                    <div class="flex justify-between items-center mb-4">
                        <div class="w-12 h-12 bg-green-100 dark:bg-green-900/40 text-green-600 dark:text-green-400 rounded-xl flex items-center justify-center">
                            <span class="material-symbols-outlined text-2xl" data-icon="check_circle">check_circle</span>
                        </div>
                    </div>
                    <p class="text-slate-500 dark:text-slate-400 font-medium text-sm mb-1">Laundry Selesai</p>
                    <h3 class="text-3xl font-bold text-slate-900 dark:text-white">24</h3>
                </div>
            </div>

            <div class="bg-white dark:bg-inverse-surface rounded-2xl p-6 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 border border-slate-100 dark:border-slate-800 group relative overflow-hidden">
                <div class="absolute -right-4 -top-4 w-24 h-24 bg-cyan-50 dark:bg-cyan-900/20 rounded-full group-hover:scale-150 transition-transform duration-500 ease-out z-0"></div>
                <div class="relative z-10">
                    <div class="flex justify-between items-center mb-4">
                        <div class="w-12 h-12 bg-cyan-100 dark:bg-cyan-900/40 text-cyan-600 dark:text-cyan-400 rounded-xl flex items-center justify-center">
                            <span class="material-symbols-outlined text-2xl" data-icon="payments">payments</span>
                        </div>
                    </div>
                    <p class="text-slate-500 dark:text-slate-400 font-medium text-sm mb-1">Pendapatan Hari Ini</p>
                    <h3 class="text-3xl font-bold text-slate-900 dark:text-white">Rp 1.250.000</h3>
                </div>
            </div>

            <div class="bg-white dark:bg-inverse-surface rounded-2xl p-6 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 border border-slate-100 dark:border-slate-800 group relative overflow-hidden lg:col-span-2">
                <div class="absolute right-0 top-0 w-64 h-64 bg-purple-50 dark:bg-purple-900/10 rounded-full blur-3xl z-0"></div>
                <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between h-full gap-4">
                    <div>
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900/40 text-purple-600 dark:text-purple-400 rounded-xl flex items-center justify-center">
                                <span class="material-symbols-outlined text-2xl" data-icon="account_balance">account_balance</span>
                            </div>
                            <span class="bg-green-100 text-green-700 text-xs font-bold px-2.5 py-1 rounded-full flex items-center gap-1">
                                <span class="material-symbols-outlined text-[14px]" data-icon="trending_up">trending_up</span> 8.4%
                            </span>
                        </div>
                        <p class="text-slate-500 dark:text-slate-400 font-medium text-sm mb-1">Total Pendapatan Bulan Ini</p>
                        <h3 class="text-4xl font-extrabold text-slate-900 dark:text-white">Rp 32.800.000</h3>
                    </div>
                    <div class="flex items-end gap-2 h-20">
                        <div class="w-4 bg-purple-200 dark:bg-purple-900/50 rounded-t-sm h-[40%] hover:h-[50%] transition-all"></div>
                        <div class="w-4 bg-purple-300 dark:bg-purple-800/50 rounded-t-sm h-[60%] hover:h-[70%] transition-all"></div>
                        <div class="w-4 bg-purple-200 dark:bg-purple-900/50 rounded-t-sm h-[45%] hover:h-[55%] transition-all"></div>
                        <div class="w-4 bg-purple-400 dark:bg-purple-700/50 rounded-t-sm h-[80%] hover:h-[90%] transition-all"></div>
                        <div class="w-4 bg-purple-300 dark:bg-purple-800/50 rounded-t-sm h-[65%] hover:h-[75%] transition-all"></div>
                        <div class="w-4 bg-purple-600 dark:bg-purple-500 rounded-t-sm h-[100%]"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 bg-white dark:bg-inverse-surface rounded-2xl p-6 shadow-sm border border-slate-100 dark:border-slate-800">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-lg font-bold text-slate-900 dark:text-white">Grafik Pesanan (Minggu Ini)</h3>
                <button class="text-slate-400 hover:text-primary transition-colors">
                    <span class="material-symbols-outlined" data-icon="more_horiz">more_horiz</span>
                </button>
            </div>
            <div class="h-64 bg-slate-50 dark:bg-surface-dim/30 rounded-xl border border-slate-100 dark:border-slate-800/50 p-4 relative flex items-end justify-between gap-2 overflow-hidden group">
                <div class="absolute inset-0 flex flex-col justify-between p-4 pointer-events-none">
                    <div class="w-full h-px bg-slate-200 dark:bg-slate-700/50"></div>
                    <div class="w-full h-px bg-slate-200 dark:bg-slate-700/50"></div>
                    <div class="w-full h-px bg-slate-200 dark:bg-slate-700/50"></div>
                    <div class="w-full h-px bg-slate-200 dark:bg-slate-700/50"></div>
                </div>
                <div class="w-full bg-blue-200/50 dark:bg-blue-900/30 h-[30%] rounded-t-md hover:bg-blue-400 transition-colors relative z-10 group-hover:h-[35%] duration-300"><span class="absolute -bottom-6 left-1/2 -translate-x-1/2 text-xs text-slate-400">Sen</span></div>
                <div class="w-full bg-blue-200/50 dark:bg-blue-900/30 h-[50%] rounded-t-md hover:bg-blue-400 transition-colors relative z-10 group-hover:h-[55%] duration-300"><span class="absolute -bottom-6 left-1/2 -translate-x-1/2 text-xs text-slate-400">Sel</span></div>
                <div class="w-full bg-blue-200/50 dark:bg-blue-900/30 h-[40%] rounded-t-md hover:bg-blue-400 transition-colors relative z-10 group-hover:h-[45%] duration-300"><span class="absolute -bottom-6 left-1/2 -translate-x-1/2 text-xs text-slate-400">Rab</span></div>
                <div class="w-full bg-blue-200/50 dark:bg-blue-900/30 h-[70%] rounded-t-md hover:bg-blue-400 transition-colors relative z-10 group-hover:h-[75%] duration-300"><span class="absolute -bottom-6 left-1/2 -translate-x-1/2 text-xs text-slate-400">Kam</span></div>
                <div class="w-full bg-blue-200/50 dark:bg-blue-900/30 h-[60%] rounded-t-md hover:bg-blue-400 transition-colors relative z-10 group-hover:h-[65%] duration-300"><span class="absolute -bottom-6 left-1/2 -translate-x-1/2 text-xs text-slate-400">Jum</span></div>
                <div class="w-full bg-blue-500 dark:bg-blue-600 h-[90%] rounded-t-md relative z-10 shadow-[0_0_15px_rgba(59,130,246,0.5)]"><span class="absolute -bottom-6 left-1/2 -translate-x-1/2 text-xs font-bold text-slate-600 dark:text-slate-300">Sab</span></div>
                <div class="w-full bg-blue-200/50 dark:bg-blue-900/30 h-[45%] rounded-t-md hover:bg-blue-400 transition-colors relative z-10 group-hover:h-[50%] duration-300"><span class="absolute -bottom-6 left-1/2 -translate-x-1/2 text-xs text-slate-400">Min</span></div>
            </div>
            <div class="mt-8 flex gap-6 text-sm">
                <div class="flex items-center gap-2">
                    <div class="w-3 h-3 rounded-full bg-blue-500"></div>
                    <span class="text-slate-600 dark:text-slate-400">Minggu Ini (142 Order)</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-3 h-3 rounded-full bg-blue-200 dark:bg-blue-900/50"></div>
                    <span class="text-slate-600 dark:text-slate-400">Minggu Lalu (118 Order)</span>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-inverse-surface rounded-2xl p-6 shadow-sm border border-slate-100 dark:border-slate-800 overflow-hidden">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-lg font-bold text-slate-900 dark:text-white">Aktivitas Terbaru</h3>
                <button class="text-primary text-sm font-semibold hover:underline">Lihat Semua</button>
            </div>
            <div class="space-y-6 relative before:absolute before:inset-0 before:ml-5 before:-translate-x-px before:h-full before:w-0.5 before:bg-gradient-to-b before:from-transparent before:via-slate-200 dark:before:via-slate-700 before:to-transparent">
                
                <div class="relative flex items-center group">
                    <div class="flex items-center justify-center w-10 h-10 rounded-full border-4 border-white dark:border-inverse-surface bg-blue-100 dark:bg-blue-900/50 text-blue-600 dark:text-blue-400 shrink-0 shadow-sm relative z-10">
                        <span class="material-symbols-outlined text-lg" data-icon="add_shopping_cart">add_shopping_cart</span>
                    </div>
                    <div class="w-full ml-4 p-4 rounded-xl border border-slate-100 dark:border-slate-800 bg-slate-50 dark:bg-surface-dim/20 shadow-sm group-hover:shadow-md transition-shadow">
                        <div class="flex items-center justify-between mb-1">
                            <h4 class="font-bold text-slate-900 dark:text-white text-sm">Order Masuk</h4>
                            <span class="text-[10px] text-slate-400 font-medium">Baru saja</span>
                        </div>
                        <p class="text-xs text-slate-500 dark:text-slate-400">Budi S. - Cuci Kiloan (5kg)</p>
                    </div>
                </div>

                <div class="relative flex items-center group">
                    <div class="flex items-center justify-center w-10 h-10 rounded-full border-4 border-white dark:border-inverse-surface bg-green-100 dark:bg-green-900/50 text-green-600 dark:text-green-400 shrink-0 shadow-sm relative z-10">
                        <span class="material-symbols-outlined text-lg" data-icon="check">check</span>
                    </div>
                    <div class="w-full ml-4 p-4 rounded-xl border border-slate-100 dark:border-slate-800 bg-white dark:bg-inverse-surface shadow-sm group-hover:shadow-md transition-shadow">
                        <div class="flex items-center justify-between mb-1">
                            <h4 class="font-bold text-slate-900 dark:text-white text-sm">Laundry Selesai</h4>
                            <span class="text-[10px] text-slate-400 font-medium">15m lalu</span>
                        </div>
                        <p class="text-xs text-slate-500 dark:text-slate-400">INV-8821 siap diambil</p>
                    </div>
                </div>

                <div class="relative flex items-center group">
                    <div class="flex items-center justify-center w-10 h-10 rounded-full border-4 border-white dark:border-inverse-surface bg-purple-100 dark:bg-purple-900/50 text-purple-600 dark:text-purple-400 shrink-0 shadow-sm relative z-10">
                        <span class="material-symbols-outlined text-lg" data-icon="person_add">person_add</span>
                    </div>
                    <div class="w-full ml-4 p-4 rounded-xl border border-slate-100 dark:border-slate-800 bg-white dark:bg-inverse-surface shadow-sm group-hover:shadow-md transition-shadow">
                        <div class="flex items-center justify-between mb-1">
                            <h4 class="font-bold text-slate-900 dark:text-white text-sm">Customer Baru</h4>
                            <span class="text-[10px] text-slate-400 font-medium">1j lalu</span>
                        </div>
                        <p class="text-xs text-slate-500 dark:text-slate-400">Sarah J. mendaftar</p>
                    </div>
                </div>

                 <div class="relative flex items-center group">
                    <div class="flex items-center justify-center w-10 h-10 rounded-full border-4 border-white dark:border-inverse-surface bg-orange-100 dark:bg-orange-900/50 text-orange-600 dark:text-orange-400 shrink-0 shadow-sm relative z-10">
                        <span class="material-symbols-outlined text-lg" data-icon="local_shipping">local_shipping</span>
                    </div>
                    <div class="w-full ml-4 p-4 rounded-xl border border-slate-100 dark:border-slate-800 bg-white dark:bg-inverse-surface shadow-sm group-hover:shadow-md transition-shadow">
                        <div class="flex items-center justify-between mb-1">
                            <h4 class="font-bold text-slate-900 dark:text-white text-sm">Pickup</h4>
                            <span class="text-[10px] text-slate-400 font-medium">2j lalu</span>
                        </div>
                        <p class="text-xs text-slate-500 dark:text-slate-400">Kurir mengambil INV-8819</p>
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
        animation: fadeIn 0.6s ease-out forwards;
    }
</style>
@endsection
