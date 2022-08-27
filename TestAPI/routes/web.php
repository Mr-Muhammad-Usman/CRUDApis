<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/',[ApiController::class,'index'])->name('index');
Route::get('/addProduct',[ApiController::class,'addProduct'])->name('addProduct');
Route::post('/createProduct',[ApiController::class,'createProduct'])->name('createProduct');
Route::get('/editProduct/{id?}',[ApiController::class,'editProduct'])->name('editProduct');
Route::post('/updateProduct/{id?}',[ApiController::class,'updateProduct'])->name('updateProduct');
Route::get('/deleteProduct/{id?}',[ApiController::class,'deleteProduct'])->name('deleteProduct');
Route::post('/filterPrice',[ApiController::class,'filterPrice'])->name('filterPrice');
