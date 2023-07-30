<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ClothesController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\DashboardController;



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

Route::middleware('api')->group(function () {
    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);

    Route::get('/csrf-token', function () {
        return response()->json(['csrfToken' => csrf_token()]);
    });

        Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show')->middleware('auth');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::middleware('auth')->get('/profile/user', [ProfileController::class, 'getUserProfile']);

Route::post('/api/clothes', [ClothesController::class, 'store'])->name('clothes.store');
Route::put('/api/clothes/{id}', [ClothesController::class, 'update'])->name('clothes.update');
Route::delete('/api/clothes/{id}', [ClothesController::class, 'destroy'])->name('clothes.destroy');

});

