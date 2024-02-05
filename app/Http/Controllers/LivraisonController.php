<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use Illuminate\Http\Request;

class LivraisonController extends Controller
{
    // show all delivery status
    public function index () 
    {
        return view("livraison.index");
    }

    // -------------------------------------------------------------------------------------
    // ------------------------------ CREATE FUNCTIONALITY ---------------------------------
    // -------------------------------------------------------------------------------------
    // create a new delivery
    public function create (string $id)
    {
        $achat = Achat::find($id);

        return view("livraison.create", [
            "achat" => $achat
        ]);
    }

    // store a new delivery
    public function store (Request $request, string $id)
    {
        // store here
        $formFields = $request->validate([
            "numero_bl" => "required",
            "date_arrive_bl" => "required"
        ]);

        $delivery = Livraison::create($formFields);

        // create a session to store delivery info
        $request->session([
            "livraion_details" => [
                "id" => $delivery->id,
                "numero_bl" => $delivery->numero_bl
            ]
        ]);

        return redirect("/livraisons/create_article/{$id}");

    }

    // create a new delivery article
    public function createDelivery (string $id) 
    {
        $achat = Achat::find($id);
        return view("livraison.create_article", [
            "articles" => $achat->articaleAchats
        ]);
    }

    // store delivery article
    public function storeDeliverArticle (Request $request, string $id)
    {
        // we need to check if the invoice is totaly delivered or not

    }


}
