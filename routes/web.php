<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('login');
// });

// Route::view('/success', 'success')->name('success');

// Route::get('/success', function(){
//     return view('success');
// });

// Route::get('/login', [AuthController::class, 'login'])->name('login');
// Route::post('/', [AuthController::class, 'login'])->name('login.action');
// Route::get('/success', [AuthController::class, 'logout'])->name('logout');

Route::get('/', function() {
    return view('welcome');
});

//Login
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('auth.authenticate');

//Register
Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/register', [AuthController::class, 'store'])->name('auth.store');

//Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

