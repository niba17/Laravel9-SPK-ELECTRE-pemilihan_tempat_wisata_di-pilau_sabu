<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\KecamatanKelurahanDesaController;
use App\Http\Controllers\KecamatanKelurahanController;
use App\Http\Controllers\KelurahanDesaController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\LokasiWisataController;
use App\Http\Controllers\KriteriaSubKriteriaController;
use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\SubKriteriaController;
use App\Http\Controllers\LokasiWisataKriteriaController;
use App\Http\Controllers\LokasiWisataSubKriteriaController;

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

Route::get('/', [LandController::class, 'index']);

Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::get('/akun', [AkunController::class, 'index'])->middleware('auth')->name('akun');
Route::get('/akun-add', [AkunController::class, 'create'])->middleware('auth')->name('akun-add');
Route::post('/akun-store', [AkunController::class, 'store'])->middleware('auth');
Route::get('/akun-edit/{id}', [AkunController::class, 'edit'])->middleware('auth')->name('akun-edit');
Route::put('/akun-update/{id}', [AkunController::class, 'update'])->middleware('auth');
Route::get('/akun-destroy/{id}', [AkunController::class, 'destroy'])->middleware('auth');

Route::get('/lokasi_wisata', [LokasiWisataController::class, 'index'])->middleware('auth')->name('lokasi_wisata');
Route::get('/lokasi_wisata-add', [LokasiWisataController::class, 'create'])->middleware('auth')->name('lokasi_wisata-add');
Route::post('/lokasi_wisata-store', [LokasiWisataController::class, 'store'])->middleware('auth');
Route::get('/lokasi_wisata-edit/{id}', [LokasiWisataController::class, 'edit'])->middleware('auth')->name('lokasi_wisata-edit');
Route::put('/lokasi_wisata-update/{id}', [LokasiWisataController::class, 'update'])->middleware('auth');
Route::get('/lokasi_wisata-destroy/{id}', [LokasiWisataController::class, 'destroy'])->middleware('auth');
Route::get('/lokasi_wisata-request', [LokasiWisataController::class, 'request'])->name('lokasi_wisata-request');
// Route::get('/lokasi_wisata-cetak/{id}', [LokasiWisataController::class, 'cetak']);

Route::get('/kriteria_sub_kriteria', [KriteriaSubKriteriaController::class, 'index'])->middleware('auth')->name('kriteria_sub_kriteria');
Route::get('/kriteria_sub_kriteria-add', [KriteriaSubKriteriaController::class, 'create'])->middleware('auth')->name('kriteria_sub_kriteria-add');
Route::post('/kriteria_sub_kriteria-store', [KriteriaSubKriteriaController::class, 'store'])->middleware('auth');
Route::get('/kriteria_sub_kriteria-edit/{id}', [KriteriaSubKriteriaController::class, 'edit'])->middleware('auth')->name('kriteria_sub_kriteria-edit');
Route::put('/kriteria_sub_kriteria-update/{id}', [KriteriaSubKriteriaController::class, 'update'])->middleware('auth');
Route::get('/kriteria_sub_kriteria-destroy/{id}', [KriteriaSubKriteriaController::class, 'destroy'])->middleware('auth');
Route::get('/kriteria_sub_kriteria-request', [KriteriaSubKriteriaController::class, 'request'])->name('kriteria_sub_kriteria-request');

Route::get('/kriteria', [KriteriaController::class, 'index'])->middleware('auth')->name('kriteria');
Route::get('/kriteria-add', [KriteriaController::class, 'create'])->middleware('auth')->name('kriteria-add');
Route::post('/kriteria-store', [KriteriaController::class, 'store'])->middleware('auth');
Route::get('/kriteria-edit/{id}', [KriteriaController::class, 'edit'])->middleware('auth')->name('kriteria-edit');
Route::put('/kriteria-update/{id}', [KriteriaController::class, 'update'])->middleware('auth');
Route::get('/kriteria-destroy/{id}', [KriteriaController::class, 'destroy'])->middleware('auth');
Route::get('/kriteria-request', [KriteriaController::class, 'request'])->name('kriteria-request');
Route::get('/kriteria_lokasi_wisata-request', [KriteriaController::class, 'request_lokasi_wisata'])->name('kriteria_lokasi_wisata-request');
// Route::get('/kriteria-cetak/{id}', [KriteriaController::class, 'cetak']);

Route::get('/sub_kriteria', [SubKriteriaController::class, 'index'])->middleware('auth')->name('sub_kriteria');
Route::get('/sub_kriteria-add', [SubKriteriaController::class, 'create'])->middleware('auth')->name('sub_kriteria-add');
Route::post('/sub_kriteria-validator_add', [SubKriteriaController::class, 'validator_add'])->middleware('auth');
Route::post('/sub_kriteria-store', [SubKriteriaController::class, 'store'])->middleware('auth');
Route::get('/sub_kriteria-edit/{id}', [SubKriteriaController::class, 'edit'])->middleware('auth')->name('sub_kriteria-edit');
Route::post('/sub_kriteria-validator_edit/{id}', [SubKriteriaController::class, 'validator_edit'])->middleware('auth');
Route::put('/sub_kriteria-update/{id}', [SubKriteriaController::class, 'update'])->middleware('auth');
Route::get('/sub_kriteria-destroy/{id}', [SubKriteriaController::class, 'destroy'])->middleware('auth');
Route::get('/sub_kriteria-request', [SubKriteriaController::class, 'request'])->name('sub_kriteria-request');
// Route::get('/sub_kriteria-cetak/{id}', [SubKriteriaController::class, 'cetak']);

Route::get('/kecamatan_kelurahan', [KecamatanKelurahanController::class, 'index'])->middleware('auth')->name('kecamatan_kelurahan');
Route::get('/kecamatan_kelurahan-add', [KecamatanKelurahanController::class, 'create'])->middleware('auth')->name('kecamatan_kelurahan-add');
Route::post('/kecamatan_kelurahan-store', [KecamatanKelurahanController::class, 'store'])->middleware('auth');
Route::get('/kecamatan_kelurahan-edit/{id}', [KecamatanKelurahanController::class, 'edit'])->middleware('auth')->name('kecamatan_kelurahan-edit');
Route::put('/kecamatan_kelurahan-update/{id}', [KecamatanKelurahanController::class, 'update'])->middleware('auth');
Route::get('/kecamatan_kelurahan-destroy/{id}', [KecamatanKelurahanController::class, 'destroy'])->middleware('auth');
Route::get('/kecamatan_kelurahan-request', [KecamatanKelurahanController::class, 'request'])->name('kecamatan_kelurahan-request');

Route::get('/kelurahan_desa', [KelurahanDesaController::class, 'index'])->middleware('auth')->name('kelurahan_desa');
Route::get('/kelurahan_desa-add', [KelurahanDesaController::class, 'create'])->middleware('auth')->name('kelurahan_desa-add');
Route::post('/kelurahan_desa-store', [KelurahanDesaController::class, 'store'])->middleware('auth');
Route::get('/kelurahan_desa-edit/{id}', [KelurahanDesaController::class, 'edit'])->middleware('auth')->name('kelurahan_desa-edit');
Route::put('/kelurahan_desa-update/{id}', [KelurahanDesaController::class, 'update'])->middleware('auth');
Route::get('/kelurahan_desa-destroy/{id}', [KelurahanDesaController::class, 'destroy'])->middleware('auth');
Route::get('/kelurahan_desa-request', [KelurahanDesaController::class, 'request'])->name('kelurahan_desa-request');

Route::get('/kecamatan_kelurahan_desa', [KecamatanKelurahanDesaController::class, 'index'])->middleware('auth')->name('kecamatan_kelurahan_desa');

Route::get('/kecamatan', [KecamatanController::class, 'index'])->middleware('auth')->name('kecamatan');
Route::get('/kecamatan-add', [KecamatanController::class, 'create'])->middleware('auth')->name('kecamatan-add');
Route::post('/kecamatan-store', [KecamatanController::class, 'store'])->middleware('auth');
Route::get('/kecamatan-edit/{id}', [KecamatanController::class, 'edit'])->middleware('auth')->name('kecamatan-edit');
Route::put('/kecamatan-update/{id}', [KecamatanController::class, 'update'])->middleware('auth');
Route::get('/kecamatan-destroy/{id}', [KecamatanController::class, 'destroy'])->middleware('auth');
Route::get('/kecamatan-request', [KecamatanController::class, 'request'])->name('kecamatan-request');

Route::get('/kelurahan', [KelurahanController::class, 'index'])->middleware('auth')->name('kelurahan');
Route::get('/kelurahan-add', [KelurahanController::class, 'create'])->middleware('auth')->name('kelurahan-add');
Route::post('/kelurahan-store', [KelurahanController::class, 'store'])->middleware('auth');
Route::get('/kelurahan-edit/{id}', [KelurahanController::class, 'edit'])->middleware('auth')->name('kelurahan-add');
Route::put('/kelurahan-update/{id}', [KelurahanController::class, 'update'])->middleware('auth');
Route::get('/kelurahan-destroy/{id}', [KelurahanController::class, 'destroy'])->middleware('auth');
Route::get('/kelurahan-request', [KelurahanController::class, 'request'])->name('kelurahan-request');

Route::get('/desa', [DesaController::class, 'index'])->middleware('auth')->name('desa');
Route::get('/desa-add', [DesaController::class, 'create'])->middleware('auth')->name('desa-add');
Route::post('/desa-store', [DesaController::class, 'store'])->middleware('auth');
Route::get('/desa-edit/{id}', [DesaController::class, 'edit'])->middleware('auth')->name('desa-add');
Route::put('/desa-update/{id}', [DesaController::class, 'update'])->middleware('auth');
Route::get('/desa-destroy/{id}', [DesaController::class, 'destroy'])->middleware('auth');
Route::get('/desa-request', [DesaController::class, 'request'])->name('desa-request');

Route::get('/lokasi_wisata_kriteria', [LokasiWisataKriteriaController::class, 'index'])->middleware('auth')->name('lokasi_wisata_kriteria');
Route::get('/lokasi_wisata_kriteria-add', [LokasiWisataKriteriaController::class, 'create'])->middleware('auth')->name('lokasi_wisata_kriteria-add');
// Route::post('/lokasi_wisata_kriteria-validator_add', [LokasiWisataKriteriaController::class, 'validator_add'])->middleware('auth');
Route::post('/lokasi_wisata_kriteria-store', [LokasiWisataKriteriaController::class, 'store'])->middleware('auth');
Route::get('/lokasi_wisata_kriteria-edit/{id}', [LokasiWisataKriteriaController::class, 'edit'])->middleware('auth')->name('lokasi_wisata_kriteria-edit');
// Route::post('/lokasi_wisata_kriteria-validator_edit/{id}', [LokasiWisataKriteriaController::class, 'validator_edit'])->middleware('auth');
Route::put('/lokasi_wisata_kriteria-update/{id}', [LokasiWisataKriteriaController::class, 'update'])->middleware('auth');
Route::get('/lokasi_wisata_kriteria-destroy/{id}', [LokasiWisataKriteriaController::class, 'destroy'])->middleware('auth');
Route::get('/lokasi_wisata_kriteria-request', [SubKriteriaController::class, 'siswa_request'])->name('lokasi_wisata_kriteria-request');

Route::get('/lokasi_wisata_sub_kriteria', [LokasiWisataSubKriteriaController::class, 'index'])->middleware('auth')->name('lokasi_wisata_sub_kriteria');
Route::get('/lokasi_wisata_sub_kriteria-add', [LokasiWisataSubKriteriaController::class, 'create'])->middleware('auth')->name('lokasi_wisata_sub_kriteria-add');
// Route::post('/lokasi_wisata_sub_kriteria-validator_add', [LokasiWisataSubKriteriaController::class, 'validator_add'])->middleware('auth');
Route::post('/lokasi_wisata_sub_kriteria-store', [LokasiWisataSubKriteriaController::class, 'store'])->middleware('auth');
Route::get('/lokasi_wisata_sub_kriteria-edit/{id}', [LokasiWisataSubKriteriaController::class, 'edit'])->middleware('auth')->name('lokasi_wisata_sub_kriteria-edit');
// Route::post('/lokasi_wisata_sub_kriteria-validator_edit/{id}', [LokasiWisataSubKriteriaController::class, 'validator_edit'])->middleware('auth');
Route::put('/lokasi_wisata_sub_kriteria-update/{id}', [LokasiWisataSubKriteriaController::class, 'update'])->middleware('auth');
Route::get('/lokasi_wisata_sub_kriteria-destroy/{id}', [LokasiWisataSubKriteriaController::class, 'destroy'])->middleware('auth');
Route::get('/lokasi_wisata_sub_kriteria-request', [SubKriteriaController::class, 'siswa_request'])->name('lokasi_wisata_sub_kriteria-request');
// Route::get('/lokasi_wisata_sub_kriteria-cetak/{id}', [LokasiWisataSubKriteriaController::class, 'cetak']);

Route::get('/perhitungan', [PerhitunganController::class, 'hasil'])->middleware('auth')->name('perhitungan');
// Route::get('/perhitungan-b_c', [PerhitunganController::class, 'b_c'])->middleware('auth')->name('[perhitungan-b_c]');
