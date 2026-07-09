<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invitation;
use Illuminate\Support\Str;

class BuilderController extends Controller
{
    public function index()
    {
        return view('builder.index');
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        if ($user && $user->invitation) {
            return redirect()->back()->withErrors(['Akun ini sudah memiliki undangan. Saat ini satu akun hanya diperbolehkan membuat satu undangan.']);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'event_date' => 'required|date',
            'event_time' => 'required',
            'location_name' => 'required|string',
            'location_address' => 'required|string',
            'google_maps_url' => 'nullable|url',
            'template_theme' => 'required|string',
            'custom_size' => 'required|string',
            'font_family' => 'required|string',
            'groom_name' => 'required|string',
            'groom_nickname' => 'required|string',
            'bride_name' => 'required|string',
            'bride_nickname' => 'required|string',
            'groom_photo' => 'nullable|image|max:2048',
            'bride_photo' => 'nullable|image|max:2048',
            'akad_date' => 'required|date',
            'akad_time' => 'required',
            'akad_location' => 'required|string',
            'akad_address' => 'required|string',
            'quote_text' => 'nullable|string',
            'quote_source' => 'nullable|string',
            'live_stream_url' => 'nullable|url',
            'physical_gift_address' => 'nullable|string',
            'photos' => 'nullable|array|min:3|max:6',
            'photos.*' => 'image|max:2048',
            'music_file' => 'nullable|file|mimes:mp3,wav,ogg|max:10240', // Max 10MB
        ]);

        $slug = Str::slug($request->groom_nickname . '-' . $request->bride_nickname . '-' . Str::random(5));
        
        $musicPath = null;
        if ($request->hasFile('music_file')) {
            $musicPath = $request->file('music_file')->store('music', 'public');
        }

        $invitation = Invitation::create([
            'user_id' => $user->id ?? null,
            'slug' => $slug,
            'title' => $request->title,
            'event_date' => $request->event_date,
            'event_time' => $request->event_time,
            'location_name' => $request->location_name,
            'location_address' => $request->location_address,
            'akad_date' => $request->akad_date,
            'akad_time' => $request->akad_time,
            'akad_location' => $request->akad_location,
            'akad_address' => $request->akad_address,
            'google_maps_url' => $request->google_maps_url,
            'live_stream_url' => $request->live_stream_url,
            'quote_text' => $request->quote_text,
            'quote_source' => $request->quote_source,
            'physical_gift_address' => $request->physical_gift_address,
            'template_theme' => $user && $user->theme ? $user->theme->slug : $request->template_theme,
            'custom_size' => $request->custom_size,
            'font_family' => $request->font_family,
            'music_path' => $musicPath,
        ]);

        $groomPhotoPath = null;
        if ($request->hasFile('groom_photo')) {
            $groomPhotoPath = $request->file('groom_photo')->store('brides', 'public');
        }
        
        $bridePhotoPath = null;
        if ($request->hasFile('bride_photo')) {
            $bridePhotoPath = $request->file('bride_photo')->store('brides', 'public');
        }

        $invitation->brides()->create([
            'groom_name' => $request->groom_name,
            'groom_nickname' => $request->groom_nickname,
            'groom_father' => $request->groom_father,
            'groom_mother' => $request->groom_mother,
            'groom_photo' => $groomPhotoPath,
            'bride_name' => $request->bride_name,
            'bride_nickname' => $request->bride_nickname,
            'bride_father' => $request->bride_father,
            'bride_mother' => $request->bride_mother,
            'bride_photo' => $bridePhotoPath,
        ]);

        if ($request->has('envelopes') && is_array($request->envelopes)) {
            foreach ($request->envelopes as $env) {
                if (!empty($env['bank_name']) && !empty($env['account_number'])) {
                    $invitation->envelopes()->create($env);
                }
            }
        }

        if ($request->has('guests') && is_array($request->guests)) {
            foreach ($request->guests as $guest) {
                if (!empty($guest['name'])) {
                    $invitation->guests()->create([
                        'name' => $guest['name'],
                        'slug' => Str::slug($guest['name']),
                    ]);
                }
            }
        }

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $index => $photo) {
                $path = $photo->store('galleries', 'public');
                $invitation->galleries()->create([
                    'file_path' => $path,
                    'sort_order' => $index,
                ]);
            }
        }

        return redirect()->back()->with('message', 'Undangan berhasil dibuat! URL: ' . url('/' . $slug));
    }
}
