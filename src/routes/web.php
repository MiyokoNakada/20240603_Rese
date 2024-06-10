<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\AuthController;

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

Route::middleware('auth')->group(function () {
    Route::get('/', [ShopController::class, 'index']);
    Route::get('/search', [ShopController::class, 'search']);
    Route::get('/detail/{shop_id}', [ShopController::class, 'detail']);
    Route::post('/done', [ShopController::class, 'done']);
    Route::get('/mypage', [MypageController::class, 'mypage']);
    Route::post('logout', [AuthController::class, 'logout']);
});

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::get('/thanks', [AuthController::class, 'thanks']);