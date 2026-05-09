@extends('owner.layouts.app')

@section('title', 'Profil Pengguna - LaundroMetrics')
@section('header_title', 'Pengaturan Profil')

@section('content')
<div class="max-w-4xl mx-auto space-y-6 animate-fade-in" x-data="{ activeTab: 'profile' }">
    
    <!-- Profile Header Card -->
    <div class="bg-white dark:bg-inverse-surface rounded-3xl shadow-sm border border-slate-100 dark:border-slate-800 overflow-hidden mb-6">
        <div class="h-32 bg-gradient-to-r from-primary to-blue-600"></div>
        <div class="px-8 pb-8">
            <div class="relative flex justify-center md:justify-start -mt-16 mb-4">
                <div class="w-32 h-32 rounded-full bg-white p-1.5 shadow-xl">
                    <div class="w-full h-full rounded-full bg-slate-100 flex items-center justify-center font-bold text-primary relative group overflow-hidden">
                        <span class="material-symbols-outlined text-5xl text-slate-300">account_circle</span>
                        <div class="absolute inset-0 bg-black/50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity cursor-pointer">
                            <span class="material-symbols-outlined text-white">photo_camera</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center md:text-left">
                <h2 class="text-2xl font-bold text-slate-900 dark:text-white">Admin Owner</h2>
                <p class="text-slate-500 font-medium">admin@laundry.com</p>
                <div class="mt-3 inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-blue-50 text-blue-700 text-xs font-bold uppercase tracking-wider">
                    <span class="material-symbols-outlined text-[14px]">shield</span>
                    Super Admin
                </div>
            </div>
        </div>
    </div>

    <!-- Tabs Navigation -->
    <div class="flex gap-4 border-b border-slate-200 dark:border-slate-700">
        <button 
            @click="activeTab = 'profile'" 
            :class="activeTab === 'profile' ? 'text-primary border-b-2 border-primary font-bold' : 'text-slate-500 font-medium hover:text-slate-700'"
            class="px-4 py-3 flex items-center gap-2 transition-all">
            <span class="material-symbols-outlined text-[20px]">person</span> Informasi Pribadi
        </button>
        <button 
            @click="activeTab = 'security'" 
            :class="activeTab === 'security' ? 'text-primary border-b-2 border-primary font-bold' : 'text-slate-500 font-medium hover:text-slate-700'"
            class="px-4 py-3 flex items-center gap-2 transition-all">
            <span class="material-symbols-outlined text-[20px]">lock</span> Keamanan & Password
        </button>
    </div>

    <!-- TAB: PROFILE -->
    <div x-show="activeTab === 'profile'" x-transition.opacity.duration.300ms class="space-y-6">
        <div class="bg-white dark:bg-inverse-surface rounded-2xl p-8 shadow-sm border border-slate-100 dark:border-slate-800">
            <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-6 flex items-center gap-2">
                <span class="material-symbols-outlined text-primary">edit_document</span> Detail Informasi
            </h3>
            
            <form class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Nama Lengkap</label>
                        <input type="text" value="Admin Owner" class="w-full rounded-xl border-slate-200 bg-slate-50 p-3 text-sm focus:ring-primary focus:border-primary">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Email Address</label>
                        <input type="email" value="admin@laundry.com" class="w-full rounded-xl border-slate-200 bg-slate-50 p-3 text-sm focus:ring-primary focus:border-primary">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Nomor Telepon / WhatsApp</label>
                        <input type="text" value="081234567890" class="w-full rounded-xl border-slate-200 bg-slate-50 p-3 text-sm focus:ring-primary focus:border-primary">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Peran (Role)</label>
                        <input type="text" value="Owner / Super Admin" disabled class="w-full rounded-xl border-slate-200 bg-slate-100 text-slate-400 p-3 text-sm cursor-not-allowed">
                    </div>
                </div>

                <div class="pt-4 border-t border-slate-100 flex justify-end">
                    <button type="submit" class="bg-primary text-white px-8 py-3 rounded-xl font-bold shadow-lg shadow-primary/20 hover:bg-secondary transition-colors">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- TAB: SECURITY -->
    <div x-show="activeTab === 'security'" x-transition.opacity.duration.300ms style="display: none;" class="space-y-6">
        <div class="bg-white dark:bg-inverse-surface rounded-2xl p-8 shadow-sm border border-slate-100 dark:border-slate-800">
            <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-6 flex items-center gap-2">
                <span class="material-symbols-outlined text-primary">key</span> Ubah Password
            </h3>
            
            <form class="space-y-6 max-w-lg">
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Password Saat Ini</label>
                    <div class="relative">
                        <input type="password" placeholder="••••••••" class="w-full rounded-xl border-slate-200 bg-slate-50 p-3 text-sm focus:ring-primary focus:border-primary pr-10">
                        <span class="material-symbols-outlined absolute right-3 top-3 text-slate-400 cursor-pointer hover:text-slate-600">visibility_off</span>
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Password Baru</label>
                    <div class="relative">
                        <input type="password" placeholder="Minimal 8 karakter" class="w-full rounded-xl border-slate-200 bg-slate-50 p-3 text-sm focus:ring-primary focus:border-primary pr-10">
                        <span class="material-symbols-outlined absolute right-3 top-3 text-slate-400 cursor-pointer hover:text-slate-600">visibility_off</span>
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Konfirmasi Password Baru</label>
                    <div class="relative">
                        <input type="password" placeholder="Ulangi password baru" class="w-full rounded-xl border-slate-200 bg-slate-50 p-3 text-sm focus:ring-primary focus:border-primary pr-10">
                        <span class="material-symbols-outlined absolute right-3 top-3 text-slate-400 cursor-pointer hover:text-slate-600">visibility_off</span>
                    </div>
                </div>

                <div class="pt-4 border-t border-slate-100">
                    <button type="submit" class="bg-slate-900 text-white px-8 py-3 rounded-xl font-bold shadow-lg hover:bg-slate-800 transition-colors">
                        Update Password
                    </button>
                </div>
            </form>
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
