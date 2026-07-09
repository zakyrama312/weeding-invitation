<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invitation;

class InvitationController extends Controller
{
    public function show($slug, Request $request)
    {
        $invitation = Invitation::with(['brides', 'envelopes', 'galleries', 'guestbooks' => function($q) {
            $q->latest();
        }])->where('slug', $slug)->firstOrFail();
        $to = $request->query('to', 'Tamu Undangan');

        return view('invitation.show', compact('invitation', 'to'));
    }

    public function storeGuestbook(Request $request, $slug)
    {
        $invitation = Invitation::where('slug', $slug)->firstOrFail();
        
        $request->validate([
            'name' => 'required|string|max:255',
            'attendance' => 'required|in:hadir,tidak_hadir',
            'message' => 'required|string',
        ]);
        
        $invitation->guestbooks()->create([
            'name' => $request->name,
            'attendance' => $request->attendance,
            'message' => $request->message,
        ]);
        
        return redirect()->back()->withFragment('guestbook')->with('success_message', 'Terima kasih atas ucapan dan doa restunya!');
    }
}
