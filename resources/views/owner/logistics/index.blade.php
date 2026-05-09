@extends('owner.layouts.app')

@section('title', 'Pickup & Delivery - LaundroMetrics')
@section('header_title', 'Logistik & Pengiriman')

@section('content')
<div class="max-w-container-max mx-auto space-y-6 animate-fade-in" x-data="{ activeTab: 'pickup', modalPickup: false, modalDelivery: false }">
    
    <!-- Tab Navigation -->
    <div class="bg-white dark:bg-inverse-surface rounded-2xl p-2 shadow-sm border border-slate-100 dark:border-slate-800 flex gap-2 w-full sm:w-fit">
        <button 
            @click="activeTab = 'pickup'" 
            :class="activeTab === 'pickup' ? 'bg-primary text-white shadow-md shadow-primary/20' : 'text-slate-500 hover:text-slate-700 hover:bg-slate-50 dark:hover:bg-surface-dim/20'"
            class="px-6 py-2.5 rounded-xl font-semibold transition-all flex items-center gap-2 flex-1 sm:flex-none justify-center">
            <span class="material-symbols-outlined text-[20px]">local_shipping</span>
            Pickup
        </button>
        <button 
            @click="activeTab = 'delivery'" 
            :class="activeTab === 'delivery' ? 'bg-orange-500 text-white shadow-md shadow-orange-500/20' : 'text-slate-500 hover:text-slate-700 hover:bg-slate-50 dark:hover:bg-surface-dim/20'"
            class="px-6 py-2.5 rounded-xl font-semibold transition-all flex items-center gap-2 flex-1 sm:flex-none justify-center">
            <span class="material-symbols-outlined text-[20px]">two_wheeler</span>
            Delivery
        </button>
    </div>

    <!-- TAB: PICKUP -->
    <div x-show="activeTab === 'pickup'" x-transition.opacity.duration.300ms class="space-y-6">
        <div class="bg-white dark:bg-inverse-surface rounded-2xl shadow-sm border border-slate-100 dark:border-slate-800 overflow-hidden">
            <div class="p-5 border-b border-slate-100 dark:border-slate-800 flex justify-between items-center bg-slate-50/50 dark:bg-surface-dim/10">
                <h2 class="text-lg font-bold text-slate-900 dark:text-white flex items-center gap-2">
                    <span class="material-symbols-outlined text-primary">hail</span> Jadwal Penjemputan
                </h2>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50 dark:bg-surface-dim/20 border-b border-slate-100 dark:border-slate-800 text-xs uppercase tracking-wider text-slate-500 dark:text-slate-400 font-semibold">
                            <th class="py-4 px-6">Invoice</th>
                            <th class="py-4 px-6">Customer</th>
                            <th class="py-4 px-6">Alamat</th>
                            <th class="py-4 px-6">Jadwal Pickup</th>
                            <th class="py-4 px-6">Status</th>
                            <th class="py-4 px-6 text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-800 text-sm">
                        <!-- Row 1 -->
                        <tr class="hover:bg-slate-50/50 dark:hover:bg-surface-dim/10 transition-colors group">
                            <td class="py-4 px-6 font-bold text-slate-900 dark:text-white">INV-001</td>
                            <td class="py-4 px-6">
                                <div class="font-semibold text-slate-900 dark:text-white">Arif</div>
                            </td>
                            <td class="py-4 px-6">
                                <p class="text-slate-600 dark:text-slate-400 max-w-[200px] truncate" title="Blitar">Blitar</p>
                            </td>
                            <td class="py-4 px-6">
                                <span class="font-bold text-primary bg-blue-50 dark:bg-blue-900/30 px-2.5 py-1 rounded-lg">09:00</span>
                            </td>
                            <td class="py-4 px-6">
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full border border-orange-200 bg-orange-50 text-orange-600 font-semibold text-xs">
                                    <div class="w-1.5 h-1.5 rounded-full bg-orange-500"></div> Pending
                                </span>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex justify-end items-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                    <button @click="modalPickup = true" class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center hover:bg-blue-100 tooltip" title="Detail Pickup">
                                        <span class="material-symbols-outlined text-[18px]">visibility</span>
                                    </button>
                                    <button class="w-8 h-8 rounded-lg bg-green-50 text-green-600 flex items-center justify-center hover:bg-green-100 tooltip" title="Update Status">
                                        <span class="material-symbols-outlined text-[18px]">sync</span>
                                    </button>
                                </div>
                                <div class="flex lg:hidden justify-end mt-2">
                                    <button @click="modalPickup = true" class="text-primary text-xs font-semibold">Detail &rarr;</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- TAB: DELIVERY -->
    <div x-show="activeTab === 'delivery'" x-transition.opacity.duration.300ms style="display: none;" class="space-y-6">
        <div class="bg-white dark:bg-inverse-surface rounded-2xl shadow-sm border border-slate-100 dark:border-slate-800 overflow-hidden">
            <div class="p-5 border-b border-slate-100 dark:border-slate-800 flex justify-between items-center bg-slate-50/50 dark:bg-surface-dim/10">
                <h2 class="text-lg font-bold text-slate-900 dark:text-white flex items-center gap-2">
                    <span class="material-symbols-outlined text-orange-500">where_to_vote</span> Jadwal Pengantaran
                </h2>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50 dark:bg-surface-dim/20 border-b border-slate-100 dark:border-slate-800 text-xs uppercase tracking-wider text-slate-500 dark:text-slate-400 font-semibold">
                            <th class="py-4 px-6">Invoice</th>
                            <th class="py-4 px-6">Customer</th>
                            <th class="py-4 px-6">Alamat</th>
                            <th class="py-4 px-6">Jadwal Delivery</th>
                            <th class="py-4 px-6">Status</th>
                            <th class="py-4 px-6 text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-800 text-sm">
                        <!-- Row 1 -->
                        <tr class="hover:bg-slate-50/50 dark:hover:bg-surface-dim/10 transition-colors group">
                            <td class="py-4 px-6 font-bold text-slate-900 dark:text-white">INV-001</td>
                            <td class="py-4 px-6">
                                <div class="font-semibold text-slate-900 dark:text-white">Arif</div>
                            </td>
                            <td class="py-4 px-6">
                                <p class="text-slate-600 dark:text-slate-400 max-w-[200px] truncate" title="Blitar">Blitar</p>
                            </td>
                            <td class="py-4 px-6">
                                <span class="font-bold text-orange-600 bg-orange-50 dark:bg-orange-900/30 px-2.5 py-1 rounded-lg">16:00</span>
                            </td>
                            <td class="py-4 px-6">
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full border border-blue-200 bg-blue-50 text-blue-600 font-semibold text-xs">
                                    <div class="w-1.5 h-1.5 rounded-full bg-blue-500 animate-pulse"></div> Sedang Diantar
                                </span>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex justify-end items-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                    <button @click="modalDelivery = true" class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center hover:bg-blue-100 tooltip" title="Detail Delivery">
                                        <span class="material-symbols-outlined text-[18px]">visibility</span>
                                    </button>
                                    <button class="w-8 h-8 rounded-lg bg-green-50 text-green-600 flex items-center justify-center hover:bg-green-100 tooltip" title="Update Status">
                                        <span class="material-symbols-outlined text-[18px]">sync</span>
                                    </button>
                                </div>
                                <div class="flex lg:hidden justify-end mt-2">
                                    <button @click="modalDelivery = true" class="text-primary text-xs font-semibold">Detail &rarr;</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- MODAL: DETAIL PICKUP -->
    <div x-show="modalPickup" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center">
        <div x-show="modalPickup" x-transition.opacity class="absolute inset-0 bg-slate-900/50 backdrop-blur-sm" @click="modalPickup = false"></div>
        <div x-show="modalPickup" x-transition.scale.origin.bottom class="relative bg-white dark:bg-inverse-surface w-full max-w-lg rounded-3xl shadow-2xl overflow-hidden m-4">
            <div class="bg-gradient-to-r from-primary to-blue-600 p-6 text-white flex justify-between items-start">
                <div>
                    <span class="bg-white/20 px-2.5 py-1 rounded-full text-xs font-semibold uppercase tracking-wider mb-2 inline-block">INV-001</span>
                    <h3 class="text-xl font-bold">Detail Pickup</h3>
                </div>
                <button @click="modalPickup = false" class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center hover:bg-white/30 transition-colors">
                    <span class="material-symbols-outlined text-[18px]">close</span>
                </button>
            </div>
            <div class="p-6 space-y-5">
                <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center">
                            <span class="material-symbols-outlined">person</span>
                        </div>
                        <div>
                            <p class="font-bold text-slate-900 text-lg">Arif</p>
                            <p class="text-sm text-slate-500 font-medium">0812-3456-7890</p>
                        </div>
                    </div>
                    <a href="#" class="w-10 h-10 rounded-full bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-200 transition-colors">
                        <span class="material-symbols-outlined">forum</span>
                    </a>
                </div>
                
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-slate-50 rounded-xl p-4">
                        <p class="text-xs font-semibold text-slate-500 uppercase mb-1">Status Pickup</p>
                        <span class="inline-flex items-center gap-1.5 text-orange-600 font-bold">
                            <span class="material-symbols-outlined text-[16px]">pending_actions</span> Pending
                        </span>
                    </div>
                    <div class="bg-slate-50 rounded-xl p-4">
                        <p class="text-xs font-semibold text-slate-500 uppercase mb-1">Jadwal Pickup</p>
                        <p class="font-bold text-slate-900">09:00 WIB</p>
                    </div>
                </div>

                <div>
                    <p class="text-xs font-semibold text-slate-500 uppercase mb-1">Alamat Pickup</p>
                    <p class="text-slate-700 bg-slate-50 p-3 rounded-xl border border-slate-100 text-sm">Blitar</p>
                </div>
                
                <div>
                    <p class="text-xs font-semibold text-slate-500 uppercase mb-1">Catatan Customer</p>
                    <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-3 text-sm text-yellow-800">
                        Tolong ketuk pintu agak keras ya mas.
                    </div>
                </div>

                <button class="w-full bg-primary text-white py-3 rounded-xl font-bold shadow-lg shadow-primary/20 hover:bg-secondary transition-colors mt-2">
                    Update Status: Sedang Diambil
                </button>
            </div>
        </div>
    </div>

    <!-- MODAL: DETAIL DELIVERY -->
    <div x-show="modalDelivery" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center">
        <div x-show="modalDelivery" x-transition.opacity class="absolute inset-0 bg-slate-900/50 backdrop-blur-sm" @click="modalDelivery = false"></div>
        <div x-show="modalDelivery" x-transition.scale.origin.bottom class="relative bg-white dark:bg-inverse-surface w-full max-w-lg rounded-3xl shadow-2xl overflow-hidden m-4">
            <div class="bg-gradient-to-r from-orange-500 to-red-500 p-6 text-white flex justify-between items-start">
                <div>
                    <span class="bg-white/20 px-2.5 py-1 rounded-full text-xs font-semibold uppercase tracking-wider mb-2 inline-block">INV-001</span>
                    <h3 class="text-xl font-bold">Detail Delivery</h3>
                </div>
                <button @click="modalDelivery = false" class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center hover:bg-white/30 transition-colors">
                    <span class="material-symbols-outlined text-[18px]">close</span>
                </button>
            </div>
            <div class="p-6 space-y-5">
                <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-full bg-orange-100 text-orange-600 flex items-center justify-center">
                            <span class="material-symbols-outlined">person</span>
                        </div>
                        <div>
                            <p class="font-bold text-slate-900 text-lg">Arif</p>
                            <p class="text-sm text-slate-500 font-medium">0812-3456-7890</p>
                        </div>
                    </div>
                    <a href="#" class="w-10 h-10 rounded-full bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-200 transition-colors">
                        <span class="material-symbols-outlined">forum</span>
                    </a>
                </div>
                
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-slate-50 rounded-xl p-4">
                        <p class="text-xs font-semibold text-slate-500 uppercase mb-1">Status Delivery</p>
                        <span class="inline-flex items-center gap-1.5 text-blue-600 font-bold">
                            <span class="material-symbols-outlined text-[16px]">local_shipping</span> Sedang Diantar
                        </span>
                    </div>
                    <div class="bg-slate-50 rounded-xl p-4">
                        <p class="text-xs font-semibold text-slate-500 uppercase mb-1">Status Pembayaran</p>
                        <span class="inline-flex items-center gap-1.5 text-green-600 font-bold">
                            <span class="material-symbols-outlined text-[16px]">check_circle</span> Paid
                        </span>
                    </div>
                </div>

                <div>
                    <p class="text-xs font-semibold text-slate-500 uppercase mb-1">Alamat Delivery</p>
                    <p class="text-slate-700 bg-slate-50 p-3 rounded-xl border border-slate-100 text-sm">Blitar</p>
                </div>

                <div class="bg-slate-50 rounded-xl p-4 flex justify-between items-center border border-slate-100">
                    <p class="text-sm font-semibold text-slate-600 uppercase">Total Pembayaran</p>
                    <p class="text-2xl font-extrabold text-slate-900">Rp 27.000</p>
                </div>

                <button class="w-full bg-orange-500 text-white py-3 rounded-xl font-bold shadow-lg shadow-orange-500/20 hover:bg-orange-600 transition-colors mt-2">
                    Tandai Selesai Diantar
                </button>
            </div>
        </div>
    </div>
</div>

<!-- AlpineJS for Interactivity (Tabs & Modals) -->
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
