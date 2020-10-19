<?php

use App\Http\Controllers\ContainerController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth:sanctum', 'prefix' => 'access'], function () {

    Route::group(['middleware' => ['role:master'], 'prefix' => 'users'], function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('create', [UserController::class, 'create'])->name('users.create');
        Route::post('store', [UserController::class, 'store'])->name('users.store');
        Route::get('{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::post('{user}/update', [UserController::class, 'update'])->name('users.update');
        Route::get('{user}/delete', [UserController::class, 'destroy'])->name('users.delete');
    });

    /*
    Route::group(['prefix' => 'containers'], function () {
        Route::get('/', [ContainerController::class, 'index'])->name('containers.index');
        Route::get('create', [ContainerController::class, 'create'])->name('containers.create');
        Route::post('store', [ContainerController::class, 'store'])->name('containers.store');
        Route::get('{container}/edit', [ContainerController::class, 'edit'])->name('containers.edit');
        Route::post('{container}/update', [ContainerController::class, 'update'])->name('containers.update');
        Route::post('{container}/delete', [ContainerController::class, 'destroy'])->name('containers.delete');
    });
    */

});
