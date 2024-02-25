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
        Schema::create('ventes', function (Blueprint $table) {
            $table->id();
            $table->foreignId("societe_id")
                    ->constrained()
                    ->onUpdate("cascade")
                    ->onDelete("cascade");
            $table->foreignId("commande_id")
                    ->constrained()
                    ->onUpdate("cascade")
                    ->onDelete("cascade");
            $table->foreignId("client_id")
                    ->constrained()
                    ->onUpdate("cascade")
                    ->onDelete("cascade");
            $table->string("numero_facture");
            $table->date("date_facture");
            $table->decimal("montant_ttc")->default(0)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventes');
    }
};
