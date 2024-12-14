<?php

use App\Http\Controllers\LocaleController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ProfileController;
use Inertia\Inertia;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

    Route::group(
        [
            'prefix' => LaravelLocalization::setLocale(),
            'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
        ],
    function () {
        // Home Route
        Route::get('/', function () {
            return Inertia::render('App/Home');
        })->name('home');

        // Dashboard Route
        Route::get('/dashboard', function () {
            return Inertia::render('Dashboard');
        })->middleware(['auth', 'verified'])->name('dashboard');

        // Profile Routes
        Route::middleware('auth')->group(function () {
            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        });

        // Template Page
        Route::get('/template', function () {
            return Inertia::render('App/Template');
        })->name('templates.show');
    }
);

require __DIR__.'/auth.php';



