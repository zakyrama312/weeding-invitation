<x-layouts.builder>
<div x-data="invitationBuilder()" :class="{ 'dark': darkMode }" class="fixed inset-0 z-[100] font-sans flex flex-col overflow-hidden bg-slate-50 dark:bg-slate-900 transition-colors duration-300">
    <!-- Top Header -->
    <div class="h-16 bg-white dark:bg-slate-800 border-b border-slate-200 dark:border-slate-700 flex items-center justify-between px-6 shrink-0 shadow-sm relative z-10 transition-colors duration-300">
        <div class="flex items-center gap-4">
            <div class="w-10 h-10 bg-rose-500 rounded-xl flex items-center justify-center text-white shadow-inner">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
            </div>
            <div>
                <h1 class="font-bold text-slate-800 dark:text-slate-100 text-lg leading-tight flex items-center gap-2">
                    EverVow Builder <span class="text-slate-400 dark:text-slate-500 font-normal text-sm border-l border-slate-300 dark:border-slate-600 pl-2">Digital Invitation Suite</span>
                </h1>
                <p class="text-[10px] tracking-wider text-slate-500 dark:text-slate-400 font-semibold uppercase mt-0.5">LARAVEL + ALPINE.JS + INTERACTIVE REAL-TIME PREVIEWER</p>
            </div>
        </div>
        <div class="flex items-center gap-4 text-sm font-semibold text-slate-600 dark:text-slate-300">
            <!-- Theme Toggle -->
            <button @click="darkMode = !darkMode" class="p-2 rounded-full bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition" title="Toggle Dark/Light Mode">
                <svg x-show="!darkMode" class="w-5 h-5 text-amber-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"></path></svg>
                <svg x-show="darkMode" class="w-5 h-5 text-blue-300 hidden" :class="{'hidden': !darkMode, 'block': darkMode}" fill="currentColor" viewBox="0 0 20 20"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
            </button>
            
            <div class="flex items-center gap-2 bg-slate-100 dark:bg-slate-700 px-3 py-1.5 rounded-full">
                <div class="w-2 h-2 rounded-full bg-rose-500"></div>
                Tema: <span x-text="template_theme ? template_theme.toUpperCase() : 'GOLD'"></span>
            </div>
            <div class="flex items-center gap-2 bg-slate-100 dark:bg-slate-700 px-3 py-1.5 rounded-full">
                <div class="w-2 h-2 rounded-full bg-blue-500"></div>
                Tamu Terdaftar: <span x-text="guests.length"></span>
            </div>
            <a href="{{ route('dashboard') }}" class="ml-2 px-4 py-2 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-600 rounded-lg text-slate-600 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-700 transition text-xs font-bold flex items-center gap-2 shadow-sm">
                &times; Tutup Builder
            </a>
        </div>
    </div>

    <div class="flex-1 flex overflow-hidden">
        <!-- Left Sidebar (Form) -->
        <div class="w-full lg:w-[55%] flex flex-col h-full overflow-y-auto bg-slate-50/50 dark:bg-slate-900/50 p-8 pb-32">
            
            @if (session()->has('message'))
                <div class="mb-6 p-4 bg-emerald-50 dark:bg-emerald-900/30 border border-emerald-200 dark:border-emerald-800 text-emerald-800 dark:text-emerald-300 rounded-xl flex items-center shadow-sm">
                    <svg class="w-6 h-6 mr-3 text-emerald-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span class="font-medium text-sm">{!! session('message') !!}</span>
                </div>
            @endif
            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-50 dark:bg-red-900/30 border border-red-200 dark:border-red-800 text-red-800 dark:text-red-300 rounded-xl flex shadow-sm">
                    <svg class="w-6 h-6 mr-3 text-red-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                    <div>
                        <strong class="block font-medium text-sm mb-1">Ada beberapa kesalahan:</strong>
                        <ul class="list-disc pl-4 text-xs">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <!-- Tabs -->
            <div class="flex flex-wrap gap-2 mb-8 p-1.5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-2xl shadow-sm">
                <button type="button" @click="activeTab = 'acara'" :class="activeTab === 'acara' ? 'bg-rose-500 text-white shadow-md' : 'text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700'" class="flex-1 py-2 px-3 rounded-xl text-[13px] font-semibold transition flex items-center justify-center gap-2">
                    Mempelai & Acara
                </button>
                <button type="button" @click="activeTab = 'galeri'" :class="activeTab === 'galeri' ? 'bg-rose-500 text-white shadow-md' : 'text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700'" class="flex-1 py-2 px-3 rounded-xl text-[13px] font-semibold transition flex items-center justify-center gap-2">
                    Galeri Foto
                </button>
                <button type="button" @click="activeTab = 'amplop'" :class="activeTab === 'amplop' ? 'bg-rose-500 text-white shadow-md' : 'text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700'" class="flex-1 py-2 px-3 rounded-xl text-[13px] font-semibold transition flex items-center justify-center gap-2">
                    Amplop Digital
                </button>
                <button type="button" @click="activeTab = 'tema'" :class="activeTab === 'tema' ? 'bg-rose-500 text-white shadow-md' : 'text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700'" class="flex-1 py-2 px-3 rounded-xl text-[13px] font-semibold transition flex items-center justify-center gap-2">
                    Tema Desain
                </button>
                <button type="button" @click="activeTab = 'tamu'" :class="activeTab === 'tamu' ? 'bg-rose-500 text-white shadow-md' : 'text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700'" class="flex-1 py-2 px-3 rounded-xl text-[13px] font-semibold transition flex items-center justify-center gap-2">
                    Kelola Tamu (<span x-text="guests.length"></span>)
                </button>
            </div>

            <!-- HTML Form (POST) -->
            <form action="{{ route('client.builder.store') }}" method="POST" enctype="multipart/form-data" class="bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 shadow-sm rounded-[1.5rem] p-8 flex-1 relative">
                @csrf
                
                <!-- Tab: Acara -->
                <div x-show="activeTab === 'acara'" class="space-y-10">
                    <div>
                        <h3 class="text-xl font-bold text-slate-800 dark:text-slate-100 border-l-4 border-rose-500 pl-3 mb-6">Informasi Pokok Acara</h3>
                        <div class="space-y-5">
                            <div>
                                <label class="block text-xs font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider mb-2">Nama Acara Undangan</label>
                                <input type="text" name="title" x-model="title" required placeholder="The Wedding of Andi & Siti" class="text-slate-900 w-full bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-xl p-3 text-sm font-medium focus:ring-2 focus:ring-rose-500 focus:bg-white dark:focus:bg-slate-600 dark:text-white transition-all">
                            </div>
                            
                            <h4 class="text-sm font-bold text-slate-800 dark:text-slate-200 mt-4 mb-3 pb-2 border-b border-slate-200 dark:border-slate-700">Acara Resepsi</h4>
                            <div class="grid grid-cols-2 gap-5">
                                <div>
                                    <label class="block text-xs font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider mb-2">Tanggal Resepsi</label>
                                    <input type="date" name="event_date" x-model="event_date" required class="text-slate-900 w-full bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-xl p-3 text-sm font-medium focus:ring-2 focus:ring-rose-500 focus:bg-white dark:focus:bg-slate-600 dark:text-white transition-all">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider mb-2">Pukul (WIB)</label>
                                    <input type="time" name="event_time" x-model="event_time" required class="text-slate-900 w-full bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-xl p-3 text-sm font-medium focus:ring-2 focus:ring-rose-500 focus:bg-white dark:focus:bg-slate-600 dark:text-white transition-all">
                                </div>
                            </div>
                            
                            <div>
                                <label class="block text-xs font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider mb-2">Tempat Resepsi</label>
                                <input type="text" name="location_name" x-model="location_name" required placeholder="Grand Ballroom Hotel Mulia" class="text-slate-900 w-full bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-xl p-3 text-sm font-medium focus:ring-2 focus:ring-rose-500 focus:bg-white dark:focus:bg-slate-600 dark:text-white transition-all">
                            </div>
                            
                            <div>
                                <label class="block text-xs font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider mb-2">Alamat Resepsi</label>
                                <textarea name="location_address" x-model="location_address" required rows="2" placeholder="Jl. Asia Afrika No.1, Senayan..." class="text-slate-900 w-full bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-xl p-3 text-sm font-medium focus:ring-2 focus:ring-rose-500 focus:bg-white dark:focus:bg-slate-600 dark:text-white transition-all"></textarea>
                            </div>

                            <h4 class="text-sm font-bold text-slate-800 dark:text-slate-200 mt-6 mb-3 pb-2 border-b border-slate-200 dark:border-slate-700">Akad Nikah / Pemberkatan</h4>
                            <div class="grid grid-cols-2 gap-5">
                                <div>
                                    <label class="block text-xs font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider mb-2">Tanggal Akad</label>
                                    <input type="date" name="akad_date" x-model="akad_date" required class="text-slate-900 w-full bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-xl p-3 text-sm font-medium focus:ring-2 focus:ring-rose-500 focus:bg-white dark:focus:bg-slate-600 dark:text-white transition-all">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider mb-2">Pukul (WIB)</label>
                                    <input type="time" name="akad_time" x-model="akad_time" required class="text-slate-900 w-full bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-xl p-3 text-sm font-medium focus:ring-2 focus:ring-rose-500 focus:bg-white dark:focus:bg-slate-600 dark:text-white transition-all">
                                </div>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider mb-2">Tempat Akad</label>
                                <input type="text" name="akad_location" x-model="akad_location" required placeholder="Masjid Raya / Gereja Pusat" class="text-slate-900 w-full bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-xl p-3 text-sm font-medium focus:ring-2 focus:ring-rose-500 focus:bg-white dark:focus:bg-slate-600 dark:text-white transition-all">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider mb-2">Alamat Akad</label>
                                <textarea name="akad_address" x-model="akad_address" required rows="2" placeholder="Jl. Raya..." class="text-slate-900 w-full bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-xl p-3 text-sm font-medium focus:ring-2 focus:ring-rose-500 focus:bg-white dark:focus:bg-slate-600 dark:text-white transition-all"></textarea>
                            </div>

                            <h4 class="text-sm font-bold text-slate-800 dark:text-slate-200 mt-6 mb-3 pb-2 border-b border-slate-200 dark:border-slate-700">Lokasi & Streaming</h4>
                            <div>
                                <label class="block text-xs font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider mb-2">Link Google Maps</label>
                                <input type="url" name="google_maps_url" x-model="google_maps_url" placeholder="https://maps.app.goo.gl/..." class="text-slate-900 w-full bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-xl p-3 text-sm font-medium focus:ring-2 focus:ring-rose-500 focus:bg-white dark:focus:bg-slate-600 dark:text-white transition-all">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider mb-2">Link Live Streaming (Opsional)</label>
                                <input type="url" name="live_stream_url" x-model="live_stream_url" placeholder="https://youtube.com/live/..." class="text-slate-900 w-full bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-xl p-3 text-sm font-medium focus:ring-2 focus:ring-rose-500 focus:bg-white dark:focus:bg-slate-600 dark:text-white transition-all">
                            </div>

                            <h4 class="text-sm font-bold text-slate-800 dark:text-slate-200 mt-6 mb-3 pb-2 border-b border-slate-200 dark:border-slate-700">Kutipan Pembuka</h4>
                            <div>
                                <label class="block text-xs font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider mb-2">Teks Ayat/Kutipan</label>
                                <textarea name="quote_text" x-model="quote_text" rows="3" placeholder="Dan di antara tanda-tanda kekuasaan-Nya..." class="text-slate-900 w-full bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-xl p-3 text-sm font-medium focus:ring-2 focus:ring-rose-500 focus:bg-white dark:focus:bg-slate-600 dark:text-white transition-all"></textarea>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider mb-2">Sumber Kutipan</label>
                                <input type="text" name="quote_source" x-model="quote_source" placeholder="QS. Ar-Rum: 21" class="text-slate-900 w-full bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-xl p-3 text-sm font-medium focus:ring-2 focus:ring-rose-500 focus:bg-white dark:focus:bg-slate-600 dark:text-white transition-all">
                            </div>
                        </div>
                    </div>

                    <div class="w-full h-px bg-slate-100 dark:bg-slate-700"></div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                        <!-- Groom -->
                        <div>
                            <h3 class="text-lg font-bold text-slate-800 dark:text-slate-100 flex items-center gap-2 mb-6">
                                <span class="bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 p-1.5 rounded-lg">🤵</span> Mempelai Pria
                            </h3>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-xs font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider mb-1.5">Nama Lengkap</label>
                                    <input type="text" name="groom_name" x-model="groom_name" required class="text-slate-900 w-full bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-xl p-2.5 text-sm focus:ring-2 focus:ring-blue-500 focus:bg-white dark:focus:bg-slate-600 dark:text-white transition">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider mb-1.5">Nama Panggilan</label>
                                    <input type="text" name="groom_nickname" x-model="groom_nickname" required class="text-slate-900 w-full bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-xl p-2.5 text-sm focus:ring-2 focus:ring-blue-500 focus:bg-white dark:focus:bg-slate-600 dark:text-white transition">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider mb-1.5">Nama Ayah</label>
                                    <input type="text" name="groom_father" x-model="groom_father" class="text-slate-900 w-full bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-xl p-2.5 text-sm focus:ring-2 focus:ring-blue-500 focus:bg-white dark:focus:bg-slate-600 dark:text-white transition">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider mb-1.5">Nama Ibu</label>
                                    <input type="text" name="groom_mother" x-model="groom_mother" class="text-slate-900 w-full bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-xl p-2.5 text-sm focus:ring-2 focus:ring-blue-500 focus:bg-white dark:focus:bg-slate-600 dark:text-white transition">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider mb-1.5">Foto Pria (Bulat PNG)</label>
                                    <input type="file" name="groom_photo" accept="image/png, image/jpeg" class="text-slate-900 w-full bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-xl p-2 text-sm focus:ring-2 focus:ring-blue-500 bg-white">
                                </div>
                            </div>
                        </div>

                        <!-- Bride -->
                        <div>
                            <h3 class="text-lg font-bold text-slate-800 dark:text-slate-100 flex items-center gap-2 mb-6">
                                <span class="bg-pink-100 dark:bg-pink-900/30 text-pink-600 dark:text-pink-400 p-1.5 rounded-lg">👰</span> Mempelai Wanita
                            </h3>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-xs font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider mb-1.5">Nama Lengkap</label>
                                    <input type="text" name="bride_name" x-model="bride_name" required class="text-slate-900 w-full bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-xl p-2.5 text-sm focus:ring-2 focus:ring-pink-500 focus:bg-white dark:focus:bg-slate-600 dark:text-white transition">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider mb-1.5">Nama Panggilan</label>
                                    <input type="text" name="bride_nickname" x-model="bride_nickname" required class="text-slate-900 w-full bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-xl p-2.5 text-sm focus:ring-2 focus:ring-pink-500 focus:bg-white dark:focus:bg-slate-600 dark:text-white transition">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider mb-1.5">Nama Ayah</label>
                                    <input type="text" name="bride_father" x-model="bride_father" class="text-slate-900 w-full bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-xl p-2.5 text-sm focus:ring-2 focus:ring-pink-500 focus:bg-white dark:focus:bg-slate-600 dark:text-white transition">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider mb-1.5">Nama Ibu</label>
                                    <input type="text" name="bride_mother" x-model="bride_mother" class="text-slate-900 w-full bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-xl p-2.5 text-sm focus:ring-2 focus:ring-pink-500 focus:bg-white dark:focus:bg-slate-600 dark:text-white transition">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider mb-1.5">Foto Wanita (Bulat PNG)</label>
                                    <input type="file" name="bride_photo" accept="image/png, image/jpeg" class="text-slate-900 w-full bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-xl p-2 text-sm focus:ring-2 focus:ring-pink-500 bg-white">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tab: Galeri -->
                <div x-show="activeTab === 'galeri'" style="display: none;" class="space-y-6">
                    <h3 class="text-xl font-bold text-slate-800 dark:text-slate-100 border-l-4 border-rose-500 pl-3 mb-6">Galeri Foto Momen Bahagia</h3>
                    
                    <div class="border-2 border-dashed border-slate-300 dark:border-slate-600 rounded-2xl p-8 text-center bg-slate-50 dark:bg-slate-700/50 hover:bg-slate-100 dark:hover:bg-slate-700 transition">
                        <input type="file" name="photos[]" multiple accept="image/*" class="hidden" id="photo-upload" @change="handlePhotoUpload">
                        <label for="photo-upload" class="cursor-pointer flex flex-col items-center">
                            <svg class="w-12 h-12 text-slate-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                            <span class="text-slate-600 dark:text-slate-300 font-semibold">Klik untuk memilih foto</span>
                            <span class="text-slate-400 dark:text-slate-500 text-xs mt-1">Anda bisa memilih banyak foto sekaligus (Maks 2MB per foto)</span>
                        </label>
                    </div>

                    <!-- Client-side photo preview -->
                    <template x-if="photosPreview.length > 0">
                        <div class="grid grid-cols-3 gap-4 mt-6">
                            <template x-for="(url, index) in photosPreview" :key="index">
                                <div class="relative rounded-xl overflow-hidden shadow-sm border border-slate-200 dark:border-slate-700 h-32 group">
                                    <img :src="url" class="w-full h-full object-cover">
                                    <button type="button" @click="removePhoto(index)" class="absolute top-2 right-2 bg-red-500 hover:bg-red-600 text-white rounded-full p-1 opacity-0 group-hover:opacity-100 transition shadow-md">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                    </button>
                                </div>
                            </template>
                        </div>
                    </template>
                    <p x-show="photosPreview.length > 0" class="text-xs text-slate-500 text-center mt-2">
                        Terpilih <span x-text="photosPreview.length"></span> foto (Min 3, Maks 6).
                    </p>
                </div>

                <!-- Tab: Amplop Digital -->
                <div x-show="activeTab === 'amplop'" style="display: none;" class="space-y-6">
                    <div class="flex justify-between items-center mb-6 border-b border-slate-100 dark:border-slate-700 pb-4">
                        <h3 class="text-xl font-bold text-slate-800 dark:text-slate-100 border-l-4 border-rose-500 pl-3">Amplop Digital (Kado)</h3>
                        <button type="button" @click="addEnvelope" class="text-sm bg-slate-800 dark:bg-slate-700 text-white px-5 py-2.5 rounded-xl hover:bg-slate-700 dark:hover:bg-slate-600 font-semibold transition shadow-sm">
                            + Tambah Rekening
                        </button>
                    </div>

                    <div class="space-y-5">
                        <template x-for="(envelope, index) in envelopes" :key="index">
                            <div class="bg-slate-50 dark:bg-slate-700/50 p-6 rounded-2xl border border-slate-200 dark:border-slate-700 shadow-sm flex items-start gap-4">
                                <div class="flex-1 grid grid-cols-1 md:grid-cols-3 gap-5">
                                    <div>
                                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Bank / E-Wallet</label>
                                        <input type="text" x-model="envelope.bank_name" :name="'envelopes['+index+'][bank_name]'" placeholder="BCA / DANA" class="text-slate-900 w-full bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-600 rounded-xl p-3 text-sm focus:ring-2 focus:ring-rose-500 dark:text-white">
                                    </div>
                                    <div>
                                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">No. Rekening</label>
                                        <input type="text" x-model="envelope.account_number" :name="'envelopes['+index+'][account_number]'" class="text-slate-900 w-full bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-600 rounded-xl p-3 text-sm focus:ring-2 focus:ring-rose-500 dark:text-white">
                                    </div>
                                    <div>
                                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Atas Nama</label>
                                        <input type="text" x-model="envelope.account_owner" :name="'envelopes['+index+'][account_owner]'" class="text-slate-900 w-full bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-600 rounded-xl p-3 text-sm focus:ring-2 focus:ring-rose-500 dark:text-white">
                                    </div>
                                </div>
                                <button type="button" @click="removeEnvelope(index)" class="mt-7 text-slate-400 hover:text-red-500 p-2.5 rounded-xl hover:bg-red-50 transition bg-white dark:bg-slate-800">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </div>
                        </template>
                    </div>

                    <div class="mt-8 border-t border-slate-100 dark:border-slate-700 pt-6">
                        <h4 class="text-sm font-bold text-slate-800 dark:text-slate-200 mb-3">Kirim Kado Fisik</h4>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Alamat Pengiriman Paket / Kado</label>
                        <textarea name="physical_gift_address" x-model="physical_gift_address" rows="3" placeholder="Penerima: Andi / Siti&#10;No HP: 0812...&#10;Alamat: Jl. Sudirman No 1..." class="text-slate-900 w-full bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-xl p-3 text-sm focus:ring-2 focus:ring-rose-500 dark:text-white"></textarea>
                    </div>
                </div>

                <!-- Tab: Tema & Layout -->
                <div x-show="activeTab === 'tema'" style="display: none;" class="space-y-6">
                    <h3 class="text-xl font-bold text-slate-800 dark:text-slate-100 border-l-4 border-rose-500 pl-3 mb-6">Tema Desain & Kustomisasi</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 bg-slate-50 dark:bg-slate-700/50 p-6 rounded-2xl border border-slate-200 dark:border-slate-700">
                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Tema Hak Akses</label>
                            <input type="hidden" name="template_theme" x-model="template_theme" value="{{ auth()->user()->theme ? auth()->user()->theme->slug : 'rustic' }}">
                            <div class="w-full bg-slate-100 dark:bg-slate-800 border border-slate-200 dark:border-slate-600 rounded-xl p-3 text-sm font-semibold text-slate-500 dark:text-slate-400 flex items-center justify-between cursor-not-allowed">
                                <span>{{ auth()->user()->theme ? auth()->user()->theme->name : 'Rustic Botanical' }}</span>
                                <svg class="w-4 h-4 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            </div>
                            <p class="text-[10px] text-slate-400 mt-2">Tema dikunci sesuai paket yang dibeli.</p>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Tipografi (Fonts)</label>
                            <select name="font_family" x-model="font_family" class="text-slate-900 w-full bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-600 rounded-xl p-3 text-sm font-medium focus:ring-2 focus:ring-rose-500 dark:text-white">
                                <option value="serif">Classic Serif (Playfair)</option>
                                <option value="sans">Modern Sans-Serif (Inter)</option>
                                <option value="mono">Elegant Monospace</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Kepadatan Layout</label>
                            <select name="custom_size" x-model="custom_size" class="text-slate-900 w-full bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-600 rounded-xl p-3 text-sm font-medium focus:ring-2 focus:ring-rose-500 dark:text-white">
                                <option value="compact">Compact Spacing</option>
                                <option value="normal">Normal Elegant</option>
                                <option value="loose">Spacious / Loose</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="mt-6 bg-slate-50 dark:bg-slate-700/50 p-6 rounded-2xl border border-slate-200 dark:border-slate-700">
                        <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Backsound Musik (Opsional)</label>
                        <input type="file" name="music_file" accept=".mp3,.wav,.ogg" class="text-slate-900 w-full bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-600 rounded-xl p-3 text-sm focus:ring-2 focus:ring-rose-500 dark:text-white" @change="musicFileName = $event.target.files[0] ? $event.target.files[0].name : ''">
                        <p class="text-xs text-slate-400 mt-2">Pilih file audio (.mp3, .wav) maksimal 10MB. Musik akan diputar otomatis saat undangan dibuka.</p>
                    </div>
                </div>

                <!-- Tab: Kelola Tamu -->
                <div x-show="activeTab === 'tamu'" style="display: none;" class="space-y-6">
                    <h3 class="text-xl font-bold text-slate-800 dark:text-slate-100 border-l-4 border-rose-500 pl-3 mb-4">Kelola Daftar Nama Tamu</h3>
                    
                    <div class="flex gap-4 mb-8">
                        <input type="text" x-model="newGuestName" @keydown.enter.prevent="addGuest" placeholder="Ketik Nama Tamu" class="text-slate-900 flex-1 bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-xl p-3 text-sm focus:ring-2 focus:ring-rose-500 dark:text-white">
                        <button type="button" @click="addGuest" class="px-6 py-3 bg-rose-500 hover:bg-rose-600 text-white font-bold rounded-xl shadow-md transition">
                            Tambah Tamu
                        </button>
                    </div>

                    <h4 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-4">Daftar Tamu Aktif</h4>
                    <div class="space-y-3">
                        <template x-for="(guest, index) in guests" :key="index">
                            <div class="bg-white dark:bg-slate-700/50 p-4 rounded-xl border border-slate-200 dark:border-slate-600 shadow-sm flex items-center justify-between gap-4">
                                <input type="hidden" :name="'guests['+index+'][name]'" :value="guest.name">
                                <div class="flex-1 overflow-hidden">
                                    <strong class="text-slate-800 dark:text-slate-200 block mb-1" x-text="guest.name"></strong>
                                    <p class="text-[10px] text-blue-500 truncate opacity-70" x-text="'https://undangan.com/wedding?to=' + encodeURIComponent(guest.name)"></p>
                                </div>
                                <button type="button" @click="removeGuest(index)" class="p-2 text-red-400 hover:text-red-500 bg-red-50 rounded-lg">
                                    Hapus
                                </button>
                            </div>
                        </template>
                        <template x-if="guests.length === 0">
                            <div class="text-center py-8 text-slate-400 border border-dashed border-slate-200 rounded-xl">
                                Belum ada tamu.
                            </div>
                        </template>
                    </div>
                </div>

                <!-- Fixed bottom bar for save button -->
                <div class="fixed bottom-0 left-0 w-full lg:w-[55%] bg-white dark:bg-slate-800 border-t border-slate-200 dark:border-slate-700 p-4 px-10 flex justify-end z-20 shadow-[0_-10px_30px_rgba(0,0,0,0.05)] transition-colors duration-300">
                    <button type="submit" class="px-8 py-3 bg-rose-500 hover:bg-rose-600 text-white font-bold rounded-xl shadow-[0_5px_15px_rgba(244,63,94,0.3)] hover:shadow-[0_8px_20px_rgba(244,63,94,0.4)] hover:-translate-y-0.5 transition-all flex items-center gap-2">
                        Simpan & Publikasikan Undangan &rarr;
                    </button>
                </div>
            </form>
        </div>

        <!-- Right Sidebar (Preview) -->
        <div class="w-full lg:w-[45%] bg-white dark:bg-slate-800 border-l border-slate-200 dark:border-slate-700 p-8 flex flex-col items-center overflow-hidden hidden lg:flex relative shadow-[-10px_0_30px_rgba(0,0,0,0.02)] transition-colors duration-300">
            <div class="w-full flex items-center justify-between mb-8 border-b border-slate-200 dark:border-slate-700 pb-3">
                <h3 class="text-xs font-bold tracking-widest text-slate-400 flex items-center gap-2 uppercase">
                    <svg class="w-4 h-4 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                    Live Smartphone Preview Simulator
                </h3>
            </div>

            <!-- iPhone Mockup -->
            <div class="relative w-[340px] h-[720px] bg-slate-900 rounded-[3rem] border-[10px] border-slate-800 shadow-2xl overflow-hidden shrink-0 mt-4 transition-all">
                <div class="absolute top-0 inset-x-0 h-7 bg-slate-800 w-[140px] mx-auto rounded-b-3xl z-40 flex justify-center items-center pb-1">
                    <div class="w-12 h-1.5 bg-black rounded-full opacity-50"></div>
                </div>
                
                <div x-show="isOpen" class="absolute top-10 right-4 z-50">
                  <button @click="isPlaying = !isPlaying" 
                          :class="isPlaying ? 'bg-amber-600 text-white animate-pulse' : 'bg-white text-slate-800'"
                          class="p-2.5 rounded-full shadow-lg flex items-center justify-center transition cursor-pointer">
                    <svg x-show="isPlaying" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072M18.364 5.636a9 9 0 010 12.728M11 5L6 9H2v6h4l5 4V5z"></path></svg>
                    <svg x-show="!isPlaying" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2"></path></svg>
                  </button>
                </div>

                <!-- Screen Content (Live Preview) -->
                <div class="relative w-full h-full overflow-y-auto overflow-x-hidden transition-colors duration-500"
                     :class="{
                         'bg-rose-50 text-rose-950': template_theme === 'romance',
                         'bg-amber-50/50 text-stone-800': template_theme === 'gold',
                         'bg-emerald-50/50 text-emerald-950': template_theme === 'forest',
                         'bg-slate-50 text-slate-900': template_theme === 'modern',
                         'bg-[#F9F6F0] text-[#4A3F35]': template_theme === 'rustic',
                         'bg-sky-50/50 text-sky-950': template_theme === 'ocean',
                         'bg-blue-50 text-blue-950': template_theme === 'bunga-biru',
                         'font-serif': font_family === 'serif',
                         'font-sans': font_family === 'sans',
                         'font-mono': font_family === 'mono',
                     }">
                    
                    <div class="absolute inset-0 z-0 transition-colors duration-500"
                         :class="{
                             'bg-white': template_theme === 'romance',
                             'bg-white': template_theme === 'gold',
                             'bg-white': template_theme === 'forest',
                             'bg-white': template_theme === 'modern',
                             'bg-white': template_theme === 'rustic',
                             'bg-white': template_theme === 'ocean',
                             'bg-white': template_theme === 'bunga-biru',
                         }"></div>
                    
                    <!-- COVER PAGE -->
                    <div x-show="!isOpen" class="relative z-10 flex flex-col justify-between items-center text-center h-full pt-24 pb-12 px-6">
                        
                        <!-- Real-time Floral Corners -->
                        <div class="absolute w-[120px] h-[120px] top-0 left-0 bg-cover bg-center opacity-80 pointer-events-none z-20 mix-blend-multiply" :style="`background-image: url('/assets/themes/${template_theme}/corner.png');`"></div>
                        <div class="absolute w-[120px] h-[120px] bottom-0 right-0 bg-cover bg-center opacity-80 pointer-events-none z-20 mix-blend-multiply rotate-180" :style="`background-image: url('/assets/themes/${template_theme}/corner.png');`"></div>
                        
                        <div class="relative z-10 w-full max-w-sm mx-auto p-6 rounded-[2rem] flex flex-col items-center border border-current opacity-95 bg-white shadow-xl"
                             :class="{
                                'border-rose-100': template_theme === 'romance',
                                'border-amber-200/60': template_theme === 'gold',
                                'border-emerald-100': template_theme === 'forest',
                                'border-slate-100': template_theme === 'modern',
                                'border-[#EAE0D5]': template_theme === 'rustic',
                                'border-sky-100': template_theme === 'ocean',
                                'border-blue-100': template_theme === 'bunga-biru',
                             }">
                            <p class="text-[10px] tracking-widest uppercase mb-4 font-semibold opacity-60">Berlayar Bersama</p>
                            <h1 class="text-3xl font-bold mb-6">
                                <span x-text="groom_nickname || 'Groom'"></span> &amp; <span x-text="bride_nickname || 'Bride'"></span>
                            </h1>
                            <p class="text-xs mb-2 opacity-60">Kepada Yth. Bapak/Ibu/Saudara/i</p>
                            <h2 class="text-xl font-bold mb-4">Tamu Kehormatan</h2>
                            
                            <button type="button" @click="isOpen = true" class="px-6 py-2.5 rounded-full font-bold shadow-md transition-transform hover:scale-105 flex items-center gap-2 text-xs mt-2"
                                    :class="{
                                        'bg-rose-600 text-white': template_theme === 'romance',
                                        'bg-amber-500 text-white': template_theme === 'gold',
                                        'bg-emerald-600 text-white': template_theme === 'forest',
                                        'bg-slate-800 text-white': template_theme === 'modern',
                                        'bg-[#C69C6D] text-white': template_theme === 'rustic',
                                        'bg-sky-500 text-white': template_theme === 'ocean',
                                        'bg-blue-600 text-white': template_theme === 'bunga-biru',
                                    }">
                                Buka Undangan
                            </button>
                        </div>
                    </div>

                    <!-- INNER CONTENT -->
                    <div x-show="isOpen" style="display: none;" class="relative z-10 pb-16 pt-16 px-5 flex flex-col items-center text-center">
                        
                        <!-- Real-time Floral Corners (Top Right & Bottom Left) -->
                        <div class="absolute w-[120px] h-[120px] top-0 right-0 bg-cover bg-center opacity-80 pointer-events-none z-20 mix-blend-multiply rotate-90" :style="`background-image: url('/assets/themes/${template_theme}/corner.png');`"></div>
                        
                        <p class="text-[10px] tracking-[0.2em] uppercase mb-4 font-bold opacity-60">The Wedding Of</p>
                        <h1 class="text-5xl font-bold mb-4">
                            <span x-text="(groom_nickname || 'G').charAt(0)"></span> 
                            <span :class="{
                                'text-pink-400': template_theme === 'romance',
                                'text-yellow-400': template_theme === 'gold',
                                'text-emerald-400': template_theme === 'forest',
                                'text-slate-400': template_theme === 'modern',
                                'text-blue-400': template_theme === 'bunga-biru',
                            }">&amp;</span> 
                            <span x-text="(bride_nickname || 'B').charAt(0)"></span>
                        </h1>
                        <p class="text-xs italic opacity-80 mt-6 mb-4 px-2">"Seperti perahu kertas yang berlayar di sungai kehidupan, aliran arus mempertemukan kita untuk menuju muara yang sama."</p>
                        <p class="text-sm font-semibold mt-4 border-t border-b border-current opacity-60 py-2 inline-block px-6" x-text="event_date || '18 Oktober 2026'"></p>

                        <div class="w-full mt-12 mb-8"
                             :class="{
                                'bg-white': template_theme === 'romance',
                                'bg-zinc-800/60': template_theme === 'gold',
                                'bg-emerald-900/60': template_theme === 'forest',
                                'bg-white border-slate-200': template_theme === 'modern',
                             }" class="p-6 rounded-3xl border border-current opacity-90 shadow-md">
                            <h2 class="text-2xl font-bold mb-6">Dua Insan</h2>
                            <div class="mb-4">
                                <h3 class="text-xl font-bold" x-text="groom_name || 'Nama Pria'"></h3>
                            </div>
                            <div class="text-2xl opacity-60 my-2">&amp;</div>
                            <div>
                                <h3 class="text-xl font-bold" x-text="bride_name || 'Nama Wanita'"></h3>
                            </div>
                        </div>

                        <!-- Gallery Preview -->
                        <template x-if="photosPreview.length > 0">
                            <div class="w-full mt-8 mb-8">
                                <h2 class="text-xl font-bold mb-4">Galeri Memori</h2>
                                <div class="grid grid-cols-2 gap-3">
                                    <template x-for="(url, index) in photosPreview" :key="index">
                                        <div class="relative aspect-square rounded-xl overflow-hidden shadow-sm border border-current opacity-90">
                                            <img :src="url" class="w-full h-full object-cover">
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </template>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .overflow-y-auto::-webkit-scrollbar { display: none; }
        .overflow-y-auto { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</div>

<script>
function invitationBuilder() {
    return {
        activeTab: 'acara',
        darkMode: false,
        isOpen: false,
        isPlaying: false,
        title: '{{ old('title', '') }}',
        event_date: '{{ old('event_date', '') }}',
        event_time: '{{ old('event_time', '') }}',
        location_name: '{{ old('location_name', '') }}',
        location_address: '{{ old('location_address', '') }}',
        google_maps_url: '{{ old('google_maps_url', '') }}',
        template_theme: '{{ auth()->user()->theme ? auth()->user()->theme->slug : 'rustic' }}',
        custom_size: 'normal',
        font_family: '{{ old('font_family', 'serif') }}',
        groom_name: '{{ old('groom_name', '') }}',
        groom_nickname: '{{ old('groom_nickname', '') }}',
        groom_father: '{{ old('groom_father', '') }}',
        groom_mother: '{{ old('groom_mother', '') }}',
        bride_name: '{{ old('bride_name', '') }}',
        bride_nickname: '{{ old('bride_nickname', '') }}',
        bride_father: '{{ old('bride_father', '') }}',
        bride_mother: '{{ old('bride_mother', '') }}',
        
        akad_date: '{{ old('akad_date', '') }}',
        akad_time: '{{ old('akad_time', '') }}',
        akad_location: '{{ old('akad_location', '') }}',
        akad_address: '{{ old('akad_address', '') }}',
        live_stream_url: '{{ old('live_stream_url', '') }}',
        quote_text: `{!! old('quote_text', '') !!}`,
        quote_source: '{{ old('quote_source', '') }}',
        physical_gift_address: `{!! old('physical_gift_address', '') !!}`,
        
        envelopes: [{ bank_name: '', account_number: '', account_owner: '' }],
        addEnvelope() {
            this.envelopes.push({ bank_name: '', account_number: '', account_owner: '' });
        },
        removeEnvelope(index) {
            this.envelopes.splice(index, 1);
        },

        guests: [],
        newGuestName: '',
        addGuest() {
            if (this.newGuestName.trim() !== '') {
                this.guests.push({ 
                    name: this.newGuestName 
                });
                this.newGuestName = '';
            }
        },
        removeGuest(index) {
            this.guests.splice(index, 1);
        },

        photoFiles: [],
        photosPreview: [],
        handlePhotoUpload(event) {
            const files = event.target.files;
            
            if (this.photoFiles.length + files.length > 6) {
                alert('Maksimal 6 foto yang diperbolehkan untuk galeri.');
                return;
            }

            for (let i = 0; i < files.length; i++) {
                this.photoFiles.push(files[i]);
                this.photosPreview.push(URL.createObjectURL(files[i]));
            }
            
            // Sync to file input
            const dt = new DataTransfer();
            this.photoFiles.forEach(f => dt.items.add(f));
            document.getElementById('photo-upload').files = dt.files;
        },
        removePhoto(index) {
            this.photoFiles.splice(index, 1);
            this.photosPreview.splice(index, 1);
            
            // Sync to file input
            const dt = new DataTransfer();
            this.photoFiles.forEach(f => dt.items.add(f));
            document.getElementById('photo-upload').files = dt.files;
        }
    }
}
</script>
</x-layouts.builder>
