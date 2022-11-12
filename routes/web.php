<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\patient\DashboardController;
use App\Http\Controllers\patient\MedicalHistoryController;

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

/**
 * **************************
 * Open Routes
 * **************************
 */
Route::get("/", function () {
    return redirect()->route("login");
})->name("base");
/**
 * **************************
 * Auth Routes
 * **************************
 */
Auth::routes([
    "logout" => false,
]);
Route::middleware("auth")
    ->get("logout", [LoginController::class, "logout"])
    ->name("logout");

/**
 * ********************
 * Protected Routes
 * ********************
 */
Route::controller(DashboardController::class)->group(function () {
    Route::group(
        ["middleware" => "auth", "prefix" => "patient", "as" => "patient."],
        function () {
            Route::get("dashboard", "dashboard")->name("dashboard");
            Route::get("profile/{user}", "profile")->name("profile");
            Route::patch("profile/update/{user}", "profileUpdate")->name(
                "profile.update"
            );
            Route::get("doctor/list", "doctorList")->name("doctors");
        }
    );
});

/**
 **********************************************************************************
 * Medical History Routes: book appointment, upload documents, check doctor status
 **********************************************************************************
 */

Route::controller(MedicalHistoryController::class)->group(function () {
    Route::group(
        [
            "middleware" => "auth",
            "prefix" => "patient/medical-history/",
            "as" => "patient.",
        ],
        function () {
            Route::get("appointment/list", "appointments")->name(
                "appointment.list"
            );
            Route::post("appointment/book", "appointmentBook")->name(
                "appointment.book"
            );
        }
    );
});
