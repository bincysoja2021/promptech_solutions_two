<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegController;
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

Route::get('/', function () {
    return view('register');
});
Route::get('/login', [RegController::class, 'login'])->name('login');
Route::get('/verifyotp', [RegController::class, 'verifyotp'])->name('verifyotp');
Route::get('/update_user', [RegController::class, 'update_user'])->name('update_user');
Route::post('/get_user_list', [RegController::class, 'get_user_list'])->name('get_user_list');

