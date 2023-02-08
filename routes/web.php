<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Models\Role;
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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout',[HomeController::class, 'logout']);
    Route::resource('/home', HomeController::class);
    Route::get('detail/{id}', [HomeController::class, 'show']);
    Route::post('/buy', [CartController::class, 'create']);
    Route::resource('cart', CartController::class);
    Route::post('/deleteitem', [CartController::class, 'destroy']);
    Route::get('/checkout', [CartController::class, 'checkout']);
    Route::get('/saved', function() {
        return view('profile.save');
    });
    Route::resource('profile', AccountController::class);

});

Route::group(['middleware' => 'authAdmin'], function () {
    Route::get('update/{id}', [AccountController::class, 'updateRole']);
    Route::post('updaterole', [AccountController::class, 'setRole']);
    Route::get('delete/{id}', [AccountController::class, 'deleteUser']);
    Route::get('/accountmaintenance', [AccountController::class, 'accountmaintenance']);
});

Route::get('/', function () {
    return view('landing.index');
})->name("landing");
Route::get('/register',[HomeController::class, 'showRegisterPage']);
Route::get('/login',[HomeController::class, 'showLoginPage']);
Route::post('/registeruser',[HomeController::class, 'register']);
Route::post('/loginuser',[HomeController::class, 'login']);

