<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\Auth\AuthController;
use App\Http\Controllers\Api\v1\Shop\ShoppingController;
use App\Http\Controllers\Api\v1\User\UserController;

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

Route::middleware(['api'])->group(function () {
    Route::middleware(['auth:api'])->group(function () {
        Route::get('users', UserController::class)->name('users');

        Route::get('shoppings', [ShoppingController::class, 'index'])->name('shopping.index');
        Route::get('shoppings/{id}', [ShoppingController::class, 'show'])->name('shopping.show');
        Route::post('shoppings', [ShoppingController::class, 'store'])->name('shopping.store');
        Route::put('shoppings/{id}', [ShoppingController::class, 'update'])->name('shopping.update');
        Route::delete('shoppings/{id}', [ShoppingController::class, 'destroy'])->name('shopping.delete');
    });

    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('register', [AuthController::class, 'register'])->name('register');

});
