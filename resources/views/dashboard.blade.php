<x-layouts::app :title="__('Dashboard Klien')">
    <div class="flex flex-col gap-6">
        
        <!-- Welcome Header -->
        <div class="bg-gradient-to-r from-rose-500 to-pink-600 rounded-3xl p-8 text-white shadow-lg relative overflow-hidden">
            <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
            <div class="relative z-10">
                <h1 class="text-3xl font-bold mb-2">Halo, {{ auth()->user()->name }}! 💖</h1>
                <p class="text-rose-100 max-w-2xl text-sm leading-relaxed">Selamat datang di pusat manajemen undangan digital Anda. Buat undangan yang indah, pantau tamu yang akan hadir, dan kelola kado pernikahan dengan mudah.</p>
                
                @if(!$invitation)
                <div class="mt-6">
                    <a href="{{ route('client.builder.index') }}" class="inline-flex items-center gap-2 bg-white text-rose-600 font-bold px-6 py-2.5 rounded-full shadow-md hover:shadow-xl hover:scale-105 transition-all">
                        + Buat Undangan Sekarang
                    </a>
                </div>
                @endif
            </div>
            <!-- Decorative circle -->
            <div class="absolute -right-10 -bottom-24 w-64 h-64 bg-white opacity-20 rounded-full blur-2xl"></div>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Stat 1 -->
            <div class="bg-white dark:bg-slate-900 rounded-2xl p-6 border border-slate-200 dark:border-slate-800 shadow-sm flex items-center gap-5 hover:shadow-md transition-shadow">
                <div class="w-14 h-14 rounded-full bg-rose-50 dark:bg-rose-900/30 flex items-center justify-center text-rose-500 shrink-0">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 15.546c-.523 0-1.046.151-1.5.454a2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.701 2.701 0 00-1.5-.454M9 6v2m3-2v2m3-2v2M9 3h.01M12 3h.01M15 3h.01M21 21v-7a2 2 0 00-2-2H5a2 2 0 00-2 2v7h18zm-3-9v-2a2 2 0 00-2-2H8a2 2 0 00-2 2v2h12z"></path></svg>
                </div>
                <div>
                    <p class="text-sm font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-1">Status Undangan</p>
                    <h3 class="text-xl font-black text-slate-800 dark:text-white">
                        @if($invitation)
                            <span class="text-emerald-600 dark:text-emerald-400">Aktif</span>
                        @else
                            <span class="text-slate-400">Belum Ada</span>
                        @endif
                    </h3>
                </div>
            </div>
            
            <!-- Stat 2 -->
            <div class="bg-white dark:bg-slate-900 rounded-2xl p-6 border border-slate-200 dark:border-slate-800 shadow-sm flex items-center gap-5 hover:shadow-md transition-shadow">
                <div class="w-14 h-14 rounded-full bg-emerald-50 dark:bg-emerald-900/30 flex items-center justify-center text-emerald-500 shrink-0">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
                <div>
                    <p class="text-sm font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-1">Total Tamu Undangan</p>
                    <h3 class="text-3xl font-black text-slate-800 dark:text-white">{{ $totalGuests }}</h3>
                </div>
            </div>

            <!-- Stat 3 -->
            <div class="bg-white dark:bg-slate-900 rounded-2xl p-6 border border-slate-200 dark:border-slate-800 shadow-sm flex items-center gap-5 hover:shadow-md transition-shadow">
                <div class="w-14 h-14 rounded-full bg-amber-50 dark:bg-amber-900/30 flex items-center justify-center text-amber-500 shrink-0">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div>
                    <p class="text-sm font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-1">Total Amplop (Kado)</p>
                    <h3 class="text-3xl font-black text-slate-800 dark:text-white">{{ $totalEnvelopes }}</h3>
                </div>
            </div>
        </div>

        @if($invitation)
        <div class="mt-4 flex gap-4">
            <a href="{{ route('client.invitations.index') }}" class="px-6 py-3 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl text-slate-700 dark:text-slate-300 font-semibold shadow-sm hover:bg-slate-50 dark:hover:bg-slate-800 transition">
                &rarr; Lihat Detail Undangan Saya
            </a>
            <a href="{{ route('client.guests.index', $invitation->id) }}" class="px-6 py-3 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl text-slate-700 dark:text-slate-300 font-semibold shadow-sm hover:bg-slate-50 dark:hover:bg-slate-800 transition">
                &rarr; Kelola Daftar Tamu
            </a>
        </div>
        @endif

    </div>
</x-layouts::app>
