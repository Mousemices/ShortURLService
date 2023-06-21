<?php

use App\Http\Controllers\API\ShortURLAnalyticController;
use App\Http\Controllers\API\ShortURLController;
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

Route::middleware('web')->get('/api/short-urls', [ShortURLAnalyticController::class, 'index'])->name('api.short-url-analytic.index');
Route::middleware('web')->get('/api/short-urls/active', [ShortURLAnalyticController::class, 'active'])->name('api.short-url-analytic.active');
//Route::middleware('web')->post('/short-urls/create', [ShortURLController::class, 'create'])->name('api.short-url.generate');
