<?php

use Illuminate\Support\Facades\Route;
use Modules\Company\App\Http\Controllers\CompanyController;

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

Route::prefix('company-jobs')->group(function() {
    Route::get('/', [
        'as' => 'company.jobs',
        'uses' => 'CompanyController@index',
    ]);

});

Route::group(['prefix' => 'admin/company'], function() {
    Route::get('/', [CompanyController::class, 'index'])->name('company.index');
    Route::get('/create', [CompanyController::class, 'create'])->name('company.create');
    Route::post('/', [CompanyController::class, 'store'])->name('company.store');
    Route::get('/{id}', [CompanyController::class, 'show'])->name('company.show');
    Route::get('/{id}/edit', [CompanyController::class, 'edit'])->name('company.edit');
    Route::put('/{id}', [CompanyController::class, 'update'])->name('company.update');
    Route::delete('/{id}', [CompanyController::class, 'destroy'])->name('company.destroy');
    // Route::post('/company/upload-logo', [CompanyController::class, 'uploadLogo'])->name('company.uploadLogo');
});


// Route::prefix('company')->name('company.')->group(function () {
//     Route::post('/{id}/follow', [CompanyController::class, 'toggleFollow'])->name('follow');
//     Route::get('/{company}', [CompanyController::class, 'findById'])->name('find');
// });


Route::get('/general-company-jobs', [CompanyController::class, 'general'])->name('company.general');
Route::get('/companies', [CompanyController::class, 'general'])->name('company.general');
