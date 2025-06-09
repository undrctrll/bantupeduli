<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\OrphanageController;
use App\Http\Controllers\User\UserController;

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('/posts', AdminPostController::class, ['as' => 'admin']);
    Route::resource('/orphanages', OrphanageController::class, ['as' => 'admin']);
    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::post('/users/{id}/role', [UserController::class, 'updateRole'])->name('admin.users.updateRole');
    Route::get('/donasi-chart-data', function() {
        $data = \App\Models\Donation::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as bulan, SUM(jumlah) as total')
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();
        $labels = $data->pluck('bulan')->map(function($b){ return \Carbon\Carbon::parse($b.'-01')->translatedFormat('M Y'); });
        $totals = $data->pluck('total');
        return response()->json(['labels' => $labels, 'totals' => $totals]);
    });
}); 