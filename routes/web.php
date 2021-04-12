<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\PemasukanController;
use App\Http\Controllers\admin\VisiController;
use App\Http\Controllers\admin\MisiController;
use App\Http\Controllers\admin\PengeluaranController;
use App\Http\Controllers\admin\KegiatanController;
use App\Http\Controllers\admin\JenisKegiatanController;
use App\Http\Controllers\admin\SumberDanaController;
use App\Http\Controllers\admin\DetailKegiatanController;
use App\Http\Controllers\admin\RekapitulasiController;
use App\Http\Controllers\admin\KhutbahJumatController;
use App\Http\Controllers\admin\ImamSholatController;
use App\Http\Controllers\admin\ZakatController;
use App\Http\Controllers\admin\JenisZakatController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\UserPengeluaranController;
use App\Http\Controllers\UserPemasukanController;
use App\Http\Controllers\UserKhutbahController;
use App\Http\Controllers\UserKegiatanController;
use App\Http\Controllers\UserSholatController;
use App\Http\Controllers\UserGalleryController;
use App\Http\Controllers\UserBerandaController;
use App\Http\Controllers\UserMuallafController;

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

//hak akses bendahara
// Route::group(['middleware' => 'bendahara', 'admin'], function () {
//     // Route::resource('dashboard', DashboardController::class);
//     Route::resource('sumber_dana', SumberDanaController::class);
//     Route::resource('pemasukan', PemasukanController::class);
//     Route::resource('pengeluaran', PengeluaranController::class);
//     Route::resource('jenis_zakat', JenisZakatController::class);
//     Route::resource('zakat', ZakatController::class);
//     Route::resource('rekapitulasi', RekapitulasiController::class);
//     Route::resource('profile', ProfileController::class);
//     //chart
//     Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
//     Route::get('chart', [DashboardController::class, 'getChart']);
//     //cetak pdf
//     Route::get('laporan_rekapitulasi', [PemasukanController::class, 'rekapitulasi'])->name('laporan_rekapitulasi');
//     Route::get('laporan_rekapitulasi', [PengeluaranController::class, 'rekapitulasi'])->name('laporan_rekapitulasi');
//     Route::post('cetak_pemasukan', [PemasukanController::class, 'cetakPertanggal'])->name('cetak_pemasukan');
//     Route::post('cetak_pengeluaran', [PengeluaranController::class, 'print'])->name('cetak_pengeluaran');
// });

// hak akses admin
Route::group(['middleware' => 'admin'], function () {
    // Route::resource('dashboard', DashboardController::class);
    Route::resource('visi', VisiController::class);
    Route::resource('misi', MisiController::class);
    Route::resource('sumber_dana', SumberDanaController::class);
    Route::resource('pemasukan', PemasukanController::class);
    Route::resource('pengeluaran', PengeluaranController::class);
    Route::resource('khutbah', KhutbahJumatController::class);
    Route::resource('imam', ImamSholatController::class);
    Route::resource('zakat', ZakatController::class);
    Route::resource('jenis_zakat', JenisZakatController::class);
    Route::resource('kegiatan', KegiatanController::class);
    Route::resource('jenis_kegiatan', JenisKegiatanController::class);
    Route::resource('rekapitulasi', RekapitulasiController::class);
    Route::resource('pengguna', UserController::class);
    Route::resource('profile', ProfileController::class);
    Route::resource('detail_kegiatan', DetailKegiatanController::class);
    // cetak pdf
    Route::get('laporan_rekapitulasi', [PemasukanController::class, 'rekapitulasi'])->name('laporan_rekapitulasi');
    Route::get('laporan_rekapitulasi', [PengeluaranController::class, 'rekapitulasi'])->name('laporan_rekapitulasi');
    Route::post('cetak_pemasukan', [PemasukanController::class, 'cetakPertanggal'])->name('cetak_pemasukan');
    Route::post('cetak_pengeluaran', [PengeluaranController::class, 'print'])->name('cetak_pengeluaran');
    // Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    //chart
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('chart', [DashboardController::class, 'getChart'])->name('dashboard.getchart');
});

// Route::get('/', function () {
//     return view('user.v_template');
// });

Route::get('/', [UserBerandaController::class, 'index'])->name('user/beranda');
Route::get('user/pengeluaran', [UserPengeluaranController::class, 'index'])->name('user/pengeluaran');
Route::get('user/pemasukan', [UserPemasukanController::class, 'index'])->name('user/pemasukan');
Route::get('user/khutbah', [UserKhutbahController::class, 'index'])->name('user/khutbah');
Route::get('user/kegiatan', [UserKegiatanController::class, 'index'])->name('user/kegiatan');
Route::get('user/imam', [UserSholatController::class, 'index'])->name('user/imam');
Route::get('user/gallery', [UserGalleryController::class, 'index'])->name('user/gallery');
Route::get('user/muallaf', [UserMuallafController::class, 'index'])->name('user/muallaf');
Route::post('user/muallaf', [UserMuallafController::class, 'store'])->name('daftarmuallaf');
//jadwal sholat
Route::get('/info', [UserSholatController::class, 'index']);
Route::get('/result', [UserSholatController::class, 'result'])->name('result');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//hak akses ustad
// Route::group(['middleware' => 'ustad'], function () {
//     // Route::resource('dashboard', DashboardController::class);
//     Route::resource('imam', ImamSholatController::class);
//     Route::resource('khutbah', KhutbahJumatController::class);
//     Route::resource('profile', ProfileController::class);
//     //chart
//     Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
//     Route::get('chart', [DashboardController::class, 'getChart']);
// });