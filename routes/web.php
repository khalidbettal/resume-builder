<?php

use App\Http\Controllers\LocaleController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

// routes/web.php

Route::post('/locale-switch/{lang}', [LocaleController::class, 'localeSwitch'])->name('locale.switch');


Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
   /** OTHER PAGES THAT SHOULD NOT BE LOCALIZED **/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/home', function () {
    return Inertia::render('App/Home');
})->name('home');

Route::get('/template', function () {
    return Inertia::render('App/Template');
})->name('templates.show');

require __DIR__.'/auth.php';

});


