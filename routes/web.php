<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ListMemberController;
use App\Http\Controllers\dendaController;
use App\Http\Controllers\jabatanController;
use App\Http\Controllers\kehadiranController;
use App\Http\Controllers\absensiController;
use App\Http\Controllers\konfirmasiController;
use App\Http\Controllers\gajiController;
use App\Http\Controllers\dailyAbsensiController;
use App\Http\Controllers\WebcamController;
use App\Http\Controllers\absensiKeluarController;
use App\Http\Controllers\laporanHarianController;
use App\Http\Controllers\laporanBulananController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\methodAbsensiController;
use App\Http\Controllers\qrcodeAbsensiController;

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



Route::resource('/dashboard', (DashboardController::class));
Route::get('/login', [LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class,'auth']);

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('/dashboard');
    });
    Route::resource('/absensi', (absensiController::class));
    Route::resource('/absensi-keluar', (absensiKeluarController::class));
    Route::post('/logout', [LoginController::class,'logout']);
    Route::resource('/konfirmasi', (konfirmasiController::class));
    Route::resource('/profile', (profileController::class));
    Route::post('/profile-image/{id}', [profileController::class,'image']);
});

Route::middleware('isAdmin')->group(function () {
    Route::resource('/denda', (dendaController::class));
    Route::resource('/list-member', (ListMemberController::class));
    Route::get('/generate/{id}', [ListMemberController::class,'generate']);
    Route::resource('/jabatan', (jabatanController::class));
    Route::get('/absensi-bulanan', [kehadiranController::class,'index']);
    Route::post('/absensi-bulanan', [kehadiranController::class,'index']);
    Route::post('/qr', [absensiController::class,'qr']);
    Route::resource('/gaji', (gajiController::class));
    Route::get('/gaji-pdf', [gajiController::class, 'createPdf']);
    Route::get('/laporan-gaji', [gajiController::class, 'index1']);
    Route::get('/laporan-gajiExport', [gajiController::class, 'export']);
    Route::get('/daily_absensi', [dailyAbsensiController::class,'index']);
    Route::post('/daily_absensi', [dailyAbsensiController::class,'index']);
    Route::get('/hapus', [dailyAbsensiController::class,'destroy']);
    Route::resource('/webcam', (WebcamController::class));
    Route::get('/laporan-harian', [laporanHarianController::class,'index']);
    Route::post('/laporan-harian', [laporanHarianController::class,'index']);
    Route::post('/la', [laporanHarianController::class,'export']);
    Route::get('/laporan-bulanan', [laporanBulananController::class,'index']);
    Route::post('/laporan-bulanan', [laporanBulananController::class,'index']);
    Route::post('/cetak-bulan', [laporanBulananController::class,'export']);
    Route::get('/rekap-bulanan', [laporanBulananController::class,'index1']);
    Route::post('/rekap-bulanan', [laporanBulananController::class,'index1']);
  
    Route::resource('/metode-absensi', (methodAbsensiController::class));
    Route::resource('/qrcode-absensi', (qrcodeAbsensiController::class));
    Route::post('/qrcode-absensi-keluar', [qrcodeAbsensiController::class,'keluar']);


});


