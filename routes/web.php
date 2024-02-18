<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AchatController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\VenteController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\SocieteController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\LivraisonController;
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

// delivery routes
Route::prefix("livraisons")->group(function () {

    Route::get("/", [LivraisonController::class, "index"]);
    Route::get("/show/{id}", [LivraisonController::class, "show"]);
    
    // create routes
    // create a new delivery
    Route::get("/create/{id}", [LivraisonController::class, "create"]);
    Route::get("/create_article", [LivraisonController::class, "createDelivery"]);

    // store routes
    Route::post("/store_delivery/{id}", [LivraisonController::class, "store"]);
    Route::post("/store_delivery_article/{id}", [LivraisonController::class, "storeDeliveryArticle"]);
    Route::post("/end_articale", [LivraisonController::class, "endArticle"]);
    
});

Route::prefix("categories")->group(function () {

    Route::get("/", [CategorieController::class, "index"]);

    Route::get("/create", [CategorieController::class, "create"]);
    Route::post("/", [CategorieController::class, "store"]);
    
    Route::get("/edit/{id}", [CategorieController::class, "edit"]);
    Route::put("/update/{id}", [CategorieController::class, "update"]);

    Route::delete("/delete/{id}", [CategorieController::class, "destroy"]);
});

// products routes
Route::prefix("produits")->group(function () {

    Route::get("/", [ProduitController::class, "index"]);
    Route::get("/show/{id}", [ProduitController::class, "show"]);
    
    // ********************************************************
    // all create methods here
    // ********************************************************
    Route::get("/create", [ProduitController::class, "create"]);
    Route::post("/", [ProduitController::class, "store"]);

    Route::get("/create_prix", [ProduitController::class, "createPrix"]);
    Route::post("/prix", [ProduitController::class, "storePrix"]);

    Route::get("/create_quantite", [ProduitController::class, "createQuantite"]);
    Route::post("/quantite", [ProduitController::class, "storeQuantite"]);

    // ********************************************************
    // all edit and update methods here
    // ********************************************************
    Route::get("/edit/{id}", [ProduitController::class, "edit"]);
    Route::put("/update/{id}", [ProduitController::class, "update"]);

    Route::get("/etat_stock_quantite/edit/{id}", [ProduitController::class, "editQuantite"]);
    Route::post("/add_quantite/{id}", [ProduitController::class, "addStockQuantite"]);
    Route::put("/etat_stock_quantite/update/{id}", [ProduitController::class, "updateQuantite"]);

    Route::get("/prix/edit/{id}", [ProduitController::class, "editPrix"]);
    Route::put("/prix/update/{id}", [ProduitController::class, "updatePrix"]);


    // ********************************************************
    // all delete methods here
    // ********************************************************
    Route::delete("/etat_stock_quantite/delete/{id}", [ProduitController::class, "destroyQnantite"]);
    
    // end the session of creating a new product
    Route::post("/end", [ProduitController::class, "end"]);
});

// stock routes
Route::prefix("stocks")->group(function () {
    // get all stocks
    Route::get("/", [StockController::class, "index"]);

    //create a new stock
    Route::get("/create", [StockController::class, "create"]);
    Route::post("/", [StockController::class, "store"]);

    // update routes
    Route::get("/edit/{id}", [StockController::class, "edit"]);
    Route::put("/update/{id}", [StockController::class, "update"]);
    
    // delete routes
    Route::delete("/delete/{id}", [StockController::class, "destroy"]);
});

// clients routes
Route::prefix("/clients")->group(function () {
    // get all clients
    Route::get("/", [ClientController::class, "index"]);

    // ********************************************************
    // all create methods here
    // ********************************************************
    Route::get("/create", [ClientController::class, "create"]);
    Route::post("/", [ClientController::class, "store"]);

    Route::get("/create_info_ste", [ClientController::class, "createSteInfo"]);
    Route::post("/store_info_ste", [ClientController::class, "storeSteInfo"]);

    Route::get("/create_info_pp", [ClientController::class, "createPPInfo"]);
    Route::post("/store_info_pp", [ClientController::class, "storePPInfo"]);

    // ********************************************************
    // all update methods here
    // ********************************************************
    Route::get("/edit/{id}", [ClientController::class, "edit"]);
    Route::put("/update/{id}", [ClientController::class, "update"]);

    Route::get("/edit_ste_info", [ClientController::class, "editSteInfo"]);
    Route::post("/update_ste_info", [ClientController::class, "updateSteInfo"]);

    Route::get("/edit_pp_info", [ClientController::class, "editPPInfo"]);
    Route::post("/update_pp_info", [ClientController::class, "updatePPInfo"]);

    Route::delete("/delete/{id}", [ClientController::class, "destroy"]);
});

// order routes 
Route::prefix("/commandes")->group(function () {
    Route::get("/", [CommandeController::class, "index"]);
});

// ventes routes
Route::prefix("/ventes")->group(function () {
    // get all Sells
    Route::get("/", [VenteController::class, "index"]);
});