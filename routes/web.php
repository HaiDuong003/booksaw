<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Interface\InterfaceController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/index', [InterfaceController::class, 'index']);
Route::get('/', [InterfaceController::class, 'index']);
Route::get('/about', [InterfaceController::class, 'about']);
Route::get('/blog', [InterfaceController::class, 'blog']);
Route::get('/shop', [InterfaceController::class, 'shop']);
Route::get('/book_detail/{id}', [InterfaceController::class, 'bookDetail']);
Route::get('/contact', [InterfaceController::class, 'contact']);
// Route::get('/cart', [InterfaceController::class, 'contact']);
Route::get('/cartt', [CartController::class, 'cart']);
Route::post('/order/{id}', [CartController::class, 'addToCart'])->name('addToCart');
Route::get('/remove/{id}', [CartController::class, 'remove'])->name('remove');
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, ''])
