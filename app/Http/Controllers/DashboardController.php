<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invitation;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        $invitation = Invitation::where('user_id', $user->id)->first();
        $totalGuests = $invitation ? \App\Models\Guest::where('invitation_id', $invitation->id)->count() : 0;
        $totalEnvelopes = $invitation ? \App\Models\Envelope::where('invitation_id', $invitation->id)->count() : 0;

        return view('dashboard', compact('invitation', 'totalGuests', 'totalEnvelopes'));
    }

    public function invitations(Request $request)
    {
        $user = auth()->user();
        
        // Jika admin yang akses "Semua Undangan", tampilkan semua. Jika client, tampilkan milik dia saja.
        $query = Invitation::query();
        if ($user->role === 'client') {
            $query->where('user_id', $user->id);
        }

        if ($request->has('search') && !empty($request->search)) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('slug', 'like', '%' . $request->search . '%');
        }

        $invitations = $query->latest()->paginate(10);
        return view('client.invitations', compact('invitations'));
    }
}
