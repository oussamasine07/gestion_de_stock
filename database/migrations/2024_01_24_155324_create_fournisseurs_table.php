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
        Schema::create('fournisseurs', function (Blueprint $table) {
            $table->id();
            $table->foreignId("societe_id")->constrained();
            $table->string("raison_social");
            $table->string("email");
            $table->string("telephone");
            $table->string("address");
            $table->string("ville");
            $table->bigInteger("ice");
            $table->integer("identifiant_fiscal");
            $table->integer("taxe_professionnelle");
            $table->integer("registre_commerce");
            $table->integer("cnss");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fournisseurs');
    }
};
