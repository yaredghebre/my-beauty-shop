<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PerfumeController;
use App\Http\Controllers\Api\TypeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('perfumes', [PerfumeController::class, 'index']);
Route::get('perfumes/{id}', [PerfumeController::class, 'show']);
Route::get('categories', [CategoryController::class, 'index']);
Route::get('types', [TypeController::class, 'index']);
