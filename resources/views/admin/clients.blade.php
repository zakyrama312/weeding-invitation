<x-layouts::app :title="__('Manajemen Klien')">
    <div x-data="{ showModal: false }" class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">
        
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-slate-800 dark:text-slate-100">Manajemen Klien</h2>
                <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Kelola data klien dan akses platform mereka.</p>
            </div>
            <button @click="showModal = true" class="inline-flex items-center gap-2 rounded-xl bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white shadow-md hover:bg-blue-700 hover:shadow-lg transition-all focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                Tambah Klien
            </button>
        </div>

        @if(session('success'))
        <div class="p-4 bg-emerald-50 dark:bg-emerald-900/30 border border-emerald-200 dark:border-emerald-800 text-emerald-800 dark:text-emerald-300 rounded-xl flex items-center shadow-sm">
            <svg class="w-5 h-5 mr-3 text-emerald-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <span class="font-medium text-sm">{{ session('success') }}</span>
        </div>
        @endif

        <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden">
            <!-- Table Toolbar -->
            <div class="p-5 border-b border-slate-200 dark:border-slate-800 bg-slate-50/50 dark:bg-slate-800/30 flex flex-col sm:flex-row justify-between items-center gap-4">
                <form action="{{ route('admin.clients.index') }}" method="GET" class="relative w-full sm:w-96">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama atau email klien..." class="block w-full pl-10 pr-3 py-2.5 border border-slate-300 dark:border-slate-700 rounded-xl leading-5 bg-white dark:bg-slate-900 text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition-shadow">
                    @if(request('search'))
                        <a href="{{ route('admin.clients.index') }}" class="absolute inset-y-0 right-0 pr-3 flex items-center text-slate-400 hover:text-slate-600">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </a>
                    @endif
                </form>
                <div class="flex items-center text-sm text-slate-500">
                    Menampilkan {{ $clients->count() }} dari {{ $clients->total() }} klien
                </div>
            </div>
            
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200 dark:divide-slate-700/50">
                    <thead class="bg-slate-50 dark:bg-slate-800/50">
                        <tr>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Info Klien</th>
                            <th scope="col" class="px-6 py-4 text-center text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Status Undangan</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Bergabung</th>
                            <th scope="col" class="px-6 py-4 text-right text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200 dark:divide-slate-700/50 bg-white dark:bg-slate-900">
                        @forelse ($clients as $client)
                            <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center text-white font-bold shadow-inner">
                                            {{ substr($client->name, 0, 1) }}
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-bold text-slate-900 dark:text-white">{{ $client->name }}</div>
                                            <div class="text-sm text-slate-500 dark:text-slate-400">{{ $client->email }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    @if($client->invitation_count > 0)
                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-100 dark:bg-emerald-900/30 px-3 py-1 text-xs font-semibold text-emerald-800 dark:text-emerald-400">
                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Aktif
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-slate-100 dark:bg-slate-800 px-3 py-1 text-xs font-semibold text-slate-600 dark:text-slate-400">
                                            <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Belum Ada
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500 dark:text-slate-400">
                                    {{ $client->created_at->translatedFormat('d M Y') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300 bg-blue-50 hover:bg-blue-100 dark:bg-blue-900/20 dark:hover:bg-blue-900/40 px-3 py-1.5 rounded-lg transition-colors mr-2">Edit</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-12 text-center">
                                    <svg class="mx-auto h-12 w-12 text-slate-300 dark:text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                                    <h3 class="mt-2 text-sm font-semibold text-slate-900 dark:text-slate-200">Tidak ada klien</h3>
                                    <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Belum ada klien yang terdaftar atau ditemukan.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            @if($clients->hasPages())
            <div class="px-6 py-4 border-t border-slate-200 dark:border-slate-800 bg-slate-50/50 dark:bg-slate-800/30">
                {{ $clients->withQueryString()->links() }}
            </div>
            @endif
        </div>

        <!-- Modal Tambah Klien -->
        <div x-show="showModal" style="display: none;" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <!-- Background overlay -->
                <div x-show="showModal" x-transition.opacity class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm transition-opacity" aria-hidden="true"></div>

                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                
                <!-- Modal panel -->
                <div x-show="showModal" x-transition @click.away="showModal = false" class="relative z-10 inline-block align-bottom bg-white dark:bg-slate-800 rounded-3xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full">
                    <div class="bg-white dark:bg-slate-800 px-6 pt-6 pb-4 sm:p-8 sm:pb-6">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-xl leading-6 font-bold text-slate-900 dark:text-white flex items-center gap-2" id="modal-title">
                                <div class="p-2 bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 rounded-xl">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
                                </div>
                                Tambah Klien Baru
                            </h3>
                            <button type="button" @click="showModal = false" class="text-slate-400 hover:text-slate-500 bg-slate-100 hover:bg-slate-200 dark:bg-slate-700 dark:hover:bg-slate-600 p-2 rounded-full transition">
                                <span class="sr-only">Close</span>
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                            </button>
                        </div>
                        
                        <form action="{{ route('admin.clients.store') }}" method="POST">
                            @csrf
                            <div class="space-y-5">
                                <div>
                                    <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-1.5">Nama Lengkap Klien</label>
                                    <input type="text" name="name" required placeholder="Budi Santoso" class="w-full rounded-xl border-slate-300 dark:border-slate-600 dark:bg-slate-700 p-3 text-sm focus:ring-2 focus:ring-blue-500 shadow-sm transition">
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-1.5">Alamat Email</label>
                                    <input type="email" name="email" required placeholder="budi@email.com" class="w-full rounded-xl border-slate-300 dark:border-slate-600 dark:bg-slate-700 p-3 text-sm focus:ring-2 focus:ring-blue-500 shadow-sm transition">
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-1.5">Password Sementara</label>
                                    <input type="text" name="password" required placeholder="Minimal 6 karakter" class="w-full rounded-xl border-slate-300 dark:border-slate-600 dark:bg-slate-700 p-3 text-sm focus:ring-2 focus:ring-blue-500 shadow-sm transition">
                                    <p class="mt-1.5 text-xs text-slate-500">Klien dapat mengubah password ini nanti setelah login.</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-1.5">Pilih Tema/Paket Hak Akses</label>
                                    <select name="theme_id" required class="w-full rounded-xl border-slate-300 dark:border-slate-600 dark:bg-slate-700 p-3 text-sm focus:ring-2 focus:ring-blue-500 shadow-sm transition">
                                        <option value="">-- Pilih Tema --</option>
                                        @foreach($themes as $theme)
                                            <option value="{{ $theme->id }}">{{ $theme->name }} ({{ 'Rp ' . number_format($theme->promo_price ?? $theme->price, 0, ',', '.') }})</option>
                                        @endforeach
                                    </select>
                                    <p class="mt-1.5 text-xs text-slate-500">Pilihan ini akan mengunci template yang bisa dipakai oleh klien di Builder.</p>
                                </div>
                            </div>
                            <div class="mt-8 flex justify-end gap-3 pt-6 border-t border-slate-100 dark:border-slate-700">
                                <button type="button" @click="showModal = false" class="px-5 py-2.5 bg-white dark:bg-slate-800 border border-slate-300 dark:border-slate-600 hover:bg-slate-50 dark:hover:bg-slate-700 text-slate-700 dark:text-slate-300 text-sm font-semibold rounded-xl transition shadow-sm">Batal</button>
                                <button type="submit" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold rounded-xl shadow-md hover:shadow-lg transition">Simpan Klien</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-layouts::app>
