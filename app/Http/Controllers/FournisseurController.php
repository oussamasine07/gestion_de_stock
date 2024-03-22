<?php

namespace App\Http\Controllers;

use App\Models\Societe;
use App\Models\Fournisseur;
use Illuminate\Http\Request;

class FournisseurController extends Controller
{
    
    public function index()
    {
        $societeId = auth()->user()->societe_id;
        $company = Societe::find($societeId);
        
        return view("fournisseur.index", [
            "fournisseurs" => $company->fournisseurs
        ]);
    }

    public function create(Request $request)
    {
        return view("fournisseur.create");
    }

    public function store(Request $request)
    {
        // validate the form
        $formFields = $request->validate([
            "raison_social" => "required",
            "telephone" => "required",
            "email" => "required",
            "address" => "required",
            "ville" => "required",
            "ice" => "required",
            "identifiant_fiscal" => "required",
            "taxe_professionnelle" => "required",
            "registre_commerce" => "required",
            "cnss" => "required",
        ]);

        $formFields["societe_id"] = auth()->user()->societe_id;

        // check if the suplier already exists
        $supplier = Fournisseur::where("raison_social", "=", $formFields["raison_social"])->first();

        if ($supplier) {
            return redirect()
                    ->route("fournisseurs.create")
                    ->with("message", collect([
                        "type" => "alert-danger",
                        "title" => "Fournisseur Regeté: ",
                        "body" => "cette forunisseur est déja ajouter"
                    ]));
        }

        // insert into DB
        Fournisseur::create($formFields);

        // check if there is a query string of achat in URL than redirect to (Achat) page 
        // if not redirect to (Fournisseur) page
        if ($request->query("action") == "achat") {
            return redirect("/achat/create");
        } else {
            return redirect()
                    ->route("fournisseurs.index")
                    ->with("message", collect([
                        "type" => "alert-success",
                        "title" => "Fournisseur Crée: ",
                        "body" => "cette forunisseur est bien ajouter"
                    ]));
        }
    }

    public function show(string $id)
    {

        
    }

    public function edit(string $id)
    {
        return view("fournisseur.edit", [
            "fournisseur" => Fournisseur::find($id)
        ]);
    }

    public function update(Request $request, string $id)
    {
        $formFields = $request->validate([
            "raison_social" => "required",
            "telephone" => "required",
            "email" => "required",
            "address" => "required",
            "ville" => "required",
            "ice" => "required",
            "identifiant_fiscal" => "required",
            "taxe_professionnelle" => "required",
            "registre_commerce" => "required",
            "cnss" => "required",
        ]);

        // update fournisseur
        Fournisseur::where("id", $id)
            ->update($formFields);

        return redirect()
                ->route("fournisseurs.index")
                ->with("message", collect([
                    "type" => "alert-warning",
                    "title" => "Fournisseur Ajoure: ",
                    "body" => "Vous avez bien mettre ajour le fournisseur"
                ]));
    }

    public function destroy(string $id)
    {
        Fournisseur::where("id", $id)
            ->delete();
        
            return redirect()
                    ->route("fournisseurs.index")
                    ->with("message", collect([
                        "type" => "alert-success",
                        "title" => "Fournisseur Suprimer: ",
                        "body" => "cette forunisseur est bien suprimer"
                    ]));
    }
}
