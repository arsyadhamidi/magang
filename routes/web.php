<?php

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

        // Perusahaan
        Route::get('/data-perizinan', [AdminPerizinanController::class, 'index'])->name('data-perizinan.index');
        Route::post('/data-perizinan/store', [AdminPerizinanController::class, 'store'])->name('data-perizinan.store');
        Route::post('/data-perizinan/update/{id}', [AdminPerizinanController::class, 'update'])->name('data-perizinan.update');
        Route::post('/data-perizinan/destroy/{id}', [AdminPerizinanController::class, 'destroy'])->name('data-perizinan.destroy');

        // Perusahaan
        Route::get('/data-mahasiswa', [AdminMahasiswaController::class, 'index'])->name('data-mahasiswa.index');
        Route::post('/data-mahasiswa/store', [AdminMahasiswaController::class, 'store'])->name('data-mahasiswa.store');
        Route::post('/data-mahasiswa/update/{id}', [AdminMahasiswaController::class, 'update'])->name('data-mahasiswa.update');
        Route::post('/data-mahasiswa/destroy/{id}', [AdminMahasiswaController::class, 'destroy'])->name('data-mahasiswa.destroy');

        // Perusahaan
        Route::get('/data-perusahaan', [AdminPerusahaanController::class, 'index'])->name('data-perusahaan.index');
        Route::post('/data-perusahaan/store', [AdminPerusahaanController::class, 'store'])->name('data-perusahaan.store');
        Route::post('/data-perusahaan/update/{id}', [AdminPerusahaanController::class, 'update'])->name('data-perusahaan.update');
        Route::post('/data-perusahaan/destroy/{id}', [AdminPerusahaanController::class, 'destroy'])->name('data-perusahaan.destroy');

        // Users
        Route::get('/data-user', [AdminUserController::class, 'index'])->name('data-user.index');
        Route::post('/data-user/store', [AdminUserController::class, 'store'])->name('data-user.store');
        Route::post('/data-user/update/{id}', [AdminUserController::class, 'update'])->name('data-user.update');
        Route::post('/data-user/destroy/{id}', [AdminUserController::class, 'destroy'])->name('data-user.destroy');
    });

    // Mahasiswa
    Route::group(['middleware' => [CekLevel::class . ':Mahasiswa']], function () {

        // Riwayat
        Route::get('/mahasiswa-riwayat', [MahasiswaRiwayatController::class, 'index'])->name('mahasiswa-riwayat.index');
        Route::get('/mahasiswa-riwayat/generatepdf/{id}', [MahasiswaRiwayatController::class, 'generatepdf'])->name('mahasiswa-riwayat.generatepdf');

        // Biodata
        Route::post('/biodata-update', [MahasiswaBiodataDiriController::class, 'update'])->name('biodata-update.update');

        // Perizinan
        Route::get('/mahasiswa-perizinan', [MahasiswaPerizinanController::class, 'index'])->name('mahasiswa-perizinan.index');
        Route::get('/mahasiswa-perizinan/show/{id}', [MahasiswaPerizinanController::class, 'show'])->name('mahasiswa-perizinan.show');
        Route::post('/mahasiswa-perizinan/store', [MahasiswaPerizinanController::class, 'store'])->name('mahasiswa-perizinan.store');
        Route::post('/mahasiswa-perizinan/destroy/{id}', [MahasiswaPerizinanController::class, 'destroy'])->name('mahasiswa-perizinan.destroy');
    });

    // Pegawai
    Route::group(['middleware' => [CekLevel::class . ':Pegawai']], function () {

        // Perusahaan
        Route::get('/pegawai-perusahaan', [PegawaiPerusahaanController::class, 'index'])->name('pegawai-perusahaan.index');
        Route::post('/pegawai-perusahaan/store', [PegawaiPerusahaanController::class, 'store'])->name('pegawai-perusahaan.store');
        Route::post('/pegawai-perusahaan/update/{id}', [PegawaiPerusahaanController::class, 'update'])->name('pegawai-perusahaan.update');
        Route::post('/pegawai-perusahaan/destroy/{id}', [PegawaiPerusahaanController::class, 'destroy'])->name('pegawai-perusahaan.destroy');

        // Mahasiswa
        Route::get('/pegawai-mahasiswa', [PegawaiMahasiswaController::class, 'index'])->name('pegawai-mahasiswa.index');
        Route::post('/pegawai-mahasiswa/store', [PegawaiMahasiswaController::class, 'store'])->name('pegawai-mahasiswa.store');
        Route::post('/pegawai-mahasiswa/update/{id}', [PegawaiMahasiswaController::class, 'update'])->name('pegawai-mahasiswa.update');
        Route::post('/pegawai-mahasiswa/destroy/{id}', [PegawaiMahasiswaController::class, 'destroy'])->name('pegawai-mahasiswa.destroy');

        // Perizinan
        Route::get('/pegawai-perizinan', [PegawaiPerizinanController::class, 'index'])->name('pegawai-perizinan.index');
        Route::post('/pegawai-perizinan/store', [PegawaiPerizinanController::class, 'store'])->name('pegawai-perizinan.store');
        Route::post('/pegawai-perizinan/update/{id}', [PegawaiPerizinanController::class, 'update'])->name('pegawai-perizinan.update');
        Route::post('/pegawai-perizinan/destroy/{id}', [PegawaiPerizinanController::class, 'destroy'])->name('pegawai-perizinan.destroy');
    });
});
