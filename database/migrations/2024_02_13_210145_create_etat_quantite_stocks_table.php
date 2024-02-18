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
        Schema::create('etat_quantite_stocks', function (Blueprint $table) {
            $table->foreignId("stock_id")->constrained();
            $table->foreignId("produit_id")->constrained();
            $table->integer("quantite")->default(0)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etat_quantite_stocks');
    }
};
