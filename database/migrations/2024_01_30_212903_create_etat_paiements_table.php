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
        // ETAT DE REGLEMENT
        Schema::create('etat_paiements', function (Blueprint $table) {
            $table->id();
            $table->integer("payable_id");
            $table->string("payable_type");
            $table->decimal("total_facture", 10, 2)->default(0)->nullable();
            $table->decimal("montant_regle", 10, 2)->default(0)->nullable();
            $table->decimal("rest_regle", 10, 2)->default(0)->nullable();
            $table->string("etat_reglement")->default("nom reglé");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etat_paiements');
    }
};
