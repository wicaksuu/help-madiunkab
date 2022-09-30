<?php

use App\Http\Controllers\ImeiController;
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

Route::get('/', [ImeiController::class, 'index']);
Route::post('ceknip', [ImeiController::class, 'ceknip']);
Route::post('save', [ImeiController::class, 'save']);
Route::any('imei', [ImeiController::class, 'imei']);
Route::post('update', [ImeiController::class, 'update']);




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::get('dashboard', [ImeiController::class, 'dashboard'])->name('dashboard');
    Route::get('reset/{id}/{userid}', [ImeiController::class, 'reset']);
});
