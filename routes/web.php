<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;
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

// All Listings
Route::get('/',[ListingController::class,"index"]);

// Listings group
Route::prefix("listings")->group(function(){

// Show Create Forms
Route::get("/create",[ListingController::class,"create"])
->middleware("auth");

// Store Listing Data
Route::post("/",[ListingController::class,"store"])
->middleware("auth");

// Show Edit Form
Route::get('/{listing}/edit',[ListingController::class,"edit"])
->middleware("auth");

// Update Listings
Route::put('/{listing}',[ListingController::class,"update"])
->middleware("auth");

// Delete Listings
Route::delete('/{listing}',[ListingController::class,"delete"])
->middleware("auth");

// Manage Listings
Route::get("/manage",[ListingController::class,"manage"])
->middleware("auth");

// Single Listing
Route::get("/{listing}",[ListingController::class,"show"]);
});



// Show Register/Create Form
Route::get("/register",[UserController::class,"create"])
->middleware("guest");

// Create New User
Route::post("/users",[UserController::class,"store"]);

// Log User Out
Route::post("/logout",[UserController::class,"logout"])
->middleware("auth");

// Show Login Form
Route::get("/login",[UserController::class,"login"])->name("login")
->middleware("guest");

// Log In User
Route::post("/users/authenticate",[UserController::class,"authenticate"]);

Route::fallback(function(){
    return "404 Böyle bir sayfa bulunmamaktadır";
});

// Route::get("/hello", function () {
//     return  response("<h1>Naber lan top</h1>", 200)
//         ->header("Content-Type", "text/plain")
//         ->header("foo", "bar");
// });

// Route::get("/posts/{id}", function ($id) {
//     return response($id);
// })->where("id", "[0-9]+");

// Route::get("search", function (Request $request) {
//     return response($request->name . "<br>" . $request->city);
// });
