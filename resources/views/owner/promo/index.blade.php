@extends('owner.layouts.app')

@section('title', 'Manajemen Promo - LaundroMetrics')
@section('header_title', 'Daftar Promo & Voucher')

@section('content')
@if(session('success'))
    <div class="alert alert-success mt-3">
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('promo.store') }}" method="POST">
    
<div class="max-w-container-max mx-auto space-y-6 animate-fade-in" x-data="{ modalPromo: false, search: '' }">
    
    <!-- Top Action Bar -->
    <div class="bg-white dark:bg-inverse-surface rounded-2xl p-5 shadow-sm border border-slate-100 dark:border-slate-800 flex flex-col md:flex-row gap-4 items-center justify-between">
        <div class="flex flex-col sm:flex-row gap-4 w-full md:w-auto">
            <div class="relative w-full sm:w-64">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <span class="material-symbols-outlined text-slate-400 text-lg">search</span>
                </div>
                <input x-model="search" type="text" placeholder="Cari kode atau nama promo..." class="pl-10 w-full rounded-xl border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-surface-dim/30 text-sm focus:ring-primary focus:border-primary">
            </div>
            <div class="relative w-full sm:w-48">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <span class="material-symbols-outlined text-slate-400 text-lg">filter_list</span>
                </div>
                <select class="pl-10 w-full rounded-xl border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-surface-dim/30 text-sm focus:ring-primary focus:border-primary appearance-none">
                    <option value="">Semua Status</option>
                    <option value="active">Active</option>
                    <option value="expired">Expired</option>
                    <option value="nonaktif">Nonaktif</option>
                </select>
            </div>
        </div>
        
        <button @click="modalPromo = true" class="w-full md:w-auto bg-primary text-white px-6 py-2.5 rounded-xl font-semibold shadow-lg shadow-primary/30 hover:bg-secondary transition-all flex items-center justify-center gap-2 group">
            <span class="material-symbols-outlined text-lg group-hover:rotate-90 transition-transform">sell</span>
            Tambah Promo
        </button>
    </div>

    Promo Table
    <div class="bg-white dark:bg-inverse-surface rounded-2xl shadow-sm border border-slate-100 dark:border-slate-800 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 dark:bg-surface-dim/20 border-b border-slate-100 dark:border-slate-800 text-xs uppercase tracking-wider text-slate-500 dark:text-slate-400 font-semibold">
                        <th class="py-4 px-6">Code</th>
                        <th class="py-4 px-6">Promo</th>
                        <th class="py-4 px-6">Diskon</th>
                        <th class="py-4 px-6">Berlaku Sampai</th>
                        <th class="py-4 px-6">Status</th>
                        <th class="py-4 px-6 text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-800 text-sm">
                    <!-- Row 1 -->
                    <tr class="hover:bg-slate-50/50 dark:hover:bg-surface-dim/10 transition-colors group" x-show="search === '' || $el.innerText.toLowerCase().includes(search.toLowerCase())">
                        <td class="py-4 px-6">
                            <span class="font-mono font-bold text-primary bg-primary/10 px-2.5 py-1 rounded-lg border border-primary/20 tracking-wider">WELCOME10</span>
                        </td>
                        <td class="py-4 px-6">
                            <div class="font-bold text-slate-900 dark:text-white">Diskon Member Baru</div>
                        </td>
                        <td class="py-4 px-6">
                            <span class="font-extrabold text-orange-600 bg-orange-50 px-2 py-0.5 rounded text-sm">10%</span>
                        </td>
                        <td class="py-4 px-6 text-slate-600 dark:text-slate-400 font-medium">30 Mei 2026</td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-green-100 dark:bg-green-900/40 text-green-700 dark:text-green-400 font-bold text-xs uppercase tracking-wide">
                                <span class="material-symbols-outlined text-[14px]">check_circle</span>
                                Active
                            </span>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex justify-end items-center gap-2 transition-opacity">
                                <button class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center hover:bg-blue-100 tooltip" title="Detail">
                                    <span class="material-symbols-outlined text-[18px]">visibility</span>
                                </button>
                                <button class="w-8 h-8 rounded-lg bg-slate-100 text-slate-600 flex items-center justify-center hover:bg-slate-200 tooltip" title="Edit">
                                    <span class="material-symbols-outlined text-[18px]">edit</span>
                                </button>
                                <button class="w-8 h-8 rounded-lg bg-orange-50 text-orange-600 flex items-center justify-center hover:bg-orange-100 tooltip" title="Nonaktifkan">
                                    <span class="material-symbols-outlined text-[18px]">block</span>
                                </button>
                                <button class="w-8 h-8 rounded-lg bg-red-50 text-red-600 flex items-center justify-center hover:bg-red-100 tooltip" title="Hapus">
                                    <span class="material-symbols-outlined text-[18px]">delete</span>
                                </button>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Row 2 -->
                   <tr class="hover:bg-slate-50/50 dark:hover:bg-surface-dim/10 transition-colors group" x-show="search === '' || $el.innerText.toLowerCase().includes(search.toLowerCase())">
                        <td class="py-4 px-6">
                            <span class="font-mono font-bold text-primary bg-primary/10 px-2.5 py-1 rounded-lg border border-primary/20 tracking-wider">LAUNDRY5K</span>
                        </td>
                        <td class="py-4 px-6">
                            <div class="font-bold text-slate-900 dark:text-white">Promo Akhir Pekan</div>
                        </td>
                        <td class="py-4 px-6">
                            <span class="font-extrabold text-orange-600 bg-orange-50 px-2 py-0.5 rounded text-sm">Rp5.000</span>
                        </td>
                        <td class="py-4 px-6 text-slate-600 dark:text-slate-400 font-medium">15 Mei 2026</td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-slate-100 dark:bg-surface-dim/50 text-slate-600 dark:text-slate-400 font-bold text-xs uppercase tracking-wide">
                                <span class="material-symbols-outlined text-[14px]">remove_circle</span>
                                Nonaktif
                            </span>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex justify-end items-center gap-2 transition-opacity">
                                <button class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center hover:bg-blue-100 tooltip" title="Detail">
                                    <span class="material-symbols-outlined text-[18px]">visibility</span>
                                </button>
                                <button class="w-8 h-8 rounded-lg bg-slate-100 text-slate-600 flex items-center justify-center hover:bg-slate-200 tooltip" title="Edit">
                                    <span class="material-symbols-outlined text-[18px]">edit</span>
                                </button>
                                <button class="w-8 h-8 rounded-lg bg-green-50 text-green-600 flex items-center justify-center hover:bg-green-100 tooltip" title="Aktifkan">
                                    <span class="material-symbols-outlined text-[18px]">check_circle</span>
                                </button>
                                <button class="w-8 h-8 rounded-lg bg-red-50 text-red-600 flex items-center justify-center hover:bg-red-100 tooltip" title="Hapus">
                                    <span class="material-symbols-outlined text-[18px]">delete</span>
                                </button>
                            </div>
                        </td>
                    </tr>

                     <!-- Row 3 -->
                     <tr class="hover:bg-slate-50/50 dark:hover:bg-surface-dim/10 transition-colors group" x-show="search === '' || $el.innerText.toLowerCase().includes(search.toLowerCase())">
                        <td class="py-4 px-6">
                            <span class="font-mono font-bold text-primary bg-primary/10 px-2.5 py-1 rounded-lg border border-primary/20 tracking-wider">EXPRESS20</span>
                        </td>
                        <td class="py-4 px-6">
                            <div class="font-bold text-slate-900 dark:text-white">Diskon Express</div>
                        </td>
                        <td class="py-4 px-6">
                            <span class="font-extrabold text-orange-600 bg-orange-50 px-2 py-0.5 rounded text-sm">20%</span>
                        </td>
                        <td class="py-4 px-6 text-slate-600 dark:text-slate-400 font-medium">01 Mei 2026</td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-red-100 dark:bg-red-900/40 text-red-700 dark:text-red-400 font-bold text-xs uppercase tracking-wide">
                                <span class="material-symbols-outlined text-[14px]">cancel</span>
                                Expired
                            </span>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex justify-end items-center gap-2 transition-opacity">
                                <button class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center hover:bg-blue-100 tooltip" title="Detail">
                                    <span class="material-symbols-outlined text-[18px]">visibility</span>
                                </button>
                                <button class="w-8 h-8 rounded-lg bg-slate-100 text-slate-600 flex items-center justify-center hover:bg-slate-200 tooltip" title="Edit">
                                    <span class="material-symbols-outlined text-[18px]">edit</span>
                                </button>
                                <button class="w-8 h-8 rounded-lg bg-red-50 text-red-600 flex items-center justify-center hover:bg-red-100 tooltip" title="Hapus">
                                    <span class="material-symbols-outlined text-[18px]">delete</span>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- MODAL: TAMBAH PROMO -->
    <div x-show="modalPromo" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center">
        <div x-show="modalPromo" x-transition.opacity class="absolute inset-0 bg-slate-900/50 backdrop-blur-sm" @click="modalPromo = false"></div>
        <div x-show="modalPromo" x-transition.scale.origin.bottom class="relative bg-white dark:bg-inverse-surface w-full max-w-md rounded-3xl shadow-2xl overflow-hidden m-4">
            <div class="p-8">
                <div class="flex justify-between items-start mb-6">
                    <div>
                        <h3 class="text-2xl font-bold text-slate-900 dark:text-white">Tambah Promo</h3>
                        <p class="text-slate-500 text-sm">Buat kode voucher baru.</p>
                    </div>
                    <button @click="modalPromo = false" class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center hover:bg-slate-200 transition-colors">
                        <span class="material-symbols-outlined text-[18px]">close</span>
                    </button>
                </div>
                
                <form action="{{ route('promo.store') }}" method="POST" class="space-y-5">
                    @csrf <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Kode Promo</label>
                        <input type="text" name="code" required 
                            class="w-full rounded-xl border-slate-200 bg-slate-50 p-3 text-sm font-mono focus:ring-primary focus:border-primary uppercase" 
                            placeholder="Contoh: WELCOME10">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Nama Promo</label>
                        <input type="text" name="name" required 
                            class="w-full rounded-xl border-slate-200 bg-slate-50 p-3 text-sm focus:ring-primary focus:border-primary" 
                            placeholder="Contoh: Diskon Member Baru">
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Tipe Diskon</label>
                            <select name="discount_type" 
                                class="w-full rounded-xl border-slate-200 bg-slate-50 p-3 text-sm focus:ring-primary focus:border-primary appearance-none">
                                <option value="percent">Persentase (%)</option>
                                <option value="nominal">Nominal (Rp)</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Nilai</label>
                            <input type="number" name="discount_value" required 
                                class="w-full rounded-xl border-slate-200 bg-slate-50 p-3 text-sm focus:ring-primary focus:border-primary" 
                                placeholder="10">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Berlaku Sampai</label>
                        <input type="date" name="expires_at" required 
                            class="w-full rounded-xl border-slate-200 bg-slate-50 p-3 text-sm focus:ring-primary focus:border-primary">
                    </div>
                    
                    <div class="flex gap-3 pt-4">
                        <button type="button" @click="modalPromo = false" 
                            class="flex-1 border border-slate-200 text-slate-700 py-3 rounded-xl font-bold hover:bg-slate-50 transition-colors">
                            Batal
                        </button>
                        <button type="submit" 
                            class="flex-1 bg-primary text-white py-3 rounded-xl font-bold shadow-lg shadow-primary/20 hover:bg-secondary transition-colors">
                            Simpan Promo
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

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
