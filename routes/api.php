<?php

use App\Models\User;
use App\Mail\AdminMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Notifications\AdminNotification;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Notification;

use Barryvdh\DomPDF\Facade\Pdf;

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





// MAIL / NOTIFICATION PRACTICE

// route::get('mail/notification', function () {
//     Mail::send(new AdminMail());

//     Notification::send(User::all(), new AdminNotification());

//     return view ('welcome');
// } );


// PDF PRACTICE

// route::get('pdf', function() {

//     $total_banday = User::all();

//     $data = [
//         'name' => 'hamxah farooqq',
//         'date' => date('m/d/Y'),
//         'users' => $total_banday,
//     ];

//     $pdf = Pdf::loadView('all_users_pdf', $data);
//     return $pdf->download('all-users.pdf');


// });








Route::middleware(['auth:sanctum'])->group(function () {

    // for EVENT - LISTENER - MAIL
    route::post('post/store',[PostController::class, 'store']);


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


