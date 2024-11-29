<?php

use Illuminate\Support\Facades\Route;
use Modules\CClassContact\App\Http\Controllers\CClassContactController;

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


Route::group(['prefix' => 'admin/cclasscontact'], function() {
    Route::get('/', [CClassContactController::class, 'index'])->name('cclasscontact.index');
    Route::get('/create', [CClassContactController::class, 'create'])->name('cclasscontact.create');
    Route::post('/', [CClassContactController::class, 'store'])->name('cclasscontact.store');
    Route::get('/{id}', [CClassContactController::class, 'show'])->name('cclasscontact.show');
    Route::get('/{id}/edit', [CClassContactController::class, 'edit'])->name('cclasscontact.edit');
    Route::put('/{id}', [CClassContactController::class, 'update'])->name('cclasscontact.update');
    Route::delete('/{id}', [CClassContactController::class, 'destroy'])->name('cclasscontact.destroy');
});