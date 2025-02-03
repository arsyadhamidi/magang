<?php

use App\Http\Controllers\Admin\AdminLaporanMingguanController;
use App\Http\Controllers\Admin\AdminMahasiswaController;
use App\Http\Controllers\Admin\AdminPerizinanController;
use App\Http\Controllers\Admin\AdminPerusahaanController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegistrasiController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Landing\LandingController;
use App\Http\Controllers\Mahasiswa\MahasiswaBiodataDiriController;
use App\Http\Controllers\Mahasiswa\MahasiswaPerizinanController;
use App\Http\Controllers\Mahasiswa\MahasiswaRiwayatController;
use App\Http\Controllers\Pegawai\PegawaiMahasiswaController;
use App\Http\Controllers\Pegawai\PegawaiPerizinanController;
use App\Http\Controllers\Pegawai\PegawaiPerusahaanController;
use App\Http\Controllers\Setting\SettingController;
use App\Http\Middleware\CekLevel;
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

// Landing
Route::get('/', [LandingController::class, 'index']);

// Login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login/authenticate', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::get('/login/logout', [LoginController::class, 'logout'])->name('login.logout');

// Registrasi
Route::get('/registrasi', [RegistrasiController::class, 'index'])->name('registrasi.index');
Route::post('/registrasi/store', [RegistrasiController::class, 'store'])->name('registrasi.store');

Route::group(['middleware' => ['auth', 'verified']], function () {

    // Setting
    Route::get('/setting', [SettingController::class, 'index'])->name('setting.index');
    Route::post('/setting/updateprofile', [SettingController::class, 'updateprofile'])->name('setting.updateprofile');
    Route::post('/setting/updateusername', [SettingController::class, 'updateusername'])->name('setting.updateusername');
    Route::post('/setting/updatepassword', [SettingController::class, 'updatepassword'])->name('setting.updatepassword');
    Route::post('/setting/updategambar', [SettingController::class, 'updategambar'])->name('setting.updategambar');
    Route::post('/setting/hapusgambar', [SettingController::class, 'hapusgambar'])->name('setting.hapusgambar');

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // Admin
    Route::group(['middleware' => [CekLevel::class . ':Admin']], function () {

        // Laporan Mingguan
        Route::get('/data-laporanmingguan', [AdminLaporanMingguanController::class, 'index'])->name('data-laporanmingguan.index');
        Route::get('/data-laporanmingguan/create', [AdminLaporanMingguanController::class, 'create'])->name('data-laporanmingguan.create');
        Route::get('/data-laporanmingguan/edit/{id}', [AdminLaporanMingguanController::class, 'edit'])->name('data-laporanmingguan.edit');
        Route::post('/data-laporanmingguan/store', [AdminLaporanMingguanController::class, 'store'])->name('data-laporanmingguan.store');
        Route::post('/data-laporanmingguan/update/{id}', [AdminLaporanMingguanController::class, 'update'])->name('data-laporanmingguan.update');
        Route::post('/data-laporanmingguan/destroy/{id}', [AdminLaporanMingguanController::class, 'destroy'])->name('data-laporanmingguan.destroy');

        // Perizinan
        Route::get('/data-perizinan', [AdminPerizinanController::class, 'index'])->name('data-perizinan.index');
        Route::get('/data-perizinan/create', [AdminPerizinanController::class, 'create'])->name('data-perizinan.create');
        Route::get('/data-perizinan/edit/{id}', [AdminPerizinanController::class, 'edit'])->name('data-perizinan.edit');
        Route::post('/data-perizinan/store', [AdminPerizinanController::class, 'store'])->name('data-perizinan.store');
        Route::post('/data-perizinan/update/{id}', [AdminPerizinanController::class, 'update'])->name('data-perizinan.update');
        Route::post('/data-perizinan/destroy/{id}', [AdminPerizinanController::class, 'destroy'])->name('data-perizinan.destroy');

        // Users
        Route::get('/data-user', [AdminUserController::class, 'index'])->name('data-user.index');
        Route::post('/data-user/store', [AdminUserController::class, 'store'])->name('data-user.store');
        Route::post('/data-user/update/{id}', [AdminUserController::class, 'update'])->name('data-user.update');
        Route::post('/data-user/destroy/{id}', [AdminUserController::class, 'destroy'])->name('data-user.destroy');
    });

    // Mahasiswa
    Route::group(['middleware' => [CekLevel::class . ':Mahasiswa']], function () {

    });
});
