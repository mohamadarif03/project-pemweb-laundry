@extends('owner.layouts.app')

@section('title', 'Edit Data Pelanggan - LaundroMetrics')
@section('header_title', 'Edit Pelanggan: ' . $customer->name)

@section('content')
<div class="max-w-4xl mx-auto space-y-6 animate-fade-in">
    
    <div class="flex items-center gap-3 mb-6 flex-wrap justify-between">
        <div class="flex items-center gap-3">
            <a href="/customers" class="w-10 h-10 rounded-xl bg-white dark:bg-inverse-surface border border-slate-200 dark:border-slate-700 flex items-center justify-center text-slate-500 hover:text-primary hover:border-primary transition-all">
                <span class="material-symbols-outlined">arrow_back</span>
            </a>
            <div>
                <h2 class="text-xl font-bold text-slate-900 dark:text-white flex items-center gap-2">
                    Edit Profil 
                    @if($customer->orders()->count() >= 10)
                        <span class="bg-primary/10 text-primary px-2 py-0.5 rounded text-sm">Premium</span>
                    @elseif($customer->orders()->count() >= 1)
                        <span class="bg-blue-100 text-blue-700 px-2 py-0.5 rounded text-sm">Regular</span>
                    @else
                        <span class="bg-slate-100 text-slate-700 px-2 py-0.5 rounded text-sm">Baru</span>
                    @endif
                </h2>
                <p class="text-sm text-slate-500">Perbarui informasi kontak dan alamat pelanggan</p>
            </div>
        </div>
        
        <div class="flex gap-2">
            <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pelanggan ini?')" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 bg-red-50 text-red-600 rounded-xl font-semibold text-sm hover:bg-red-100 transition-colors flex items-center gap-2">
                    <span class="material-symbols-outlined text-[18px]">delete</span>
                    Hapus
                </button>
            </form>
        </div>
    </div>

    <form action="{{ route('customers.update', $customer->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')
        
        <div class="bg-white dark:bg-inverse-surface rounded-2xl p-6 shadow-sm border border-slate-100 dark:border-slate-800 relative overflow-hidden">
            <div class="absolute top-0 left-0 w-1 h-full bg-primary"></div>
            
            <div class="flex items-center gap-4 mb-6 p-4 bg-slate-50 dark:bg-surface-dim/20 rounded-xl border border-slate-100 dark:border-slate-800">
                <div class="w-16 h-16 rounded-full bg-primary/10 text-primary flex items-center justify-center text-xl font-bold">
                    {{ strtoupper(substr($customer->name, 0, 2)) }}
                </div>
                <div>
                    <h4 class="font-bold text-slate-800 dark:text-white">{{ $customer->name }}</h4>
                    <p class="text-xs text-slate-500">Bergabung sejak: {{ $customer->created_at->format('d M Y') }}</p>
                </div>
            </div>

            <h3 class="text-lg font-semibold text-slate-800 dark:text-white mb-5 flex items-center gap-2">
                <span class="material-symbols-outlined text-primary">person</span>
                Informasi Utama
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                <div class="space-y-2">
                    <label class="text-sm font-medium text-slate-700 dark:text-slate-300">Nama Lengkap <span class="text-red-500">*</span></label>
                    <input type="text" name="name" value="{{ old('name', $customer->name) }}" class="w-full rounded-xl border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-surface-dim/30 focus:ring-primary focus:border-primary text-sm p-3" required>
                    @error('name')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="space-y-2">
                    <label class="text-sm font-medium text-slate-700 dark:text-slate-300">Nomor Telepon/WhatsApp <span class="text-red-500">*</span></label>
                    <div class="flex">
                        <span class="inline-flex items-center px-4 rounded-l-xl border border-r-0 border-slate-200 dark:border-slate-700 bg-slate-100 dark:bg-surface-dim/50 text-slate-500 sm:text-sm">
                            +62
                        </span>
                        <input type="tel" name="phone" value="{{ old('phone', preg_replace('/^\+62|^62|^0/', '', $customer->phone)) }}" class="w-full rounded-r-xl border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-surface-dim/30 focus:ring-primary focus:border-primary text-sm p-3" required>
                    </div>
                    @error('phone')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div class="space-y-2">
                    <label class="text-sm font-medium text-slate-700 dark:text-slate-300">Alamat Email (Opsional)</label>
                    <input type="email" name="email" value="{{ old('email', strtolower(str_replace(' ', '', $customer->name)) . '@email.com') }}" class="w-full rounded-xl border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-surface-dim/30 focus:ring-primary focus:border-primary text-sm p-3">
                </div>
                
                <div class="space-y-2">
                    <label class="text-sm font-medium text-slate-700 dark:text-slate-300">Kategori Pelanggan</label>
                    <select name="category" class="w-full rounded-xl border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-surface-dim/30 focus:ring-primary focus:border-primary text-sm p-3">
                        <option value="regular" {{ $customer->orders()->count() < 10 && $customer->orders()->count() >= 1 ? 'selected' : '' }}>Regular</option>
                        <option value="premium" {{ $customer->orders()->count() >= 10 ? 'selected' : '' }}>Premium</option>
                        <option value="new" {{ $customer->orders()->count() == 0 ? 'selected' : '' }}>Member Baru</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-inverse-surface rounded-2xl p-6 shadow-sm border border-slate-100 dark:border-slate-800 relative overflow-hidden">
            <div class="absolute top-0 left-0 w-1 h-full bg-blue-500"></div>
            <h3 class="text-lg font-semibold text-slate-800 dark:text-white mb-5 flex items-center gap-2">
                <span class="material-symbols-outlined text-blue-500">location_on</span>
                Alamat Pelanggan
            </h3>
            
            <div class="space-y-2">
                <label class="text-sm font-medium text-slate-700 dark:text-slate-300">Alamat Lengkap <span class="text-red-500">*</span></label>
                <textarea name="address" rows="3" class="w-full rounded-xl border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-surface-dim/30 focus:ring-primary focus:border-primary text-sm p-3" required>{{ old('address', $customer->address) }}</textarea>
                @error('address')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="flex justify-end gap-3 pt-4">
            <a href="/customers" class="px-6 py-2.5 rounded-xl font-semibold text-slate-600 bg-white border border-slate-200 hover:bg-slate-50 transition-colors">
                Batal
            </a>
            <button type="submit" class="px-6 py-2.5 rounded-xl font-semibold text-white bg-primary hover:bg-secondary shadow-lg shadow-primary/30 transition-all flex items-center gap-2">
                <span class="material-symbols-outlined text-[20px]">save</span>
                Simpan Perubahan
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
