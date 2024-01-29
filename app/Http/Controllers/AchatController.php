<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use App\Models\Societe;
use App\Models\ArticleAchat;
use Illuminate\Http\Request;

class AchatController extends Controller
{
    // show all in voices
    public function index()
    {
        
        $societeId = auth()->user()->societe_id;
        $company = Societe::find($societeId);
        
        return view("achats.index", [
            "achats" => $company->achats
        ]);
    }

    
    public function create()
    {
        $societeId = auth()->user()->societe_id;
        $company = Societe::find($societeId);
        // dd(count($company->fournisseurs));
        return view("achats.create", [
            "fournisseurs" => $company->fournisseurs
        ]);
    }

    
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
        // create the session for the id
        session([
            "facture_details" => [
                "id" => $achat["id"],
                "numero_facture" => $achat["numero_facture"]
            ] 
        ]);

        return redirect("/achats/create_article");
    }

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
        
        // store the article
        ArticleAchat::create($formFields);

        return redirect("/achats/create_article");

    }

    public function endArticle (Request $request)
    {
        
        $request->session()->forget('facture_details');
        return redirect("/achats");
    }

    
    public function showFacture(string $id)
    {
        $achat = Achat::find($id);
        dd($achat);
        $articles = $achat->articaleAchats;
        return view("achats.facture_achat", [
            "achat" => $achat,
            "articles" => $articles
        ]);
    }

    
    public function editFacture(string $id)
    {
        $societeId = auth()->user()->societe_id;
        $company = Societe::find($societeId);

        return view("achats.edit", [
            "achat" => Achat::find($id),
            "fournisseurs" => $company->fournisseurs
        ]);
    }
    
    public function editArticle(string $id)
    {
        //
    }

    
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
                "id" => $achat,
                "numero_facture" => $formFields["numero_facture"]
            ] 
        ]);

        return redirect("/achats/show/{$id}");
    }

    
    public function destroy(string $id)
    {
        //
    }
}
