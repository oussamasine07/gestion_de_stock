<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    // show the form of making a new user
    public function index()
    {
        //
    }

    public function dashboard () 
    {
        
        return view("users.dashboard");
    }

    // this get route is only for first subscription managers
    public function manager (Request $request) {
        if ($request->session()->exists('company')) {
            $sessionCompanyDetails = $request->session()->get("company");
            return view("users.new_manager", [
                "company" => $sessionCompanyDetails
            ]);
        } else {
            return redirect("/users/login");
        }
    }

    public function login (Request $request) {
        return view("login");
    }

    public function authenticatUser (Request $request) {
        // validate form fields
        $formFields = $request->validate([
            "nom_utilisateur" => ["required"],
            "mote_de_pass" => "required"
        ]);

        // find the user
        $user = Utilisateur::where("nom_utilisateur", $formFields["nom_utilisateur"])->first();
        // check if exists
        if ($user) {
            // match passwords
            if (Hash::check($formFields["mote_de_pass"], $user["mote_de_pass"])) {
                // authenticate user
                auth()->login($user);
                return redirect("/users/dashboard");
            }
            
            return back()
                    ->withErrors("nom_utilisateur", "Invalid credentiald")
                    ->inputOnly("nom_utilisateur");
        }

        return back()
                ->withErrors("nom_utilisateur", "Invalid credentiald")
                ->inputOnly("nom_utilisateur");

    }

    // loagout user 
    public function logout (Request $request) 
    {
        auth()->logout();
        $request->session()->regenerate();

        return redirect("/users/login");

    }

    // create a new user
    public function create()
    {
        //
    }

    // this post route is only for first subscription managers
    public function storeManager(Request $request)
    {
        // validate form fields
        $formFileds = $request->validate([
            "nom" => "required",
            "statu" => "required",
            "nom_utilisateur" => "required",
            "mote_de_pass" => ["required", "confirmed"]
        ]);

        // set the company id
        $sessionCompanyDetails = $request->session()->get("company");
        $formFileds["societe_id"] = intval($sessionCompanyDetails["id"]);

        // hash password
        $formFileds["mote_de_pass"] = bcrypt($formFileds["mote_de_pass"]);

        // create a new user
        $user = Utilisateur::create($formFileds);

        // remove session that holds the company details and create a new one
        $request->session()->invalidate();

        // authenticate the user
        auth()->login($user);
        
        return redirect("/users/dashboard");
    }

    // show user profile
    public function show(string $id)
    {
        //
    }

    // show edit user page
    public function edit(string $id)
    {
        //
    }

    // update a user info
    public function update(Request $request, string $id)
    {
        //
    }

    // remove a user
    public function destroy(string $id)
    {
        //
    }
}
