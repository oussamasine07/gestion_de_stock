<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use App\Models\Paiement;
use App\Models\EtatPaiement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\JoinClause;

class AchatPaiementController extends Controller
{
    public function index () 
    {
        $etatPaiements = Achat::select(
            "achats.id",
            "achats.numero_facture", 
            "achats.date_facture", 
            "etat_paiements.total_facture",
            "etat_paiements.montant_regle",
            "etat_paiements.rest_regle",
            "etat_paiements.etat_reglement"
        )
        ->join("etat_paiements", "achats.id", "=", "etat_paiements.achat_id")
        ->get();

        // dd($etatPaiements);

        return view("paiement_achats.index", [
            "etatPaiements" => $etatPaiements
        ]);
    }

    public function showFactureDetails (string $id)
    {  
        $achat = Achat::find($id);

        return view("paiement_achats.paiement_details", [
            "paiements" => $achat->paiements,
            "achat" => $achat,
            "etatRegement" => $achat->etatPaiment
        ]);
    }

    // show paiement form
    public function createPaiement (string $id)
    {
        $achat = Achat::find($id);
        return view("paiement_achats.create_paiement", [
            "achat" => $achat
        ]);
    }

    // make a paiement
    public function makePayment (Request $request, string $id)
    {
        // validate the form
        $formFields = $request->validate([
            "date_reglement" => "required",
            "montant_regle" => "required",
            "mode_regelement" => "required",
            "libelle_reglement" => "required"
        ]);

        $formFields["achat_id"] = $id;

        // select all payments 
        $etatPaiements = EtatPaiement::where("achat_id", $id)->get()->first();

        // check if the amount is less then or equals the rest of debts
        if ($formFields["montant_regle"] <= $etatPaiements->rest_regle) {
           
            // create the paiement
            Paiement::create($formFields);

            return redirect("/paiement_achats/detail_de_paiement/{$id}")
                    ->with("message", "paiement effectué");
            
        }

        return redirect("/paiement_achats/create/{$id}")
                ->withErrors("montant_regle", "le montant que vous essayez de payer est supérieur à le rest a regle")
                ->onlyInput("montant_regle");

    }

}
