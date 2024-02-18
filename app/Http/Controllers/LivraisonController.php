<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use App\Models\Societe;
use App\Models\Livraison;
use App\Models\ArticleAchat;
use Illuminate\Http\Request;
use App\Models\EtatLivraison;
use App\Models\ProduitsLivre;
use App\Models\EtatProduitsLivre;

class LivraisonController extends Controller
{
    // show all delivery status
    public function index () 
    {   
        $id = auth()->user()->societe_id;

        $societe = Societe::find($id);

        return view("livraison.index", [
            "livraisons" => $societe->livraisons
        ]);
    }

    // show details of each delivery
    public function show (string $id)
    {

        $livraison = Livraison::find($id);

        return view("livraison.show", [
            "articles" => $livraison->produitsLivres
        ]);
    }

    // -------------------------------------------------------------------------------------
    // ------------------------------ CREATE FUNCTIONALITY ---------------------------------
    // -------------------------------------------------------------------------------------
    // create a new delivery
    public function create (Request $request, string $id)
    {
        $achat = Achat::find($id);

        return view("livraison.create", [
            "achat" => $achat
        ]);
    }

    // store a new delivery
    public function store (Request $request, string $id)
    {
        // store here
        $formFields = $request->validate([
            "numero_bl" => "required",
            "date_arrive_bl" => "required"
        ]);

        $formFields["achat_id"] = $id;
        $formFields["societe_id"] = auth()->user()->societe_id;

        $delivery = Livraison::create($formFields);

        // create a session to store delivery info
        session([
            "livraion_details" => [
                "id" => $delivery->id,
                "numero_bl" => $delivery->numero_bl
            ]
        ]);

        return redirect("/livraisons/create_article?achat_id={$id}&livraison={$delivery->id}");

    }

    // create a new delivery article
    public function createDelivery (Request $request) 
    {

        $achat = Achat::find($request->query("achat_id"));
        $livraison = Livraison::find($request->query("livraison"));

        session([
            "livraion_details" => [
                "id" => $livraison->id,
                "numero_bl" => $livraison->numero_bl
            ]
        ]);

        if ($request->session()->exists("livraion_details")) {
            return view("livraison.create_article", [
                "articles" => $achat->articaleAchats,
                "livraison" => $livraison
            ]);
        } else {
            return redirect("/livraisons/create/{$request->query('achat_id')}");
        }
    }

    // store delivery article
    public function storeDeliveryArticle (Request $request, $id)
    {
        // we need to check if the invoice is totaly delivered or not
        $formFields = $request->validate([
            "nom_article" => "required",
            "quantite" => "required",
        ]);

        $livraion_details = $request->session()->get("livraion_details");

        // get the price from achat table
        $article = ArticleAchat::where("achat_id", "=", $id)
                                ->where("nom_article", "=", $formFields["nom_article"])
                                ->first();

        // get etat_livraison
        $etatLivraison = EtatLivraison::where("achat_id", "=", $id)->first();
        // get etat_produit_livre
        $etatProduitLivres = EtatProduitsLivre::where("achat_id", "=", $id)
                                                ->where("article", "=", $formFields["nom_article"])
                                                ->first();

        // add the needed fildes
        $formFields["prix_unitaire"] = $article->prix_unitaire;
        $formFields["pourcentage_tva"] = $article->pourcentage_tva;
        $formFields["achat_id"] = $id;
        $formFields["livraison_id"] = $livraion_details["id"];
        
        // calculate total price
        $totalPrice = $formFields["quantite"] * $article->prix_unitaire;

        // check if the total delivery >= rest of the etat_livraison
        if ($totalPrice > $etatLivraison->rest_non_livre) {
            return redirect("/livraisons/create_article?achat_id={$id}&livraison={$livraion_details['id']}")
                    ->with("message", "la quantité que vous avez mentionnée est supérieure à celle figurant sur la facture");
        } else {
            // check if the total qty delivery is <= rest of the etat_produit_livraison
            if ($formFields["quantite"] > $etatProduitLivres->rest_quantite) {
                return redirect("/livraisons/create_article?achat_id={$id}&livraison={$livraion_details['id']}")
                        ->with("message", "la quantité que vous avez mentionnée est supérieure à celle figurant sur la facture");
            } else {
                // store the delivered article here
                ProduitsLivre::create($formFields);
                return redirect("/livraisons/create_article?achat_id={$id}&livraison={$livraion_details['id']}")
                        ->with("message", "le produit " . $formFields["nom_article"] . " est ajouté");
            }
        }
        


    }


    // end the session for updating or creating a new Delivery
    public function endArticle (Request $request)
    {
        $request->session()->forget('livraion_details');
        return redirect("/achats");
    }

}
