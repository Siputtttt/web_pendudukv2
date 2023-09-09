<?php

use App\Http\Controllers\dashboardController;
use App\Http\Controllers\depanController;
use App\Http\Controllers\keluargaController;
use App\Http\Controllers\pendudukController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Models\keluargaModel;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AuthenticatedSessionController::class, 'create'])->name('login');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [dashboardController::class, 'index']);

    Route::resource('/kelolaKeluarga', App\Http\Controllers\keluargaController::class);
    Route::post('/tambahAnggota', [pendudukController::class, 'storeAnggota']);
    Route::get('/kelolaKeluarga/lihatAnggota/{nik}', [pendudukController::class, 'showAnggota']);
    Route::get('/kelolaKeluarga/editAnggota/{nik}', [pendudukController::class, 'editAnggota']);
    Route::put('/kelolaKeluarga/simpanEditAnggota/{nik}', [pendudukController::class, 'simpanEditAnggota']);
    Route::get('/kelolaKeluarga/hapusAnggota/{nik}/{nokk}/{foto}', [pendudukController::class, 'hapusAnggota']);
    Route::resource('/kelolaPenduduk', App\Http\Controllers\pendudukController::class);
    Route::get('hapusPenduduk/{nik}/{foto}', [pendudukController::class, 'destroy']);
});


Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::resource('/user', App\Http\Controllers\Auth\AuthenticatedSessionController::class);
    Route::get('/hapusUser/{email}', [ProfileController::class, 'hapusUser']);
    Route::get('/editUser/{email}', [ProfileController::class, 'editUser']);
    Route::put('/updateUser/{email}', [ProfileController::class, 'updateUser']);
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
