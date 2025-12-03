<?php

use App\Livewire\Projects\CreateProject;
use App\Livewire\Projects\EditProject;
use App\Livewire\Projects\ListProject;
use App\Livewire\Projects\ViewProject;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\Settings\TwoFactor;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('profile.edit');
    Route::get('settings/password', Password::class)->name('user-password.edit');
    Route::get('settings/appearance', Appearance::class)->name('appearance.edit');

    Route::get('settings/two-factor', TwoFactor::class)
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});

Route::middleware(['auth'])->group(function () {
    // List Projects
    Route::get('projects', ListProject::class)
    ->middleware('permission:read-project')
    ->name('projects.index');

    // Create Projects
    Route::get('projects/create', CreateProject::class)
    ->middleware('permission:create-project')
    ->name('projects.create');

    // View Projects
    Route::get('projects/{id}', ViewProject::class)
    ->middleware('permission:read-project')
    ->name('projects.show');

    // Edit Projects
    Route::get('projects/{id}/edit', EditProject::class)
    ->middleware('permission:update-project')
    ->name('projects.edit');
});
