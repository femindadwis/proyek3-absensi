<?php

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MstJabatanController;
use App\Http\Controllers\MstKaryawanController;
use App\Http\Controllers\MstLokasiController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\HomeController;
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

Auth::routes();
Route::get('/', [HomeController::class,'index']);
Route::group(['middleware' => 'auth'], function() {
Route::resource('MstJabatan', MstJabatanController::class);
Route::resource('MstKaryawan', MstKaryawanController::class);
Route::resource('MstLokasi', MstLokasiController::class);
Route::resource('MstAdmin', MstAdminController::class);
Route::resource('Absensi', AbsensiController::class);
Route::get('Absensi/detail/{id}', [AbsensiController::class,'detailAbsensi'])->name('absensi.detail');;
Route::get('Absensi/detail/{id}/export/{daterange}', [AbsensiController::class,'exportDetailAbsensi'])->name('export.detailAbsensi');;
Route::get('Absensi/export/{daterange}',[AbsensiController::class,'exportAbsensi'])->name('export.absensi');
});