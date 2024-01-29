<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AchatController;
use App\Http\Controllers\SocieteController;
use App\Http\Controllers\FournisseurController;

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

Route::get('/', [SocieteController::class, "index"])->middleware("guest");

Route::prefix("company")->group(function () {
    Route::post("/", [SocieteController::class, "registerCompany"]);
});

Route::prefix("users")->group( function () {
    Route::get("/new_manager", [UserController::class, "manager"]);
    Route::get('/login', [UserController::class, "login"])->name("login")->middleware("guest");
    Route::get('/dashboard', [UserController::class, "dashboard"])->middleware("auth");
    Route::post("/new_manager", [UserController::class, "storeManager"]);
    Route::post("/authenticate", [UserController::class, "authenticatUser"]);
    Route::post("/logout", [UserController::class, "logout"]);

});

// suppliers routes
Route::prefix("fournisseurs")->group(function () {
    Route::get("/", [FournisseurController::class, "index"]);
    Route::get("/create", [FournisseurController::class, "create"]);
    Route::get("/edit/{id}", [FournisseurController::class, "edit"]);
    Route::post("/", [FournisseurController::class, "store"]);
    Route::put("/update/{id}", [FournisseurController::class, "update"]);
    Route::delete("/delete/{id}", [FournisseurController::class, "destroy"]);
});

// Buy routes
Route::prefix("achats")->group(function () {
    Route::get("/", [AchatController::class, "index"]);
    Route::get("/show/{id}", [AchatController::class, "showFacture"]);
    Route::get("/edit/{id}", [AchatController::class, "editFacture"]);
    Route::get("/create", [AchatController::class, "create"]);
    Route::get("/create_article", [AchatController::class, "createArticle"]);
    Route::post("/", [AchatController::class, "store"]);
    Route::post("/store_article", [AchatController::class, "storeArticle"]);
    Route::post("/end_articale", [AchatController::class, "endArticle"]);

    Route::put("/update/{id}", [AchatController::class, "updateFacture"]);
});