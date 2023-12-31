<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\ProductController;
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

Route::group(['middleware' => ['web',]], function () {
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



    // Dashboard route
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    

    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show')->middleware('auth');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::middleware('auth')->get('/profile/user', [ProfileController::class, 'getUserProfile']);

    Route::get('/products', function () {
        return view('products');
    })->name('products');



    Route::get('/add-product', function () {
        return view('add-product');
    });
    
    Route::get('/add-product/{category}', function ($category) {
        if ($category === 'clothes') {
            return redirect()->route('clothes.create');
        } elseif ($category === 'shoes') {
            return redirect()->route('shoes.create');
        } elseif ($category === 'food') {
            return redirect()->route('food.create');
        } else {
            // Handle invalid category selection here (optional)
            return redirect()->route('add-product')->with('error', 'Invalid category selection.');
        }
    });

    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products', [ProductController::class, 'index'])->name('products');

Route::get('/api/images/{userId}/{imageName}', 'ClothesController@getImage');


    Route::resource('clothes', ClothesController::class);
    Route::resource('shoes', ShoesController::class);
    Route::resource('food', FoodController::class);
});
