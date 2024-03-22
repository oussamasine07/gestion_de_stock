<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use App\Models\Vente;
use App\Models\Paiement;
use App\Models\EtatPaiement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\JoinClause;

class PaiementController extends Controller
{
    public function index (Request $request) 
    {
        $numPages = $request["entres"] ? $request["entres"] : 10;

        // filter by type 
        $etatPaiements = $request->query("etat_paiement") == "achats" 
                                ? Achat::select(
                                    "achats.id",
                                    "achats.numero_facture", 
                                    "achats.date_facture", 
                                    "etat_paiements.total_facture",
                                    "etat_paiements.montant_regle",
                                    "etat_paiements.rest_regle",
                                    "etat_paiements.etat_reglement",
                                    "fournisseurs.raison_social"
                                )
                                ->join("etat_paiements", function (JoinClause $join) {
                                    $join
                                        ->on("achats.id", "=", "etat_paiements.payable_id")
                                        ->where("etat_paiements.payable_type", "=", "App\Models\Achat");
                                })
                                ->join("fournisseurs", "fournisseurs.id", "=", "achats.fournisseur_id")
                                ->join("societes", "societes.id", "=", "fournisseurs.societe_id")
                                ->where("societes.id", "=", auth()->user()->societe_id)
                                ->paginate($numPages)
                                : Vente::select(
                                    "ventes.id",
                                    "ventes.numero_facture", 
                                    "ventes.date_facture", 
                                    "etat_paiements.total_facture",
                                    "etat_paiements.montant_regle",
                                    "etat_paiements.rest_regle",
                                    "etat_paiements.etat_reglement",
                                    "clients.nom_ou_raison_social"
                                )
                                ->join("etat_paiements", function (JoinClause $join) {
                                    $join
                                        ->on("ventes.id", "=", "etat_paiements.payable_id")
                                        ->where("etat_paiements.payable_type", "=", "App\Models\Vente");
                                })
                                ->join("clients", "clients.id", "=", "ventes.client_id")
                                ->join("societes", "societes.id", "=", "clients.societe_id")
                                ->where("societes.id", "=", auth()->user()->societe_id)
                                ->paginate($numPages);

        // dd($etatPaiements);
        
        // apply all filters
        $etatPaiements = $etatPaiements->filter(function ($value) use ($request) {
            return $value;
        });

        $etatPaiements = $etatPaiements->filter(function ($value) use ($request) {
            if ($request["filtrer"] == "regle") {
                return $value["rest_regle"] == 0;
            }
            return $value;
        });

        $etatPaiements = $etatPaiements->filter(function ($value) use ($request) {
            if ($request["filtrer"] == "non_regle") {
                return $value["rest_regle"] > 0 ;
            }
            return $value;
        });

        $etatPaiements = $etatPaiements->filter(function ($value) use ($request) {
            if ($request["fournisseur"] != null) {
                return $value["raison_social"] == $request["fournisseur"];
            }
            if ($request["client"] != null) {
                return $value["nom_ou_raison_social"] == $request["client"];
            }
            return $value;
        });

        $total;
        if ($request["filtrer"] == "non_regle" || $request["filtrer"] == "tous") {
            $total = $etatPaiements->sum("rest_regle");
        } else {
            $total = $etatPaiements->sum("montant_regle");
        }
        
        return view("paiements.index", [
            "etatPaiements" => $etatPaiements,
            "entres" => $numPages,
            "filtrer" => $request["filtrer"] != null ? $request["filtrer"] : "tous",
            "fournisseur" => $request["fournisseur"] != null ? $request["fournisseur"] : "",
            "client" => $request["client"] != null ? $request["client"] : "",
            "total" => $total,
            "etat_paiement" => $request->query("etat_paiement")
        ]);
    }

    public function showFactureDetails (Request $request, string $id)
    {  
        
        $item = $request->query("etat_paiement") == "achat" 
                    ? Achat::find($id)
                    : Vente::find($id);
        // dd($item);
        return view("paiements.paiement_details", [
            "paiements" => $item->payments,
            "achat" => $item,
            "etatRegement" => $item->etatPaiment
        ]);
    }

    // show paiement form
    public function createPaiement (Request $request, string $id)
    {
        $item = $request->query("etat_paiement") == "achat" 
                    ? Achat::find($id)
                    : Vente::find($id);
        
        return view("paiements.create_paiement", [
            "item" => $item,
            "etat_paiement" => $request->query("etat_paiement")
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

        $payable_type = "App\Models\\" . ucfirst($request->query("etat_paiement"));

        // select etat payment and check if the amount is less then or equals the rest of debts
        $etatPaiements = EtatPaiement::where("payable_id", "=", $id)
                            ->where("payable_type", "=", $payable_type)
                            ->get()->first();
        // dd($id);
        if ($formFields["montant_regle"] <= $etatPaiements->rest_regle) {
            // create the paiement
            $newPayement = new Paiement($formFields);
            $payableItem = $request->query("etat_paiement") == "achat" 
                            ? Achat::find($id)
                            : Vente::find($id);

            $payableItem->payments()->save($newPayement);

            return redirect("/paiements/detail_de_paiement/{$id}?etat_paiement={$request->query("etat_paiement")}")
                    ->with("message", collect([
                        "type" => "alert-success",
                        "title" => "Paiement : ",
                        "body" => "paiement effectué"
                    ]));
        }

        return redirect("/paiements/create/{$id}?etat_paiement={$request->query("etat_paiement")}")
                ->withErrors("montant_regle", "le montant que vous essayez de payer est supérieur à le rest a regle")
                ->onlyInput("montant_regle");

    }

}
