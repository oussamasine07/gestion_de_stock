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
            $table->foreignId("achat_id")->constrained();
            // $table->foreignId("livraison_id")->constrained();
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
