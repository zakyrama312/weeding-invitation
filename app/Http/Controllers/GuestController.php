<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invitation;
use App\Models\Guest;
use Illuminate\Support\Str;

class GuestController extends Controller
{
    public function index($invitationId)
    {
        $invitation = Invitation::findOrFail($invitationId);
        $guests = Guest::where('invitation_id', $invitationId)->latest()->paginate(20);

        return view('guests.index', compact('invitation', 'guests'));
    }

    public function store(Request $request, $invitationId)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $invitation = Invitation::findOrFail($invitationId);

        Guest::create([
            'invitation_id' => $invitation->id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'status_attendance' => 'pending',
        ]);

        return back()->with('success', 'Tamu berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $guest = Guest::findOrFail($id);
        $guest->delete();

        return back()->with('success', 'Tamu berhasil dihapus.');
    }
}
