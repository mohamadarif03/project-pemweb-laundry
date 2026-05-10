@extends('owner.layouts.app')

@section('title', 'Edit Pesanan - LaundroMetrics')
@section('header_title', 'Edit Pesanan: INV-001')

@section('content')
<div class="max-w-4xl mx-auto space-y-6 animate-fade-in" x-data="editOrderForm()">
    
    <div class="flex items-center gap-3 mb-6 flex-wrap justify-between">
        <div class="flex items-center gap-3">
            <a href="/orders" class="w-10 h-10 rounded-xl bg-white dark:bg-inverse-surface border border-slate-200 dark:border-slate-700 flex items-center justify-center text-slate-500 hover:text-primary hover:border-primary transition-all">
                <span class="material-symbols-outlined">arrow_back</span>
            </a>
            <div>
                <h2 class="text-xl font-bold text-slate-900 dark:text-white flex items-center gap-2">
                    Edit Pesanan <span class="bg-primary/10 text-primary px-2 py-0.5 rounded text-sm">INV-001</span>
                </h2>
                <p class="text-sm text-slate-500">Perbarui detail, status, dan pembayaran pesanan</p>
            </div>
        </div>
        
        <div class="flex gap-2">
            <button type="button" class="px-4 py-2 bg-red-50 text-red-600 rounded-xl font-semibold text-sm hover:bg-red-100 transition-colors flex items-center gap-2">
                <span class="material-symbols-outlined text-[18px]">delete</span>
                Hapus
            </button>
            <button type="button" class="px-4 py-2 bg-slate-100 text-slate-700 rounded-xl font-semibold text-sm hover:bg-slate-200 transition-colors flex items-center gap-2">
                <span class="material-symbols-outlined text-[18px]">print</span>
                Cetak Nota
            </button>
        </div>
    </div>

    <form action="#" method="POST" class="space-y-6">
        @csrf
        @method('PUT')
        
        <!-- Status Order (Fitur Utama Edit) -->
        <div class="bg-white dark:bg-inverse-surface rounded-2xl p-6 shadow-sm border border-slate-100 dark:border-slate-800 relative overflow-hidden">
            <div class="absolute top-0 left-0 w-1 h-full bg-orange-500"></div>
            <h3 class="text-lg font-semibold text-slate-800 dark:text-white mb-5 flex items-center gap-2">
                <span class="material-symbols-outlined text-orange-500">pending_actions</span>
                Update Status Pesanan
            </h3>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <label class="relative flex flex-col items-center gap-2 p-4 border rounded-xl cursor-pointer hover:bg-slate-50 dark:hover:bg-surface-dim/20 transition-all text-center"
                    :class="orderStatus === 'masuk' ? 'border-blue-500 bg-blue-50/50 dark:bg-blue-900/10 ring-2 ring-blue-500/20' : 'border-slate-200 dark:border-slate-700'">
                    <input type="radio" name="status" value="masuk" x-model="orderStatus" class="sr-only">
                    <span class="material-symbols-outlined text-2xl" :class="orderStatus === 'masuk' ? 'text-blue-500' : 'text-slate-400'">inbox</span>
                    <span class="font-semibold text-sm" :class="orderStatus === 'masuk' ? 'text-blue-700 dark:text-blue-400' : 'text-slate-600 dark:text-slate-400'">Order Masuk</span>
                </label>
                
                <label class="relative flex flex-col items-center gap-2 p-4 border rounded-xl cursor-pointer hover:bg-slate-50 dark:hover:bg-surface-dim/20 transition-all text-center"
                    :class="orderStatus === 'dicuci' ? 'border-orange-500 bg-orange-50/50 dark:bg-orange-900/10 ring-2 ring-orange-500/20' : 'border-slate-200 dark:border-slate-700'">
                    <input type="radio" name="status" value="dicuci" x-model="orderStatus" class="sr-only">
                    <div class="relative">
                        <span class="material-symbols-outlined text-2xl" :class="orderStatus === 'dicuci' ? 'text-orange-500' : 'text-slate-400'">water_drop</span>
                        <div x-show="orderStatus === 'dicuci'" class="absolute -top-1 -right-1 w-2 h-2 rounded-full bg-orange-500 animate-ping"></div>
                    </div>
                    <span class="font-semibold text-sm" :class="orderStatus === 'dicuci' ? 'text-orange-700 dark:text-orange-400' : 'text-slate-600 dark:text-slate-400'">Sedang Dicuci</span>
                </label>

                <label class="relative flex flex-col items-center gap-2 p-4 border rounded-xl cursor-pointer hover:bg-slate-50 dark:hover:bg-surface-dim/20 transition-all text-center"
                    :class="orderStatus === 'disetrika' ? 'border-purple-500 bg-purple-50/50 dark:bg-purple-900/10 ring-2 ring-purple-500/20' : 'border-slate-200 dark:border-slate-700'">
                    <input type="radio" name="status" value="disetrika" x-model="orderStatus" class="sr-only">
                    <span class="material-symbols-outlined text-2xl" :class="orderStatus === 'disetrika' ? 'text-purple-500' : 'text-slate-400'">iron</span>
                    <span class="font-semibold text-sm" :class="orderStatus === 'disetrika' ? 'text-purple-700 dark:text-purple-400' : 'text-slate-600 dark:text-slate-400'">Disetrika</span>
                </label>

                <label class="relative flex flex-col items-center gap-2 p-4 border rounded-xl cursor-pointer hover:bg-slate-50 dark:hover:bg-surface-dim/20 transition-all text-center"
                    :class="orderStatus === 'selesai' ? 'border-emerald-500 bg-emerald-50/50 dark:bg-emerald-900/10 ring-2 ring-emerald-500/20' : 'border-slate-200 dark:border-slate-700'">
                    <input type="radio" name="status" value="selesai" x-model="orderStatus" class="sr-only">
                    <span class="material-symbols-outlined text-2xl" :class="orderStatus === 'selesai' ? 'text-emerald-500' : 'text-slate-400'">task_alt</span>
                    <span class="font-semibold text-sm" :class="orderStatus === 'selesai' ? 'text-emerald-700 dark:text-emerald-400' : 'text-slate-600 dark:text-slate-400'">Selesai</span>
                </label>
            </div>
        </div>

        <!-- Detail Layanan & Harga -->
        <div class="bg-white dark:bg-inverse-surface rounded-2xl shadow-sm border border-slate-100 dark:border-slate-800 overflow-hidden">
            <div class="p-6 border-b border-slate-100 dark:border-slate-800 flex justify-between items-center bg-slate-50/50 dark:bg-surface-dim/10">
                <h3 class="text-lg font-semibold text-slate-800 dark:text-white flex items-center gap-2">
                    <span class="material-symbols-outlined text-primary">edit_note</span>
                    Data Pesanan
                </h3>
                <span class="text-xs font-semibold bg-slate-200 dark:bg-slate-700 text-slate-600 dark:text-slate-300 px-2 py-1 rounded">Dibuat: 10 Mei 2026</span>
            </div>
            
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-slate-700 dark:text-slate-300">Pelanggan</label>
                        <select class="w-full rounded-xl border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-surface-dim/30 focus:ring-primary focus:border-primary text-sm p-3">
                            <option value="1" selected>Arif (08123456789)</option>
                            <option value="2">Budi (08987654321)</option>
                        </select>
                    </div>
                    
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-slate-700 dark:text-slate-300">Layanan</label>
                        <select x-model="selectedService" class="w-full rounded-xl border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-surface-dim/30 focus:ring-primary focus:border-primary text-sm p-3">
                            <option value="cuci_setrika">Cuci Setrika (Rp 9.000/kg)</option>
                            <option value="cuci_kering">Cuci Kering (Rp 7.000/kg)</option>
                            <option value="setrika">Setrika Saja (Rp 6.000/kg)</option>
                            <option value="karpet">Cuci Karpet (Rp 15.000/m2)</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-slate-700 dark:text-slate-300">Berat/Jumlah (kg/pcs)</label>
                        <input type="number" x-model="qty" min="1" step="0.1" class="w-full rounded-xl border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-surface-dim/30 focus:ring-primary focus:border-primary text-sm p-3">
                    </div>
                    
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-slate-700 dark:text-slate-300">Promo / Diskon</label>
                        <select class="w-full rounded-xl border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-surface-dim/30 focus:ring-primary focus:border-primary text-sm p-3">
                            <option value="">Tidak ada promo</option>
                            <option value="1">Diskon 10% Member Baru</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pembayaran -->
        <div class="bg-white dark:bg-inverse-surface rounded-2xl p-6 shadow-sm border border-slate-100 dark:border-slate-800">
            <h3 class="text-lg font-semibold text-slate-800 dark:text-white mb-4 flex items-center gap-2">
                <span class="material-symbols-outlined text-emerald-500">payments</span>
                Status Pembayaran
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center">
                <div class="space-y-4">
                    <div class="flex items-center gap-4">
                        <label class="text-sm font-medium text-slate-700 dark:text-slate-300 w-24">Status:</label>
                        <select class="flex-1 rounded-xl border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-surface-dim/30 focus:ring-emerald-500 focus:border-emerald-500 text-sm p-2.5 font-semibold"
                                :class="paymentStatus === 'paid' ? 'text-emerald-600 dark:text-emerald-400' : 'text-orange-500'" x-model="paymentStatus">
                            <option value="unpaid">Belum Dibayar</option>
                            <option value="paid">Sudah Lunas</option>
                        </select>
                    </div>
                    
                    <div class="flex items-center gap-4">
                        <label class="text-sm font-medium text-slate-700 dark:text-slate-300 w-24">Metode:</label>
                        <select class="flex-1 rounded-xl border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-surface-dim/30 focus:ring-primary focus:border-primary text-sm p-2.5">
                            <option value="cash" selected>Tunai (Cash)</option>
                            <option value="qris">QRIS / Transfer</option>
                        </select>
                    </div>
                </div>

                <!-- Ringkasan Update -->
                <div class="bg-slate-50 dark:bg-surface-dim/30 p-5 rounded-xl border border-slate-100 dark:border-slate-700 text-right">
                    <p class="text-sm text-slate-500 dark:text-slate-400 mb-1">Total Tagihan Keseluruhan</p>
                    <h4 class="font-bold text-2xl text-slate-800 dark:text-white" x-text="'Rp ' + formatRupiah(subtotal)">Rp 27.000</h4>
                    
                    <div class="mt-2 inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-xs font-semibold"
                         :class="paymentStatus === 'paid' ? 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400' : 'bg-orange-100 text-orange-700 dark:bg-orange-900/30 dark:text-orange-400'">
                        <span class="material-symbols-outlined text-[14px]" x-text="paymentStatus === 'paid' ? 'check_circle' : 'schedule'"></span>
                        <span x-text="paymentStatus === 'paid' ? 'LUNAS' : 'BELUM DIBAYAR'"></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-end gap-3 pt-4">
            <a href="/orders" class="px-6 py-2.5 rounded-xl font-semibold text-slate-600 bg-white border border-slate-200 hover:bg-slate-50 transition-colors">
                Batal
            </a>
            <button type="submit" class="px-6 py-2.5 rounded-xl font-semibold text-white bg-primary hover:bg-secondary shadow-lg shadow-primary/30 transition-all flex items-center gap-2">
                <span class="material-symbols-outlined text-[20px]">save</span>
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('editOrderForm', () => ({
            orderStatus: 'dicuci', // Default value for this edit example
            selectedService: 'cuci_setrika',
            qty: '3',
            paymentStatus: 'paid', // Default from index view
            
            get subtotal() {
                // Harga dummy, sesuaikan dengan backend
                const prices = {
                    'cuci_setrika': 9000,
                    'cuci_kering': 7000,
                    'setrika': 6000,
                    'karpet': 15000
                };
                
                let price = prices[this.selectedService] || 0;
                let quantity = parseFloat(this.qty) || 0;
                
                return price * quantity;
            },
            
            formatRupiah(number) {
                return new Intl.NumberFormat('id-ID').format(number);
            }
        }))
    })
</script>

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
