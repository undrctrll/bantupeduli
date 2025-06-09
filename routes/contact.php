<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\ContactController;

Route::prefix('kontak')->group(function () {
    Route::get('/', [ContactController::class, 'showForm'])->name('contact');
    Route::post('/', [ContactController::class, 'send'])->name('contact.send');
}); 