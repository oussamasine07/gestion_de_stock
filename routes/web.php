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
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\LivraisonController;
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
// ******************************************************************************
// suppliers routes
// ******************************************************************************
Route::resource("fournisseurs", FournisseurController::class);

// ******************************************************************************
// clients routes
// ******************************************************************************
Route::name("clients.")->prefix("clients")->group(function () {
    Route::controller(ClientController::class)->group(function () {
        
        // all create methods here
        Route::get("/create_info_ste", "createSteInfo")->name("createSteInfo");
        Route::post("/store_info_ste", "storeSteInfo")->name("storeSteInfo");

        Route::get("/create_info_pp", "createPPInfo")->name("createPPInfo");
        Route::post("/store_info_pp", "storePPInfo")->name("storePPInfo");

        // all update methods here
        Route::get("/edit_ste_info", "editSteInfo")->name("editSteInfo");
        Route::post("/update_ste_info", "updateSteInfo")->name("updateSteInfo");

        Route::get("/edit_pp_info", "editPPInfo")->name("editPPInfo");
        Route::post("/update_pp_info", "updatePPInfo")->name("updatePPInfo");
    });
});
Route::resource("clients", ClientController::class);

// ******************************************************************************
// Buy routes
// ******************************************************************************
Route::name("achats.")->prefix("achats")->group(function () {
    Route::controller(AchatController::class)->group(function () {
        // Invoices routes
        Route::get("/show/{id}", "showFacture")->name("showFacture");

        Route::get("/create_article", "createArticle")->name("createArticle");
        Route::post("/store_article", "storeArticle")->name("storeArticle");

        Route::get("/edit/{id}", "editFacture")->name("editFacture");
        Route::put("/update/{id}", "updateFacture")->name("updateFacture");

        Route::get("/edit_article/{id}", "editArticle")->name("editArticle");
        Route::put("/update_article/{id}", "updateArticle")->name("updateArticle");

        Route::post("/end_articale", "endArticle")->name("endArticle");

        Route::delete("/delete/{id}", "destroyFacture")->name("destroyFacture");
        Route::delete("/delete_article/{id}", "destroyArticle")->name("destroyArticle");
    });
});
Route::resource("achats", AchatController::class);

// ******************************************************************************
// order routes 
// ******************************************************************************
Route::name("commandes.")->prefix("/commandes")->group(function () {
    Route::controller(CommandeController::class)->group(function () {
        // create order article
        Route::get("/create_commande_produit/{id}", "createCommandeProduit")->name("createCommandeProduit");
        Route::post("/store_commande_produit", "storeCommanedeProduit")->name("storeCommanedeProduit");
        //  search a product
        Route::post("/chercher/{id}", "searchProduit")->name("searchProduit");
        // update order article
        Route::get("/edit_produit_commande/{id}", "editCommandeProduit")->name("editCommandeProduit");
        Route::put("/update_commande_produit/{id}", "updateCommandeProduit")->name("updateCommandeProduit");
        // cancel updating or creating
        Route::post("/end_article", "endArticle")->name("endArticle");
    });
});
Route::resource("commandes", CommandeController::class);

// ******************************************************************************
// ventes routes
// ******************************************************************************
Route::resource("ventes", VenteController::class);

// ******************************************************************************
// delivery routes
// ******************************************************************************
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

// ******************************************************************************
// categories
// ******************************************************************************
Route::resource("categories", CategorieController::class);

// ******************************************************************************
// products routes
// ******************************************************************************
Route::name("produits.")->prefix("produits")->group(function () {
    Route::controller(ProduitController::class)->group(function () {
        // create price 
        Route::get("/create_prix", "createPrix")->name("createPrix");
        Route::post("/prix", "storePrix")->name("storePrix");

        // create quantity
        Route::get("/create_quantite", "createQuantite")->name("createQuantite");
        Route::post("/quantite", "storeQuantite")->name("storeQuantite");
        
        // all edit and update methods here
        Route::get("/etat_stock_quantite/edit/{id}", "editQuantite")->name("editQuantite");
        Route::post("/add_quantite/{id}", "addStockQuantite")->name("addStockQuantite");
        Route::put("/etat_stock_quantite/update/{id}", "updateQuantite")->name("updateQuantite");

        Route::get("/prix/edit/{id}", "editPrix")->name("editPrix");
        Route::put("/prix/update/{id}", "updatePrix")->name("updatePrix");
        
        // all delete methods here
        Route::delete("/etat_stock_quantite/delete/{id}", "destroyQnantite")->name("destroyQnantite");
        // end the session of creating a new product
        Route::post("/end", "end")->name("end");
    });
});
Route::resource("produits", ProduitController::class);


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

// ******************************************************************************
// payment invoices state routes
// ******************************************************************************
Route::prefix("paiements")->group(function () {
    Route::get("/", [PaiementController::class, "index"]);
    Route::get("/detail_de_paiement/{id}", [PaiementController::class, "showFactureDetails"]);
    // make paiement functionality
    Route::get("/create/{id}", [PaiementController::class, "createPaiement"]);
    Route::post("/pay/{id}", [PaiementController::class, "makePayment"]);
    
});

// stock routes
Route::resource("stocks", StockController::class);

