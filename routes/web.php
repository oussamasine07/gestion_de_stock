<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AchatController;
use App\Http\Controllers\SocieteController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\AchatPaiementController;

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
    // Invoices routes
    Route::get("/", [AchatController::class, "index"]);
    Route::get("/show/{id}", [AchatController::class, "showFacture"]);

    Route::get("/create", [AchatController::class, "create"]);
    Route::post("/", [AchatController::class, "store"]);

    Route::get("/create_article", [AchatController::class, "createArticle"]);
    Route::post("/store_article", [AchatController::class, "storeArticle"]);

    Route::get("/edit/{id}", [AchatController::class, "editFacture"]);
    Route::put("/update/{id}", [AchatController::class, "updateFacture"]);

    Route::get("/edit_article/{id}", [AchatController::class, "editArticle"]);
    Route::put("/update_article/{id}", [AchatController::class, "updateArticle"]);

    Route::post("/end_articale", [AchatController::class, "endArticle"]);

    Route::delete("/delete/{id}", [AchatController::class, "destroyFacture"]);
    Route::delete("/delete_article/{id}", [AchatController::class, "destroyArticle"]);

});

// payment invoices state routes
Route::prefix("paiement_achats")->group(function () {
    Route::get("/", [AchatPaiementController::class, "index"]);
    Route::get("/detail_de_paiement/{id}", [AchatPaiementController::class, "showFactureDetails"]);

    // make paiement functionality
    Route::get("/create/{id}", [AchatPaiementController::class, "createPaiement"]);
    Route::post("/pay/{id}", [AchatPaiementController::class, "makePayment"]);
    
});