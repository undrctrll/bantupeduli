<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;

Route::get('/campaign/{slug}', [PostController::class, 'show'])->name('campaign.show');
Route::get('/campaign/{slug}/donasi-sekarang', [PostController::class, 'donateForm'])->name('campaign.donate.form');
Route::post('/campaign/{slug}/donasi-sekarang', [PostController::class, 'donateStore'])->name('campaign.donate.store');
Route::get('/campaign/invoice/{order_id}', [PostController::class, 'donateInvoice'])->name('campaign.donate.invoice');
Route::get('/campaign/invoice/check/{order_id}', [PostController::class, 'donateCheck'])->name('campaign.donate.check'); 