@extends('owner.layouts.app')

@section('title', 'Laporan Bisnis - LaundroMetrics')
@section('header_title', 'Laporan & Analitik')

@section('content')
<div class="max-w-container-max mx-auto space-y-6 animate-fade-in">
    
    <div class="bg-white dark:bg-inverse-surface rounded-2xl p-5 shadow-sm border border-slate-100 dark:border-slate-800 flex flex-col md:flex-row gap-4 items-center justify-between">
        <div class="flex flex-col sm:flex-row gap-4 w-full md:w-auto">
            <div class="relative w-full sm:w-64">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <span class="material-symbols-outlined text-slate-400 text-lg">calendar_month</span>
                </div>
                <input type="text" value="{{ $startOfMonth->format('d M Y') }} - {{ $endOfMonth->format('d M Y') }}" readonly class="pl-10 w-full rounded-xl border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-surface-dim/30 text-sm focus:ring-primary focus:border-primary">
            </div>
            <div class="relative w-full sm:w-48">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <span class="material-symbols-outlined text-slate-400 text-lg">assessment</span>
                </div>
                <select class="pl-10 w-full rounded-xl border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-surface-dim/30 text-sm focus:ring-primary focus:border-primary appearance-none">
                    <option value="monthly">Bulanan</option>
                </select>
            </div>
        </div>
        
        <div class="flex gap-2 w-full md:w-auto">
            <a href="{{ route('reports.exportPdf') }}" class="flex-1 md:flex-none border border-slate-200 text-slate-700 px-6 py-2.5 rounded-xl font-semibold hover:bg-slate-50 transition-all flex items-center justify-center gap-2">
                <span class="material-symbols-outlined text-lg">download</span>
                PDF
            </a>
            <a href="{{ route('reports.exportExcel') }}" class="flex-1 md:flex-none bg-green-600 text-white px-6 py-2.5 rounded-xl font-semibold shadow-lg shadow-green-600/20 hover:bg-green-700 transition-all flex items-center justify-center gap-2">
                <span class="material-symbols-outlined text-lg">table_view</span>
                Excel
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white dark:bg-inverse-surface rounded-2xl p-6 shadow-sm border border-slate-100 dark:border-slate-800">
            <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Total Pendapatan</p>
            <h3 class="text-2xl font-extrabold text-slate-900 dark:text-white">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</h3>
        </div>
        <div class="bg-white dark:bg-inverse-surface rounded-2xl p-6 shadow-sm border border-slate-100 dark:border-slate-800">
            <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Total Order</p>
            <h3 class="text-2xl font-extrabold text-slate-900 dark:text-white">{{ $totalOrder }}</h3>
        </div>
        <div class="bg-white dark:bg-inverse-surface rounded-2xl p-6 shadow-sm border border-slate-100 dark:border-slate-800">
            <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Rata-rata Order</p>
            <h3 class="text-2xl font-extrabold text-slate-900 dark:text-white">Rp {{ number_format($averageOrder, 0, ',', '.') }}</h3>
        </div>
        <div class="bg-white dark:bg-inverse-surface rounded-2xl p-6 shadow-sm border border-slate-100 dark:border-slate-800">
            <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Customer Baru</p>
            <h3 class="text-2xl font-extrabold text-slate-900 dark:text-white">{{ $newCustomers }}</h3>
        </div>
    </div>

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
            </div>
        </div>
        
        <div class="h-80 w-full relative flex items-end justify-between px-4 pb-6 border-b border-slate-100 group">
            <div class="w-8 bg-primary rounded-t-lg relative tooltip transition-all hover:bg-secondary" style="height: {{ $chartPercentages['minggu_1'] }}%" title="Minggu 1: Rp {{ number_format($chartData['minggu_1'], 0, ',', '.') }}"></div>
            <div class="w-8 bg-primary rounded-t-lg relative tooltip transition-all hover:bg-secondary" style="height: {{ $chartPercentages['minggu_2'] }}%" title="Minggu 2: Rp {{ number_format($chartData['minggu_2'], 0, ',', '.') }}"></div>
            <div class="w-8 bg-primary rounded-t-lg relative tooltip transition-all hover:bg-secondary" style="height: {{ $chartPercentages['minggu_3'] }}%" title="Minggu 3: Rp {{ number_format($chartData['minggu_3'], 0, ',', '.') }}"></div>
            <div class="w-8 bg-primary rounded-t-lg relative tooltip transition-all hover:bg-secondary" style="height: {{ $chartPercentages['minggu_4'] }}%" title="Minggu 4: Rp {{ number_format($chartData['minggu_4'], 0, ',', '.') }}"></div>
            
            <div class="absolute left-0 bottom-0 w-full flex justify-between px-2 text-[10px] font-bold text-slate-400 uppercase tracking-wider mt-4">
                <span>Minggu 1</span>
                <span>Minggu 2</span>
                <span>Minggu 3</span>
                <span>Minggu 4</span>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white dark:bg-inverse-surface rounded-3xl p-8 shadow-sm border border-slate-100 dark:border-slate-800">
            <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-6">Layanan Terpopuler</h3>
            <div class="space-y-5">
                @forelse($topServices as $index => $service)
                <div class="flex items-center justify-between mt-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center font-bold">{{ $index + 1 }}</div>
                        <div>
                            <p class="font-bold text-slate-900">{{ $service->name }}</p>
                            <p class="text-xs text-slate-500">{{ $service->orders_count }} Order</p>
                        </div>
                    </div>
                </div>
                @empty
                <p class="text-sm text-slate-500 italic">Belum ada data layanan.</p>
                @endforelse
            </div>
        </div>

        <div class="bg-white dark:bg-inverse-surface rounded-3xl p-8 shadow-sm border border-slate-100 dark:border-slate-800">
            <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-6">Pelanggan Teratas</h3>
            <div class="space-y-6">
                @forelse($topCustomers as $customer)
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-full bg-amber-100 text-amber-600 flex items-center justify-center font-bold relative uppercase">
                            {{ substr($customer->name, 0, 2) }}
                        </div>
                        <div>
                            <p class="font-bold text-slate-900">{{ $customer->name }}</p>
                            <p class="text-xs text-slate-500">{{ $customer->orders_count }} Order Bulan Ini</p>
                        </div>
                    </div>
                </div>
                @empty
                <p class="text-sm text-slate-500 italic">Belum ada pelanggan teratas bulan ini.</p>
                @endforelse
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
