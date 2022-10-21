<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\NewsletterController;

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





// ---------------------Routes for Contact-----------------------------

// Show contact Form
route::get('contact',[ContactController::class,'create']);


// Create New message
route::post('contactForm',[ContactController::class ,'store']);







// ---------------------Routes for about-----------------------------

Route::get('/about', function () {
    return view('projects.about');
});





// ---------------------Routes for newsletter-----------------------------

// Show newsletter Form
route::get('newsletter',[NewsletterController::class,'create']);


// Create New newsletter
route::post('newsletterform',[NewsletterController::class ,'store']);






// ---------------------Routes for volunteer-----------------------------
route::get('volunteer',[VolunteerController::class,'create']);


// Create New newsletter
route::post('volunteers',[VolunteerController::class ,'store']);





