<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DaerahController;
use App\Http\Controllers\OrtuController;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\KelompokController;
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

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    });

    // Menu Kepala Keluarga
    Route::get('/ortu', [OrtuController::class, 'index']);
    Route::post('/ortu', [OrtuController::class, 'store']);

    // Menu Daerah
    Route::get('/daerah', [DaerahController::class, 'index']);

    // Menu Desa
    Route::get('/desa', [DesaController::class, 'index']);
    Route::post('/desa', [DesaController::class, 'store']);
    Route::post('/desa/edit/{id}', [DesaController::class, 'update']);
    Route::delete('/desa/delete/{id}', [DesaController::class, 'destroy']);

    // Menu Kelompok
    Route::get('/kelompok', [KelompokController::class, 'index']);
    Route::post('/kelompok', [KelompokController::class, 'store']);
    Route::post('/kelompok/edit/{id}', [KelompokController::class, 'update']);
    Route::delete('/kelompok/delete/{id}', [KelompokController::class, 'destroy']);

    // Menu User
    Route::get('/user', [userController::class, 'index']);
    Route::post('/user', [userController::class, 'store']);
    Route::post('/user/edit/{id}', [userController::class, 'update']);
    Route::delete('/user/delete/{id}', [userController::class, 'destroy']);
});

Route::get('/login', [AuthenticationController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthenticationController::class, 'store'])->name('login.submit');
Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');
