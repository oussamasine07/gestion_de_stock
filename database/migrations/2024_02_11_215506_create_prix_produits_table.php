<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('prix_produits', function (Blueprint $table) {
            $table->id();
            $table->integer("produit_id");
            $table->date("date_livraison");
            $table->decimal("prix_achat", 10, 2);
            $table->decimal("marge_benificiaire", 10, 2);
            $table->decimal("prix_de_vente", 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prix_produits');
    }
};
