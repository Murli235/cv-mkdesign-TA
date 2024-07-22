<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SurveiController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BerandaController::class, 'index'])->name('beranda.index');
Route::get('our-project', [BerandaController::class, 'ourProject'])->name('ourProject.index');
Route::get('our-project/{project}', [BerandaController::class, 'ourProjectDetail'])->name('ourProjectDetail.index');
Route::prefix('pricing')->group(function () {
    Route::get('estimasi-biaya', [BerandaController::class, 'estimasiBiaya'])->name('estimasiBiaya.index');
});

Route::get('/about', [BerandaController::class, 'aboutUsIndex'])->name('aboutUsIndex.index');

Route::middleware('auth')->group(function () {
    Route::prefix('pricing')->group(function () {
        Route::get('pemesanan', [BerandaController::class, 'indexPemesanan'])->name('pemesanans.index');
        Route::post('pemesanan/store', [BerandaController::class, 'storePemesanan'])->name('storePemesanan.index');
        Route::get('pemesanan/detail/{pemesanan}', [BerandaController::class, 'finishPemesanan'])->name('finishPemesanan.index');
        Route::put('pemesanan/detail/{pemesanan}', [BerandaController::class, 'finishPemesananStore'])->name('finishPemesananStore.index');

        Route::get('survei', [BerandaController::class, 'indexSurvei'])->name('surveis.index');
        Route::post('survei/store', [BerandaController::class, 'storeSurvei'])->name('storeSurvei.index');
        Route::get('survei/detail/{survei}', [BerandaController::class, 'detailSurvei'])->name('detailSurvei.index');
        Route::post('survei/detail/{survei}', [BerandaController::class, 'detailSurveiUpdate'])->name('detailSurveiUpdate.index');
    });

    Route::post('storeTestimoni', [BerandaController::class, 'storeTestimoni'])->name('storeTestimoni');

    Route::resource('home', DashboardController::class);
    Route::resource('profile', ProfileController::class)->middleware('isAdmin');
    Route::resource('about-us', AboutUsController::class);
    Route::resource('users', UsersController::class);
    Route::resource('project', ProjectController::class);
    Route::resource('galery', GaleryController::class);
    Route::resource('testimoni', TestimoniController::class);
    Route::resource('survei', SurveiController::class);
    Route::resource('pemesanan', PemesananController::class);
});
