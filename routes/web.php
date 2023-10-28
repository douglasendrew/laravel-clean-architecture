<?php

use Illuminate\Support\Facades\Auth;
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
    return redirect('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/locais')->middleware('secure:1')->group(function() {
    Route::get('/', [App\Http\Controllers\LocalController::class, 'locais'])->name('locais.list');
    Route::post('/create', [App\Http\Controllers\LocalController::class, 'insertNewLocal'])->name('locais.create');
    Route::post('/delete', [App\Http\Controllers\LocalController::class, 'deleteLocal'])->name('locais.delete');
    Route::post('/update/{id_local}', [App\Http\Controllers\LocalController::class, 'updateLocal'])->name('locais.update');
});

Route::prefix('/permissions')->middleware('secure:2')->group(function() {
    Route::get('/', [App\Http\Controllers\PermissionsController::class, 'permissions_list'])->name('permissions.list');
    Route::post('/create', [App\Http\Controllers\PermissionsController::class, 'new_permission'])->name('permissions.create');
    Route::post('/delete', [App\Http\Controllers\PermissionsController::class, 'deletePermission'])->name('permissions.delete');
    Route::post('/update/{id_user}', [App\Http\Controllers\PermissionsController::class, 'updatePermission'])->name('permissions.update');
});