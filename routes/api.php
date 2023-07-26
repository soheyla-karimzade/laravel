<?php

use App\Http\Controllers\Api\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::middleware('auth:sanctum')->group(function () {
    Route::get('/posts',[PostController::class,'all'])->name('api.posts');
    Route::post('/posts',[PostController::class,'store'])->name('api.posts.store');
    Route::put('/posts',[PostController::class,'update'])->name('api.posts.update');
    Route::delete('/posts/{post}',[PostController::class,'delete'])->name('api.posts.delete');

});


