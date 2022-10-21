<?php

use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\NewsletterController;

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
// --------------------- landing page Routs --------------------
Route::get('/', [ProjectController::class,'index']);

Route::get('/donate/{id}', [ProjectController::class,'donate']);

Route::post('/donate/donateTo/{id}', [ProjectController::class, 'donateTo']);






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

// ------------------Routes for main pages----------------------------------------
// Show all projects
Route::get('/projects', [ProjectController::class, 'showAll']);

// Filters Projects by Category
Route::get('projects/{filter?}', [ProjectController::class, 'filterByCategory']);

// Show Project Details
Route::get('/project/{id}', [ProjectController::class, 'show']);


