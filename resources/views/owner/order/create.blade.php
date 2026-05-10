@extends('owner.layouts.app')

@section('title', 'Tambah Pesanan Baru - LaundroMetrics')
@section('header_title', 'Tambah Pesanan Baru')

@section('content')
<div class="max-w-4xl mx-auto space-y-6 animate-fade-in" x-data="orderForm()">
    
    <div class="flex items-center gap-3 mb-6">
        <a href="/orders" class="w-10 h-10 rounded-xl bg-white dark:bg-inverse-surface border border-slate-200 dark:border-slate-700 flex items-center justify-center text-slate-500 hover:text-primary hover:border-primary transition-all">
            <span class="material-symbols-outlined">arrow_back</span>
        </a>
        <div>
            <h2 class="text-xl font-bold text-slate-900 dark:text-white">Form Pemesanan Baru</h2>
            <p class="text-sm text-slate-500">Silakan isi detail pesanan pelanggan di bawah ini</p>
        </div>
    </div>

    <form action="#" method="POST" class="space-y-6">
        @csrf
        
        <!-- Informasi Pelanggan -->
        <div class="bg-white dark:bg-inverse-surface rounded-2xl p-6 shadow-sm border border-slate-100 dark:border-slate-800 relative overflow-hidden">
            <div class="absolute top-0 left-0 w-1 h-full bg-blue-500"></div>
            <h3 class="text-lg font-semibold text-slate-800 dark:text-white mb-4 flex items-center gap-2">
                <span class="material-symbols-outlined text-blue-500">person</span>
                Informasi Pelanggan
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div class="space-y-2">
                    <label class="text-sm font-medium text-slate-700 dark:text-slate-300">Pilih Pelanggan <span class="text-red-500">*</span></label>
                    <select class="w-full rounded-xl border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-surface-dim/30 focus:ring-primary focus:border-primary text-sm p-3">
                        <option value="">-- Pilih atau Cari Pelanggan --</option>
                        <option value="1">Arif (08123456789)</option>
                        <option value="2">Budi (08987654321)</option>
                    </select>
                </div>
                
                <div class="space-y-2 flex items-end">
                    <button type="button" class="w-full md:w-auto px-4 py-3 rounded-xl border-2 border-dashed border-primary/50 text-primary bg-primary/5 hover:bg-primary/10 font-semibold text-sm flex items-center justify-center gap-2 transition-colors">
                        <span class="material-symbols-outlined text-lg">person_add</span>
                        Pelanggan Baru
                    </button>
                </div>
            </div>
        </div>

        <!-- Detail Pesanan -->
        <div class="bg-white dark:bg-inverse-surface rounded-2xl p-6 shadow-sm border border-slate-100 dark:border-slate-800 relative overflow-hidden">
            <div class="absolute top-0 left-0 w-1 h-full bg-primary"></div>
            <h3 class="text-lg font-semibold text-slate-800 dark:text-white mb-4 flex items-center gap-2">
                <span class="material-symbols-outlined text-primary">local_laundry_service</span>
                Detail Layanan
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                <div class="space-y-2">
                    <label class="text-sm font-medium text-slate-700 dark:text-slate-300">Layanan <span class="text-red-500">*</span></label>
                    <select x-model="selectedService" class="w-full rounded-xl border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-surface-dim/30 focus:ring-primary focus:border-primary text-sm p-3">
                        <option value="">-- Pilih Layanan --</option>
                        <option value="cuci_setrika">Cuci Setrika (Rp 9.000/kg)</option>
                        <option value="cuci_kering">Cuci Kering (Rp 7.000/kg)</option>
                        <option value="setrika">Setrika Saja (Rp 6.000/kg)</option>
                        <option value="karpet">Cuci Karpet (Rp 15.000/m2)</option>
                    </select>
                </div>
                
                <div class="space-y-2">
                    <label class="text-sm font-medium text-slate-700 dark:text-slate-300">Berat/Jumlah <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <input type="number" x-model="qty" min="1" step="0.1" class="w-full rounded-xl border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-surface-dim/30 focus:ring-primary focus:border-primary text-sm p-3 pr-12" placeholder="0">
                        <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-slate-400 font-medium text-sm">
                            kg/pcs
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                <div class="space-y-2">
                    <label class="text-sm font-medium text-slate-700 dark:text-slate-300">Promo / Diskon</label>
                    <select class="w-full rounded-xl border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-surface-dim/30 focus:ring-primary focus:border-primary text-sm p-3">
                        <option value="">Tidak ada promo</option>
                        <option value="1">Diskon 10% Member Baru</option>
                        <option value="2">Potongan Rp 5.000 (Min. 5kg)</option>
                    </select>
                </div>
                
                <div class="space-y-2">
                    <label class="text-sm font-medium text-slate-700 dark:text-slate-300">Layanan Antar/Jemput</label>
                    <select class="w-full rounded-xl border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-surface-dim/30 focus:ring-primary focus:border-primary text-sm p-3">
                       <option value="pickup">Pickup</option>
                       <option value="delivery">Delivery (+5.000)</option>
                    </select>
                </div>
            </div>

            <div class="space-y-2">
                <label class="text-sm font-medium text-slate-700 dark:text-slate-300">Catatan Khusus (Opsional)</label>
                <textarea rows="2" class="w-full rounded-xl border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-surface-dim/30 focus:ring-primary focus:border-primary text-sm p-3" placeholder="Contoh: Pisahkan pakaian luntur, jangan disetrika terlalu panas..."></textarea>
            </div>
        </div>

        <!-- Pembayaran -->
        <div class="bg-white dark:bg-inverse-surface rounded-2xl p-6 shadow-sm border border-slate-100 dark:border-slate-800 relative overflow-hidden">
            <div class="absolute top-0 left-0 w-1 h-full bg-emerald-500"></div>
            <h3 class="text-lg font-semibold text-slate-800 dark:text-white mb-4 flex items-center gap-2">
                <span class="material-symbols-outlined text-emerald-500">payments</span>
                Pembayaran
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-start">
                <div class="space-y-4">
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-slate-700 dark:text-slate-300">Metode Pembayaran</label>
                        <div class="grid grid-cols-2 gap-3">
                            <label class="relative flex items-center gap-3 p-3 border rounded-xl cursor-pointer hover:bg-slate-50 dark:hover:bg-surface-dim/20 transition-colors"
                                :class="paymentMethod === 'cash' ? 'border-emerald-500 bg-emerald-50/50 dark:bg-emerald-900/10' : 'border-slate-200 dark:border-slate-700'">
                                <input type="radio" name="payment" value="cash" x-model="paymentMethod" class="text-emerald-500 focus:ring-emerald-500">
                                <span class="font-medium text-sm text-slate-700 dark:text-slate-200">Tunai (Cash)</span>
                            </label>
                            <label class="relative flex items-center gap-3 p-3 border rounded-xl cursor-pointer hover:bg-slate-50 dark:hover:bg-surface-dim/20 transition-colors"
                                :class="paymentMethod === 'qris' ? 'border-emerald-500 bg-emerald-50/50 dark:bg-emerald-900/10' : 'border-slate-200 dark:border-slate-700'">
                                <input type="radio" name="payment" value="qris" x-model="paymentMethod" class="text-emerald-500 focus:ring-emerald-500">
                                <span class="font-medium text-sm text-slate-700 dark:text-slate-200">QRIS / Transfer</span>
                            </label>
                        </div>
                    </div>
                    
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-slate-700 dark:text-slate-300">Status Pembayaran</label>
                        <select class="w-full rounded-xl border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-surface-dim/30 focus:ring-emerald-500 focus:border-emerald-500 text-sm p-3">
                            <option value="unpaid">Belum Dibayar</option>
                            <option value="paid">Sudah Lunas</option>
                        </select>
                    </div>
                </div>

                <!-- Ringkasan Harga -->
                <div class="bg-slate-50 dark:bg-surface-dim/30 p-5 rounded-xl border border-slate-100 dark:border-slate-700">
                    <h4 class="font-semibold text-slate-800 dark:text-slate-200 mb-4 border-b border-slate-200 dark:border-slate-700 pb-2">Ringkasan Biaya</h4>
                    
                    <div class="space-y-2 text-sm mb-4">
                        <div class="flex justify-between text-slate-600 dark:text-slate-400">
                            <span>Subtotal Layanan</span>
                            <span x-text="'Rp ' + formatRupiah(subtotal)">Rp 0</span>
                        </div>
                        <div class="flex justify-between text-slate-600 dark:text-slate-400">
                            <span>Biaya Antar/Jemput</span>
                            <span>Rp 0</span>
                        </div>
                        <div class="flex justify-between text-red-500">
                            <span>Diskon/Promo</span>
                            <span>- Rp 0</span>
                        </div>
                    </div>
                    
                    <div class="flex justify-between items-center border-t border-slate-200 dark:border-slate-700 pt-3">
                        <span class="font-bold text-slate-800 dark:text-white">Total Tagihan</span>
                        <span class="font-bold text-xl text-emerald-600 dark:text-emerald-400" x-text="'Rp ' + formatRupiah(subtotal)">Rp 0</span>
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
                Simpan Pesanan
            </button>
        </div>
    </form>
</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('orderForm', () => ({
            selectedService: '',
            qty: '',
            paymentMethod: 'cash',
            
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
