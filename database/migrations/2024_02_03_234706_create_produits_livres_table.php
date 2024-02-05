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
        Schema::create('produits_livres', function (Blueprint $table) {
            $table->id();
            $table->foreignId("livraison_id")->constrained();
            $table->string("nom_article");
            $table->integer("quantite");
            $table->decimal("prix_unitaire", 10, 2)->nullable();
            $table->decimal("montant_total", 10, 2)->nullable();
            $table->decimal("pourcentage_tva", 3, 2)->nullable();
            $table->decimal("montant_tva", 10, 2)->nullable();
            $table->decimal("montant_ttc", 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits_livres');
    }
};
