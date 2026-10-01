<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\SetupController;
use App\Http\Controllers\StartController;
use App\Http\Controllers\TipsController;
use App\Http\Controllers\HistoryController;

Route::get('/', function () {
    return auth()->check()
        ? redirect()->route('session.start')
        : redirect()->route('home');
})->name('main');

Route::view('home', 'main')->name('home');

Route::view('audience-reactor', 'main')->name('about');
Route::view('what-it-is', 'main')->name('about.what');
Route::view('why-it-matters', 'main')->name('about.why');
Route::view('how-it-works', 'main')->name('about.how');
Route::view('practice', 'main')->name('about.practice');


//Route::view('education', 'education')->name('education');
//Route::view('business', 'business')->name('business');

//Route::view('team', 'team')->name('team');

Route::middleware('auth')->group(function () {
    Route::get('/result-list', [StartController::class, 'stop'])->name('result.list');
    Route::get('/result/{id}', [ResultController::class, 'show'])->name('result.show');
});

Route::get('/start', [StartController::class, 'index'])->middleware(['auth'])->name('session.start');
Route::post('/start-setup', [StartController::class, 'info'])->middleware(['auth'])->name('session.startsetup');
Route::get('/start-session', [StartController::class, 'start'])->middleware(['auth'])->name('session.startsession');
Route::get('/stop-session', [StartController::class, 'stop'])->middleware(['auth'])->name('session.stopsession');
Route::get('/results', [ResultController::class, 'index'])->middleware(['auth'])->name('session.results');

Route::get('/tips', [TipsController::class, 'index'])->middleware(['auth'])->name('tips');

Route::get('/history', [HistoryController::class, 'index'])->middleware(['auth'])->name('history');

Route::get('/export', [ExportController::class, 'index'])->middleware(['auth'])->name('export');
Route::get('/export-new', [ExportController::class, 'export'])->middleware(['auth'])->name('export.new');

Route::view('profile', 'profile')->middleware(['auth'])->name('profile');
Route::view('dashboard', 'dashboard')->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';