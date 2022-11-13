<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\doctor\AuthController;
use App\Http\Controllers\doctor\DashboardController;
use App\Http\Controllers\doctor\AppointmentController;

/**
 * ********************
 * Open Routes
 * ********************
 */
Route::controller(AuthController::class)->group(function () {
    Route::group(["as" => "doctor."], function () {
        Route::get("login", "showLoginForm")->name("login");
        Route::post("login", "attemptLogin")->name("login");
        Route::get("logout", "logout")
            ->name("logout")
            ->middleware("auth:doctor");
    });
});

/**
 * ********************
 * Protected Routes
 * ********************
 */
Route::group(["middleware" => "auth:doctor", "as" => "doctor."], function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get("dashboard", "dashboard")->name("dashboard");
        Route::get("profile/{doctor}", "profile")->name("profile");
        Route::patch("profile/update/{doctor}", "profileUpdate")->name(
            "profile.update"
        );
    });
    /**
     * *****************************************************************************
     * Appointment Routes: attending appointments, prescriptions
     * *****************************************************************************
     */
    Route::controller(AppointmentController::class)->group(function () {
        Route::group(
            ["prefix" => "appointment", "as" => "appointment."],
            function () {
                Route::get("list", "index")->name("list");
                Route::get("attend/{appointment}", "attendAppointment")->name(
                    "attend"
                );
                Route::get("view/{appointment}", "viewAppointment")->name(
                    "view"
                );
                Route::post(
                    "appointment/{appointment}/prescription",
                    "prescription"
                )->name("prescribe");
            }
        );
    });
});
