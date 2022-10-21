<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// ---------------------Routes for Registration-----------------------------
// Show Register Form
Route::get('/register', [UsersController::class, 'create'])->middleware('guest');

// Create New User
Route::post('/users/store', [UsersController::class, 'store']);

// Log User Out
Route::post('/logout', [UsersController::class, 'logout']);

// Show Login Form
Route::get('/login', [UsersController::class, 'login'])->name('login')->middleware('guest');

// Login User
Route::post('users/authenticate', [UsersController::class, 'authenticate']);


// ---------------------Routes for Profile page-----------------------------

// Profile User
Route::get('profile', [ProfileController::class, 'index']);

// show Edit Profile page
Route::get('editProfile', [ProfileController::class, 'editData']);

// show change password page
Route::get('changepass', [ProfileController::class, 'showPassChange']);

// update Profile info
Route::post('update', [ProfileController::class, 'updateData']);

// update user password
Route::post('updatepass', [ProfileController::class, 'changePass']);
