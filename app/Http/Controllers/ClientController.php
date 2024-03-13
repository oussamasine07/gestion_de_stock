<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\InfoPp;
use App\Models\InfoSte;
use App\Models\Societe;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $societe = Societe::find(auth()->user()->societe_id);
        return view("clients.index", [
            "clients" => $societe->clients
        ]);
    }
    
    public function show(string $id)
    {
        //
    }

    public function create()
    {
        return view("clients.create");
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            "nom_ou_raison_social" => "required",
            "email" => "required",
            "telephone" => "required",
            "address" => "required",
            "ville" => "required",
            "code_postal" => "required",
            "statu_social" => "required",
        ]);

        $client = Client::where("societe_id", "=", auth()->user()->societe_id)
                        ->where("nom_ou_raison_social", "=", $formFields["nom_ou_raison_social"])
                        ->first();
        // check if this client already exists in DB
        if ($client) {
            return redirect()
                        ->route("clients.create")
                        ->with("message", "vous avez déjà ce client dans votre liste");
        } else {
            $formFields["societe_id"] = auth()->user()->societe_id;
            // create a session
            $client = Client::create($formFields);
            session(["client" => $client]);

            if ($client->statu_social == "ste") {
                return redirect()
                            ->route("clients.createSteInfo")
                            ->with("message", "le client est bien enregistre");
            }
            if ($client->statu_social == "pp") {
                return redirect()
                            ->route("clients.createPPInfo")
                            ->with("message", "le client est bien enregistre");
            }
        }

    }

    public function createSteInfo(Request $request)
    {
        $client = $request->session()->get("client");
        return view("clients.create_ste_info", [
            "nom" => $client->nom_ou_raison_social
        ]);
    }

    public function storeSteInfo(Request $request)
    {
        $formFields = $request->validate([
            "identifiant_fiscal" => "required",
            "tax_professionnelle" => "required",
            "ice" => "required",
            "registre_commerce" => "required",
            "cnss" => "required"
        ]);
        
        $client = $request->session()->get("client");
        $formFields["client_id"] = $client->id;

        InfoSte::create($formFields);
        $request->session()->forget("client");

        return redirect("/clients")->with("message", "le client ".$client->nom_ou_raison_social." est créé");
    }

    public function createPPInfo (Request $request)
    {
        $client = $request->session()->get("client");
        return view("clients.create_pp_info", [
            "nom" => $client->nom_ou_raison_social
        ]);
    }

    public function storePPInfo(Request $request)
    {
        $formFields = $request->validate([
            "cni" => "required"
        ]);
        $client = $request->session()->get("client");

        $formFields["client_id"] = $client->id;
        $formFields["identifiant_fiscal"] = $request->identifiant_fiscal ;

        InfoPp::create($formFields);
        $request->session()->forget("client");

        return redirect("/clients")->with("message", "le client ".$client->nom_ou_raison_social." est créé");
    }

    public function edit(string $id)
    {
        return view("clients.edit", [
            "client" => Client::find($id)
        ]);
    }

    public function update(Request $request, string $id)
    {
        $formFields = $request->validate([
            "nom_ou_raison_social" => "required",
            "email" => "required",
            "telephone" => "required",
            "address" => "required",
            "ville" => "required",
            "code_postal" => "required",
            "statu_social" => "required",
        ]);

        $oldClient = Client::find($id);
        $updateClient = Client::where("id", "=", $id)->update($formFields);
        $newClient = Client::find($id);
        // dd($newClient);
        if ($newClient->statu_social == $oldClient->statu_social) {
            return redirect("/clients")->with("message", "client est mettre a joure");
        } else {
            session([ "client" => $newClient ]);
            if ($newClient->statu_social == "ste") {
                return redirect("/clients/edit_ste_info");
            }
            if ($newClient->statu_social == "pp") {
                return redirect("/clients/edit_pp_info");
            }
        }
    }

    public function editSteInfo (Request $request)
    {
        return view("clients.edit_ste_info", [
            "nom" => $request->session()->get("client")->nom_ou_raison_social
        ]);
    }

    public function updateSteInfo (Request $request)
    {
        $formFields = $request->validate([
            "identifiant_fiscal" => "required",
            "tax_professionnelle" => "required",
            "ice" => "required",
            "registre_commerce" => "required",
            "cnss" => "required"
        ]);

        $formFields["client_id"] = $request->session()->get("client")->id;

        // delete from pp table
        InfoPp::where("client_id", "=", $request->session()->get("client")->id)
                    ->delete();
        // store into ste table
        InfoSte::create($formFields);
        $request->session()->forget("client");
        return redirect("/clients");
    }
    
    public function editPPInfo (Request $request)
    {
        return view("clients.edit_pp_info", [
            "nom" => $request->session()->get("client")->nom_ou_raison_social
        ]);
    }

    public function updatePPInfo (Request $request)
    {
        $formFields = $request->validate([
            "cni" => "required"
        ]);

        $formFields["client_id"] = $request->session()->get("client")->id;
        $formFields["identifiant_fiscal"] = $request->identifiant_fiscal ;

        // delete from pp table
        InfoSte::where("client_id", "=", $request->session()->get("client")->id)
                    ->delete();

        InfoPp::create($formFields);
        $request->session()->forget("client");
        return redirect("/clients");
    }

    public function destroy(string $id)
    {
        Client::find($id)->delete();
        return redirect("/clients")->with("message", "client est suprimer");
    }
}
