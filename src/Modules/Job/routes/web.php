<?php

use Illuminate\Support\Facades\Route;
use Modules\Job\App\Http\Controllers\JobController;

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

Route::group(['prefix' => 'admin/jobs'], function() {
    Route::get('/', [JobController::class, 'index'])->name('job.index');
    Route::get('/create', [JobController::class, 'create'])->name('job.create');
    Route::post('/', [JobController::class, 'store'])->name('job.store');
    Route::get('/{id}', [JobController::class, 'show'])->name('job.show');
    Route::get('/{id}/edit', [JobController::class, 'edit'])->name('job.edit');
    Route::put('/{id}', [JobController::class, 'update'])->name('job.update');
    Route::delete('/{id}', [JobController::class, 'destroy'])->name('job.destroy');
});

Route::get('/jobs/search', [JobController::class, 'search'])->name('job.search');

Route::prefix('jobs')->name('jobs.')->group(function () {
    Route::get('/{id}', [JobController::class, 'findById'])->name('find');
});

