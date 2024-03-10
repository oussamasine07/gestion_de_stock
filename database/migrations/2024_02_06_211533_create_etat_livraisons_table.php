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
            $table->integer("etat_liverable_id");
            $table->string("etat_liverable_type");
            $table->decimal("total_facture", 10, 2)->default(0)->nullable();
            $table->decimal("montant_livre", 10, 2)->default(0)->nullable();
            $table->decimal("rest_non_livre", 10, 2)->default(0)->nullable();
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
