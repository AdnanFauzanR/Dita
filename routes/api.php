<?php

use App\Http\Controllers\KontenBannerController;
use App\Http\Controllers\KontenBeritaController;
use App\Http\Controllers\KontenKomoditiController;
use App\Http\Controllers\PariwisataController;
use App\Http\Controllers\PerindustrianController;
use App\Http\Controllers\PertanianController;
use App\Http\Controllers\PerikananController;
use App\Http\Controllers\PeternakanController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Tymon\JWTAuth\Facades\JWTAuth;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Perikanan Route API
Route::get('/Perikanan', [PerikananController::class, 'index'])->middleware('admin-kecamatan');
Route::get('/Perikanan/{id}', [PerikananController::class, 'show'])->middleware('admin-kecamatan');
Route::get('/PerikananByUser', [PerikananController::class, 'indexByUser'])->middleware('admin-kecamatan');
Route::post('/Perikanan', [PerikananController::class, 'store'])->middleware('admin-kecamatan');
Route::post('/Perikanan/{id}', [PerikananController::class, 'update'])->middleware('admin-kecamatan');
Route::delete('/Perikanan/{id}', [PerikananController::class, 'destroy'])->middleware('admin-kecamatan');

//Pertanian Route API
Route::get('/Pertanian', [PertanianController::class, 'index'])->middleware('admin-kecamatan');
Route::get('/Pertanian/{id}', [PertanianController::class, 'show'])->middleware('admin-kecamatan');
Route::get('/PertanianByUser', [PertanianController::class, 'indexByUser'])->middleware('admin-kecamatan');
Route::middleware('admin-kecamatan')->post('/Pertanian', [PertanianController::class, 'store']);
Route::post('/Pertanian/{id}', [PertanianController::class, 'update'])->middleware('admin-kecamatan');
Route::delete('/Pertanian/{id}', [PertanianController::class, 'destroy'])->middleware('admin-kecamatan');

//Perindustrian Route API
Route::get('/Perindustrian', [PerindustrianController::class, 'index'])->middleware('admin-kecamatan');
Route::get('/Perindustrian/{id}', [PerindustrianController::class, 'show'])->middleware('admin-kecamatan');
Route::get('/PerindustrianByUser', [PerindustrianController::class, 'indexByUser'])->middleware('admin-kecamatan');
Route::post('/Perindustrian', [PerindustrianController::class, 'store'])->middleware('admin-kecamatan');
Route::post('/Perindustrian/{id}', [PerindustrianController::class, 'update'])->middleware('admin-kecamatan');
Route::delete('/Perindustrian/{id}', [PerindustrianController::class, 'destroy'])->middleware('admin-kecamatan');

//Pariwisata Route API
Route::get('/Pariwisata', [PariwisataController::class, 'index'])->middleware('admin-kecamatan');
Route::get('/Pariwisata/{id}', [PariwisataController::class, 'show'])->middleware('admin-kecamatan');
Route::get('/PariwisataByUser', [PariwisataController::class, 'indexByUser'])->middleware('admin-kecamatan');
Route::post('/Pariwisata', [PariwisataController::class, 'store'])->middleware('admin-kecamatan');
Route::post('/Pariwisata/{id}', [PariwisataController::class, 'update'])->middleware('admin-kecamatan');
Route::delete('/Pariwisata/{id}', [PariwisataController::class, 'destroy'])->middleware('admin-kecamatan');

//Peternakan Route API
Route::get('/Peternakan', [PeternakanController::class, 'index'])->middleware('admin-kecamatan');
Route::get('/Peternakan/{id}', [PeternakanController::class, 'show'])->middleware('admin-kecamatan');
Route::get('/PeternakanByUser', [PeternakanController::class, 'indexByUser'])->middleware('admin-kecamatan');
Route::post('/Peternakan', [PeternakanController::class, 'store'])->middleware('admin-kecamatan');
Route::post('/Peternakan/{id}', [PeternakanController::class, 'update'])->middleware('admin-kecamatan');
Route::delete('/Peternakan/{id}', [PeternakanController::class, 'destroy'])->middleware('admin-kecamatan');

//Konten Komoditi Route API
Route::get('/Konten Komoditi', [KontenKomoditiController::class, 'index']);
Route::post('/Konten Komoditi', [KontenKomoditiController::class, 'store'])->middleware('admin-pusat');
Route::put('/Konten Komoditi/{id}', [KontenKomoditiController::class, 'update']);
Route::delete('/Konten Komoditi/{id}', [KontenKomoditiController::class, 'destroy']);

//Konten Banner Route API
Route::get('/Konten Banner', [KontenBannerController::class, 'index']);
Route::post('/Konten Banner', [KontenBannerController::class, 'store'])->middleware('admin-pusat');
Route::put('/Konten Banner/{id}', [KontenBannerController::class, 'update']);
Route::delete('/Konten Banner/{id}', [KontenBannerController::class, 'destroy'])->middleware('admin-pusat');

//Konten Berita Route API
Route::get('/Konten Berita', [KontenBeritaController::class, 'index']);
Route::get('/Konten Berita/{id}', [KontenBeritaController::class, 'show']);
Route::post('/Konten Berita', [KontenBeritaController::class, 'store'])->middleware('admin-pusat');
Route::post('/Konten Berita/{id}', [KontenBeritaController::class, 'update'])->middleware('admin-pusat');
Route::delete('/Konten Berita/{id}', [KontenBeritaController::class, 'destroy'])->middleware('admin-pusat');

//User API
Route::get('/Admin', [UserController::class, 'index']);
Route::put('/Admin/{id}', [UserController::class, 'update']);
Route::delete('/Admin/{id}', [UserController::class, 'destroy']);

//Auth API
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/admin', function(){
    $user = JWTAuth::parseToken()->authenticate();
    return response()->json([
        'success' => true,
        'user' => $user,
    ]);
});
Route::middleware('admin-kecamatan')->get('/adminkecamatan', function (Request $request) {
    return $request->user();
});
Route::middleware('admin-pusat')->get('/adminpusat', function (Request $request) {
    return $request->user();
});
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::group(['middelware' => ['auth.jwt', 'admin-kecamatan']], function() {
    Route::get('/Admin-Kecamatan', function(Request $request) {
        return $request->user();
    });
});

Route::group(['middelware' => ['auth.jwt', 'role:pusat']], function() {
    Route::get('/Admin-Pusat', function(Request $request) {
        return $request->user();
    });
});



// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
