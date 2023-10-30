<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;
use Database\Factories\ListingFactory;

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



/**
 * Common Resource Routes/Functions
 * create  - Show form to create new listing
 * edit    - Show form to edit listing
 * show    - Show single listing
 * index   - Show all listings
 * store   - Store new listing
 * update  - Update listing
 * destroy - Delete listing
 */


/**
 * Listing Controller routes
 */
// Home Page Route
Route::get('/', [ListingController::class, "index"])->name("home");

// Create Listing Page Route
Route::get("/listing/create", [ListingController::class, "create"])->name("create")->middleware("auth");

// Manage Listings
Route::get("/listing/manage", [ListingController::class, "manage"])->name("manage")->middleware("auth");

//  Store Listing Page Route
Route::post("/listing", [ListingController::class, "store"])->name("store")->middleware("auth");

// Single Listing Page Route
Route::get("/listing/{listing}", [ListingController::class, "show"]);

// Update Submit
Route::put("/listing/{listing}", [ListingController::class, "update"])->middleware("auth");

// Delete Listing
Route::delete("/listing/{listing}", [ListingController::class, "destroy"])->middleware("auth");

// Edit Listing Page Route
Route::get("/listing/{listing}/edit", [ListingController::class, "edit"])->middleware("auth");


/**
 * User Controller routes
 */
// Show Register/Create Form
Route::get("/register", [UserController::class, "create"])->name("register")->middleware("guest");

// Create New User
Route::post("/users", [UserController::class, "store"])->middleware("guest");

// Log User Out
Route::post("/logout", [UserController::class, "logout"])->name("logout");

// Show Log In Page
Route::get("/login", [UserController::class, "login"])->name("login")->middleware("guest");

// Show Email Verification Notification
Route::get("/users/notifyauth",[UserController::class, "notifyauth"])->name("notifyauth")->middleware("guest");

// Verify User Email
Route::get("/users/verify/{verification_code}",[UserController::class, "verify_email"])->name("verify_email")->middleware("guest");

// Show Forgot Password Email form
Route::get("/users/checkemail", [UserController::class, "checkemail"])->name("checkemail")->middleware("guest");

// Show Forgot Password Email confirm
Route::post("/users/confirmemail", [UserController::class, "confirmemail"])->name("confirmemail")->middleware("guest");

// Verify email_verification_code To Reset Password
Route::get("/users/verifycode/{verification_code}", [UserController::class, "verify_code"])->name("verify_code")->middleware("guest");

// Show Password Reset Form
Route::get("/user/password", [UserController::class, "password"])->name("password")->middleware("guest");

// Reset User Password
Route::put("/user/passwordreset", [UserController::class, "pwd_reset"])->name("pwd_reset")->middleware("guest");

// Resend Verification Email
Route::get("/users/resendEmail", [UserController::class, "resendEmail"])->name("resendEmail")->middleware("guest");

// Authenticate User and Login
Route::post("/users/authenticate", [UserController::class, "authenticate"])->name("authenticate")->middleware("guest");


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


