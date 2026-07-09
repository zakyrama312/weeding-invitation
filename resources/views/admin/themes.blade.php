<x-layouts::app :title="__('Katalog Tema & Harga')">
    <div x-data="{ showModal: false }" class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">
        
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-slate-800 dark:text-slate-100">Katalog Tema & Harga</h2>
                <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Kelola master desain, harga paket, dan promo.</p>
            </div>
            <button @click="showModal = true" class="inline-flex items-center gap-2 rounded-xl bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white shadow-md hover:bg-blue-700 hover:shadow-lg transition-all focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                Tambah Tema Baru
            </button>
        </div>

        @if(session('success'))
        <div class="p-4 bg-emerald-50 dark:bg-emerald-900/30 border border-emerald-200 dark:border-emerald-800 text-emerald-800 dark:text-emerald-300 rounded-xl flex items-center shadow-sm">
            <svg class="w-5 h-5 mr-3 text-emerald-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <span class="font-medium text-sm">{{ session('success') }}</span>
        </div>
        @endif

        @if($errors->any())
        <div class="p-4 bg-red-50 dark:bg-red-900/30 border border-red-200 dark:border-red-800 text-red-800 dark:text-red-300 rounded-xl flex shadow-sm">
            <svg class="w-5 h-5 mr-3 text-red-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
            <ul class="list-disc list-inside text-sm font-medium">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @forelse ($themes as $theme)
                <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden group hover:shadow-lg transition-all flex flex-col">
                    <div class="relative h-48 bg-slate-100 dark:bg-slate-800 overflow-hidden">
                        @if($theme->preview_image)
                            <img src="{{ Storage::url($theme->preview_image) }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="absolute inset-0 flex items-center justify-center text-slate-300 dark:text-slate-600">
                                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                        @endif
                        <div class="absolute top-3 right-3">
                            @if($theme->is_active)
                                <span class="bg-emerald-500 text-white text-[10px] font-bold px-2 py-1 rounded-full uppercase tracking-wider shadow-sm">Aktif</span>
                            @else
                                <span class="bg-slate-500 text-white text-[10px] font-bold px-2 py-1 rounded-full uppercase tracking-wider shadow-sm">Draft</span>
                            @endif
                        </div>
                    </div>
                    <div class="p-5 flex-1 flex flex-col">
                        <div class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">{{ $theme->slug }}</div>
                        <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-4 line-clamp-1">{{ $theme->name }}</h3>
                        
                        <div class="mt-auto">
                            @if($theme->promo_price)
                                <div class="text-xs text-slate-400 line-through mb-0.5">Rp {{ number_format($theme->price, 0, ',', '.') }}</div>
                                <div class="text-xl font-black text-rose-500">Rp {{ number_format($theme->promo_price, 0, ',', '.') }}</div>
                            @else
                                <div class="text-xl font-black text-slate-900 dark:text-white">Rp {{ number_format($theme->price, 0, ',', '.') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="px-5 py-3 border-t border-slate-100 dark:border-slate-800 bg-slate-50 dark:bg-slate-800/50 flex justify-end gap-2">
                        <button class="text-xs font-bold text-slate-500 hover:text-blue-600 transition">Edit</button>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-16 text-center border-2 border-dashed border-slate-200 dark:border-slate-700 rounded-2xl">
                    <svg class="mx-auto h-12 w-12 text-slate-300 dark:text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    <h3 class="mt-4 text-sm font-semibold text-slate-900 dark:text-slate-200">Belum ada tema</h3>
                    <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Silakan tambahkan tema baru untuk dijual di platform.</p>
                </div>
            @endforelse
        </div>

        <!-- Modal Tambah Tema -->
        <div x-show="showModal" style="display: none;" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div x-show="showModal" x-transition.opacity class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm transition-opacity" aria-hidden="true"></div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                
                <div x-show="showModal" x-transition @click.away="showModal = false" class="relative z-10 inline-block align-bottom bg-white dark:bg-slate-800 rounded-3xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-xl w-full">
                    <div class="bg-white dark:bg-slate-800 px-6 pt-6 pb-4 sm:p-8 sm:pb-6">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-xl leading-6 font-bold text-slate-900 dark:text-white flex items-center gap-2" id="modal-title">
                                <div class="p-2 bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 rounded-xl">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path></svg>
                                </div>
                                Tambah Tema Master
                            </h3>
                            <button type="button" @click="showModal = false" class="text-slate-400 hover:text-slate-500 bg-slate-100 hover:bg-slate-200 dark:bg-slate-700 dark:hover:bg-slate-600 p-2 rounded-full transition">
                                <span class="sr-only">Close</span>
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                            </button>
                        </div>
                        
                        <form action="{{ route('admin.themes.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="space-y-5">
                                <div class="grid grid-cols-2 gap-5">
                                    <div>
                                        <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-1.5">Nama Tema</label>
                                        <input type="text" name="name" required placeholder="Contoh: Rustic Botanical" class="w-full rounded-xl border-slate-300 dark:border-slate-600 dark:bg-slate-700 p-3 text-sm focus:ring-2 focus:ring-blue-500 shadow-sm transition">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-1.5">Kode Tema (Slug)</label>
                                        <input type="text" name="slug" required placeholder="contoh: rustic" class="w-full rounded-xl border-slate-300 dark:border-slate-600 dark:bg-slate-700 p-3 text-sm focus:ring-2 focus:ring-blue-500 shadow-sm transition">
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-5">
                                    <div>
                                        <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-1.5">Harga Normal (Rp)</label>
                                        <input type="number" name="price" required placeholder="150000" class="w-full rounded-xl border-slate-300 dark:border-slate-600 dark:bg-slate-700 p-3 text-sm focus:ring-2 focus:ring-blue-500 shadow-sm transition">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-1.5">Harga Promo (Opsional)</label>
                                        <input type="number" name="promo_price" placeholder="99000" class="w-full rounded-xl border-slate-300 dark:border-slate-600 dark:bg-slate-700 p-3 text-sm focus:ring-2 focus:ring-blue-500 shadow-sm transition">
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-1.5">Gambar Preview (JPG/PNG)</label>
                                    <input type="file" name="preview_image" accept="image/*" class="w-full rounded-xl border-slate-300 dark:border-slate-600 dark:bg-slate-700 p-2 text-sm focus:ring-2 focus:ring-blue-500 shadow-sm transition">
                                </div>
                                <div class="flex items-center gap-2 mt-4">
                                    <input type="checkbox" name="is_active" id="is_active" value="1" checked class="w-5 h-5 rounded text-blue-600 focus:ring-blue-500 border-slate-300">
                                    <label for="is_active" class="text-sm font-semibold text-slate-700 dark:text-slate-300">Langsung Aktifkan Tema Ini</label>
                                </div>
                            </div>
                            <div class="mt-8 flex justify-end gap-3 pt-6 border-t border-slate-100 dark:border-slate-700">
                                <button type="button" @click="showModal = false" class="px-5 py-2.5 bg-white dark:bg-slate-800 border border-slate-300 dark:border-slate-600 hover:bg-slate-50 dark:hover:bg-slate-700 text-slate-700 dark:text-slate-300 text-sm font-semibold rounded-xl transition shadow-sm">Batal</button>
                                <button type="submit" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold rounded-xl shadow-md hover:shadow-lg transition">Simpan Tema</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-layouts::app>
