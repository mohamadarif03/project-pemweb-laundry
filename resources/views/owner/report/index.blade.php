@extends('owner.layouts.app')

@section('title', 'Laporan Bisnis - LaundroMetrics')
@section('header_title', 'Laporan & Analitik')

@section('content')
<div class="max-w-container-max mx-auto space-y-6 animate-fade-in">
    
    <!-- Report Filters -->
    <div class="bg-white dark:bg-inverse-surface rounded-2xl p-5 shadow-sm border border-slate-100 dark:border-slate-800 flex flex-col md:flex-row gap-4 items-center justify-between">
        <div class="flex flex-col sm:flex-row gap-4 w-full md:w-auto">
            <div class="relative w-full sm:w-64">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <span class="material-symbols-outlined text-slate-400 text-lg">calendar_month</span>
                </div>
                <input type="text" value="01 Okt 2024 - 31 Okt 2024" class="pl-10 w-full rounded-xl border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-surface-dim/30 text-sm focus:ring-primary focus:border-primary">
            </div>
            <div class="relative w-full sm:w-48">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <span class="material-symbols-outlined text-slate-400 text-lg">assessment</span>
                </div>
                <select class="pl-10 w-full rounded-xl border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-surface-dim/30 text-sm focus:ring-primary focus:border-primary appearance-none">
                    <option value="monthly">Bulanan</option>
                    <option value="weekly">Mingguan</option>
                    <option value="yearly">Tahunan</option>
                </select>
            </div>
        </div>
        
        <div class="flex gap-2 w-full md:w-auto">
            <button class="flex-1 md:flex-none border border-slate-200 text-slate-700 px-6 py-2.5 rounded-xl font-semibold hover:bg-slate-50 transition-all flex items-center justify-center gap-2">
                <span class="material-symbols-outlined text-lg">download</span>
                PDF
            </button>
            <button class="flex-1 md:flex-none bg-green-600 text-white px-6 py-2.5 rounded-xl font-semibold shadow-lg shadow-green-600/20 hover:bg-green-700 transition-all flex items-center justify-center gap-2">
                <span class="material-symbols-outlined text-lg">table_view</span>
                Excel
            </button>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white dark:bg-inverse-surface rounded-2xl p-6 shadow-sm border border-slate-100 dark:border-slate-800">
            <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Total Pendapatan</p>
            <h3 class="text-2xl font-extrabold text-slate-900 dark:text-white">Rp 12.450.000</h3>
            <p class="text-xs text-green-600 font-bold flex items-center gap-1 mt-2">
                <span class="material-symbols-outlined text-[14px]">trending_up</span> +15.4% <span class="font-medium text-slate-400">vs bulan lalu</span>
            </p>
        </div>
        <div class="bg-white dark:bg-inverse-surface rounded-2xl p-6 shadow-sm border border-slate-100 dark:border-slate-800">
            <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Total Order</p>
            <h3 class="text-2xl font-extrabold text-slate-900 dark:text-white">452</h3>
            <p class="text-xs text-green-600 font-bold flex items-center gap-1 mt-2">
                <span class="material-symbols-outlined text-[14px]">trending_up</span> +8.2% <span class="font-medium text-slate-400">vs bulan lalu</span>
            </p>
        </div>
        <div class="bg-white dark:bg-inverse-surface rounded-2xl p-6 shadow-sm border border-slate-100 dark:border-slate-800">
            <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Rata-rata Order</p>
            <h3 class="text-2xl font-extrabold text-slate-900 dark:text-white">Rp 27.500</h3>
            <p class="text-xs text-red-600 font-bold flex items-center gap-1 mt-2">
                <span class="material-symbols-outlined text-[14px]">trending_down</span> -2.1% <span class="font-medium text-slate-400">vs bulan lalu</span>
            </p>
        </div>
        <div class="bg-white dark:bg-inverse-surface rounded-2xl p-6 shadow-sm border border-slate-100 dark:border-slate-800">
            <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Customer Baru</p>
            <h3 class="text-2xl font-extrabold text-slate-900 dark:text-white">12</h3>
            <p class="text-xs text-green-600 font-bold flex items-center gap-1 mt-2">
                <span class="material-symbols-outlined text-[14px]">trending_up</span> +4% <span class="font-medium text-slate-400">vs bulan lalu</span>
            </p>
        </div>
    </div>

    <!-- Main Chart Section -->
    <div class="bg-white dark:bg-inverse-surface rounded-3xl p-8 shadow-sm border border-slate-100 dark:border-slate-800">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
            <div>
                <h3 class="text-xl font-bold text-slate-900 dark:text-white">Tren Pendapatan</h3>
                <p class="text-sm text-slate-500">Performa finansial laundry Anda bulan ini.</p>
            </div>
            <div class="flex items-center gap-6">
                <div class="flex items-center gap-2 text-sm text-slate-600">
                    <div class="w-3 h-3 rounded-full bg-primary"></div>
                    Pendapatan (Rp)
                </div>
                <div class="flex items-center gap-2 text-sm text-slate-600">
                    <div class="w-3 h-3 rounded-full bg-slate-200"></div>
                    Target (Rp)
                </div>
            </div>
        </div>
        
        <div class="h-80 w-full relative flex items-end justify-between px-4 pb-6 border-b border-slate-100 group">
            <!-- Simple Bar Chart with Divs -->
            <div class="w-8 bg-primary rounded-t-lg h-[40%] relative tooltip transition-all hover:h-[45%]" title="Minggu 1: Rp 2.5M"></div>
            <div class="w-8 bg-primary rounded-t-lg h-[65%] relative tooltip transition-all hover:h-[70%]" title="Minggu 2: Rp 3.8M"></div>
            <div class="w-8 bg-primary rounded-t-lg h-[55%] relative tooltip transition-all hover:h-[60%]" title="Minggu 3: Rp 3.2M"></div>
            <div class="w-8 bg-primary rounded-t-lg h-[85%] relative tooltip transition-all hover:h-[90%]" title="Minggu 4: Rp 4.5M"></div>
            
            <div class="absolute left-0 bottom-0 w-full flex justify-between px-2 text-[10px] font-bold text-slate-400 uppercase tracking-wider mt-4">
                <span>Minggu 1</span>
                <span>Minggu 2</span>
                <span>Minggu 3</span>
                <span>Minggu 4</span>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Most Popular Services -->
        <div class="bg-white dark:bg-inverse-surface rounded-3xl p-8 shadow-sm border border-slate-100 dark:border-slate-800">
            <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-6">Layanan Terpopuler</h3>
            <div class="space-y-5">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center font-bold">1</div>
                        <div>
                            <p class="font-bold text-slate-900">Cuci Setrika Reguler</p>
                            <p class="text-xs text-slate-500">258 Order</p>
                        </div>
                    </div>
                    <p class="font-bold text-slate-900">57%</p>
                </div>
                <div class="w-full h-1.5 bg-slate-100 rounded-full overflow-hidden">
                    <div class="h-full bg-primary w-[57%]"></div>
                </div>

                <div class="flex items-center justify-between mt-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center font-bold">2</div>
                        <div>
                            <p class="font-bold text-slate-900">Cuci Kilat (Express)</p>
                            <p class="text-xs text-slate-500">112 Order</p>
                        </div>
                    </div>
                    <p class="font-bold text-slate-900">25%</p>
                </div>
                <div class="w-full h-1.5 bg-slate-100 rounded-full overflow-hidden">
                    <div class="h-full bg-purple-500 w-[25%]"></div>
                </div>

                <div class="flex items-center justify-between mt-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-cyan-50 text-cyan-600 flex items-center justify-center font-bold">3</div>
                        <div>
                            <p class="font-bold text-slate-900">Dry Cleaning</p>
                            <p class="text-xs text-slate-500">82 Order</p>
                        </div>
                    </div>
                    <p class="font-bold text-slate-900">18%</p>
                </div>
                <div class="w-full h-1.5 bg-slate-100 rounded-full overflow-hidden">
                    <div class="h-full bg-cyan-500 w-[18%]"></div>
                </div>
            </div>
        </div>

        <!-- Top Customers -->
        <div class="bg-white dark:bg-inverse-surface rounded-3xl p-8 shadow-sm border border-slate-100 dark:border-slate-800">
            <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-6">Pelanggan Teratas</h3>
            <div class="space-y-6">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-full bg-amber-100 text-amber-600 flex items-center justify-center font-bold relative">
                            AK
                            <div class="absolute -top-1 -right-1 w-5 h-5 bg-amber-500 rounded-full border-2 border-white flex items-center justify-center text-white text-[10px]">
                                <span class="material-symbols-outlined text-[12px]">workspace_premium</span>
                            </div>
                        </div>
                        <div>
                            <p class="font-bold text-slate-900">Arif Kurniawan</p>
                            <p class="text-xs text-slate-500">12 Order Bulan Ini</p>
                        </div>
                    </div>
                    <p class="font-extrabold text-primary">Rp 450k</p>
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-full bg-slate-100 text-slate-600 flex items-center justify-center font-bold">SJ</div>
                        <div>
                            <p class="font-bold text-slate-900">Sarah J.</p>
                            <p class="text-xs text-slate-500">8 Order Bulan Ini</p>
                        </div>
                    </div>
                    <p class="font-extrabold text-slate-900 dark:text-white">Rp 320k</p>
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-full bg-slate-100 text-slate-600 flex items-center justify-center font-bold">BK</div>
                        <div>
                            <p class="font-bold text-slate-900">Budi Kurnia</p>
                            <p class="text-xs text-slate-500">6 Order Bulan Ini</p>
                        </div>
                    </div>
                    <p class="font-extrabold text-slate-900 dark:text-white">Rp 210k</p>
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
