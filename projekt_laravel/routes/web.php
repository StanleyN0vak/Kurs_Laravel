<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\VideosController;
use Illuminate\Support\Facades\Route;

Route::get('/', [VideosController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/contact', [PagesController::class, 'contact']);
Route::get('/about', [PagesController::class, 'about']);

Route::get('/videos/create', [VideosController::class, 'create'])->middleware('auth');

Route::group(['middleware' => ['web']], function(){
    /*
    Route::get('/videos', [VideosController::class, 'index']);
    Route::post('/videos/create', [VideosController::class, 'store']);
    Route::get('/videos/create', [VideosController::class, 'create']);
    Route::get('/videos/{id}', [VideosController::class, 'show']);
    */
    Route::resource('videos', VideosController::class);
});

require __DIR__.'/auth.php';
