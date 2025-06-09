<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\OrphanageController;

Route::get('/panti-asuhan/{slug}', [OrphanageController::class, 'show'])->name('orphanages.show'); 