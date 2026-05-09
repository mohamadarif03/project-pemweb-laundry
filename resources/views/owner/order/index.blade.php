@extends('owner.layouts.app')

@section('title', 'Kelola Pesanan - LaundroMetrics')
@section('header_title', 'Daftar Pesanan')

@section('content')
<div class="max-w-container-max mx-auto space-y-6 animate-fade-in">
    
    <div class="bg-white dark:bg-inverse-surface rounded-2xl p-5 shadow-sm border border-slate-100 dark:border-slate-800 flex flex-col md:flex-row gap-4 items-center justify-between">
        <div class="flex flex-col sm:flex-row gap-4 w-full md:w-auto">
            <div class="relative w-full sm:w-64">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <span class="material-symbols-outlined text-slate-400 text-lg">search</span>
                </div>
                <input type="text" placeholder="Cari invoice atau nama..." class="pl-10 w-full rounded-xl border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-surface-dim/30 text-sm focus:ring-primary focus:border-primary">
            </div>
            <div class="relative w-full sm:w-48">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <span class="material-symbols-outlined text-slate-400 text-lg">filter_list</span>
                </div>
                <select class="pl-10 w-full rounded-xl border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-surface-dim/30 text-sm focus:ring-primary focus:border-primary appearance-none">
                    <option value="">Semua Status</option>
                    <option value="order_masuk">Order Masuk</option>
                    <option value="dicuci">Sedang Dicuci</option>
                    <option value="disetrika">Sedang Disetrika</option>
                    <option value="selesai">Selesai</option>
                </select>
            </div>
        </div>
        
        <a href="/owner/orders/create" class="w-full md:w-auto bg-primary text-white px-6 py-2.5 rounded-xl font-semibold shadow-lg shadow-primary/30 hover:bg-secondary transition-all flex items-center justify-center gap-2 group">
            <span class="material-symbols-outlined text-lg group-hover:rotate-90 transition-transform">add</span>
            Tambah Order
        </a>
    </div>

    <div class="bg-white dark:bg-inverse-surface rounded-2xl shadow-sm border border-slate-100 dark:border-slate-800 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 dark:bg-surface-dim/20 border-b border-slate-100 dark:border-slate-800 text-xs uppercase tracking-wider text-slate-500 dark:text-slate-400 font-semibold">
                        <th class="py-4 px-6">Invoice</th>
                        <th class="py-4 px-6">Customer</th>
                        <th class="py-4 px-6">Layanan</th>
                        <th class="py-4 px-6">Berat</th>
                        <th class="py-4 px-6">Total</th>
                        <th class="py-4 px-6">Status</th>
                        <th class="py-4 px-6">Payment</th>
                        <th class="py-4 px-6 text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-800 text-sm">
                    <tr class="hover:bg-slate-50/50 dark:hover:bg-surface-dim/10 transition-colors group">
                        <td class="py-4 px-6 font-bold text-slate-900 dark:text-white">INV-001</td>
                        <td class="py-4 px-6">
                            <div class="font-semibold text-slate-900 dark:text-white">Arif</div>
                            <div class="text-xs text-slate-500">08123456789</div>
                        </td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-blue-50 dark:bg-blue-900/30 text-blue-700 dark:text-blue-400 font-medium">
                                <span class="material-symbols-outlined text-[14px]">local_laundry_service</span>
                                Cuci Setrika
                            </span>
                        </td>
                        <td class="py-4 px-6 font-medium text-slate-700 dark:text-slate-300">3 kg</td>
                        <td class="py-4 px-6 font-bold text-slate-900 dark:text-white">Rp 27.000</td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full border border-orange-200 dark:border-orange-800 bg-orange-50 dark:bg-orange-900/20 text-orange-600 dark:text-orange-400 font-semibold text-xs">
                                <div class="w-1.5 h-1.5 rounded-full bg-orange-500 animate-pulse"></div>
                                Dicuci
                            </span>
                        </td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-green-100 dark:bg-green-900/40 text-green-700 dark:text-green-400 font-semibold text-xs">
                                <span class="material-symbols-outlined text-[14px]">check_circle</span>
                                Paid
                            </span>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex justify-end items-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                <a href="/owner/orders/1" class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center hover:bg-blue-100 tooltip" title="Detail Order">
                                    <span class="material-symbols-outlined text-[18px]">visibility</span>
                                </a>
                                <button class="w-8 h-8 rounded-lg bg-orange-50 text-orange-600 flex items-center justify-center hover:bg-orange-100 tooltip" title="Update Status">
                                    <span class="material-symbols-outlined text-[18px]">sync</span>
                                </button>
                                <a href="/owner/orders/1/edit" class="w-8 h-8 rounded-lg bg-slate-100 text-slate-600 flex items-center justify-center hover:bg-slate-200 tooltip" title="Edit">
                                    <span class="material-symbols-outlined text-[18px]">edit</span>
                                </a>
                                <button class="w-8 h-8 rounded-lg bg-purple-50 text-purple-600 flex items-center justify-center hover:bg-purple-100 tooltip" title="Print Nota">
                                    <span class="material-symbols-outlined text-[18px]">print</span>
                                </button>
                            </div>
                            <div class="flex lg:hidden justify-end mt-2">
                                <a href="/owner/orders/1" class="text-primary text-xs font-semibold">Lihat Detail &rarr;</a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="px-6 py-4 border-t border-slate-100 dark:border-slate-800 bg-slate-50/50 dark:bg-surface-dim/10 flex items-center justify-between">
            <span class="text-sm text-slate-500">Menampilkan 1 hingga 1 dari 1 order</span>
            <div class="flex gap-1">
                <button class="w-8 h-8 rounded-lg border border-slate-200 bg-white flex items-center justify-center text-slate-400 cursor-not-allowed"><span class="material-symbols-outlined text-sm">chevron_left</span></button>
                <button class="w-8 h-8 rounded-lg bg-primary text-white font-semibold text-sm">1</button>
                <button class="w-8 h-8 rounded-lg border border-slate-200 bg-white flex items-center justify-center text-slate-400 cursor-not-allowed"><span class="material-symbols-outlined text-sm">chevron_right</span></button>
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
