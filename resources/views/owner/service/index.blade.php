@extends('owner.layouts.app')

@section('title', 'Layanan Laundry - LaundroMetrics')
@section('header_title', 'Manajemen Layanan')

@section('content')
    <div class="max-w-container-max mx-auto space-y-6 animate-fade-in" x-data="{ modalService: false }">
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div
            class="bg-white dark:bg-inverse-surface rounded-2xl p-5 shadow-sm border border-slate-100 dark:border-slate-800 flex flex-col md:flex-row gap-4 items-center justify-between">
            <div class="flex items-center gap-4">
                <h2 class="text-lg font-bold text-slate-900 dark:text-white">Daftar Layanan</h2>
                <span class="bg-primary/10 text-primary text-xs font-bold px-2 py-0.5 rounded-full">12 Layanan</span>
            </div>

            <button @click="modalService = true"
                class="w-full md:w-auto bg-primary text-white px-6 py-2.5 rounded-xl font-semibold shadow-lg shadow-primary/30 hover:bg-secondary transition-all flex items-center justify-center gap-2 group">
                <span class="material-symbols-outlined text-lg group-hover:rotate-90 transition-transform">add_circle</span>
                Tambah Layanan
            </button>
        </div>

        <form method="GET" action="{{ route('services.index') }}"
            class="flex gap-3">

            <input type="text"
                name="search"
                placeholder="Cari layanan..."
                value="{{ request('search') }}"
                class="border rounded-xl px-4 py-2">

            <select name="status"
                class="border rounded-xl px-4 py-2">

                <option value="">Semua Status</option>

                <option value="1"
                    {{ request('status') == '1' ? 'selected' : '' }}>
                    Aktif
                </option>

                <option value="0"
                    {{ request('status') == '0' ? 'selected' : '' }}>
                    Nonaktif
                </option>
            </select>

            <button type="submit"
                class="bg-primary text-white px-4 rounded-xl">
                Filter
            </button>
        </form>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($services as $service)
            <!-- Service Card -->
            <div x-data="{ openDropdown: false, modalEdit: false }" class="bg-white dark:bg-inverse-surface rounded-3xl p-6 shadow-sm border border-slate-100 dark:border-slate-800 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group relative overflow-hidden">
                <div class="absolute -right-4 -top-4 w-24 h-24 bg-blue-50 dark:bg-blue-900/20 rounded-full group-hover:scale-150 transition-transform duration-500 ease-out z-0"></div>
                <div class="relative z-10">
                    <div class="flex justify-between items-start mb-6">
                        <div class="w-14 h-14 bg-blue-100 dark:bg-blue-900/40 text-blue-600 dark:text-blue-400 rounded-2xl flex items-center justify-center">
                            <span class="material-symbols-outlined text-3xl">local_laundry_service</span>
                        </div>
                        <div class="flex items-center gap-2 relative">
                            <span class="{{ $service->is_active ? 'bg-green-100 text-green-700' : 'bg-slate-100 text-slate-500' }} text-[10px] font-bold px-2 py-1 rounded-full uppercase tracking-wider">
                                {{ $service->is_active ? 'Aktif' : 'Nonaktif' }}
                            </span>
                            <button @click="openDropdown = !openDropdown" @click.away="openDropdown = false" class="text-slate-400 hover:text-slate-600 transition-colors">
                                <span class="material-symbols-outlined text-xl">more_vert</span>
                            </button>
                            
                            <!-- Dropdown Menu -->
                            <div x-show="openDropdown" class="absolute right-0 top-full mt-2 w-48 bg-white dark:bg-inverse-surface border border-slate-100 dark:border-slate-800 rounded-xl shadow-lg z-50 overflow-hidden" style="display: none;">
                                <button @click="modalEdit = true; openDropdown = false" class="w-full text-left px-4 py-2.5 text-sm text-slate-700 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-surface-dim/50 flex items-center gap-2">
                                    <span class="material-symbols-outlined text-[18px]">edit</span> Edit Layanan
                                </button>
                                <form action="{{ route('services.update-status', $service->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="w-full text-left px-4 py-2.5 text-sm {{ $service->is_active ? 'text-orange-600 hover:bg-orange-50' : 'text-green-600 hover:bg-green-50' }} flex items-center gap-2">
                                        <span class="material-symbols-outlined text-[18px]">{{ $service->is_active ? 'block' : 'check_circle' }}</span> 
                                        {{ $service->is_active ? 'Nonaktifkan' : 'Aktifkan' }}
                                    </button>
                                </form>
                                <form action="{{ route('services.destroy', $service->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-full text-left px-4 py-2.5 text-sm text-red-600 hover:bg-red-50 flex items-center gap-2" onclick="return confirm('Yakin ingin menghapus layanan ini?')">
                                        <span class="material-symbols-outlined text-[18px]">delete</span> Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-2">{{ $service->name }}</h3>
                    <p class="text-slate-500 dark:text-slate-400 text-sm mb-6 line-clamp-2">{{ $service->description ?? 'Tidak ada deskripsi' }}</p>

                    <div class="flex items-end justify-between border-t border-slate-50 pt-4">
                        <div>
                            <p class="text-[10px] uppercase font-bold text-slate-400 mb-1">Harga per KG</p>
                            <p class="text-2xl font-extrabold text-primary">Rp {{ number_format($service->price_per_kg, 0, ',', '.') }}</p>
                        </div>
                        <div class="text-right text-slate-500 text-xs font-medium flex items-center gap-1">
                            <span class="material-symbols-outlined text-sm">schedule</span>
                            {{ $service->estimated_days }} Hari
                        </div>
                    </div>
                </div>

                <!-- MODAL: EDIT LAYANAN -->
                <div x-show="modalEdit" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center">
                    <div x-show="modalEdit" x-transition.opacity class="absolute inset-0 bg-slate-900/50 backdrop-blur-sm" @click="modalEdit = false"></div>
                    <div x-show="modalEdit" x-transition.scale.origin.bottom class="relative bg-white dark:bg-inverse-surface w-full max-w-xl rounded-3xl shadow-2xl overflow-hidden m-4">
                        <div class="p-8">
                            <div class="flex justify-between items-start mb-8">
                                <div>
                                    <h3 class="text-2xl font-bold text-slate-900 dark:text-white">Edit Layanan</h3>
                                    <p class="text-slate-500 text-sm">Perbarui detail layanan laundry.</p>
                                </div>
                                <button @click="modalEdit = false" class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center hover:bg-slate-200 transition-colors">
                                    <span class="material-symbols-outlined text-[18px]">close</span>
                                </button>
                            </div>

                            <form action="{{ route('services.update', $service->id) }}" method="POST" class="space-y-5">
                                @csrf
                                @method('PUT')
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="col-span-2">
                                        <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Nama Layanan</label>
                                        <input type="text" name="name" value="{{ $service->name }}" class="w-full rounded-xl border-slate-200 bg-slate-50 p-3 text-sm focus:ring-primary focus:border-primary">
                                    </div>
                                    <div>
                                        <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Harga (Rp)</label>
                                        <input type="number" name="price_per_kg" value="{{ $service->price_per_kg }}" class="w-full rounded-xl border-slate-200 bg-slate-50 p-3 text-sm focus:ring-primary focus:border-primary">
                                    </div>
                                    <div>
                                        <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Estimasi (Hari)</label>
                                        <input type="number" name="estimated_days" value="{{ $service->estimated_days }}" class="w-full rounded-xl border-slate-200 bg-slate-50 p-3 text-sm focus:ring-primary focus:border-primary">
                                    </div>
                                    <div>
                                        <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Status</label>
                                        <div class="flex items-center gap-2 mt-2">
                                            <label class="relative inline-flex items-center cursor-pointer">
                                                <input type="hidden" name="is_active" value="0">
                                                <input type="checkbox" name="is_active" value="1" {{ $service->is_active ? 'checked' : '' }} class="sr-only peer">
                                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
                                                <span class="ml-3 text-sm font-medium text-slate-500">Aktif</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-span-2">
                                        <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Deskripsi Layanan</label>
                                        <textarea name="description" class="w-full rounded-xl border-slate-200 bg-slate-50 p-3 text-sm focus:ring-primary focus:border-primary" rows="3">{{ $service->description }}</textarea>
                                    </div>
                                </div>
                                <div class="flex gap-3 pt-4">
                                    <button type="button" @click="modalEdit = false" class="flex-1 border border-slate-200 text-slate-700 py-3 rounded-xl font-bold hover:bg-slate-50 transition-colors">Batal</button>
                                    <button type="submit" class="flex-1 bg-primary text-white py-3 rounded-xl font-bold shadow-lg shadow-primary/20 hover:bg-secondary transition-colors">Simpan Perubahan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- MODAL: TAMBAH LAYANAN -->
        <div x-show="modalService" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center">
            <div x-show="modalService" x-transition.opacity class="absolute inset-0 bg-slate-900/50 backdrop-blur-sm"
                @click="modalService = false"></div>
            <div x-show="modalService" x-transition.scale.origin.bottom
                class="relative bg-white dark:bg-inverse-surface w-full max-w-xl rounded-3xl shadow-2xl overflow-hidden m-4">
                <div class="p-8">
                    <div class="flex justify-between items-start mb-8">
                        <div>
                            <h3 class="text-2xl font-bold text-slate-900 dark:text-white">Tambah Layanan Baru</h3>
                            <p class="text-slate-500 text-sm">Masukkan detail layanan laundry yang ingin Anda tambahkan.</p>
                        </div>
                        <button @click="modalService = false"
                            class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center hover:bg-slate-200 transition-colors">
                            <span class="material-symbols-outlined text-[18px]">close</span>
                        </button>
                    </div>

                    <form action="{{ route('services.store') }}" method="POST" class="space-y-5">
                        @csrf
                        <div class="grid grid-cols-2 gap-4">
                            <div class="col-span-2">
                                <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Nama Layanan</label>
                                <input type="text" name="name"
                                    class="w-full rounded-xl border-slate-200 bg-slate-50 p-3 text-sm focus:ring-primary focus:border-primary"
                                    placeholder="Contoh: Cuci Kiloan Premium">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Harga (Rp)</label>
                                <input type="number" name="price_per_kg"
                                    class="w-full rounded-xl border-slate-200 bg-slate-50 p-3 text-sm focus:ring-primary focus:border-primary"
                                    placeholder="0">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Estimasi (Hari)</label>
                                <input type="number" name="estimated_days"
                                    class="w-full rounded-xl border-slate-200 bg-slate-50 p-3 text-sm focus:ring-primary focus:border-primary"
                                    placeholder="0">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Status</label>
                                <div class="flex items-center gap-2 mt-2">
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="hidden" name="is_active" value="0">
                                        <input type="checkbox" name="is_active" value="1" class="sr-only peer">
                                        <div
                                            class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary">
                                        </div>
                                        <span class="ml-3 text-sm font-medium text-slate-500">Aktif</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-span-2">
                                <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Deskripsi
                                    Layanan</label>
                                <textarea name="description" class="w-full rounded-xl border-slate-200 bg-slate-50 p-3 text-sm focus:ring-primary focus:border-primary"
                                    rows="3" placeholder="Jelaskan detail layanan ini..."></textarea>
                            </div>
                        </div>

                        <div class="flex gap-3 pt-4">
                            <button type="button" @click="modalService = false"
                                class="flex-1 border border-slate-200 text-slate-700 py-3 rounded-xl font-bold hover:bg-slate-50 transition-colors">
                                Batal
                            </button>
                            <button type="submit"
                                class="flex-1 bg-primary text-white py-3 rounded-xl font-bold shadow-lg shadow-primary/20 hover:bg-secondary transition-colors">
                                Simpan Layanan
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
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fadeIn 0.4s ease-out forwards;
        }
    </style>
@endsection
