<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

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






// route::group(['middleware' => ['auth:sanctum', 'checkRole:user']], function () {










route::post('register', [UserController::class, 'register']);
route::post('login', [UserController::class, 'login']);





Route::middleware(['auth:sanctum'])->group(function () {

    // Admin CRUD routes
    Route::middleware(['checkRole:admin'])->group(function () {

        route::get('user/index', [UserController::class, 'index']);
        route::get('user/show/{id}', [UserController::class, 'show']);
        route::put('user/update/{id}', [UserController::class, 'update']);
        route::delete('user/delete/{id}', [UserController::class, 'delete']);


    });

    // User CRUD routes
    Route::middleware(['checkRole:user'])->group(function () {
       
        route::get('user/show/{id}', [UserController::class, 'show']);
        route::put('user/update/{id}', [UserController::class, 'update']);
        route::post('user/delete/{id}', [UserController::class, 'delete']);
        route::delete('user/logout', [UserController::class, 'logout']);
    });


});