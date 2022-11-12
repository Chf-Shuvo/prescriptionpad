<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\DoctorController;
use App\Http\Controllers\admin\PatientController;
use App\Http\Controllers\admin\PharmacyController;
use App\Http\Controllers\admin\DashboardController;

/**
 * ********************
 * Open Routes
 * ********************
 */
Route::controller(AuthController::class)->group(function () {
    Route::group(["as" => "admin."], function () {
        Route::get("login", "showLoginForm")->name("login");
        Route::post("login", "attemptLogin")->name("login");
        Route::get("logout", "logout")
            ->name("logout")
            ->middleware("auth:admin");
    });
});

/**
 * *******************************************************************************************
 * *******************************Protected Routes********************************************
 * *******************************************************************************************
 */
Route::group(["middleware" => "auth:admin", "as" => "admin."], function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get("dashboard", "dashboard")->name("dashboard");
    });
    /**
     * ******************* Admin List Management Routes *****************************************
     */
    Route::controller(AdminController::class)->group(function () {
        Route::group(
            ["prefix" => "management", "as" => "manage."],
            function () {
                Route::get("list", "index")->name("index");
                Route::post("store", "store")->name("store");
                Route::get("edit/{admin}", "edit")->name("edit");
                Route::patch("update/{admin}", "update")->name("update");
                Route::get("destroy/{admin}", "destroy")->name("destroy");
            }
        );
    });
    /**
     * ******************* Patient List Management Routes *****************************************
     */
    Route::controller(PatientController::class)->group(function () {
        Route::group(["prefix" => "patients", "as" => "patient."], function () {
            Route::get("list", "index")->name("index");
            Route::post("store", "store")->name("store");
            Route::get("edit/{user}", "edit")->name("edit");
            Route::patch("update/{user}", "update")->name("update");
            Route::get("destroy/{user}", "destroy")->name("destroy");
        });
    });
    /**
     * ******************* Doctor List Management Routes *****************************************
     */
    Route::controller(DoctorController::class)->group(function () {
        Route::group(["prefix" => "doctors", "as" => "doctor."], function () {
            Route::get("list", "index")->name("index");
            Route::post("store", "store")->name("store");
            Route::get("edit/{doctor}", "edit")->name("edit");
            Route::patch("update/{doctor}", "update")->name("update");
            Route::get("destroy/{doctor}", "destroy")->name("destroy");
        });
    });
    /**
     * ******************* Pharmacy List Management Routes *****************************************
     */
    Route::controller(PharmacyController::class)->group(function () {
        Route::group(
            ["prefix" => "pharmacies", "as" => "pharmacy."],
            function () {
                Route::get("list", "index")->name("index");
                Route::post("store", "store")->name("store");
                Route::get("edit/{pharmacy}", "edit")->name("edit");
                Route::patch("update/{pharmacy}", "update")->name("update");
                Route::get("destroy/{pharmacy}", "destroy")->name("destroy");
            }
        );
    });
});
