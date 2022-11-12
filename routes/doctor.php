<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\doctor\AuthController;
use App\Http\Controllers\doctor\DashboardController;

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
Route::controller(DashboardController::class)->group(function () {
    Route::group(["as" => "doctor."], function () {
        Route::get("dashboard", "dashboard")->name("dashboard");
    });
});
