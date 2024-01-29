<?php

namespace App\Http\Controllers;

use App\Models\Societe;
use Illuminate\Http\Request;

class SocieteController extends Controller
{
    public function index(Request $request)
    {
        // show the register page
        return view('register');
    }

    // store a new company
    public function registerCompany(Request $request)
    {
        // validate form
        $formFields = $request->validate([
            "raison_social" => "required",
            "email" => "required",
            "telephone" => "required",
            "address" => "required",
            "ice" => "required",
            "identifiant_fiscal" => "required",
            "taxe_professionnelle" => "required",
            "registre_commerce" => "required",
            "cnss" => "required",
            "gerant" => "required"
        ]);

        // check if the form is already created
        $company = Societe::where("identifiant_fiscal", "=", $formFields["identifiant_fiscal"])->first();
        if ($company) {
            return redirect("/")->with("message", "cette entreprise existe déjà");
        }

        // create a new company
        $company = Societe::create($formFields);

        // after creating the new company we want to move the next page to create a new user for login
        // to do this we have to make a new session to store the id of the new user
        // after creating the new user we have to destroy the session

        // create a session
        session(["company" => [
            "id" => $company["id"],
            "nom" => $company["gerant"],
            "statu" => "gerant"
        ]]);
        // redirect to finish registration
        return redirect("/users/new_manager");

    }
}
