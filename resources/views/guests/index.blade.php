<x-layouts::app :title="__('Daftar Tamu')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-900 p-6">
            <div class="mb-4 flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-semibold text-neutral-800 dark:text-neutral-200">Daftar Tamu: {{ $invitation->title }}</h2>
                    <p class="text-sm text-neutral-500 dark:text-neutral-400 mt-1">Undangan Acara Tanggal: {{ \Carbon\Carbon::parse($invitation->event_date)->translatedFormat('d F Y') }}</p>
                </div>
                <a href="{{ route('dashboard') }}" class="text-sm text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">
                    &larr; Kembali ke Dashboard
                </a>
            </div>

            @if(session('success'))
                <div class="mb-4 p-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('client.guests.store', $invitation->id) }}" method="POST" class="mb-6 flex gap-3">
                @csrf
                <div class="flex-1">
                    <label for="name" class="sr-only">Nama Tamu</label>
                    <input type="text" name="name" id="name" required class="block w-full rounded-md border-neutral-300 shadow-sm focus:border-neutral-500 focus:ring-neutral-500 sm:text-sm dark:border-neutral-700 dark:bg-neutral-800 dark:text-white" placeholder="Masukkan nama tamu baru...">
                </div>
                <button type="submit" class="inline-flex items-center rounded-md bg-neutral-900 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-neutral-800 focus:outline-none focus:ring-2 focus:ring-neutral-900 focus:ring-offset-2 dark:bg-white dark:text-neutral-900 dark:hover:bg-neutral-200">
                    Tambah Tamu
                </button>
            </form>
            
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-neutral-200 dark:divide-neutral-700">
                    <thead>
                        <tr>
                            <th class="px-4 py-3 text-left text-sm font-medium text-neutral-500 dark:text-neutral-400">Nama Tamu</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-neutral-500 dark:text-neutral-400">Status</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-neutral-500 dark:text-neutral-400">Link Undangan</th>
                            <th class="px-4 py-3 text-right text-sm font-medium text-neutral-500 dark:text-neutral-400">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-neutral-200 dark:divide-neutral-700">
                        @forelse ($guests as $guest)
                            <tr>
                                <td class="px-4 py-3 text-sm text-neutral-800 dark:text-neutral-200">{{ $guest->name }}</td>
                                <td class="px-4 py-3 text-sm text-neutral-800 dark:text-neutral-200">
                                    <span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium {{ $guest->status_attendance === 'pending' ? 'bg-yellow-100 text-yellow-800' : ($guest->status_attendance === 'hadir' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800') }}">
                                        {{ ucfirst($guest->status_attendance) }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-sm text-neutral-800 dark:text-neutral-200">
                                    <div class="flex items-center gap-2">
                                        @php
                                            // Make sure the link is correctly formed with the query string ?to=Nama+Tamu
                                            // Based on InvitationController@show uses $request->query('to')
                                            $link = route('invitation.show', ['slug' => $invitation->slug, 'to' => $guest->name]);
                                        @endphp
                                        <input type="text" readonly value="{{ $link }}" class="block w-full rounded-md border-neutral-300 shadow-sm sm:text-sm dark:border-neutral-700 dark:bg-neutral-800 dark:text-white" onclick="this.select()">
                                        <a href="{{ $link }}" target="_blank" class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 flex-shrink-0" title="Buka Undangan">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-right text-sm">
                                    <form action="{{ route('client.guests.destroy', $guest->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus tamu ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-4 py-3 text-sm text-center text-neutral-500 dark:text-neutral-400">Belum ada tamu yang ditambahkan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <div class="mt-4">
                {{ $guests->links() }}
            </div>
        </div>
    </div>
</x-layouts::app>
