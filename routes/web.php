<?php

use Illuminate\Support\Facades\Route;

// ==========================================
// PUBLIC ROUTES
// ==========================================
Route::get('/', function () {
    return redirect()->route('login'); // Nanti bisa diganti jadi Landing Page
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    
    // Redirector untuk Dashboard berdasarkan role
    Route::get('/dashboard', function () {
        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('client.dashboard');
    })->name('dashboard');

    // ==========================================
    // AREA ADMIN
    // ==========================================
    Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');
        
        // Manajemen Klien
        Route::get('/clients', [\App\Http\Controllers\AdminController::class, 'clients'])->name('clients.index');
        Route::post('/clients', [\App\Http\Controllers\AdminController::class, 'storeClient'])->name('clients.store');

        // Theme Management
        Route::get('/themes', [\App\Http\Controllers\AdminController::class, 'themes'])->name('themes.index');
        Route::post('/themes', [\App\Http\Controllers\AdminController::class, 'storeTheme'])->name('themes.store');
    });

    // ==========================================
    // AREA CLIENT
    // ==========================================
    Route::middleware(['role:client,admin'])->prefix('client')->name('client.')->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
        
        // Daftar Undangan (Semua undangan milik admin/client ini)
        Route::get('/invitations', [\App\Http\Controllers\DashboardController::class, 'invitations'])->name('invitations.index');
        
        Route::get('/builder', [\App\Http\Controllers\BuilderController::class, 'index'])->name('builder.index');
        Route::post('/builder', [\App\Http\Controllers\BuilderController::class, 'store'])->name('builder.store');
        
        Route::get('/invitations/{id}/guests', [\App\Http\Controllers\GuestController::class, 'index'])->name('guests.index');
        Route::post('/invitations/{id}/guests', [\App\Http\Controllers\GuestController::class, 'store'])->name('guests.store');
        Route::delete('/guests/{id}', [\App\Http\Controllers\GuestController::class, 'destroy'])->name('guests.destroy');
    });
});

require __DIR__.'/settings.php';

Route::get('/{slug}', [\App\Http\Controllers\InvitationController::class, 'show'])->name('invitation.show');
Route::post('/{slug}/guestbook', [\App\Http\Controllers\InvitationController::class, 'storeGuestbook'])->name('guestbook.store');
