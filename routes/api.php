<?php

use App\Http\Controllers\DownloadPDFController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KomoditiController;
use App\Http\Controllers\KontenBannerController;
use App\Http\Controllers\KontenBeritaController;
use App\Http\Controllers\KontenKomoditiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PariwisataController;
use App\Http\Controllers\PerindustrianController;
use App\Http\Controllers\PertanianController;
use App\Http\Controllers\PerikananController;
use App\Http\Controllers\PeternakanController;
use App\Http\Controllers\SaranController;
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
Route::get('/Perikanan', [PerikananController::class, 'index'])->middleware('admin');
Route::get('/Perikanan/{komoditi}', [PerikananController::class, 'indexByKecamatan']);
Route::get('/Perikanan/{year}', [PerikananController::class, 'indexByYear'])->middleware('admin');
Route::get('/Perikanan {id}', [PerikananController::class, 'show'])->middleware('admin');
Route::get('/PerikananByUser', [PerikananController::class, 'indexByUser'])->middleware('admin');
Route::post('/Perikanan', [PerikananController::class, 'store'])->middleware('admin');
Route::post('/Perikanan/{id}', [PerikananController::class, 'update'])->middleware('admin');
Route::delete('/Perikanan/{id}', [PerikananController::class, 'destroy'])->middleware('admin');

//Pertanian Route API
Route::get('/Pertanian', [PertanianController::class, 'index'])->middleware('admin');
Route::get('/Pertanian/{komoditi}', [PertanianController::class, 'indexByKecamatan']);
Route::get('/Pertanian/{year}', [PertanianController::class, 'indexByYear'])->middleware('admin');
Route::get('/Pertanian/{year}/download', [PertanianController::class, 'downloadPDF'])->middleware('admin');
Route::get('/Pertanian {id}', [PertanianController::class, 'show'])->middleware('admin');
Route::get('/PertanianByUser', [PertanianController::class, 'indexByUser'])->middleware('admin');
Route::middleware('admin')->post('/Pertanian', [PertanianController::class, 'store']);
Route::post('/Pertanian/{id}', [PertanianController::class, 'update'])->middleware('admin');
Route::delete('/Pertanian/{id}', [PertanianController::class, 'destroy'])->middleware('admin');

//Perindustrian Route API
Route::get('/Perindustrian', [PerindustrianController::class, 'index'])->middleware('admin');
Route::get('/Perindustrian/{komoditi}', [PerindustrianController::class, 'indexByKecamatan']);
Route::get('/Perindustrian/{year}', [PerindustrianController::class, 'indexByYear'])->middleware('admin');
Route::get('/Perindustrian {id}', [PerindustrianController::class, 'show'])->middleware('admin');
Route::get('/PerindustrianByUser', [PerindustrianController::class, 'indexByUser'])->middleware('admin');
Route::post('/Perindustrian', [PerindustrianController::class, 'store'])->middleware('admin');
Route::post('/Perindustrian/{id}', [PerindustrianController::class, 'update'])->middleware('admin');
Route::delete('/Perindustrian/{id}', [PerindustrianController::class, 'destroy'])->middleware('admin');

//Pariwisata Route API
Route::get('/Pariwisata', [PariwisataController::class, 'index'])->middleware('admin');
Route::get('/Pariwisata/{nama_wisata}', [PariwisataController::class, 'indexByNamaWisata']);
Route::get('/Pariwisata/{year}', [PariwisataController::class, 'indexByYear'])->middleware('admin');
Route::get('/Pariwisata {id}', [PariwisataController::class, 'show'])->middleware('admin');
Route::get('/PariwisataByUser', [PariwisataController::class, 'indexByUser'])->middleware('admin');
Route::post('/Pariwisata', [PariwisataController::class, 'store'])->middleware('admin');
Route::post('/Pariwisata/{id}', [PariwisataController::class, 'update'])->middleware('admin');
Route::delete('/Pariwisata/{id}', [PariwisataController::class, 'destroy'])->middleware('admin');

//Peternakan Route API
Route::get('/Peternakan', [PeternakanController::class, 'index'])->middleware('admin');
Route::get('/Peternakan/{komoditi}', [PeternakanController::class, 'indexByKecamatan']);
Route::get('/Peternakan/{year}', [PeternakanController::class, 'indexByYear'])->middleware('admin');
Route::get('/Peternakan {id}', [PeternakanController::class, 'show'])->middleware('admin');
Route::get('/PeternakanByUser', [PeternakanController::class, 'indexByUser'])->middleware('admin');
Route::post('/Peternakan', [PeternakanController::class, 'store'])->middleware('admin');
Route::post('/Peternakan/{id}', [PeternakanController::class, 'update'])->middleware('admin');
Route::delete('/Peternakan/{id}', [PeternakanController::class, 'destroy'])->middleware('admin');

//Konten Komoditi Route API
Route::get('/Konten Komoditi', [KontenKomoditiController::class, 'index']);
Route::get('/Konten Komoditi {id}', [KontenKomoditiController::class, 'show']);
Route::post('/Konten Komoditi', [KontenKomoditiController::class, 'store'])->middleware('admin-pusat');
Route::post('/Konten Komoditi/{id}', [KontenKomoditiController::class, 'update'])->middleware('admin-pusat');
Route::delete('/Konten Komoditi/{id}', [KontenKomoditiController::class, 'destroy'])->middleware('admin-pusat');

//Konten Banner Route API
Route::get('/Konten Banner', [KontenBannerController::class, 'index']);
Route::post('/Konten Banner', [KontenBannerController::class, 'store'])->middleware('admin-pusat');
Route::post('/Konten Banner/{id}', [KontenBannerController::class, 'update']);
Route::delete('/Konten Banner/{id}', [KontenBannerController::class, 'destroy'])->middleware('admin-pusat');

//Konten Berita Route API
Route::get('/Konten Berita', [KontenBeritaController::class, 'index']);
Route::get('/Konten Berita {id}', [KontenBeritaController::class, 'show']);
Route::post('/Konten Berita', [KontenBeritaController::class, 'store'])->middleware('admin-pusat');
Route::post('/Konten Berita/{id}', [KontenBeritaController::class, 'update'])->middleware('admin-pusat');
Route::delete('/Konten Berita/{id}', [KontenBeritaController::class, 'destroy'])->middleware('admin-pusat');

//Route Komoditi API
Route::get('/Komoditi', [KomoditiController::class, 'index']);
Route::get('/KomoditiBySektor', [KomoditiController::class, 'indexParticular']);
Route::get('/CountSektor', [KomoditiController::class, 'countKomoditiBySektor'])->middleware('admin');
Route::get('/Count {sektor}', [KomoditiController::class, 'countKomoditiByBidang'])->middleware('admin');
Route::get('/Komoditi {id}', [KontenBeritaController::class, 'show']);
Route::post('/Komoditi', [KomoditiController::class, 'store'])->middleware('admin-pusat');
Route::post('/Komoditi/{id}', [KomoditiController::class, 'update'])->middleware('admin-pusat');
Route::delete('/Komoditi/{id}', [KomoditiController::class, 'destroy'])->middleware('admin-pusat');

//Kecamatan API
Route::get('/Kecamatan', [KecamatanController::class, 'index']);

//Saran API
Route::get('/Saran', [SaranController::class, 'index']);
Route::post('/Saran', [SaranController::class, 'store']);
Route::delete('/Saran/{id}', [SaranController::class, 'destroy']);

//Laporan Komoditi Downloader
Route::get('/{sektor} {year}/pdf', [LaporanController::class, 'downloadPDF']);
Route::get('/{sektor} {year}/xslx', [LaporanController::class, 'downloadExcel']);
Route::get('/Pertanian {komoditi}/downloadxslx', [PertanianController::class, 'downloadExcel']);
Route::get('/Peternakan {komoditi}/downloadxslx', [PeternakanController::class, 'downloadExcel']);
Route::get('/Perikanan {komoditi}/downloadxslx', [PerikananController::class, 'downloadExcel']);
Route::get('/Perindustrian {komoditi}/downloadxslx', [PerindustrianController::class, 'downloadExcel']);
Route::get('/Pariwisata/{nama_wisata}/downloadxslx', [PariwisataController::class, 'downloadExcel']);

//User API
Route::get('/Admin', [UserController::class, 'index']);
Route::get('/Admin {id}', [UserController::class, 'show']);
Route::post('/Admin/{id}', [UserController::class, 'update']);
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
