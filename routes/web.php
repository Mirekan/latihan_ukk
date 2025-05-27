<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\Company\Index as CompanyIndex;
use App\Livewire\Pkl\Index as PklIndex;
use App\Livewire\Dashboard;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:siswa'])->group(function () {
    Route::get('/', function () {
        return redirect()->route('dashboard');
    })->name('home');
    Route::redirect('settings', 'settings/profile');
    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');

    Route::get('dashboard', Dashboard::class)->name('dashboard');
    Route::get('company', CompanyIndex::class)->name('company.index');
    Route::get('pkl', PklIndex::class)->name('pkl.index');
});

Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return redirect()->route('login');
    })->name('home');
    Route::get('login', \App\Livewire\Auth\Login::class)->name('login');
    Route::get('register', \App\Livewire\Auth\Register::class)->name('register');
});



require __DIR__ . '/auth.php';
