<?php

use App\Http\Controllers\CatImageController;
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

Route::get('/cats', [CatImageController::class, 'index']);
Route::post('/cats', [CatImageController::class, 'store']);
Route::get('/cats/{catImage}', [CatImageController::class, 'show']);
Route::put('/cats/{catImage}', [CatImageController::class, 'update']);
Route::delete('/cats/{catImage}', [CatImageController::class, 'destroy']);