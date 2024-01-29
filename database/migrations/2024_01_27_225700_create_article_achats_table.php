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
        Schema::create('article_achats', function (Blueprint $table) {
            $table->id();
            $table->foreignId("achat_id")
                        ->constrained()
                        ->onUpdate("cascade")
                        ->onDelete("cascade");
            $table->string("nom_article");
            $table->decimal("prix_unitaire", 10, 2);
            $table->integer("quantite");
            $table->decimal("montant_total", 10, 2)->nullable();
            $table->decimal("pourcentage_tva", 3, 2);
            $table->decimal("montant_tva", 10, 2)->nullable();
            $table->decimal("montant_ttc")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_achats');
    }
};
