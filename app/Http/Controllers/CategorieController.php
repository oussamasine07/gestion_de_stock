<?php

namespace App\Http\Controllers;

use App\Models\Societe;
use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index()
    {   
        $societe_id = auth()->user()->societe_id;
        $societe = Societe::find($societe_id);
        return view("categories.index", [
            "categories" => $societe->categories
        ]);
    }

    public function create()
    {
        return view("categories.create");
    }

    public function store(Request $request)
    {
        $societe_id = auth()->user()->societe_id;

        $formFields = $request->validate([
            "nom_categorie" => "required"
        ]);
        $formFields["societe_id"] = $societe_id;

        Categorie::create($formFields);

        return redirect("/categories")->with("message", "categorie a ete cree!");
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        return view("categories.edit", [
            "categorie" => Categorie::find($id)
        ]);
    }

    public function update(Request $request, string $id)
    {

        $formFields = $request->validate([
            "nom_categorie" => "required"
        ]);

        Categorie::where("id", $id)->update($formFields);

        return redirect("/categories")->with("message", "categorie est a joure !");
    }

    public function destroy(string $id)
    {
        Categorie::where("id", $id)->delete();

        return redirect("/categories")->with("message", "categorie est suprime !");
    }
}
