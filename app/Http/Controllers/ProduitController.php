<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Societe;
use App\Models\PrixProduit;
use Illuminate\Http\Request;
use App\Models\EtatQuantiteStock;

class ProduitController extends Controller
{
    
    public function index()
    {
        $societe = Societe::find(auth()->user()->societe_id);
        
        return view("produits.index", [
            "produits" => $societe->produits,
        ]);
    }
    
    public function show(string $id)
    {
        $produit = Produit::find($id);
        $stocks = $produit->quantiteStock;
          
        return view("produits.show", [
            "produit" => $produit,
            "stocks" => $stocks,
            "prix" => $produit->prixes
        ]);
    }

    /* ------------------------------------------------------------------------------------------------ */
    /* --------------------------------------- CREATE FUNCTIONS  -------------------------------------- */
    /* ------------------------------------------------------------------------------------------------ */
    public function create()
    {
        $societe = Societe::find(auth()->user()->societe_id);

        return view("produits.create", [
            "categories" => $societe->categories,
            "stocks" => $societe->stocks 
        ]);
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            "categorie_id" => "required",
            "nom_produit" => "required",
            "description" => "required"
        ]);

        $formFields["societe_id"] = auth()->user()->societe_id;

        // we need to chek if the products is already exists
        $produit = Produit::where("societe_id", "=", $formFields["societe_id"])
                                ->where("nom_produit", "=", $formFields["nom_produit"])
                                ->get()->first();
        // if exists just update the quantity and the price
        if ($produit) {
            session(["produit_id" => $produit->id]);
            return redirect()
                    ->route("produits.createPrix")
                    ->with("message", collect([
                        "type" => "alert-success",
                        "title" => "Produit : ",
                        "body" => "produit a ete crée"
                    ]));
        } else {
            // if not create a new one
            $produit = Produit::create($formFields);
            // create a session to store product id
            session(["produit_id" => $produit->id]);
            // redirect to price page
            return redirect()
                    ->route("produits.createPrix")
                    ->with("message", collect([
                        "type" => "alert-success",
                        "title" => "Produit : ",
                        "body" => "produit a ete crée"
                    ]));
        }
    }
    
    public function createPrix(Request $request)
    {
        if ($request->session()->exists("produit_id")) {
            return view("produits.create_prix_produit");
        } else {
            return redirect()
                    ->route("produits.create");
        }
    }

    public function storePrix(Request $request)
    {
        $formFields = $request->validate([
            "date_livraison" => "required",
            "prix_achat" => "required",
            "marge_benificiaire" => "required"
        ]);

        $formFields["produit_id"] = $request->session()->get("produit_id");

        PrixProduit::create($formFields);
        
        return redirect()
                ->route("produits.createQuantite")
                ->with("message", collect([
                    "type" => "alert-success",
                    "title" => "Produit : ",
                    "body" => "prix de produit ete ajoute!"
                ]));
    }

    public function createQuantite(Request $request)
    {
        if ($request->session()->exists("produit_id")) {
            $societe = Societe::find(auth()->user()->societe_id);
            return view("produits.create_quantite_produit", [
                "stocks" => $societe->stocks 
            ]);
        } else {
            return redirect()
                    ->route("produits.create");
        }
    }

    public function storeQuantite(Request $request)
    {
        $formFields = $request->validate([
            "stock_id" => "required",
            "quantite" => "required"
        ]);

        $formFields["produit_id"] = $request->session()->get("produit_id");
        EtatQuantiteStock::create($formFields);
        return redirect()
                ->route("produits.createQuantite")
                ->with("message", collect([
                    "type" => "alert-success",
                    "title" => "Produit : ",
                    "body" => "quantite ete crée!"
                ]));
    }

    /* ------------------------------------------------------------------------------------------------ */
    /* --------------------------------------- UPDATE FUNCTIONS  -------------------------------------- */
    /* ------------------------------------------------------------------------------------------------ */
    public function edit(string $id)
    {
        $societe = Societe::find(auth()->user()->societe_id);

        return view("produits.edit", [
            "produit" => Produit::find($id),
            "categories" => $societe->categories
        ]);
    }

    public function update(Request $request, string $id)
    {
        $formFields = $request->validate([
            "categorie_id" => "required",
            "nom_produit" => "required",
            "description" => "required"
        ]);

        // get the product
        Produit::find($id)->update($formFields);

        return redirect()
                ->route("produits.index")
                ->with("message", collect([
                    "type" => "alert-success",
                    "title" => "Produit : ",
                    "body" => "produit est bien mettre a jour"
                ]));
    }

    public function editQuantite (Request $request, string $id)
    {
        $quantiteProduit = EtatQuantiteStock::where("stock_id", "=", $id)->first();
        $societe = Societe::find(auth()->user()->societe_id);

        return view("produits.edit_quantite_produit", [
            "quantiteProduit" => $quantiteProduit,
            "stocks" => $societe->stocks
        ]);

    }

    public function updateQuantite (Request $request, string $id)
    {
        $formFields = $request->validate([
            "quantite" => "required"
        ]);

        $produitQuantite = EtatQuantiteStock::where("stock_id", "=", $id)->update($formFields);
        
        return redirect()
                ->route("produits.show", $id)
                ->with("message", collect([
                    "type" => "alert-success",
                    "title" => "Produit : ",
                    "body" => "la quantité est mise à jour"
                ]));
    }

    public function addStockQuantite (string $id)
    {
        session(["produit_id" => $id]);
        return redirect()
                ->route("produits.createQuantite");
    }

    public function editPrix (string $id)
    {
        return view("produits.edit_prix_produit", [
            "prixProduit" => PrixProduit::find($id)
        ]);
    }

    public function updatePrix (Request $request, string $id)
    {
        $formFields = $request->validate([
            "date_livraison" => "required",
            "prix_achat" => "required",
            "marge_benificiaire" => "required"
        ]);

        $prix = PrixProduit::find($id);
        $prix->update($formFields);
        
        return redirect()
                ->route("produits.show", $prix->produit_id)
                ->with("message", collect([
                    "type" => "alert-success",
                    "title" => "Produit : ",
                    "body" => "la quantité est mise à jour"
                ]));
    }

    public function destroy(string $id)
    {
        //
    }

    public function destroyQnantite (string $id)
    {
        $quantite = EtatQuantiteStock::where("stock_id", "=", $id);
        $produit = $quantite->first()->produit_id;
        $quantite->delete();
        return redirect()
                ->route("produits.show", $produit)
                ->with("message", collect([
                    "type" => "alert-success",
                    "title" => "Produit : ",
                    "body" => "la quantité est suprimé"
                ]));
    }

    public function end (Request $request) 
    {
        $request->session()->forget('produit_id');
        return redirect()
                ->route("produits.index");
    }
}
