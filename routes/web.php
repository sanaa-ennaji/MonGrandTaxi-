<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});
Route::get('/register', function () {
    return view('register');
});


Route::post('/registerPassager', [UserController::class, 'registerPassager']);
Route::post('/registerDriver', [UserController::class, 'registerDriver']);
// Route::post('/login', [UserController::class, 'login']);
