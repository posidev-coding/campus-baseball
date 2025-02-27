<?php

use App\Livewire\Rankings;
use App\Livewire\Scores;
use App\Livewire\Conferences;
use App\Livewire\Teams;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

Route::view('/', 'dashboard')->name('home');
Route::get('/scores', Scores::class)->name('scores');
Route::get('/teams', Teams::class)->name('teams');
Route::get('/rankings', Rankings::class)->name('rankings');
Route::get('/conferences', Conferences::class)->name('conferences');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__ . '/auth.php';
