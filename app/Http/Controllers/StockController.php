<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Societe;
use Illuminate\Http\Request;

class StockController extends Controller
{

    public function index()
    {
        $societe = Societe::find(auth()->user()->societe->id);
        // dd($societe->stocks);
        return view("stocks.index", [
            "stocks" => $societe->stocks
        ]);
    }

    public function create()
    {
        return view("stocks.create"); 
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            "nom" => "required",
            "address" => "required",
            "ville" => "required"
        ]);

        $formFields["societe_id"] = auth()->user()->societe->id;

        Stock::create($formFields);

        return redirect("/stocks");
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        return view("stocks.edit", [
            "stock" => Stock::find($id)
        ]); 
    }

    public function update(Request $request, string $id)
    {
        $formFields = $request->validate([
            "nom" => "required",
            "address" => "required",
            "ville" => "required"
        ]);

        $formFields["societe_id"] = auth()->user()->societe->id;

        Stock::where("id", $id)->update($formFields);

        return redirect("/stocks");
    }

    public function destroy(string $id)
    {
        Stock::where("id", $id)->delete();
        return redirect("/stocks");
    }
}
