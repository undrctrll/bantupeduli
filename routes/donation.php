<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Donation\DonationController;

Route::middleware('auth')->prefix('donasi')->group(function () {
    Route::get('/', [DonationController::class, 'showForm'])->name('donations.form');
    Route::post('/', [DonationController::class, 'store'])->name('donations.store');
    Route::get('/list', [DonationController::class, 'index'])->name('donations.index');
    Route::get('/{id}', [DonationController::class, 'show'])->name('donations.show');
    Route::get('/thanks', [DonationController::class, 'thanks'])->name('donations.thanks');
}); 