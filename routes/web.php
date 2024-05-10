<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BobotController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\FactorController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\StandartController;
use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\SubKriteriaController;
use App\Http\Controllers\LupaPasswordController;
use App\Http\Controllers\GantiPasswordController;

Route::get('/', function () {
});

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'login']);


Route::get('lupa-password', [LupaPasswordController::class, 'index']);
Route::get('/reload-captcha', [LoginController::class, 'reloadCaptcha']);
Route::get('/logout', [LogoutController::class, 'logout']);


Route::get('/', [LoginController::class, 'index']);
Route::get('fitur', [FrontController::class, 'fitur']);
Route::get('tim', [FrontController::class, 'tim']);
Route::get('partner', [FrontController::class, 'partner']);
Route::get('hubungikami', [FrontController::class, 'hubungikami']);
Route::group(['middleware' => ['auth', 'role:superadmin']], function () {
    Route::get('superadmin', [HomeController::class, 'superadmin']);
    Route::get('superadmin/gp', [GantiPasswordController::class, 'index']);
    Route::post('superadmin/gp', [GantiPasswordController::class, 'update']);
    Route::post('superadmin/sk/updatelurah', [HomeController::class, 'updatelurah']);

    Route::get('superadmin/user', [UserController::class, 'index']);
    Route::get('superadmin/user/create', [UserController::class, 'create']);
    Route::post('superadmin/user/create', [UserController::class, 'store']);
    Route::get('superadmin/user/edit/{id}', [UserController::class, 'edit']);
    Route::post('superadmin/user/edit/{id}', [UserController::class, 'update']);
    Route::get('superadmin/user/delete/{id}', [UserController::class, 'delete']);

    Route::get('superadmin/factor', [FactorController::class, 'index']);
    Route::get('superadmin/factor/create', [FactorController::class, 'create']);
    Route::post('superadmin/factor/create', [FactorController::class, 'store']);
    Route::get('superadmin/factor/edit/{id}', [FactorController::class, 'edit']);
    Route::post('superadmin/factor/edit/{id}', [FactorController::class, 'update']);
    Route::get('superadmin/factor/delete/{id}', [FactorController::class, 'delete']);

    Route::get('superadmin/bobot', [BobotController::class, 'index']);
    Route::get('superadmin/bobot/create', [BobotController::class, 'create']);
    Route::post('superadmin/bobot/create', [BobotController::class, 'store']);
    Route::get('superadmin/bobot/edit/{id}', [BobotController::class, 'edit']);
    Route::post('superadmin/bobot/edit/{id}', [BobotController::class, 'update']);
    Route::get('superadmin/bobot/delete/{id}', [BobotController::class, 'delete']);

    Route::get('superadmin/kriteria', [KriteriaController::class, 'index']);
    Route::get('superadmin/kriteria/create', [KriteriaController::class, 'create']);
    Route::post('superadmin/kriteria/create', [KriteriaController::class, 'store']);
    Route::get('superadmin/kriteria/edit/{id}', [KriteriaController::class, 'edit']);
    Route::post('superadmin/kriteria/edit/{id}', [KriteriaController::class, 'update']);
    Route::get('superadmin/kriteria/delete/{id}', [KriteriaController::class, 'delete']);

    Route::get('superadmin/subkriteria', [SubKriteriaController::class, 'index']);
    Route::get('superadmin/subkriteria/create', [SubKriteriaController::class, 'create']);
    Route::post('superadmin/subkriteria/create', [SubKriteriaController::class, 'store']);
    Route::get('superadmin/subkriteria/edit/{id}', [SubKriteriaController::class, 'edit']);
    Route::post('superadmin/subkriteria/edit/{id}', [SubKriteriaController::class, 'update']);
    Route::get('superadmin/subkriteria/delete/{id}', [SubKriteriaController::class, 'delete']);

    Route::get('superadmin/siswa', [SiswaController::class, 'index']);
    Route::get('superadmin/siswa/create', [SiswaController::class, 'create']);
    Route::post('superadmin/siswa/create', [SiswaController::class, 'store']);
    Route::get('superadmin/siswa/edit/{id}', [SiswaController::class, 'edit']);
    Route::post('superadmin/siswa/edit/{id}', [SiswaController::class, 'update']);
    Route::get('superadmin/siswa/delete/{id}', [SiswaController::class, 'delete']);

    Route::get('superadmin/jurusan', [JurusanController::class, 'index']);
    Route::get('superadmin/jurusan/create', [JurusanController::class, 'create']);
    Route::post('superadmin/jurusan/create', [JurusanController::class, 'store']);
    Route::get('superadmin/jurusan/edit/{id}', [JurusanController::class, 'edit']);
    Route::post('superadmin/jurusan/edit/{id}', [JurusanController::class, 'update']);
    Route::get('superadmin/jurusan/delete/{id}', [JurusanController::class, 'delete']);

    Route::get('superadmin/standart', [StandartController::class, 'index']);
    Route::get('superadmin/standart/create', [StandartController::class, 'create']);
    Route::post('superadmin/standart/create', [StandartController::class, 'store']);
    Route::get('superadmin/standart/edit/{id}', [StandartController::class, 'edit']);
    Route::post('superadmin/standart/edit/{id}', [StandartController::class, 'update']);
    Route::get('superadmin/standart/delete/{id}', [StandartController::class, 'delete']);

    Route::get('superadmin/perhitungan', [PerhitunganController::class, 'index']);
    Route::get('superadmin/perhitungan/{id_siswa}/detail', [PerhitunganController::class, 'detail']);
    Route::get('superadmin/perhitungan/{id_siswa}/simpan', [PerhitunganController::class, 'simpan']);
    Route::get('superadmin/perhitungan/{id_siswa}/store/jurusan', [PerhitunganController::class, 'storeJurusan']);
    Route::get('superadmin/perhitungan/reset/{id_siswa}', [PerhitunganController::class, 'reset']);
    Route::get('superadmin/perhitungan/subkriteria/{id}/{id_siswa}', [PerhitunganController::class, 'subkriteria']);
    Route::post('superadmin/perhitungan/subkriteria/{id}/{id_siswa}', [PerhitunganController::class, 'updateSubkriteria']);
    Route::get('superadmin/perhitungan/delete/{id}', [PerhitunganController::class, 'delete']);

    Route::get('superadmin/laporan', [LaporanController::class, 'index']);
    Route::get('superadmin/laporan/siswa', [LaporanController::class, 'siswa']);
    Route::get('superadmin/laporan/kriteria', [LaporanController::class, 'kriteria']);
    Route::get('superadmin/laporan/subkriteria', [LaporanController::class, 'subkriteria']);
    Route::get('superadmin/laporan/bobot', [LaporanController::class, 'bobot']);
    Route::get('superadmin/laporan/profil', [LaporanController::class, 'profil']);
    Route::get('superadmin/laporan/hasil', [LaporanController::class, 'hasil']);
});
