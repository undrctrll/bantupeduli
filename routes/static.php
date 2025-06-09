<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HomeController;

Route::get('/', [HomeController::class, 'home']);
Route::get('/home', [HomeController::class, 'home'])->name('home');
Route::get('/program', function () {
    return view('static.program');
})->name('program');
Route::get('/tentang', function () {
    return view('static.tentang');
})->name('about');
Route::get('/galeri', function () {
    return view('static.galeri');
})->name('gallery'); 