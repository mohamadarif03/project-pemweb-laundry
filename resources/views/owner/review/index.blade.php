@extends('owner.layouts.app')

@section('title', 'Ulasan Pelanggan - LaundroMetrics')
@section('header_title', 'Ulasan & Penilaian')

@section('content')
<div class="max-w-container-max mx-auto space-y-6 animate-fade-in" x-data="{ modalReview: false }">
    
    <!-- Top Action Bar -->
    <div class="bg-white dark:bg-inverse-surface rounded-2xl p-5 shadow-sm border border-slate-100 dark:border-slate-800 flex flex-col md:flex-row gap-4 items-center justify-between">
        <div class="flex flex-col sm:flex-row gap-4 w-full md:w-auto">
            <div class="relative w-full sm:w-64">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <span class="material-symbols-outlined text-slate-400 text-lg">search</span>
                </div>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari ulasan atau invoice..." class="pl-10 w-full rounded-xl border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-surface-dim/30 text-sm focus:ring-primary focus:border-primary">
            </div>
            <div class="relative w-full sm:w-48">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <span class="material-symbols-outlined text-slate-400 text-lg">star</span>
                </div>
                <form method="GET" action="{{ route('reviews.index') }}" class="flex flex-col sm:flex-row gap-4 w-full md:w-auto">
                    <div class="relative w-full sm:w-64">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="material-symbols-outlined text-slate-400 text-lg">search</span>
                        </div>
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari ulasan atau invoice..." class="pl-10 w-full rounded-xl border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-surface-dim/30 text-sm focus:ring-primary focus:border-primary">
                    </div>
                    <div class="relative w-full sm:w-48">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="material-symbols-outlined text-slate-400 text-lg">star</span>
                        </div>
                        <select name="rating" onchange="this.form.submit()" class="pl-10 w-full rounded-xl border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-surface-dim/30 text-sm focus:ring-primary focus:border-primary appearance-none">
                            <option value="">Semua Rating</option>
                            <option value="5" {{ request('rating') == 5 ? 'selected' : '' }}>⭐⭐⭐⭐⭐</option>
                            <option value="4" {{ request('rating') == 4 ? 'selected' : '' }}>⭐⭐⭐⭐</option>
                            <option value="3" {{ request('rating') == 3 ? 'selected' : '' }}>⭐⭐⭐</option>
                            <option value="2" {{ request('rating') == 2 ? 'selected' : '' }}>⭐⭐</option>
                            <option value="1" {{ request('rating') == 1 ? 'selected' : '' }}>⭐</option>
                        </select>
                    </div>
                    <button type="submit" class="px-4 py-2 bg-primary text-white rounded-xl font-semibold text-sm">Cari</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Review Table -->
    <div class="bg-white dark:bg-inverse-surface rounded-2xl shadow-sm border border-slate-100 dark:border-slate-800 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 dark:bg-surface-dim/20 border-b border-slate-100 dark:border-slate-800 text-xs uppercase tracking-wider text-slate-500 dark:text-slate-400 font-semibold">
                        <th class="py-4 px-6">Customer</th>
                        <th class="py-4 px-6">Invoice</th>
                        <th class="py-4 px-6">Rating</th>
                        <th class="py-4 px-6">Review</th>
                        <th class="py-4 px-6">Date</th>
                        <th class="py-4 px-6 text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-800 text-sm">
                    @forelse($reviews as $review)
                    <tr class="hover:bg-slate-50/50 dark:hover:bg-surface-dim/10 transition-colors group">
                        <td class="py-4 px-6">
                            <div class="font-bold text-slate-900 dark:text-white">{{ $review->customer->name ?? '-' }}</div>
                        </td>
                        <td class="py-4 px-6">
                            <span class="font-mono font-semibold text-primary">{{ $review->order->invoice_code ?? '-' }}</span>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center text-amber-400 text-lg">
                                @for($i = 1; $i <= 5; $i++)
                                    {{ $i <= $review->rating ? '★' : '☆' }}
                                @endfor
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <p class="text-slate-600 dark:text-slate-400 max-w-[250px] truncate">{{ $review->review ?? '-' }}</p>
                        </td>
                        <td class="py-4 px-6 text-slate-500 font-medium">{{ $review->created_at->format('d M Y') }}</td>
                        <td class="py-4 px-6">
                            <div class="flex justify-end items-center gap-2">
                                <button @click="modalReview = true" class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center hover:bg-blue-100" title="Detail">
                                    <span class="material-symbols-outlined text-[18px]">visibility</span>
                                </button>
                                <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" onsubmit="return confirm('Yakin hapus review ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-8 h-8 rounded-lg bg-red-50 text-red-600 flex items-center justify-center hover:bg-red-100" title="Hapus">
                                        <span class="material-symbols-outlined text-[18px]">delete</span>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="py-8 text-center text-slate-400">Belum ada review</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- MODAL: DETAIL REVIEW -->
    <div x-show="modalReview" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center">
        <div x-show="modalReview" x-transition.opacity class="absolute inset-0 bg-slate-900/50 backdrop-blur-sm" @click="modalReview = false"></div>
        <div x-show="modalReview" x-transition.scale.origin.bottom class="relative bg-white dark:bg-inverse-surface w-full max-w-md rounded-3xl shadow-2xl overflow-hidden m-4">
            <div class="p-8">
                <div class="flex justify-between items-start mb-6">
                    <div>
                        <h3 class="text-2xl font-bold text-slate-900 dark:text-white">Detail Ulasan</h3>
                        <p class="text-slate-500 text-sm">Informasi lengkap penilaian pelanggan.</p>
                    </div>
                    <button @click="modalReview = false" class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center hover:bg-slate-200 transition-colors">
                        <span class="material-symbols-outlined text-[18px]">close</span>
                    </button>
                </div>
                
                <div class="space-y-5">
                    <div class="flex items-center gap-4 border-b border-slate-100 pb-5">
                        <div class="w-12 h-12 rounded-full bg-primary/10 text-primary flex items-center justify-center text-xl font-bold">
                            A
                        </div>
                        <div>
                            <p class="font-bold text-slate-900 text-lg">Arif</p>
                            <p class="text-sm text-slate-500 font-medium">0812-3456-7890</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-slate-50 rounded-xl p-3 border border-slate-100">
                            <p class="text-[10px] font-bold text-slate-500 uppercase mb-1">Invoice</p>
                            <p class="font-mono font-bold text-primary">INV-001</p>
                        </div>
                        <div class="bg-slate-50 rounded-xl p-3 border border-slate-100">
                            <p class="text-[10px] font-bold text-slate-500 uppercase mb-1">Tanggal</p>
                            <p class="font-bold text-slate-900">9 Mei 2026</p>
                        </div>
                    </div>

                    <div class="bg-amber-50 border border-amber-100 rounded-xl p-4 flex flex-col items-center justify-center gap-1">
                        <p class="text-[10px] font-bold text-amber-600 uppercase">Rating Penilaian</p>
                        <div class="flex items-center gap-1 text-amber-400 text-2xl">
                            ★★★★★
                        </div>
                    </div>

                    <div>
                        <p class="text-xs font-bold text-slate-500 uppercase mb-2">Komentar Pelanggan</p>
                        <div class="bg-slate-50 border border-slate-200 rounded-xl p-4 text-sm text-slate-700 italic">
                            "Laundry cepat dan bersih"
                        </div>
                    </div>
                </div>
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
