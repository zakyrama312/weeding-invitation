<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>{{ $invitation->title }} - Undangan Pernikahan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Inter:wght@300;400;600&family=Great+Vibes&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    @php
        $theme = $invitation->template_theme ?? 'rustic';
        
        // Theme Configurations
        $themeConfig = [
            'rustic' => [
                'bg_main' => 'bg-[#F9F6F0]',
                'text_main' => 'text-[#4A3F35]',
                'text_muted' => 'text-[#8A7F75]',
                'accent' => 'text-[#8B5A2B]',
                'accent_bg' => 'bg-[#8B5A2B]',
                'card_bg' => 'bg-white shadow-xl shadow-[#8B5A2B]/5 border border-[#EAE0D5]',
                'ornament_color' => '#8B5A2B',
            ],
            'ocean' => [
                'bg_main' => 'bg-sky-50',
                'text_main' => 'text-sky-950',
                'text_muted' => 'text-sky-700',
                'accent' => 'text-sky-600',
                'accent_bg' => 'bg-sky-600',
                'card_bg' => 'bg-white shadow-xl shadow-sky-900/5 border border-sky-100',
                'ornament_color' => '#0284c7',
            ],
            'romance' => [
                'bg_main' => 'bg-rose-50',
                'text_main' => 'text-rose-950',
                'text_muted' => 'text-rose-700',
                'accent' => 'text-rose-500',
                'accent_bg' => 'bg-rose-500',
                'card_bg' => 'bg-white shadow-xl shadow-rose-900/5 border border-rose-100',
                'ornament_color' => '#f43f5e',
            ],
            'forest' => [
                'bg_main' => 'bg-emerald-50',
                'text_main' => 'text-emerald-950',
                'text_muted' => 'text-emerald-700',
                'accent' => 'text-emerald-600',
                'accent_bg' => 'bg-emerald-600',
                'card_bg' => 'bg-white shadow-xl shadow-emerald-900/5 border border-emerald-100',
                'ornament_color' => '#059669',
            ],
            'gold' => [
                'bg_main' => 'bg-zinc-900',
                'text_main' => 'text-amber-100',
                'text_muted' => 'text-amber-200/60',
                'accent' => 'text-amber-400',
                'accent_bg' => 'bg-amber-500 text-zinc-900',
                'card_bg' => 'bg-zinc-800 shadow-xl border border-amber-500/20',
                'ornament_color' => '#fbbf24',
            ],
            'bunga-biru' => [
                'bg_main' => 'bg-blue-50',
                'text_main' => 'text-blue-950',
                'text_muted' => 'text-blue-700',
                'accent' => 'text-blue-600',
                'accent_bg' => 'bg-blue-600',
                'card_bg' => 'bg-white shadow-xl shadow-blue-900/5 border border-blue-100',
                'ornament_color' => '#2563eb',
            ]
        ];

        $cfg = $themeConfig[$theme] ?? $themeConfig['rustic'];

        // Fallback Date
        $akadDate = $invitation->akad_date ? \Carbon\Carbon::parse($invitation->akad_date) : null;
        $resepsiDate = $invitation->event_date ? \Carbon\Carbon::parse($invitation->event_date) : now();
    @endphp

    @php
        $cornerPath = 'assets/themes/' . $theme . '/corner.png';
        $hasCorner = file_exists(public_path($cornerPath));
    @endphp

    <style>
        .font-serif { font-family: 'Playfair Display', serif; }
        .font-sans { font-family: 'Inter', sans-serif; }
        .font-script { font-family: 'Great Vibes', cursive; }
        
        .ornament-corner {
            position: absolute;
            width: 150px;
            height: 150px;
            opacity: 0.8;
            pointer-events: none;
            z-index: 10;
        }
        .corner-tl { top: 0; left: 0; }
        .corner-br { bottom: 0; right: 0; transform: rotate(180deg); }
        .corner-tr { top: 0; right: 0; transform: rotate(90deg); }
        .corner-bl { bottom: 0; left: 0; transform: rotate(-90deg); }

        /* Dynamic Floral/Corner Ornaments */
        .svg-floral {
            @if($hasCorner)
                background-image: url("{{ asset($cornerPath) }}");
                background-size: contain;
                /* mix-blend-mode: multiply; */ /* Hapus comment ini jika background fotomu putih/tidak transparan */
            @else
                background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 200 200'%3E%3Cpath fill='{{ urlencode($cfg['ornament_color']) }}' d='M0,0 C50,0 100,20 120,60 C140,100 130,150 100,180 C110,130 90,80 40,50 C20,30 0,20 0,0 Z' opacity='0.2'/%3E%3Cpath fill='{{ urlencode($cfg['ornament_color']) }}' d='M20,0 C60,10 90,40 100,80 C80,50 40,30 0,30 Z' opacity='0.4'/%3E%3C/svg%3E");
                background-size: cover;
            @endif
            background-repeat: no-repeat;
            background-position: center;
            animation: breathe 6s ease-in-out infinite alternate;
        }

        /* Breathing Animation for Florals */
        @keyframes breathe {
            0% { transform: scale(1); }
            100% { transform: scale(1.05); }
        }

        /* Paper Texture Overlay */
        .paper-texture {
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            opacity: 0.4;
            pointer-events: none;
            z-index: 1;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noiseFilter'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.65' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noiseFilter)'/%3E%3C/svg%3E");
        }

        /* Golden Ring Frame */
        .golden-ring {
            position: relative;
        }
        .golden-ring::before {
            content: '';
            position: absolute;
            top: -8px; left: -8px; right: -8px; bottom: -8px;
            border: 2px solid #D4AF37;
            border-radius: 50%;
            z-index: 0;
            opacity: 0.7;
            box-shadow: 0 0 10px rgba(212, 175, 55, 0.3);
        }

        /* Dynamic Divider Ornaments */
        .divider-floral {
            width: 200px;
            height: 40px;
            margin: 2rem auto;
            @php
                $dividerPath = 'assets/themes/' . $theme . '/divider.png';
                $hasDivider = file_exists(public_path($dividerPath));
            @endphp
            @if($hasDivider)
                background-image: url("{{ asset($dividerPath) }}");
                background-size: contain;
            @else
                background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 200 40'%3E%3Cpath stroke='{{ urlencode($cfg['ornament_color']) }}' stroke-width='1' fill='none' d='M0,20 Q50,0 100,20 T200,20' opacity='0.5'/%3E%3Ccircle cx='100' cy='20' r='4' fill='{{ urlencode($cfg['ornament_color']) }}' opacity='0.7'/%3E%3Ccircle cx='90' cy='20' r='2' fill='{{ urlencode($cfg['ornament_color']) }}' opacity='0.5'/%3E%3Ccircle cx='110' cy='20' r='2' fill='{{ urlencode($cfg['ornament_color']) }}' opacity='0.5'/%3E%3C/svg%3E");
                background-size: cover;
            @endif
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
</head>
<body x-data="{ isOpen: false, isPlaying: false, activeSection: 'home' }" class="{{ $cfg['bg_main'] }} {{ $cfg['text_main'] }} font-sans antialiased selection:bg-rose-200 overflow-x-hidden"
      @scroll.window="
        let scrollPos = window.scrollY;
        ['home', 'mempelai', 'acara', 'galeri', 'rsvp'].forEach(id => {
            let el = document.getElementById(id);
            if(el && el.offsetTop <= scrollPos + 150) {
                activeSection = id;
            }
        });
      ">

    <div class="paper-texture"></div>

    @if($invitation->music_path)
    <audio id="bg-music" loop>
        <source src="{{ Storage::url($invitation->music_path) }}" type="audio/mpeg">
    </audio>
    @endif

    <!-- COVER SECTION -->
    <div x-show="!isOpen" class="fixed inset-0 z-[100] flex flex-col items-center justify-center {{ $cfg['bg_main'] }} transition-opacity duration-1000" x-transition.opacity>
        <div class="ornament-corner corner-tl svg-floral"></div>
        <div class="ornament-corner corner-br svg-floral"></div>
        
        <div class="relative z-10 w-full max-w-md mx-auto p-8 text-center" data-aos="zoom-in" data-aos-duration="1500">
            <p class="text-xs tracking-[0.3em] uppercase mb-6 font-bold opacity-70">The Wedding Of</p>
            <h1 class="text-6xl font-script mb-6 {{ $cfg['accent'] }}">
                {{ $invitation->brides->groom_nickname }} & {{ $invitation->brides->bride_nickname }}
            </h1>
            <div class="divider-floral"></div>
            <p class="text-sm mb-2 opacity-70">Kepada Yth. Bapak/Ibu/Saudara/i</p>
            <h2 class="text-2xl font-bold mb-10 font-serif border-b border-current pb-2 inline-block px-4">Tamu Kehormatan</h2>
            
            <button @click="isOpen = true; isPlaying = true; document.getElementById('bg-music')?.play()" class="{{ $cfg['accent_bg'] }} text-white px-8 py-3 rounded-full font-bold shadow-lg hover:shadow-xl transition-all hover:-translate-y-1 flex items-center justify-center gap-2 mx-auto">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 19v-8.93a2 2 0 01.89-1.664l7-4.666a2 2 0 012.22 0l7 4.666A2 2 0 0121 10.07V19M14 14.25a3 3 0 10-4 0v3.5m4-3.5v3.5M9 8.5h6"></path></svg>
                Buka Undangan
            </button>
        </div>
    </div>

    <!-- MAIN INVITATION CONTENT -->
    <div x-show="isOpen" style="display: none;" class="pb-24">
        
        <!-- HOME / HERO -->
        <section id="home" class="min-h-screen relative flex flex-col items-center justify-center text-center p-6 overflow-hidden">
            <div class="ornament-corner corner-tr svg-floral"></div>
            <div class="ornament-corner corner-bl svg-floral"></div>

            <div data-aos="fade-up" data-aos-duration="1000" class="relative z-10">
                <p class="text-xs tracking-[0.2em] uppercase mb-4 font-bold opacity-60">We Are Getting Married</p>
                <h1 class="text-7xl font-script mb-4 {{ $cfg['accent'] }}">
                    {{ $invitation->brides->groom_nickname }} & {{ $invitation->brides->bride_nickname }}
                </h1>
                <p class="text-lg font-serif font-semibold mt-4 tracking-wide">
                    {{ $resepsiDate->translatedFormat('l, d F Y') }}
                </p>
            </div>
        </section>

        <!-- QUOTE SECTION -->
        <section class="py-16 px-6 relative" data-aos="fade-up">
            <div class="max-w-xl mx-auto text-center {{ $cfg['card_bg'] }} p-8 rounded-3xl relative z-10">
                <svg class="w-10 h-10 mx-auto mb-4 opacity-20" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/></svg>
                <p class="font-serif italic text-sm leading-relaxed mb-4">
                    "{!! nl2br(e($invitation->quote_text ?? 'Dan di antara tanda-tanda kekuasaan-Nya ialah Dia menciptakan untukmu isteri-isteri dari jenismu sendiri, supaya kamu cenderung dan merasa tenteram kepadanya, dan dijadikan-Nya diantaramu rasa kasih dan sayang.')) !!}"
                </p>
                <p class="text-xs font-bold uppercase tracking-wider {{ $cfg['accent'] }}">
                    - {{ $invitation->quote_source ?? 'QS. Ar-Rum: 21' }} -
                </p>
            </div>
        </section>

        <!-- MEMPELAI SECTION -->
        <section id="mempelai" class="py-20 px-6 relative z-10">
            <div class="max-w-2xl mx-auto text-center">
                <div data-aos="fade-down"><div class="divider-floral"></div></div>
                <h2 class="text-3xl font-serif font-bold mb-12" data-aos="fade-up">Mempelai</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                    <!-- Groom -->
                    <div data-aos="fade-right" class="flex flex-col items-center">
                        <div class="golden-ring mb-8">
                            <div class="w-48 h-48 rounded-full border-4 {{ str_replace('text', 'border', $cfg['accent']) }} p-1 shadow-lg overflow-hidden relative z-10">
                                @if($invitation->brides->groom_photo)
                                    <img src="{{ Storage::url($invitation->brides->groom_photo) }}" class="w-full h-full object-cover rounded-full">
                                @else
                                    <div class="w-full h-full rounded-full bg-slate-200 flex items-center justify-center text-4xl">🤵</div>
                                @endif
                            </div>
                        </div>
                        <h3 class="text-3xl font-script {{ $cfg['accent'] }} mb-2">{{ $invitation->brides->groom_name }}</h3>
                        <p class="text-sm font-semibold mb-2">Putra dari</p>
                        <p class="text-xs opacity-70">Bapak {{ $invitation->brides->groom_father ?? '-' }} <br> & Ibu {{ $invitation->brides->groom_mother ?? '-' }}</p>
                    </div>

                    <!-- Bride -->
                    <div data-aos="fade-left" class="flex flex-col items-center">
                        <div class="golden-ring mb-8">
                            <div class="w-48 h-48 rounded-full border-4 {{ str_replace('text', 'border', $cfg['accent']) }} p-1 shadow-lg overflow-hidden relative z-10">
                                @if($invitation->brides->bride_photo)
                                    <img src="{{ Storage::url($invitation->brides->bride_photo) }}" class="w-full h-full object-cover rounded-full">
                                @else
                                    <div class="w-full h-full rounded-full bg-slate-200 flex items-center justify-center text-4xl">👰</div>
                                @endif
                            </div>
                        </div>
                        <h3 class="text-3xl font-script {{ $cfg['accent'] }} mb-2">{{ $invitation->brides->bride_name }}</h3>
                        <p class="text-sm font-semibold mb-2">Putri dari</p>
                        <p class="text-xs opacity-70">Bapak {{ $invitation->brides->bride_father ?? '-' }} <br> & Ibu {{ $invitation->brides->bride_mother ?? '-' }}</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ACARA SECTION -->
        <section id="acara" class="py-20 px-6">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-12" data-aos="fade-up">
                    <h2 class="text-3xl font-serif font-bold">Rangkaian Acara</h2>
                    <p class="text-sm mt-2 opacity-70">Merupakan suatu kehormatan bagi kami apabila Bapak/Ibu/Saudara/i berkenan hadir pada acara kami.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Akad -->
                    @if($invitation->akad_date)
                    <div data-aos="zoom-in-up" class="{{ $cfg['card_bg'] }} rounded-[2rem] p-8 text-center relative overflow-hidden">
                        <div class="ornament-corner corner-tl svg-floral opacity-30"></div>
                        <h3 class="text-2xl font-serif font-bold mb-4">Akad Nikah</h3>
                        <div class="my-6">
                            <p class="text-lg font-bold {{ $cfg['accent'] }}">{{ $akadDate->translatedFormat('l, d F Y') }}</p>
                            <p class="text-sm font-semibold mt-1">Pukul {{ $invitation->akad_time }} WIB - Selesai</p>
                        </div>
                        <div class="mb-6">
                            <p class="font-bold text-sm">{{ $invitation->akad_location }}</p>
                            <p class="text-xs opacity-70 mt-2">{{ $invitation->akad_address }}</p>
                        </div>
                    </div>
                    @endif

                    <!-- Resepsi -->
                    <div data-aos="zoom-in-up" data-aos-delay="100" class="{{ $cfg['card_bg'] }} rounded-[2rem] p-8 text-center relative overflow-hidden">
                        <div class="ornament-corner corner-br svg-floral opacity-30"></div>
                        <h3 class="text-2xl font-serif font-bold mb-4">Resepsi</h3>
                        <div class="my-6">
                            <p class="text-lg font-bold {{ $cfg['accent'] }}">{{ $resepsiDate->translatedFormat('l, d F Y') }}</p>
                            <p class="text-sm font-semibold mt-1">Pukul {{ $invitation->event_time }} WIB - Selesai</p>
                        </div>
                        <div class="mb-6">
                            <p class="font-bold text-sm">{{ $invitation->location_name }}</p>
                            <p class="text-xs opacity-70 mt-2">{{ $invitation->location_address }}</p>
                        </div>
                        @if($invitation->google_maps_url)
                        <a href="{{ $invitation->google_maps_url }}" target="_blank" class="inline-block mt-4 {{ $cfg['accent_bg'] }} text-white text-xs font-bold px-6 py-2 rounded-full shadow-md hover:shadow-lg transition">Buka Google Maps</a>
                        @endif
                    </div>
                </div>

                @if($invitation->live_stream_url)
                <div data-aos="fade-up" class="mt-10 text-center {{ $cfg['card_bg'] }} p-6 rounded-2xl">
                    <h3 class="text-lg font-bold mb-2">Live Streaming</h3>
                    <p class="text-xs opacity-70 mb-4">Bagi keluarga & sahabat yang berhalangan hadir, dapat menyaksikan secara virtual.</p>
                    <a href="{{ $invitation->live_stream_url }}" target="_blank" class="inline-flex items-center gap-2 {{ str_replace('bg-', 'text-', $cfg['accent_bg']) }} border-2 {{ str_replace('bg-', 'border-', $cfg['accent_bg']) }} hover:bg-slate-100 font-bold text-xs px-6 py-2 rounded-full transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        Tonton Siaran Langsung
                    </a>
                </div>
                @endif
            </div>
        </section>

        <!-- GALLERY SECTION -->
        @if($invitation->galleries && $invitation->galleries->count() > 0)
        <section id="galeri" class="py-20 px-6">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl font-serif font-bold mb-10" data-aos="fade-up">Galeri Memori</h2>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    @foreach($invitation->galleries as $index => $photo)
                    <div data-aos="zoom-in" data-aos-delay="{{ $index * 100 }}" class="aspect-square rounded-2xl overflow-hidden shadow-md">
                        <img src="{{ Storage::url($photo->file_path) }}" class="w-full h-full object-cover hover:scale-110 transition-transform duration-500">
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif

        <!-- RSVP & GUESTBOOK SECTION -->
        <section id="rsvp" class="py-20 px-6 relative">
            <div class="max-w-2xl mx-auto">
                <div class="{{ $cfg['card_bg'] }} rounded-[2rem] p-8 relative z-10" data-aos="fade-up">
                    <h2 class="text-3xl font-serif font-bold mb-2 text-center">Kehadiran & Doa Restu</h2>
                    <div class="divider-floral"></div>
                    
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-200 text-green-700 p-4 rounded-xl mb-6 text-sm text-center font-bold">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('guestbook.store', $invitation->slug) }}" method="POST" class="space-y-5">
                        @csrf
                        <div>
                            <input type="text" name="name" value="{{ request('to') }}" required placeholder="Nama Lengkap Anda" class="w-full rounded-xl border border-current opacity-50 p-3 text-sm bg-transparent focus:opacity-100 focus:outline-none focus:ring-1 focus:ring-current">
                        </div>
                        <div>
                            <select name="attendance" required class="w-full rounded-xl border border-current opacity-50 p-3 text-sm bg-transparent focus:opacity-100 focus:outline-none focus:ring-1 focus:ring-current">
                                <option value="" class="text-black">Konfirmasi Kehadiran</option>
                                <option value="hadir" class="text-black">Ya, Saya Akan Hadir</option>
                                <option value="tidak_hadir" class="text-black">Maaf, Tidak Bisa Hadir</option>
                            </select>
                        </div>
                        <div>
                            <textarea name="message" required rows="4" placeholder="Tulis ucapan dan doa restu..." class="w-full rounded-xl border border-current opacity-50 p-3 text-sm bg-transparent focus:opacity-100 focus:outline-none focus:ring-1 focus:ring-current"></textarea>
                        </div>
                        <button type="submit" class="w-full {{ $cfg['accent_bg'] }} text-white py-3 rounded-xl font-bold shadow-md hover:shadow-lg transition-all">Kirim Ucapan & Konfirmasi</button>
                    </form>

                    <!-- Amplop Digital -->
                    @if($invitation->envelopes && $invitation->envelopes->count() > 0)
                    <div class="mt-12 pt-8 border-t border-current opacity-90 text-center">
                        <h3 class="text-xl font-bold mb-2">Amplop Digital (Wedding Gift)</h3>
                        <p class="text-xs opacity-70 mb-6">Doa restu Anda merupakan karunia yang sangat berarti bagi kami. Namun, jika Bapak/Ibu/Saudara/i bermaksud mengirimkan tanda kasih, dapat melalui:</p>
                        
                        <div class="space-y-4">
                            @foreach($invitation->envelopes as $env)
                            <div class="p-4 rounded-xl border border-current bg-white/5 backdrop-blur-sm">
                                <div class="font-bold text-lg {{ $cfg['accent'] }}">{{ $env->bank_name }}</div>
                                <div class="font-mono text-xl tracking-wider my-1">{{ $env->account_number }}</div>
                                <div class="text-sm font-semibold">a.n. {{ $env->account_owner }}</div>
                            </div>
                            @endforeach
                        </div>

                        @if($invitation->physical_gift_address)
                        <div class="mt-6 p-4 rounded-xl border border-current bg-white/5 backdrop-blur-sm text-left">
                            <div class="font-bold text-sm mb-1">Alamat Pengiriman Kado Fisik:</div>
                            <div class="text-xs opacity-80 whitespace-pre-line">{{ $invitation->physical_gift_address }}</div>
                        </div>
                        @endif
                    </div>
                    @endif

                    <!-- Comments -->
                    @if($invitation->guestbooks && $invitation->guestbooks->count() > 0)
                    <div class="mt-12 pt-8 border-t border-current opacity-90">
                        <h3 class="text-lg font-bold mb-4">Ucapan Masuk ({{ $invitation->guestbooks->count() }})</h3>
                        <div class="space-y-3 max-h-80 overflow-y-auto pr-2" style="scrollbar-width: thin;">
                            @foreach($invitation->guestbooks->sortByDesc('created_at') as $gb)
                            <div class="p-4 rounded-xl border border-current bg-white/5">
                                <div class="flex justify-between items-center mb-1">
                                    <strong class="text-sm">{{ $gb->name }}</strong>
                                    <span class="text-[10px] {{ $gb->attendance == 'hadir' ? 'text-green-600' : 'text-red-600' }} font-bold uppercase">{{ str_replace('_', ' ', $gb->attendance) }}</span>
                                </div>
                                <p class="text-xs italic opacity-80 mb-2">{{ $gb->message }}</p>
                                <div class="text-[9px] opacity-50">{{ $gb->created_at->diffForHumans() }}</div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                </div>
            </div>
        </section>

        <!-- FOOTER -->
        <footer class="py-12 text-center text-xs opacity-60">
            <h2 class="text-2xl font-script {{ $cfg['accent'] }} mb-2">
                {{ $invitation->brides->groom_nickname }} & {{ $invitation->brides->bride_nickname }}
            </h2>
            <p>&copy; {{ date('Y') }} All Rights Reserved.</p>
        </footer>

    </div>

    <!-- BOTTOM NAVIGATION BAR (STICKY) -->
    <div x-show="isOpen" class="fixed bottom-0 inset-x-0 z-50 bg-white/90 dark:bg-zinc-900/90 backdrop-blur-md border-t border-slate-200 dark:border-zinc-800 shadow-[0_-5px_20px_rgba(0,0,0,0.05)] transition-transform duration-500 transform translate-y-0 pb-safe">
        <div class="max-w-md mx-auto flex justify-between items-center px-6 py-3">
            <a href="#home" class="flex flex-col items-center gap-1 transition-colors" :class="activeSection === 'home' ? '{{ $cfg['accent'] }}' : 'text-slate-400'">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                <span class="text-[10px] font-bold">Beranda</span>
            </a>
            <a href="#mempelai" class="flex flex-col items-center gap-1 transition-colors" :class="activeSection === 'mempelai' ? '{{ $cfg['accent'] }}' : 'text-slate-400'">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                <span class="text-[10px] font-bold">Mempelai</span>
            </a>
            <a href="#acara" class="flex flex-col items-center gap-1 transition-colors" :class="activeSection === 'acara' ? '{{ $cfg['accent'] }}' : 'text-slate-400'">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                <span class="text-[10px] font-bold">Acara</span>
            </a>
            <a href="#galeri" class="flex flex-col items-center gap-1 transition-colors" :class="activeSection === 'galeri' ? '{{ $cfg['accent'] }}' : 'text-slate-400'">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                <span class="text-[10px] font-bold">Galeri</span>
            </a>
            <a href="#rsvp" class="flex flex-col items-center gap-1 transition-colors" :class="activeSection === 'rsvp' ? '{{ $cfg['accent'] }}' : 'text-slate-400'">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                <span class="text-[10px] font-bold">RSVP</span>
            </a>
        </div>
    </div>

    <!-- MUSIC TOGGLE FLOATING (Above Bottom Nav) -->
    @if($invitation->music_path)
    <div x-show="isOpen" class="fixed bottom-20 right-4 z-40">
        <button @click="isPlaying = !isPlaying; isPlaying ? document.getElementById('bg-music').play() : document.getElementById('bg-music').pause()" 
                class="p-3 rounded-full shadow-lg {{ $cfg['card_bg'] }} backdrop-blur-sm transition-all border border-current opacity-80 hover:opacity-100">
            <svg x-show="isPlaying" class="w-5 h-5 {{ $cfg['accent'] }} animate-spin-slow" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="animation: spin 4s linear infinite;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"></path></svg>
            <svg x-show="!isPlaying" class="w-5 h-5 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"></path></svg>
        </button>
    </div>
    @endif

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            once: false,
            offset: 50,
        });
    </script>
</body>
</html>
