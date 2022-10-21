<?php

use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

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

// Redirect to Google Sign in
Route::get('/redirect', [UsersController::class, 'redirectToGoogle']);

// Register User to Database or Sign Them In Using Google
Route::get('/callback', [UsersController::class, 'handleGoogleCallback']);

// -------------------------------------------------------------------------


// ------------------Routes for main pages----------------------------------------
// Show all projects
Route::get('/projects', [ProjectController::class, 'showAll']);

// Filters Projects by Category
Route::get('projects/{filter?}', [ProjectController::class, 'filterByCategory']);

// Show Project Details
Route::get('/project/{id}', [ProjectController::class, 'show']);
