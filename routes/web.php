<?php

use App\Http\Controllers\Admin\AdminLaporanMagangController;
use App\Http\Controllers\Admin\AdminLaporanMingguanController;
use App\Http\Controllers\Admin\AdminMahasiswaController;
use App\Http\Controllers\Admin\AdminPerizinanController;
use App\Http\Controllers\Admin\AdminPerusahaanController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LupaPasswordController;
use App\Http\Controllers\Auth\RegistrasiController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Kepala\KepalaPerizinanController;
use App\Http\Controllers\Landing\LandingController;
use App\Http\Controllers\Mahasiswa\MahasiswaBiodataDiriController;
use App\Http\Controllers\Mahasiswa\MahasiswaLaporanMagangController;
use App\Http\Controllers\Mahasiswa\MahasiswaLaporanMingguanController;
use App\Http\Controllers\Mahasiswa\MahasiswaPerizinanController;
use App\Http\Controllers\Mahasiswa\MahasiswaRiwayatController;
use App\Http\Controllers\Operator\OperatorPerizinanController;
use App\Http\Controllers\Pegawai\PegawaiMahasiswaController;
use App\Http\Controllers\Pegawai\PegawaiPerizinanController;
use App\Http\Controllers\Pegawai\PegawaiPerusahaanController;
use App\Http\Controllers\Setting\SettingController;
use App\Http\Controllers\Supervisor\SupervisorLaporanMagangController;
use App\Http\Controllers\Supervisor\SupervisorLaporanMingguan;
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

// Lupa Password
Route::get('/lupa-password/index', [LupaPasswordController::class, 'lupaPassword'])->name('lupa-password.index');
Route::get('/reset-password/index', [LupaPasswordController::class, 'resetPassword'])->name('reset-password.index');
Route::post('/lupa-password/storelupapassword', [LupaPasswordController::class, 'storelupapassword'])->name('lupa-password.storelupapassword');
Route::post('/reset-password/storeresetpassword', [LupaPasswordController::class, 'storeresetpassword'])->name('reset-password.storeresetpassword');


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
    Route::group(['middleware' => [CekLevel::class . ':Admin,Kepala']], function () {

        // Laporan Mingguan
        Route::get('/data-laporanmingguan', [AdminLaporanMingguanController::class, 'index'])->name('data-laporanmingguan.index');
        Route::get('/data-laporanmingguan/create', [AdminLaporanMingguanController::class, 'create'])->name('data-laporanmingguan.create');
        Route::get('/data-laporanmingguan/edit/{id}', [AdminLaporanMingguanController::class, 'edit'])->name('data-laporanmingguan.edit');
        Route::post('/data-laporanmingguan/store', [AdminLaporanMingguanController::class, 'store'])->name('data-laporanmingguan.store');
        Route::post('/data-laporanmingguan/update/{id}', [AdminLaporanMingguanController::class, 'update'])->name('data-laporanmingguan.update');
        Route::post('/data-laporanmingguan/destroy/{id}', [AdminLaporanMingguanController::class, 'destroy'])->name('data-laporanmingguan.destroy');
        Route::post('/data-laporanmingguan/generatepdf', [AdminLaporanMingguanController::class, 'generatepdf'])->name('data-laporanmingguan.generatepdf');

        // Laporan Magang
        Route::get('/data-laporanmagang', [AdminLaporanMagangController::class, 'index'])->name('data-laporanmagang.index');
        Route::get('/data-laporanmagang/create', [AdminLaporanMagangController::class, 'create'])->name('data-laporanmagang.create');
        Route::get('/data-laporanmagang/edit/{id}', [AdminLaporanMagangController::class, 'edit'])->name('data-laporanmagang.edit');
        Route::post('/data-laporanmagang/store', [AdminLaporanMagangController::class, 'store'])->name('data-laporanmagang.store');
        Route::post('/data-laporanmagang/update/{id}', [AdminLaporanMagangController::class, 'update'])->name('data-laporanmagang.update');
        Route::post('/data-laporanmagang/destroy/{id}', [AdminLaporanMagangController::class, 'destroy'])->name('data-laporanmagang.destroy');
        Route::post('/data-laporanmagang/generatepdf', [AdminLaporanMagangController::class, 'generatepdf'])->name('data-laporanmagang.generatepdf');

        // Perizinan
        Route::get('/data-perizinan', [AdminPerizinanController::class, 'index'])->name('data-perizinan.index');
        Route::get('/data-perizinan/create', [AdminPerizinanController::class, 'create'])->name('data-perizinan.create');
        Route::get('/data-perizinan/edit/{id}', [AdminPerizinanController::class, 'edit'])->name('data-perizinan.edit');
        Route::post('/data-perizinan/store', [AdminPerizinanController::class, 'store'])->name('data-perizinan.store');
        Route::post('/data-perizinan/update/{id}', [AdminPerizinanController::class, 'update'])->name('data-perizinan.update');
        Route::post('/data-perizinan/destroy/{id}', [AdminPerizinanController::class, 'destroy'])->name('data-perizinan.destroy');
        Route::post('/data-perizinan/generatepdf', [AdminPerizinanController::class, 'generatepdf'])->name('data-perizinan.generatepdf');

        // Users
        Route::get('/data-user', [AdminUserController::class, 'index'])->name('data-user.index');
        Route::post('/data-user/store', [AdminUserController::class, 'store'])->name('data-user.store');
        Route::post('/data-user/update/{id}', [AdminUserController::class, 'update'])->name('data-user.update');
        Route::post('/data-user/destroy/{id}', [AdminUserController::class, 'destroy'])->name('data-user.destroy');
    });

    // Supervisor
    Route::group(['middleware' => [CekLevel::class . ':Supervisor']], function () {

        // Laporan Magang
        Route::get('/supervisor-laporanmagang', [SupervisorLaporanMagangController::class, 'index'])->name('supervisor-laporanmagang.index');
        Route::get('/supervisor-laporanmagang/edit/{id}', [SupervisorLaporanMagangController::class, 'edit'])->name('supervisor-laporanmagang.edit');
        Route::post('/supervisor-laporanmagang/update/{id}', [SupervisorLaporanMagangController::class, 'update'])->name('supervisor-laporanmagang.update');

        // Laporan Mingguan
        Route::get('/supervisor-laporanmingguan', [SupervisorLaporanMingguan::class, 'index'])->name('supervisor-laporanmingguan.index');
        Route::get('/supervisor-laporanmingguan/edit/{id}', [SupervisorLaporanMingguan::class, 'edit'])->name('supervisor-laporanmingguan.edit');
        Route::post('/supervisor-laporanmingguan/update/{id}', [SupervisorLaporanMingguan::class, 'update'])->name('supervisor-laporanmingguan.update');
    });

    // Operator
    Route::group(['middleware' => [CekLevel::class . ':Operator']], function () {
        // Perizinan
        Route::get('/operator-perizinan', [OperatorPerizinanController::class, 'index'])->name('operator-perizinan.index');
        Route::get('/operator-perizinan/create', [OperatorPerizinanController::class, 'create'])->name('operator-perizinan.create');
        Route::get('/operator-perizinan/edit/{id}', [OperatorPerizinanController::class, 'edit'])->name('operator-perizinan.edit');
        Route::post('/operator-perizinan/store', [OperatorPerizinanController::class, 'store'])->name('operator-perizinan.store');
        Route::post('/operator-perizinan/update/{id}', [OperatorPerizinanController::class, 'update'])->name('operator-perizinan.update');
        Route::post('/operator-perizinan/destroy/{id}', [OperatorPerizinanController::class, 'destroy'])->name('operator-perizinan.destroy');
    });

    // Mahasiswa
    Route::group(['middleware' => [CekLevel::class . ':Mahasiswa']], function () {

        // Laporan Magang
        Route::get('/mahasiswa-laporanmagang', [MahasiswaLaporanMagangController::class, 'index'])->name('mahasiswa-laporanmagang.index');
        Route::get('/mahasiswa-laporanmagang/create', [MahasiswaLaporanMagangController::class, 'create'])->name('mahasiswa-laporanmagang.create');
        Route::get('/mahasiswa-laporanmagang/edit/{id}', [MahasiswaLaporanMagangController::class, 'edit'])->name('mahasiswa-laporanmagang.edit');
        Route::post('/mahasiswa-laporanmagang/store', [MahasiswaLaporanMagangController::class, 'store'])->name('mahasiswa-laporanmagang.store');
        Route::post('/mahasiswa-laporanmagang/update/{id}', [MahasiswaLaporanMagangController::class, 'update'])->name('mahasiswa-laporanmagang.update');
        Route::post('/mahasiswa-laporanmagang/destroy/{id}', [MahasiswaLaporanMagangController::class, 'destroy'])->name('mahasiswa-laporanmagang.destroy');

        // Laporan Mingguan
        Route::get('/mahasiswa-laporanmingguan', [MahasiswaLaporanMingguanController::class, 'index'])->name('mahasiswa-laporanmingguan.index');
        Route::get('/mahasiswa-laporanmingguan/create', [MahasiswaLaporanMingguanController::class, 'create'])->name('mahasiswa-laporanmingguan.create');
        Route::get('/mahasiswa-laporanmingguan/edit/{id}', [MahasiswaLaporanMingguanController::class, 'edit'])->name('mahasiswa-laporanmingguan.edit');
        Route::post('/mahasiswa-laporanmingguan/store', [MahasiswaLaporanMingguanController::class, 'store'])->name('mahasiswa-laporanmingguan.store');
        Route::post('/mahasiswa-laporanmingguan/update/{id}', [MahasiswaLaporanMingguanController::class, 'update'])->name('mahasiswa-laporanmingguan.update');
        Route::post('/mahasiswa-laporanmingguan/destroy/{id}', [MahasiswaLaporanMingguanController::class, 'destroy'])->name('mahasiswa-laporanmingguan.destroy');

        // Perizinan
        Route::get('/mahasiswa-perizinan', [MahasiswaPerizinanController::class, 'index'])->name('mahasiswa-perizinan.index');
        Route::get('/mahasiswa-perizinan/create', [MahasiswaPerizinanController::class, 'create'])->name('mahasiswa-perizinan.create');
        Route::get('/mahasiswa-perizinan/edit/{id}', [MahasiswaPerizinanController::class, 'edit'])->name('mahasiswa-perizinan.edit');
        Route::post('/mahasiswa-perizinan/store', [MahasiswaPerizinanController::class, 'store'])->name('mahasiswa-perizinan.store');
        Route::post('/mahasiswa-perizinan/update/{id}', [MahasiswaPerizinanController::class, 'update'])->name('mahasiswa-perizinan.update');
        Route::post('/mahasiswa-perizinan/destroy/{id}', [MahasiswaPerizinanController::class, 'destroy'])->name('mahasiswa-perizinan.destroy');
    });
});
