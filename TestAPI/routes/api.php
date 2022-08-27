<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/createProduct',[ApiController::class,'createProduct'])->name('createProduct');
Route::post('/updateProduct/{id?}',[ApiController::class,'updateProduct'])->name('updateProduct');
Route::get('/deleteProduct/{id?}',[ApiController::class,'deleteProduct'])->name('deleteProduct');
Route::post('/filterPrice',[ApiController::class,'filterPrice'])->name('filterPrice');
