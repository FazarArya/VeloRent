<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\PesanController;
use App\Http\Controllers\User\KatalogController;
use App\Http\Controllers\User\ArtikelController;
use App\Http\Controllers\User\FaqController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminFormController;
use App\Http\Controllers\Admin\AdminKatalogController;
use App\Http\Controllers\Admin\AdminFaqController;
use App\Http\Controllers\Admin\AdminArtikelController;
use App\Http\Controllers\Admin\ManageUserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// User Routes
Route::middleware('auth', 'userMiddleware')->group(function () {

    Route::get('dashboard', [UserController::class, 'index'])->name('dashboard');

    Route::get('katalog', [KatalogController::class, 'index'])->name('katalog');
    Route::get('artikel', [ArtikelController::class, 'index'])->name('artikel');
    Route::get('faq', [FaqController::class, 'index'])->name('faq');

    //Artikel User
    Route::get('artikel', [ArtikelController::class, 'index'])->name('artikel');
    Route::get('/artikel/{id}', [ArtikelController::class, 'show'])->name('artikel-show');

    //Catalog User
    Route::get('/katalog', [AdminKatalogController::class, 'userView'])->name('katalog');
    Route::get('/katalog', [AdminKatalogController::class, 'userView'])->name('katalog.user');

    //Pesanan User
    Route::get('pesan', [PesanController::class, 'index'])->name('pesan');
    Route::get('pesan/create', [PesanController::class, 'create'])->name('pesan.create');
    Route::post('pesan', [PesanController::class, 'store'])->name('pesan.store');
    Route::get('pesan/{pesanan}', [PesanController::class, 'show'])->name('pesan.show');
    Route::get('pesan/export/history', [PesanController::class, 'exportHistoryPDF'])->name('pesan.export.history');
    Route::get('pesan/{pesanan}/pdf', [PesanController::class, 'exportPDF'])->name('pesan.pdf');
    Route::get('pesan_get-kendaraan', [PesanController::class, 'getKendaraan'])->name('pesan.get-kendaraan');
});

// Admin Routes
Route::middleware('auth', 'adminMiddleware')->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/katalog', [AdminKatalogController::class, 'index'])->name('admin.katalog');
    Route::get('/admin/artikel', [AdminArtikelController::class, 'index'])->name('admin.artikel');
    Route::get('/admin/faq', [AdminFaqController::class, 'index'])->name('admin.faq');
    Route::get('/admin/user', [ManageUserController::class, 'index'])->name('admin.user');

    // Artikel Admin
    Route::get('/admin/artikel', [AdminArtikelController::class, 'index'])->name('admin.artikel');
    Route::get('/admin/artikel/create', [AdminArtikelController::class, 'create'])->name('admin.artikel.create');
    Route::post('/admin/artikel', [AdminArtikelController::class, 'store'])->name('admin.artikel.store');
    Route::get('/admin/artikel/{id}/edit', [AdminArtikelController::class, 'edit'])->name('admin.artikel.edit');
    Route::put('/admin/artikel/{id}', [AdminArtikelController::class, 'update'])->name('admin.artikel.update');
    Route::delete('/admin/artikel/{id}', [AdminArtikelController::class, 'destroy'])->name('admin.artikel.destroy');

    //Catalog Admin
    Route::get('/admin/katalog', [AdminKatalogController::class, 'index'])->name('admin.katalog');
    Route::get('/admin/katalogs/create', [AdminKatalogController::class, 'create'])->name('admin.katalog.create');
    Route::post('/admin/katalogs', [AdminKatalogController::class, 'store'])->name('admin.katalog.store');
    Route::get('/admin/katalogs/{id}/edit', [AdminKatalogController::class, 'edit'])->name('admin.katalog.edit');
    Route::put('/admin/katalogs/{id}', [AdminKatalogController::class, 'update'])->name('admin.katalog.update');
    Route::delete('/admin/katalogs/{id}', [AdminKatalogController::class, 'destroy'])->name('admin.katalog.destroy');

    //Pesanan Admin
    Route::get('/admin/form', [AdminFormController::class, 'index'])->name('admin.form');
    Route::get('/admin/form/{pesanan}', [AdminFormController::class, 'show'])->name('admin.form.show');
    Route::get('/admin/form/{pesanan}/edit', [AdminFormController::class, 'edit'])->name('admin.form.edit');
    Route::put('/admin/form/{pesanan}', [AdminFormController::class, 'update'])->name('admin.form.update');
    Route::delete('/admin/form/{pesanan}', [AdminFormController::class, 'destroy'])->name('admin.form.destroy');
    Route::get('/admin/form/export/pdf', [AdminFormController::class, 'exportPDF'])->name('admin.form.export');
    Route::get('/admin/form/{pesanan}/pdf', [AdminFormController::class, 'exportDetailPDF'])->name('admin.form.pdf');
});
