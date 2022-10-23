<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\ContactController;
use App\Http\Controllers\admin\ProjectController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DonationController;
use App\Http\Controllers\admin\StatisticController;
use App\Http\Controllers\admin\VolunteerController;
use App\Http\Controllers\admin\NewsletterController;
use App\Http\Controllers\admin\EmailController;

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



// Admin users
Route::resource("/admin/users", AdminController::class);

Route::get("/filter/users/{role}", [AdminController::class, "filterByRole"]);
// Route::get("/filter/users/{role}", function ($role = "") {
// dd("hi");
// });

// softDelete users

Route::get("/trash", [AdminController::class, "trashed"]);

Route::get("/restore/{id}", [AdminController::class, "restore"]);

// Route::get("/force-delete/{user}", [AdminController::class, "forceDelete"]);


// Admin projects
Route::resource("/admin/projects", ProjectController::class);

Route::get("/trash/project", [ProjectController::class, "trashed"]);

Route::get("/restore/project/{id}", [ProjectController::class, "restore"]);

// Admin categories routes

Route::resource("/admin/categories", CategoryController::class);

Route::get("/trash/category", [CategoryController::class, "trashed"]);
Route::get("/restore/category/{category}", [CategoryController::class, "restore"]);


Route::get("/project/volunteers/{porject}", [ProjectController::class, "project_volunteers"]);


// Admin volunteers routes

Route::get("/volunteers", [VolunteerController::class, "index"]);
Route::get("/volunteer/projects/{porject}", [VolunteerController::class, "volunteer_projects"]);
Route::post("/status/volunteer", [VolunteerController::class, "volunteer_status"]);


// Contact information
Route::get("/admin/messages", [ContactController::class, "index"]);

// Newsleeter
Route::get("/newsleeters", [NewsletterController::class, "index"]);


// Donations
Route::get("/donations", [DonationController::class, "index"]);



//----------------------statistics------------------------

Route::get("/dashboard", [StatisticController::class, "statistics"])->can("admin");


// ------------------- Routes for Emails -------------------

Route::get("/admin/sendEmail/{id}", [EmailController::class, 'sendMail']);

Route::post("/admin/sendEmail", [EmailController::class, 'send']);

Route::get("/admin/sendNewsletterForm", [EmailController::class, 'sendNewsletterForm']);

Route::post("/admin/sendNewsletter", [EmailController::class, 'sendNewsletter']);

