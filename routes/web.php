<?php
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JamKerjaController;
use App\Http\Controllers\KenekController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MesinController;
use App\Http\Controllers\PaletController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\SatpamController;
use App\Http\Controllers\StafController;
use App\Http\Controllers\SupirController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/get-jam-kerja/{pegawaiId}', [JamKerjaController::class, 'getJamKerjaByPegawai']);

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('login', [LoginController::class, 'login']);
Route::middleware(['auth'])->group(function () {
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('dashboard', [DashboardController::class, 'index']);
    Route::resource('pegawai', PegawaiController::class);
    Route::resource('staf', StafController::class);
    Route::resource('supir', SupirController::class);
    Route::resource('palet', PaletController::class);
    Route::resource('mesin', MesinController::class);
    Route::resource('kenek', KenekController::class);
    Route::resource('satpam', SatpamController::class);
    Route::resource('presensi', PresensiController::class);
    Route::resource('jam_kerja', JamKerjaController::class);
});
