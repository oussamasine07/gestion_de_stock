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
        Schema::create('etat_livraisons', function (Blueprint $table) {
            $table->foreignId("achat_id")->constrained();
            $table->decimal("total_facture")->nullable()->default(0);
            $table->decimal("montant_livre")->nullable()->default(0);
            $table->decimal("rest_non_livre")->nullable()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etat_livraisons');
    }
};
