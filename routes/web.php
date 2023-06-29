<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClothesController;
use App\Http\Controllers\ShoesController;
use App\Http\Controllers\FoodController;

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

Route::group(['middleware' => ['web']], function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/csrf-token', function () {
        return response()->json(['csrf_token' => csrf_token()]);
    });

    // Registration routes
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);

    // Login routes
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);

    Route::get('/register', function () {
        return view('auth.register');
    })->name('register');

    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');

    // Dashboard route
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show')->middleware('auth');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::resource('clothes', ClothesController::class);
    Route::resource('shoes', ShoesController::class);
    Route::resource('food', FoodController::class);

});



