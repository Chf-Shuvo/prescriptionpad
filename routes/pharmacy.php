<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pharmacy\AuthController;
use App\Http\Controllers\pharmacy\DashboardController;

/**
 * ********************
 * Open Routes
 * ********************
 */
Route::controller(AuthController::class)->group(function () {
    Route::group(["as" => "pharmacy."], function () {
        Route::get("login", "showLoginForm")->name("login");
        Route::post("login", "attemptLogin")->name("login");
        Route::get("logout", "logout")
            ->name("logout")
            ->middleware("auth:pharmacy");
    });
});

/**
 * ********************
 * Protected Routes
 * ********************
 */
Route::controller(DashboardController::class)->group(function () {
    Route::group(["as" => "pharmacy."], function () {
        Route::get("dashboard", "dashboard")->name("dashboard");
    });
});
