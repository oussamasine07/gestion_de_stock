<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use App\Models\Societe;
use App\Models\Livraison;
use App\Models\ArticleAchat;
use Illuminate\Http\Request;
use App\Models\EtatLivraison;

class AchatController extends Controller
{
    /* ----------------------------------------------------------------------------------- */
    /* ------------------------------ SHOW FUNCTIONS  ------------------------------------ */
    /* ----------------------------------------------------------------------------------- */
    public function index()
    {
        
        $societeId = auth()->user()->societe_id;
        $company = Societe::find($societeId);
        
        return view("achats.index", [
            "achats" => $company->achats
        ]);
    }
    
    public function showFacture(string $id)
    {
        
        $achat = Achat::find($id);
        // dd($achat);
        $articles = $achat->articaleAchats;
        return view("achats.facture_achat", [
            "achat" => $achat,
            "articles" => $articles
        ]);
    }

    /* ----------------------------------------------------------------------------------------------- */
    /* ------------------------------ CREATE AND STORE FUNCTIONS  ------------------------------------ */
    /* ----------------------------------------------------------------------------------------------- */
    // show create form for new Invoice     
    public function create()
    {
        $societeId = auth()->user()->societe_id;
        $company = Societe::find($societeId);
        // dd(count($company->fournisseurs));
        return view("achats.create", [
            "fournisseurs" => $company->fournisseurs
        ]);
    }

    // store a new Invoice
    public function store(Request $request)
    {
        // validate the form
        $formFields = $request->validate([
            "numero_facture" => "required",
            "fournisseur_id" => "required",
            "libelle" => "required",
            "date_facture" => "required"
        ]);

        $formFields["societe_id"] = auth()->user()->societe_id;

        // store the form and create a new session that holds the id of the invoice
        $achat = Achat::create($formFields);
        
        // create a new etat_livraison
        $livraison = new EtatLivraison([
            "etat_liverable_id" => $achat->etat_liverable_id,
            "etat_liverable_type" => $achat->etat_liverable_type
        ]);
        $achat->etatLivraison()->save($livraison);

        // create the session for the id
        session([
            "facture_details" => [
                "id" => $achat["id"],
                "numero_facture" => $achat["numero_facture"]
            ] 
        ]);

        return redirect("/achats/create_article");
    }

    // show create form for new Article
    public function createArticle (Request $request)
    {
        // check if the session id is created if not redirect to create a new invoice
        if ($request->session()->exists("facture_details")) {
            
            $factureDetails = $request->session()->get("facture_details");
            
            return view("achats.create_article", [
                "numero_facture" => $factureDetails["numero_facture"]
            ]);
        } else {
            return redirect("/achats");
        }
    }

    // store a new Article
    public function storeArticle (Request $request) 
    {
        // validate the form
        $formFields = $request->validate([
            "nom_article" => "required",
            "prix_unitaire" => "required",
            "quantite" => "required",
            "pourcentage_tva" => "required"
        ]);

        $factureDetails = $request->session()->get("facture_details");
        $formFields["achat_id"] = $factureDetails["id"];

        // dd($factureDetails);
        // store the article
        $article = ArticleAchat::create($formFields);

        return redirect("/achats/create_article");
    }

    /* ------------------------------------------------------------------------------------------------ */
    /* -------------------------------- EDIT AND UPDATE FUNCTIONS  ------------------------------------ */
    /* ------------------------------------------------------------------------------------------------ */
    // show the edit form for Invoice    
    public function editFacture(Request $request, string $id)
    {
        $societeId = auth()->user()->societe_id;
        $company = Societe::find($societeId);
        $achat = Achat::find($id);

        session([
            "facture_details" => [
                "id" => $achat->id,
                "numero_facture" => $achat->numero_facture
            ] 
        ]);

        // $fac = $request->session()->get("facture_details");
        // dd($fac);
        return view("achats.edit", [
            "achat" => $achat,
            "fournisseurs" => $company->fournisseurs
        ]);
    }

    // update the Invoice
    public function updateFacture(Request $request, string $id)
    {
        $formFields = $request->validate([
            "numero_facture" => "required",
            "fournisseur_id" => "required",
            "libelle" => "required",
            "date_facture" => "required"
        ]);

        // store the form and create a new session that holds the id of the invoice
        $achat = Achat::where("id", $id)
                    ->update($formFields);
        // dd($achat);
        // create the session for the id
        session([
            "facture_details" => [
                "id" => $id,
                "numero_facture" => $formFields["numero_facture"]
            ] 
        ]);

        // dd($achat);

        return redirect("/achats/show/{$id}");
    }
    
    // show the edit form for Article  
    public function editArticle(Request $request, string $id)
    {
        $factureDetails = $request->session()->get("facture_details");

        return view("achats.edit_article", [
            "article" => ArticleAchat::find($id),
            "numero_facture" => $factureDetails["numero_facture"]
        ]);
    }

    // update the Article
    public function updateArticle (Request $request, string $id)
    {
        // validate the form
        $formFields = $request->validate([
            "nom_article" => "required",
            "prix_unitaire" => "required",
            "quantite" => "required",
            "pourcentage_tva" => "required"
        ]);
        
        ArticleAchat::where("id", $id)
                        ->update($formFields);

        $factureDetails = $request->session()->get("facture_details");

        return redirect("/achats/show/{$factureDetails['id']}");
    }

    // end the session for updating or creating a new Invoice
    public function endArticle (Request $request)
    {
        $request->session()->forget('facture_details');
        return redirect("/achats");
    }

    /* ------------------------------------------------------------------------------------------------ */
    /* --------------------------------------- DELETE FUNCTIONS  -------------------------------------- */
    /* ------------------------------------------------------------------------------------------------ */
    // delete the intire invoice
    public function destroyFacture(string $id)
    {
        Achat::where("id", $id)
                ->delete();
        return redirect("/achats");
    }
    
    // delete one article
    public function destroyArticle(Request $request, string $id)
    {
        // delete article
        ArticleAchat::where("id", $id)
                        ->delete();

        $factureDetails = $request->session()->get("facture_details");

        return redirect("/achats/show/{$factureDetails['id']}");
    }
}
