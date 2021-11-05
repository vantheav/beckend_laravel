<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;

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


// public route 
// Author

Route::get('/author',[AuthorController::class,'index']);
Route::get('/author/{id}',[AuthorController::class,'show']);

// Book
Route::get('/book',[BookController::class,'index']);
Route::get('/book/{id}',[BookController::class,'show']);


//Private route
//Author
    Route::post('/author',[AuthorController::class,'store']);
    Route::put('/author/{id}',[AuthorController::class,'update']);
    Route::delete('/author/{id}',[AuthorController::class,'destroy']);

    //book
    Route::post('/book',[BookController::class,'store']);
    Route::put('/book/{id}',[BookController::class,'update']);
    Route::delete('/book/{id}',[BookController::class,'destroy']);
