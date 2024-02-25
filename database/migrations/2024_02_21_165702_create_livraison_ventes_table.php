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
        Schema::create('livraison_ventes', function (Blueprint $table) {
            $table->id();
            $table->foreignId("vente_id")->constrained();
            $table->foreignId("societe_id")->constrained();
            $table->string("numero_bl");
            $table->date("date_livraison_bl");
            $table->decimal("total_bl", 10, 2)->default(0)->nullable();
            $table->string("etat_livraison")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livraison_ventes');
    }
};
