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
        Schema::create('etat_produits_livres', function (Blueprint $table) {
            $table->integer("etat_produit_liverable_id");
            $table->string("etat_produit_liverable_type");
            $table->string("article")->nullable();
            $table->integer("total_quantite")->default(0)->nullable();
            $table->integer("quantite_livre")->default(0)->nullable();
            $table->integer("rest_quantite")->default(0)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etat_produits_livres');
    }
};
