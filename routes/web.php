<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\ProfileController;
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
    return view('index');
});

//Route::prefix('user')->name('user.')->middleware(['auth', 'verified'])->group(function () {
//    Route::get('profile', [ProfileController::class, 'edit'])->name('profile');
//});
//
//Route::prefix('admin')->name('admin.')->middleware(['auth', 'auth.admin', 'verified'])->group(function () {
//    Route::resource('/users', UserController::class);
//});


// Refactor Above code
Route::group(['middleware' => 'auth'], function () {

    Route::group([
        'prefix' => 'admin',
        'middleware' => ['auth.admin', 'verified'],
        'as' => 'admin.'
    ], function () {
        Route::resource('/users', UserController::class);
    });

    Route::group([
        'prefix' => 'user',
        'middleware' => 'verified',
        'as' => 'user.',
    ], function () {
        Route::get('profile', ProfileController::class); // with invoke method as it has single method
    });

});
