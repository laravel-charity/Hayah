<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\EmailController;
use App\Http\Controllers\admin\ContactController;
use App\Http\Controllers\admin\ProjectController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DonationController;
use App\Http\Controllers\admin\StatisticController;
use App\Http\Controllers\admin\VolunteerController;
use App\Http\Controllers\admin\NewsletterController;

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
Route::resource("/admin/users", AdminController::class)->middleware(["auth", "can:admin"]);

Route::get("/filter/users/{role}", [AdminController::class, "filterByRole"])->middleware(["auth", "can:admin"]);
// Route::get("/filter/users/{role}", function ($role = "") {
// dd("hi");
// });

// softDelete users

Route::get("/trash", [AdminController::class, "trashed"])->middleware(["auth", "can:admin"]);

Route::get("/restore/{id}", [AdminController::class, "restore"])->middleware(["auth", "can:admin"]);

// Route::get("/force-delete/{user}", [AdminController::class, "forceDelete"]);


// Admin projects
Route::resource("/admin/projects", ProjectController::class)->middleware(["auth", "can:admin"]);

Route::get("/trash/project", [ProjectController::class, "trashed"])->middleware(["auth", "can:admin"]);

Route::get("/restore/project/{id}", [ProjectController::class, "restore"])->middleware(["auth", "can:admin"]);

// Admin categories routes

Route::resource("/admin/categories", CategoryController::class)->middleware(["auth", "can:admin"]);

Route::get("/trash/category", [CategoryController::class, "trashed"])->middleware(["auth", "can:admin"]);
Route::get("/restore/category/{category}", [CategoryController::class, "restore"])->middleware(["auth", "can:admin"]);


Route::get("/project/volunteers/{porject}", [ProjectController::class, "project_volunteers"])->middleware(["auth", "can:admin"]);


// Admin volunteers routes

Route::get("/volunteers", [VolunteerController::class, "index"])->middleware(["auth", "can:admin"]);
Route::get("/volunteer/projects/{porject}", [VolunteerController::class, "volunteer_projects"])->middleware(["auth", "can:admin"]);
Route::post("/status/volunteer", [VolunteerController::class, "volunteer_status"])->middleware(["auth", "can:admin"]);


// Contact information
Route::get("/admin/messages", [ContactController::class, "index"])->middleware(["auth", "can:admin"]);

// Newsleeter
Route::get("/newsleeters", [NewsletterController::class, "index"])->middleware(["auth", "can:admin"]);


// Donations
Route::get("/donations", [DonationController::class, "index"])->middleware(["auth", "can:admin"]);



//----------------------statistics------------------------

Route::get("/dashboard", [StatisticController::class, "statistics"])->middleware(["auth", "can:admin"]);


// ------------------- Routes for Emails -------------------

Route::get("/admin/sendEmail/{id}", [EmailController::class, 'sendMail'])->middleware(["auth", "can:admin"]);

Route::post("/admin/sendEmail", [EmailController::class, 'send'])->middleware(["auth", "can:admin"]);

Route::get("/admin/sendNewsletterForm", [EmailController::class, 'sendNewsletterForm'])->middleware(["auth", "can:admin"]);

Route::post("/admin/sendNewsletter", [EmailController::class, 'sendNewsletter'])->middleware(["auth", "can:admin"]);



// ------------------- Routes for admin profile -------------------


//view profile - ahmad
Route::get("/dashboard/profile/{id}", [ProfileController::class, 'adminprofile'])->middleware(["auth", "can:admin"]);

// update profile picture - ahmda
Route::post("dashboard/profile/updateAdminPhoto", [ProfileController::class, 'updateAdminPhoto'])->middleware(["auth", "can:admin"]);

// update admin info - ahmad 
Route::post("/updateAdmin", [ProfileController::class, 'updateAdmin'])->middleware(["auth", "can:admin"]);


