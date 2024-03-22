<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use App\Models\Vente;
use App\Models\Societe;
use App\Models\Livraison;
use App\Models\ArticleAchat;
use App\Models\ArticleVente;
use Illuminate\Http\Request;
use App\Models\EtatLivraison;
use App\Models\ProduitsLivre;
use App\Models\EtatProduitsLivre;

class LivraisonController extends Controller
{
    // show all delivery status
    public function index (Request $request) 
    {   
        $id = auth()->user()->societe_id;

        $societe = Societe::find($id);
        $livraisons = $societe->livraisons;

        // filter only the achat livraison
        $filtered = $livraisons->where("etat_livraison", $request->query("etat_livraison"));

        return view("livraison.index", [
            "livraisons" => $filtered
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
        if ($request->query("etat_livraison") == "achat") {
            $liverable = Achat::find($id);
        }

        if ($request->query("etat_livraison") == "vente") {
            $liverable = Vente::find($id);
        }

        return view("livraison.create", [
            "liverable" => $liverable,
            "etat" => $request->query("etat_livraison")
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

        $formFields["liverable_id"] = $id;
        $formFields["societe_id"] = auth()->user()->societe_id;
        $formFields["etat_livraison"] = $request->query("etat_livraison");

        $newDelivery = new Livraison($formFields);

        // dd($newDelivery);

        $liverable;
        $delivery;
        
        if ($request->query("etat_livraison") == "achat") {
            $liverable = Achat::find($id);
            $delivery = $liverable->livraison()->save($newDelivery);

            // create a session to store delivery info
            session([
                "livraison_details" => [
                    "id" => $delivery->id,
                    "numero_bl" => $delivery->numero_bl
                ]
            ]);

            return redirect("/livraisons/create_article?liverable_id={$id}&livraison={$delivery->id}&etat_livraison={$delivery->etat_livraison}")
            ->with("message", collect([
                "type" => "alert-success",
                "title" => "Livraison : ",
                "body" => "La livraison est bien crée"
            ]));
        }
        
        if ($request->query("etat_livraison") == "vente") {
            $liverable = Vente::find($id);
            $delivery = $liverable->livraison()->save($newDelivery);

            // create a session to store delivery info
            session([
                "livraison_details" => [
                    "id" => $delivery->id,
                    "numero_bl" => $delivery->numero_bl
                ]
            ]);

            return redirect("/livraisons/create_article?liverable_id={$id}&livraison={$delivery->id}&etat_livraison={$delivery->etat_livraison}")
            ->with("message", collect([
                "type" => "alert-success",
                "title" => "Livraison : ",
                "body" => "La livraison est bien crée"
            ]));
        }
    }

    // create a new delivery article
    public function createDelivery (Request $request) 
    {
        $invoice = $request->query("etat_livraison") == "achat" 
                        ? Achat::find($request->query("liverable_id"))
                        : Vente::find($request->query("liverable_id"));

        $articles = $request->query("etat_livraison") == "achat" 
                        ? $invoice->articleAchats
                        : $invoice->articlesVentes;

        $livraison = Livraison::find($request->query("livraison"));
        
        session([
            "livraison_details" => [
                "id" => $livraison->id,
                "numero_bl" => $livraison->numero_bl
            ]
        ]);

        if ($request->session()->exists("livraison_details")) {
            return view("livraison.create_article", [
                "articles" => $articles,
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

        $livraion_details = $request->session()->get("livraison_details");
        
        // get the price from achat table
        $article = $request->query("etat_livraison") == "achat" 
                            ? ArticleAchat::where("achat_id", "=", $id)
                                ->where("nom_article", "=", $formFields["nom_article"])
                                ->first()
                            : ArticleVente::where("vente_id", "=", $id)
                                ->where("nom_article", "=", $formFields["nom_article"])
                                ->first();

        $etat_livraison = $request->query("etat_livraison") == "achat" ? "App\Models\Achat" : "App\Models\Vente";
        $etat_produit_livre = $request->query("etat_livraison") == "achat" ? "App\Models\Achat" : "App\Models\Vente";

        // get etat_livraison
        $etatLivraison = EtatLivraison::where("etat_liverable_id", "=", $id)
                                            ->where("etat_liverable_type", "=", $etat_livraison)
                                            ->first();
        
        // get etat_produit_livre
        $etatProduitLivres = EtatProduitsLivre::where("etat_produit_liverable_id", "=", $id)
                                                ->where("etat_produit_liverable_type", "=", $etat_produit_livre)
                                                ->where("article", "=", $formFields["nom_article"])
                                                ->first();
        // dd($etatProduitLivres);
        // add the needed fildes
        $formFields["prix_unitaire"] = $article->prix_unitaire;
        $formFields["pourcentage_tva"] = $article->pourcentage_tva;
        $formFields["livraison_id"] = $livraion_details["id"];
        
        // calculate total price
        $totalPrice = $formFields["quantite"] * $article->prix_unitaire;

        // check if the total delivery >= rest of the etat_livraison
        if ($totalPrice > $etatLivraison->rest_non_livre) {
            return redirect("/livraisons/create_article?liverable_id={$id}&livraison={$livraion_details['id']}")
                    ->with("message", collect([
                        "type" => "alert-danger",
                        "title" => "Livraison : ",
                        "body" => "la quantité que vous avez mentionnée est supérieure à celle figurant sur la facture"
                    ]));
        } else {
            // check if the total qty delivery is <= rest of the etat_produit_livraison
            if ($formFields["quantite"] > $etatProduitLivres->rest_quantite) {
                return redirect("/livraisons/create_article?liverable_id={$id}&livraison={$livraion_details['id']}")
                        ->with("message", collect([
                            "type" => "alert-danger",
                            "title" => "Livraison : ",
                            "body" => "la quantité que vous avez mentionnée est supérieure à celle figurant sur la facture"
                        ]));
            } else {
                // store the delivered article here
                $newArticle = new ProduitsLivre($formFields);
                if ($request->query("etat_livraison") == "achat") {
                    $achat = Achat::find($id);
                    $achat->produitsLivres()->save($newArticle);
                    
                    return redirect("/livraisons/create_article?liverable_id={$id}&livraison={$livraion_details['id']}&etat_livraison={$request->query('etat_livraison')}")
                            ->with("message", collect([
                                "type" => "alert-info",
                                "title" => "Livraison : ",
                                "body" => "le produit " . $formFields["nom_article"] . " est ajouté"
                            ]));
                }

                if ($request->query("etat_livraison") == "vente") {
                    $vente = Vente::find($id);
                    $vente->produitsLivres()->save($newArticle);

                    return redirect("/livraisons/create_article?liverable_id={$id}&livraison={$livraion_details['id']}&etat_livraison={$request->query('etat_livraison')}")
                            ->with("message", collect([
                                "type" => "alert-info",
                                "title" => "Livraison : ",
                                "body" => "le produit " . $formFields["nom_article"] . " est ajouté"
                            ]));
                }
            }
        }
    }


    // end the session for updating or creating a new Delivery
    public function endArticle (Request $request)
    {
        $request->session()->forget('livraion_details');
        return redirect("/achats")
                ->with("message", collect([
                    "type" => "alert-success",
                    "title" => "Livraison : ",
                    "body" => "La livraison finnie"
                ]));
    }

}
