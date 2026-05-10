@extends('owner.layouts.app')

@section('title', 'Tambah Pelanggan Baru - LaundroMetrics')
@section('header_title', 'Tambah Pelanggan Baru')

@section('content')
<div class="max-w-4xl mx-auto space-y-6 animate-fade-in">
    
    <div class="flex items-center gap-3 mb-6">
        <a href="/customers" class="w-10 h-10 rounded-xl bg-white dark:bg-inverse-surface border border-slate-200 dark:border-slate-700 flex items-center justify-center text-slate-500 hover:text-primary hover:border-primary transition-all">
            <span class="material-symbols-outlined">arrow_back</span>
        </a>
        <div>
            <h2 class="text-xl font-bold text-slate-900 dark:text-white">Form Pelanggan Baru</h2>
            <p class="text-sm text-slate-500">Silakan isi data diri pelanggan dengan lengkap</p>
        </div>
    </div>

    <form action="#" method="POST" class="space-y-6">
        @csrf
        
        <!-- Informasi Utama -->
        <div class="bg-white dark:bg-inverse-surface rounded-2xl p-6 shadow-sm border border-slate-100 dark:border-slate-800 relative overflow-hidden">
            <div class="absolute top-0 left-0 w-1 h-full bg-primary"></div>
            <h3 class="text-lg font-semibold text-slate-800 dark:text-white mb-5 flex items-center gap-2">
                <span class="material-symbols-outlined text-primary">person</span>
                Informasi Utama
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                <div class="space-y-2">
                    <label class="text-sm font-medium text-slate-700 dark:text-slate-300">Nama Lengkap <span class="text-red-500">*</span></label>
                    <input type="text" name="name" class="w-full rounded-xl border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-surface-dim/30 focus:ring-primary focus:border-primary text-sm p-3" placeholder="Contoh: Budi Santoso" required>
                </div>
                
                <div class="space-y-2">
                    <label class="text-sm font-medium text-slate-700 dark:text-slate-300">Nomor Telepon/WhatsApp <span class="text-red-500">*</span></label>
                    <div class="flex">
                        <span class="inline-flex items-center px-4 rounded-l-xl border border-r-0 border-slate-200 dark:border-slate-700 bg-slate-100 dark:bg-surface-dim/50 text-slate-500 sm:text-sm">
                            +62
                        </span>
                        <input type="tel" name="phone" class="w-full rounded-r-xl border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-surface-dim/30 focus:ring-primary focus:border-primary text-sm p-3" placeholder="81234567890" required>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div class="space-y-2">
                    <label class="text-sm font-medium text-slate-700 dark:text-slate-300">Alamat Email (Opsional)</label>
                    <input type="email" name="email" class="w-full rounded-xl border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-surface-dim/30 focus:ring-primary focus:border-primary text-sm p-3" placeholder="budi@example.com">
                </div>
                
                <div class="space-y-2">
                    <label class="text-sm font-medium text-slate-700 dark:text-slate-300">Kategori Pelanggan</label>
                    <select name="category" class="w-full rounded-xl border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-surface-dim/30 focus:ring-primary focus:border-primary text-sm p-3">
                        <option value="regular">Regular</option>
                        <option value="premium">Premium</option>
                        <option value="new" selected>Member Baru</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Detail Alamat -->
        <div class="bg-white dark:bg-inverse-surface rounded-2xl p-6 shadow-sm border border-slate-100 dark:border-slate-800 relative overflow-hidden">
            <div class="absolute top-0 left-0 w-1 h-full bg-blue-500"></div>
            <h3 class="text-lg font-semibold text-slate-800 dark:text-white mb-5 flex items-center gap-2">
                <span class="material-symbols-outlined text-blue-500">location_on</span>
                Alamat Pelanggan
            </h3>
            
            <div class="space-y-2">
                <label class="text-sm font-medium text-slate-700 dark:text-slate-300">Alamat Lengkap <span class="text-red-500">*</span></label>
                <textarea name="address" rows="3" class="w-full rounded-xl border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-surface-dim/30 focus:ring-primary focus:border-primary text-sm p-3" placeholder="Contoh: Jl. Sudirman No. 123, RT 01/RW 02, Kec. Melati, Kota Jakarta" required></textarea>
                <p class="text-xs text-slate-500 mt-1">Alamat ini akan digunakan untuk keperluan antar-jemput laundry.</p>
            </div>
        </div>

        <div class="flex justify-end gap-3 pt-4">
            <a href="/customers" class="px-6 py-2.5 rounded-xl font-semibold text-slate-600 bg-white border border-slate-200 hover:bg-slate-50 transition-colors">
                Batal
            </a>
            <button type="submit" class="px-6 py-2.5 rounded-xl font-semibold text-white bg-primary hover:bg-secondary shadow-lg shadow-primary/30 transition-all flex items-center gap-2">
                <span class="material-symbols-outlined text-[20px]">save</span>
                Simpan Pelanggan
            </button>
        </div>
    </form>
</div>

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
