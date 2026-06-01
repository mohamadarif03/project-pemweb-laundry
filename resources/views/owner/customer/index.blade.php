@extends('owner.layouts.app')

@section('title', 'Data Pelanggan - LaundroMetrics')
@section('header_title', 'Manajemen Pelanggan')

@section('content')
<div class="max-w-container-max mx-auto space-y-6 animate-fade-in" x-data="{ modalCustomer: false }">
    
    <div class="bg-white dark:bg-inverse-surface rounded-2xl p-5 shadow-sm border border-slate-100 dark:border-slate-800 flex flex-col md:flex-row gap-4 items-center justify-between">
        <form method="GET" action="{{ route('customers.index') }}" class="flex flex-col sm:flex-row gap-4 w-full md:w-auto">
            <div class="relative w-full sm:w-64">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <span class="material-symbols-outlined text-slate-400 text-lg">search</span>
                </div>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama atau telepon..." class="pl-10 w-full rounded-xl border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-surface-dim/30 text-sm focus:ring-primary focus:border-primary">
            </div>
            <div class="relative w-full sm:w-48">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <span class="material-symbols-outlined text-slate-400 text-lg">filter_alt</span>
                </div>
                <select name="category" onchange="this.form.submit()" class="pl-10 pr-8 w-full rounded-xl border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-surface-dim/30 text-sm focus:ring-primary focus:border-primary appearance-none">
                    <option value="">Semua Kategori</option>
                    <option value="regular" {{ request('category') == 'regular' ? 'selected' : '' }}>Regular</option>
                    <option value="premium" {{ request('category') == 'premium' ? 'selected' : '' }}>Premium</option>
                    <option value="new" {{ request('category') == 'new' ? 'selected' : '' }}>Baru</option>
                </select>
            </div>
        </form>
        
        <button @click="modalCustomer = true" class="w-full md:w-auto bg-primary text-white px-6 py-2.5 rounded-xl font-semibold shadow-lg shadow-primary/30 hover:bg-secondary transition-all flex items-center justify-center gap-2 group">
            <span class="material-symbols-outlined text-lg group-hover:rotate-90 transition-transform">person_add</span>
            Tambah Pelanggan
        </button>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-200 text-green-700 px-4 py-3 rounded-xl">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white dark:bg-inverse-surface rounded-2xl shadow-sm border border-slate-100 dark:border-slate-800 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 dark:bg-surface-dim/20 border-b border-slate-100 dark:border-slate-800 text-xs uppercase tracking-wider text-slate-500 dark:text-slate-400 font-semibold">
                        <th class="py-4 px-6">Pelanggan</th>
                        <th class="py-4 px-6">Kontak</th>
                        <th class="py-4 px-6">Alamat</th>
                        <th class="py-4 px-6">Total Order</th>
                        <th class="py-4 px-6">Bergabung</th>
                        <th class="py-4 px-6 text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-800 text-sm">
                    @forelse($customers as $customer)
                    <tr x-data="{ modalDetail: false }" class="hover:bg-slate-50/50 dark:hover:bg-surface-dim/10 transition-colors group">
                        <td class="py-4 px-6">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-primary/10 text-primary flex items-center justify-center font-bold">
                                    {{ strtoupper(substr($customer->name, 0, 2)) }}
                                </div>
                                <div>
                                    <div class="font-bold text-slate-900 dark:text-white">{{ $customer->name }}</div>
                                    @if($customer->orders_count >= 10)
                                        <span class="text-[10px] px-2 py-0.5 rounded bg-green-100 text-green-700 font-bold uppercase tracking-wider">Premium</span>
                                    @elseif($customer->orders_count >= 1)
                                        <span class="text-[10px] px-2 py-0.5 rounded bg-blue-100 text-blue-700 font-bold uppercase tracking-wider">Regular</span>
                                    @else
                                        <span class="text-[10px] px-2 py-0.5 rounded bg-slate-100 text-slate-700 font-bold uppercase tracking-wider">Baru</span>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex flex-col">
                                <span class="font-medium text-slate-700 dark:text-slate-300">{{ $customer->phone }}</span>
                                <span class="text-xs text-slate-400">{{ strtolower(str_replace(' ', '', $customer->name)) }}@email.com</span>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <p class="text-slate-600 dark:text-slate-400 max-w-[200px] truncate" title="{{ $customer->address }}">{{ $customer->address }}</p>
                        </td>
                        <td class="py-4 px-6 font-bold text-slate-900 dark:text-white">{{ $customer->orders_count }} Order</td>
                        <td class="py-4 px-6 text-slate-500">{{ $customer->created_at->format('d M Y') }}</td>
                        <td class="py-4 px-6">
                            <div class="flex justify-end items-center gap-2">
                                <button @click="modalDetail = true" class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center hover:bg-blue-100 tooltip" title="Detail Pelanggan">
                                    <span class="material-symbols-outlined text-[18px]">visibility</span>
                                </button>
                                <a href="{{ route('customers.edit', $customer->id) }}" class="w-8 h-8 rounded-lg bg-slate-100 text-slate-600 flex items-center justify-center hover:bg-slate-200 tooltip" title="Edit">
                                    <span class="material-symbols-outlined text-[18px]">edit</span>
                                </a>
                                <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pelanggan ini?')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-8 h-8 rounded-lg bg-red-50 text-red-600 flex items-center justify-center hover:bg-red-100 tooltip" title="Hapus">
                                        <span class="material-symbols-outlined text-[18px]">delete</span>
                                    </button>
                                </form>
                            </div>
                        </td>

                        <td class="p-0 border-0">
                            <div x-show="modalDetail" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center">
                                <div x-show="modalDetail" x-transition.opacity class="absolute inset-0 bg-slate-900/50 backdrop-blur-sm" @click="modalDetail = false"></div>
                                <div x-show="modalDetail" x-transition.scale.origin.bottom class="relative bg-white dark:bg-inverse-surface w-full max-w-2xl rounded-3xl shadow-2xl overflow-hidden m-4 text-left">
                                    <div class="bg-gradient-to-r from-primary to-blue-600 p-8 text-white">
                                        <div class="flex justify-between items-start mb-6">
                                            <div class="flex items-center gap-4">
                                                <div class="w-20 h-20 rounded-2xl bg-white/20 backdrop-blur-md flex items-center justify-center text-3xl font-bold border border-white/30">
                                                    {{ strtoupper(substr($customer->name, 0, 2)) }}
                                                </div>
                                                <div>
                                                    <h3 class="text-2xl font-bold">{{ $customer->name }}</h3>
                                                    <p class="text-blue-100">Member sejak {{ $customer->created_at->format('M Y') }}</p>
                                                </div>
                                            </div>
                                            <button @click="modalDetail = false" class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center hover:bg-white/30 transition-colors">
                                                <span class="material-symbols-outlined text-[18px]">close</span>
                                            </button>
                                        </div>
                                        <div class="grid grid-cols-3 gap-4">
                                            <div class="bg-white/10 rounded-xl p-3 border border-white/10">
                                                <p class="text-[10px] uppercase font-bold text-blue-200">Total Order</p>
                                                <p class="text-xl font-bold">{{ $customer->orders_count }}</p>
                                            </div>
                                            <div class="bg-white/10 rounded-xl p-3 border border-white/10">
                                                <p class="text-[10px] uppercase font-bold text-blue-200">Total Pengeluaran</p>
                                                <p class="text-xl font-bold">Rp {{ number_format($customer->orders->sum('total_price') / 1000, 0) }}k</p>
                                            </div>
                                            <div class="bg-white/10 rounded-xl p-3 border border-white/10">
                                                <p class="text-[10px] uppercase font-bold text-blue-200">Loyalty Points</p>
                                                <p class="text-xl font-bold">{{ $customer->orders_count * 10 }} pts</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-8 space-y-6">
                                        <div class="grid grid-cols-2 gap-8 text-sm">
                                            <div class="space-y-4">
                                                <h4 class="font-bold text-slate-900 dark:text-white uppercase tracking-wider text-xs border-b pb-2">Informasi Kontak</h4>
                                                <div class="space-y-3">
                                                    <div class="flex items-center gap-3">
                                                        <span class="material-symbols-outlined text-slate-400">phone</span>
                                                        <span class="text-slate-700">{{ $customer->phone }}</span>
                                                    </div>
                                                    <div class="flex items-center gap-3">
                                                        <span class="material-symbols-outlined text-slate-400">mail</span>
                                                        <span class="text-slate-700">{{ strtolower(str_replace(' ', '', $customer->name)) }}@email.com</span>
                                                    </div>
                                                    <div class="flex items-start gap-3">
                                                        <span class="material-symbols-outlined text-slate-400">location_on</span>
                                                        <span class="text-slate-700">{{ $customer->address }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="space-y-4">
                                                <h4 class="font-bold text-slate-900 dark:text-white uppercase tracking-wider text-xs border-b pb-2">Pesanan Terakhir</h4>
                                                @if($customer->orders->isNotEmpty())
                                                    @php $lastOrder = $customer->orders->last(); @endphp
                                                    <div class="bg-slate-50 dark:bg-surface-dim/20 rounded-2xl p-4 border border-slate-100">
                                                        <div class="flex justify-between items-center mb-2">
                                                            <span class="font-bold text-primary">{{ $lastOrder->invoice_code }}</span>
                                                            <span class="text-[10px] px-2 py-0.5 rounded bg-orange-100 text-orange-600 font-bold uppercase">{{ $lastOrder->laundry_status }}</span>
                                                        </div>
                                                        <p class="text-xs text-slate-600">{{ $lastOrder->service->name ?? 'Layanan' }} ({{ $lastOrder->weight }}kg)</p>
                                                        <p class="text-[10px] text-slate-400 mt-2">{{ $lastOrder->created_at->format('d M Y, H:i') }}</p>
                                                    </div>
                                                @else
                                                    <p class="text-xs text-slate-400 italic">Belum ada pesanan.</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="flex gap-3">
                                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $customer->phone) }}" target="_blank" class="flex-1 bg-primary text-white py-3 rounded-xl font-bold shadow-lg shadow-primary/20 hover:bg-secondary text-center">
                                                Hubungi via WhatsApp
                                            </a>
                                            <button @click="modalDetail = false" class="flex-1 border border-slate-200 text-slate-700 py-3 rounded-xl font-bold hover:bg-slate-50 transition-colors">
                                                Tutup
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="py-8 text-center text-slate-400 italic">Tidak ada data pelanggan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div x-show="modalCustomer" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center">
        <div x-show="modalCustomer" x-transition.opacity class="absolute inset-0 bg-slate-900/50 backdrop-blur-sm" @click="modalCustomer = false"></div>
        <div x-show="modalCustomer" x-transition.scale.origin.bottom class="relative bg-white dark:bg-inverse-surface w-full max-w-xl rounded-3xl shadow-2xl overflow-hidden m-4 text-left">
            <div class="p-8">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-2xl font-bold">Tambah Pelanggan</h3>
                    <button @click="modalCustomer = false" class="text-xl font-bold">✕</button>
                </div>
                <form action="{{ route('customers.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <input type="text" name="name" placeholder="Nama" class="w-full rounded-xl border-slate-200 p-3" required>
                    <input type="text" name="phone" placeholder="Nomor HP" class="w-full rounded-xl border-slate-200 p-3" required>
                    <textarea name="address" placeholder="Alamat" class="w-full rounded-xl border-slate-200 p-3" required></textarea>
                    <button type="submit" class="w-full bg-primary text-white py-3 rounded-xl font-bold">
                        Simpan Pelanggan
                    </button>
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
</style>
@endsection