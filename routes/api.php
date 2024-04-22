<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

    // Fetching Route
    Route::get("/", [App\Http\Controllers\api\DataController::class,"index"]);
    Route::get("/projects", [App\Http\Controllers\api\ProjectsController::class,"index"]);
    Route::get("/inquiries", [App\Http\Controllers\api\InquiryController::class,"index"]);
    Route::get("/users", [App\Http\Controllers\api\UsersController::class,"index"]);
    Route::get("/estimation", [App\Http\Controllers\api\EstimationController::class,"index"]);


    // Fetching Single Id
    Route::get("/users/{id}", [App\Http\Controllers\api\UsersController::class,"show"]);
    Route::get("/projects/{id}", [App\Http\Controllers\api\ProjectsController::class,"show"]);
    Route::get("/inquiries/{id}", [App\Http\Controllers\api\InquiryController::class,"show"]);
    Route::get("/estimation/{id}", [App\Http\Controllers\api\EstimationController::class,"show"]);

    // Update Data
    Route::post("/users/{id}/update", [App\Http\Controllers\api\UsersController::class,"update"]);
    Route::post("/projects/{id}/update", [App\Http\Controllers\api\ProjectsController::class,"update"]);

    // Creating new Data to Database
    Route::post("/send-inquiry", [App\Http\Controllers\api\InquiryController::class,"store"]);
    Route::post("/send-estimation", [App\Http\Controllers\api\EstimationController::class,"store"]);
    Route::post("/send-projects", [App\Http\Controllers\api\ProjectsController::class,"store"]);
    Route::post("/register", [App\Http\Controllers\api\UsersController::class,"register"]);

    // Login Route
    Route::post("/login", [App\Http\Controllers\api\UsersController::class,"login"]);

    // Delete Data from the database
    Route::delete("/users/{id}/delete", [App\Http\Controllers\api\UsersController::class,"destroy"]);
    Route::delete("/projects/{id}/delete", [App\Http\Controllers\api\ProjectsController::class,"destroy"]);
    Route::delete("/inquiries/{id}/delete", [App\Http\Controllers\api\InquiryController::class,"destroy"]);
    Route::delete("/estimation/{id}/delete", [App\Http\Controllers\api\EstimationController::class,"destroy"]);


