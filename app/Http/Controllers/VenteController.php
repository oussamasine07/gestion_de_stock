<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Vente;
use App\Models\Societe;
use App\Models\Commande;
use App\Models\ArticleVente;
use Illuminate\Http\Request;

class VenteController extends Controller
{
    public function index()
    {
        $societe = Societe::find(auth()->user()->societe_id);
        // dd($societe->ventes);
        
        return view("ventes.index", [
            "articles" => $societe->ventes
        ]);
    }
    
    public function show(string $id)
    {
        $vente = Vente::find($id);
        
        $sums = ArticleVente::where("vente_id", "=", $id)
                    ->groupByRaw("pourcentage_tva")
                    ->orderBy("pourcentage_tva", "desc")
                    ->select(
                        'pourcentage_tva',
                        DB::raw('SUM(montant_total) as ht'),
                        DB::raw('SUM(montant_tva) as tva'),
                        DB::raw('SUM(montant_ttc) as ttc')
                    )
                    ->get();
            
        // $nums = [1,2,3,4,5,6,7];

        $items = array_map(function ($x) {
            return floatval($x["ttc"]);
        }, $sums->toArray());
        
        $total = array_reduce($items, function ($prev, $next) {
            return $prev + $next;
        });

        return view("ventes.show", [
            "vente" => $vente,
            "articles" => $vente->articlesVentes,
            "client" => $vente->client,
            "sums" => $sums,
            "total" => $total
        ]);
    }

    public function create(Request $request)
    {
        $societe = Societe::find(auth()->user()->societe_id);
        return view("ventes.create", [
            "clients" => $societe->clients
        ]);
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            "numero_facture" => "required",
            "date_facture" => "required"
        ]);

        // get the order id				
        $commande = Commande::find($request["commande_id"]);
        $formFields["societe_id"] = auth()->user()->societe_id;
        $formFields["commande_id"] = $request["commande_id"];
        $formFields["client_id"] = $commande->client_id;

        // TODO : create a functionality that checks if the invoice of this order is already exists or not
        $vente = Vente::where("commande_id", "=", $commande->id)->get()->first();
        // dd($vente);

        if ($vente) {
            return redirect("/commandes")->with("message", "cette facture est dejat exist!");
        }

        // store the invoice here
        $vente = Vente::create($formFields); 

        // get all products listed in this order
        $produits = $commande->produitsCommandes;
        $article;
        
        foreach ($produits as $produit) {
            $article["vente_id"] = $vente->id;
            $article["nom_article"] = $produit->produit->nom_produit;
            $article["prix_unitaire"] = $produit->prix_unitaire;
            $article["quantite"] = $produit->quantite;
            $article["pourcentage_tva"] = $produit->pourcentage_tva;
            
            // store the order and the ordered products
            ArticleVente::create($article);
        }
        
        return redirect()->route("ventes.index");
    }


    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
