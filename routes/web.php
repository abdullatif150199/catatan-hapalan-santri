<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SantriController;
use App\Http\Controllers\HapalanController;
use App\Http\Controllers\UstadController;





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






Route::get('/', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::group(['middleware' => ['auth', 'cekLevel:admin']], function() {
    Route::get('ustad', [UstadController::class, 'index']);
    Route::get('ustad/{user:id}', [UstadController::class, 'show']);
    Route::get('ustadCreate', [UstadController::class, 'create']);
    Route::get('ustad/{user:id}/edit', [UstadController::class, 'edit']);
    Route::post('ustad', [UstadController::class, 'store']);
    Route::post('ustad/{user:id}', [UstadController::class, 'update']);
    Route::delete('ustad/{user:id}', [UstadController::class, 'destroy']);
}); 


Route::group(['middleware' => ['auth', 'cekLevel:admin,ustad']], function() {
    Route::get('dashboard', [AdminController::class, 'index']);
    Route::get('dashboard/{user:id}', [AdminController::class, 'show']);
    Route::get('dashboardCreate', [AdminController::class, 'create']);
    Route::get('dashboard/{user:id}/edit', [AdminController::class, 'edit']);
    Route::post('dashboard', [AdminController::class, 'store']);
    Route::post('dashboard/{user:id}', [AdminController::class, 'update']);
    Route::delete('dashboard/{user:id}', [AdminController::class, 'destroy']);

    Route::get('hapalanCreate/{id}', [HapalanController::class, 'create']);
    Route::get('hapalan/{hapalan:id}/edit', [HapalanController::class, 'edit']);
    Route::post('hapalan', [HapalanController::class, 'store']);
    Route::post('hapalan/{hapalan:id}', [HapalanController::class, 'update']);
    Route::delete('hapalan/{hapalan:id}', [HapalanController::class, 'destroy']);
});

Route::group(['middleware' => ['auth', 'cekLevel:santri']], function() {
    Route::get('/santriDashboard', [SantriController::class, 'index']);
});

