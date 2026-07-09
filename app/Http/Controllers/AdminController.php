<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Theme;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Hitung statistik untuk UI Informasi Dashboard
        $totalClients = User::where('role', 'client')->count();
        $totalInvitations = \App\Models\Invitation::count();
        $totalGuests = \App\Models\Guest::count();
        
        return view('admin.dashboard', compact('totalClients', 'totalInvitations', 'totalGuests'));
    }

    public function clients(Request $request)
    {
        // Manajemen Klien dengan Search & Pagination
        $query = User::where('role', 'client')->withCount('invitation');
        
        if ($request->has('search') && !empty($request->search)) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');
        }

        $clients = $query->latest()->paginate(10);
        $themes = Theme::where('is_active', true)->get();
        return view('admin.clients', compact('clients', 'themes'));
    }

    public function themes()
    {
        $themes = Theme::latest()->get();
        return view('admin.themes', compact('themes'));
    }

    public function storeTheme(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:themes',
            'price' => 'required|numeric',
            'promo_price' => 'nullable|numeric',
            'preview_image' => 'nullable|image|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('preview_image')) {
            $imagePath = $request->file('preview_image')->store('themes', 'public');
        }

        Theme::create([
            'name' => $request->name,
            'slug' => \Illuminate\Support\Str::slug($request->slug),
            'price' => $request->price,
            'promo_price' => $request->promo_price,
            'preview_image' => $imagePath,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->back()->with('success', 'Tema berhasil ditambahkan!');
    }

    public function storeClient(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'theme_id' => 'required|exists:themes,id',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'client',
            'theme_id' => $request->theme_id,
        ]);

        return redirect()->back()->with('success', 'Klien berhasil ditambahkan!');
    }
}
