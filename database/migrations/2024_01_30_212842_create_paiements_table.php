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
        Schema::create('paiements', function (Blueprint $table) {
            $table->foreignId("achat_id")
                        ->constrained()
                        ->onUpdate("cascade")
                        ->onDelete("cascade");
            $table->date("date_reglement");
            $table->decimal("montant_regle", 10, 2);
            $table->string("mode_regelement");
            $table->string("libelle_reglement");
            $table->string("observation")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paiements');
    }
};
