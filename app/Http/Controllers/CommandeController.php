<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Societe;
use App\Models\Commande;
use App\Models\PrixProduit;
use Illuminate\Http\Request;
use App\Models\ProduitsCommande;

class CommandeController extends Controller
{
    public function index()
    {
        $societe = Societe::find(auth()->user()->societe_id);
        return view("commandes.index", [
            "commandes" => $societe->commandes
        ]);
    }
    
    public function show(string $id)
    {
        $commande = Commande::find($id);
        return view("commandes.show", [
            "commande" => $commande,
            "articles" => $commande->produitsCommandes
        ]);
    }

    /* ------------------------------------------------------------------------------------------------ */
    /* --------------------------------------- CREATE FUNCTIONS  -------------------------------------- */
    /* ------------------------------------------------------------------------------------------------ */
    public function create()
    {
        $societe = Societe::find(auth()->user()->societe_id);
        return view("commandes.create", [
            "clients" => $societe->clients
        ]);
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            "client_id" => "required",
            "code_commande" => "required",
            "date_commande" => "required",
        ]);
        $formFields["societe_id"] = auth()->user()->societe_id;

        $commande = Commande::create($formFields);
        session(["commande" => $commande]);

        return redirect()
                ->route("commandes.createCommandeProduit", $commande->id)
                ->with("message", collect([
                    "type" => "alert-success",
                    "title" => "Commande Crée: ",
                    "body" => "La commande est bien ajouter"
                ]));
    }

    public function createCommandeProduit(Request $request, string $id)
    {
        $societe = Societe::find(auth()->user()->societe_id);
        $commande = Commande::find($id);
        session(["commande" => $commande]);

        // dd($request->session());
        
        return view("commandes.create_commande_produit", [
            "commande" => $commande,
            "produits" => $societe->produits,
            "produit_article" => $request->session()->get("produit"),
            "prixes" => $request->session()->get("prixes")
        ]);
    }

    public function storeCommanedeProduit(Request $request)
    {
        $formFields = $request->validate([
            "produit_id" => "required",
            "prix_unitaire" => "required",
            "quantite" => "required",
            "pourcentage_tva" => "required"
        ]);
        $commande = $request->session()->get("commande");
        $formFields["commande_id"] = $commande->id;

        // add the article
        ProduitsCommande::create($formFields);

        // forget session of the product and the price we've just added
        $request->session()->forget("produit");
        $request->session()->forget("prixes");

        return redirect()
                ->route("commandes.createCommandeProduit", $commande->id)
                ->with("message", collect([
                    "type" => "alert-info",
                    "title" => "Produit : ",
                    "body" => "Produit bien ajouter"
                ]));
        
    }

    public function searchProduit (Request $request, $id)
    {
        $request->session()->forget(["produit", "prixes"]);
        // dd($request);
        $produit = Produit::where("societe_id", "=", auth()->user()->societe_id)
                            ->where("id", "=", $request["produit"])
                            ->first();
        $prixes = PrixProduit::where("produit_id", "=", $request["produit"])->get();

        // dd($produit);
        session([
            "produit" => $produit,
            "prixes" => $prixes
        ]);
        
        return back();
    }

    /* ------------------------------------------------------------------------------------------------ */
    /* ---------------------------------------- EDIT FUNCTIONS  --------------------------------------- */
    /* ------------------------------------------------------------------------------------------------ */
    public function edit(string $id)
    {
        $societe = Societe::find(auth()->user()->societe_id);
        return view("commandes.edit", [
            "commande" => Commande::find($id),
            "clients" => $societe->clients
        ]);
    }

    public function update(Request $request, string $id)
    {
        $formFields = $request->validate([
            "client_id" => "required",
            "code_commande" => "required",
            "date_commande" => "required",
        ]);
        
        Commande::where("id", "=", $id)->update($formFields);
        
        return redirect()
                ->route("commandes.index")
                ->with("message", collect([
                    "type" => "alert-success",
                    "title" => "Commande : ",
                    "body" => "la commande est mettre a jour"
                ]));
    }

    public function editCommandeProduit(Request $request, string $id)
    {
        $societe = Societe::find(auth()->user()->societe_id);
        // dd($request->session());
        return view("commandes.edit_commande_produit", [
            "article" => ProduitsCommande::find($id),
            "produits" => $societe->produits,
            "produit_article" => $request->session()->get("produit"),
            "prixes" => $request->session()->get("prixes")
        ]);
    }

    public function updateCommandeProduit (Request $request, string $id) 
    {
        $formFields = $request->validate([
            "produit_id" => "required",
            "prix_unitaire" => "required",
            "quantite" => "required",
            "pourcentage_tva" => "required"
        ]);

        // add the article
        $article = ProduitsCommande::where("id", "=", $id);

        $article->update($formFields);

        return redirect()
                ->route("commandes.show", $article->first()->commande->id)
                ->with("message", collect([
                    "type" => "alert-info",
                    "title" => "Commande : ",
                    "body" => "la produit est mettre a jour"
                ]));
    }

    public function endArticle(Request $request)
    {
        $id = $request->session()->get("commande")->id;
        $request->session()->forget("commande");

        return redirect()
                ->route("commandes.show", $id);
    }

    public function destroy(string $id)
    {
        //
    }
}
