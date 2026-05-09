@extends('owner.layouts.app')

@section('title', 'LaundroMetrics - Owner Dashboard')
@section('header_title', 'Dashboard Overview')

@section('content')
<div class="max-w-container-max mx-auto space-y-stack-lg">
    <section>
        <h2 class="font-headline-md text-headline-md text-primary mb-stack-md">Today's Snapshot</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-stack-md">
            <div class="bg-surface-container-lowest rounded-xl p-stack-md shadow-[0_8px_24px_rgba(0,35,102,0.08)] border border-outline-variant/20 flex flex-col gap-2">
                <div class="flex justify-between items-center text-on-surface-variant">
                    <span class="font-label-md text-label-md">Total Order Hari Ini</span>
                    <span class="material-symbols-outlined text-secondary" data-icon="receipt">receipt</span>
                </div>
                <div class="flex items-end gap-2">
                    <span class="font-display-lg-mobile text-display-lg-mobile text-primary">42</span>
                    <span class="font-label-md text-label-md text-secondary-container mb-1">↑ 12%</span>
                </div>
            </div>
            <div class="bg-surface-container-lowest rounded-xl p-stack-md shadow-[0_8px_24px_rgba(0,35,102,0.08)] border border-outline-variant/20 flex flex-col gap-2">
                <div class="flex justify-between items-center text-on-surface-variant">
                    <span class="font-label-md text-label-md">Laundry Diproses</span>
                    <span class="material-symbols-outlined text-secondary" data-icon="local_laundry_service">local_laundry_service</span>
                </div>
                <div class="flex items-end gap-2">
                    <span class="font-display-lg-mobile text-display-lg-mobile text-primary">18</span>
                </div>
            </div>
            <div class="bg-surface-container-lowest rounded-xl p-stack-md shadow-[0_8px_24px_rgba(0,35,102,0.08)] border border-outline-variant/20 flex flex-col gap-2">
                <div class="flex justify-between items-center text-on-surface-variant">
                    <span class="font-label-md text-label-md">Laundry Selesai</span>
                    <span class="material-symbols-outlined text-secondary" data-icon="check_circle">check_circle</span>
                </div>
                <div class="flex items-end gap-2">
                    <span class="font-display-lg-mobile text-display-lg-mobile text-primary">24</span>
                </div>
            </div>
            <div class="bg-surface-container-lowest rounded-xl p-stack-md shadow-[0_8px_24px_rgba(0,35,102,0.08)] border border-outline-variant/20 flex flex-col gap-2">
                <div class="flex justify-between items-center text-on-surface-variant">
                    <span class="font-label-md text-label-md">Pendapatan Hari Ini</span>
                    <span class="material-symbols-outlined text-secondary" data-icon="payments">payments</span>
                </div>
                <div class="flex items-end gap-2">
                    <span class="font-headline-md text-headline-md text-primary">Rp 1.250.000</span>
                </div>
            </div>
            <div class="bg-surface-container-lowest rounded-xl p-stack-md shadow-[0_8px_24px_rgba(0,35,102,0.08)] border border-outline-variant/20 flex flex-col gap-2">
                <div class="flex justify-between items-center text-on-surface-variant">
                    <span class="font-label-md text-label-md">Pendapatan Bulanan</span>
                    <span class="material-symbols-outlined text-secondary" data-icon="account_balance">account_balance</span>
                </div>
                <div class="flex items-end gap-2">
                    <span class="font-headline-md text-headline-md text-primary">Rp 32.800.000</span>
                </div>
            </div>
            <div class="bg-surface-container-lowest rounded-xl p-stack-md shadow-[0_8px_24px_rgba(0,35,102,0.08)] border border-outline-variant/20 flex flex-col gap-2">
                <div class="flex justify-between items-center text-on-surface-variant">
                    <span class="font-label-md text-label-md">Customer Aktif</span>
                    <span class="material-symbols-outlined text-secondary" data-icon="group">group</span>
                </div>
                <div class="flex items-end gap-2">
                    <span class="font-display-lg-mobile text-display-lg-mobile text-primary">156</span>
                </div>
            </div>
        </div>
    </section>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-stack-lg">
        <div class="lg:col-span-2 space-y-stack-md">
            <div class="bg-surface-container-lowest rounded-xl p-stack-md shadow-[0_8px_24px_rgba(0,35,102,0.08)] border border-outline-variant/20">
                <h3 class="font-headline-md text-headline-md text-primary mb-4">Grafik Pemasukan (7 Hari Terakhir)</h3>
                <div class="h-64 bg-surface-container flex items-end justify-between p-4 rounded-lg relative overflow-hidden">
                    <div class="w-1/12 bg-secondary-container h-1/4 rounded-t-sm"></div>
                    <div class="w-1/12 bg-secondary-container h-2/4 rounded-t-sm"></div>
                    <div class="w-1/12 bg-secondary-container h-1/3 rounded-t-sm"></div>
                    <div class="w-1/12 bg-secondary-container h-3/4 rounded-t-sm"></div>
                    <div class="w-1/12 bg-secondary-container h-2/3 rounded-t-sm"></div>
                    <div class="w-1/12 bg-secondary-container h-full rounded-t-sm"></div>
                    <div class="w-1/12 bg-primary-container h-[85%] rounded-t-sm"></div>
                </div>
            </div>
            <div class="bg-surface-container-lowest rounded-xl p-stack-md shadow-[0_8px_24px_rgba(0,35,102,0.08)] border border-outline-variant/20">
                <h3 class="font-headline-md text-headline-md text-primary mb-4">Grafik Order Per Hari</h3>
                <div class="h-48 bg-surface-container flex items-end justify-around p-4 rounded-lg">
                    <div class="w-8 bg-secondary-container h-12 rounded-t-sm"></div>
                    <div class="w-8 bg-secondary-container h-24 rounded-t-sm"></div>
                    <div class="w-8 bg-secondary-container h-16 rounded-t-sm"></div>
                    <div class="w-8 bg-secondary-container h-32 rounded-t-sm"></div>
                    <div class="w-8 bg-secondary-container h-20 rounded-t-sm"></div>
                    <div class="w-8 bg-secondary-container h-40 rounded-t-sm"></div>
                    <div class="w-8 bg-primary-container h-36 rounded-t-sm"></div>
                </div>
            </div>
        </div>
        <div class="lg:col-span-1">
            <div class="bg-surface-container-lowest rounded-xl p-stack-md shadow-[0_8px_24px_rgba(0,35,102,0.08)] border border-outline-variant/20 h-full">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="font-headline-md text-headline-md text-primary">Activity Terbaru</h3>
                    <button class="text-secondary font-label-md text-label-md hover:underline">Lihat Semua</button>
                </div>
                <div class="space-y-6">
                    <div class="flex gap-4">
                        <div class="flex-shrink-0 w-10 h-10 rounded-full bg-secondary-container flex items-center justify-center text-on-secondary-container">
                            <span class="material-symbols-outlined" data-icon="add_shopping_cart">add_shopping_cart</span>
                        </div>
                        <div>
                            <p class="font-label-md text-label-md text-on-surface">Order Baru Masuk</p>
                            <p class="font-body-md text-body-md text-on-surface-variant mt-1">Budi S. - Premium Bundle</p>
                            <p class="font-label-md text-label-md text-outline mt-1 text-xs">2 mins ago</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="flex-shrink-0 w-10 h-10 rounded-full bg-surface-tint flex items-center justify-center text-white">
                            <span class="material-symbols-outlined" data-icon="check">check</span>
                        </div>
                        <div>
                            <p class="font-label-md text-label-md text-on-surface">Laundry Selesai</p>
                            <p class="font-body-md text-body-md text-on-surface-variant mt-1">Order #8821 ready for pickup</p>
                            <p class="font-label-md text-label-md text-outline mt-1 text-xs">15 mins ago</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="flex-shrink-0 w-10 h-10 rounded-full bg-primary-container flex items-center justify-center text-on-primary">
                            <span class="material-symbols-outlined" data-icon="person_add">person_add</span>
                        </div>
                        <div>
                            <p class="font-label-md text-label-md text-on-surface">Customer Baru</p>
                            <p class="font-body-md text-body-md text-on-surface-variant mt-1">Sarah J. joined the platform</p>
                            <p class="font-label-md text-label-md text-outline mt-1 text-xs">1 hour ago</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
