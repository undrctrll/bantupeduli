<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;

Route::prefix('berita')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('posts.index');
    Route::get('/{slug}', [PostController::class, 'show'])->name('posts.show');
}); 