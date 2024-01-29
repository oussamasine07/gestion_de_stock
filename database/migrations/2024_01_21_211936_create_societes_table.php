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
        Schema::create('societes', function (Blueprint $table) {
            $table->id();
            $table->string("raison_social");
            $table->string("logo")->nullable();
            $table->string("email");
            $table->string("telephone");
            $table->string("address");
            $table->string("ice")->unique();
            $table->string("identifiant_fiscal")->unique();
            $table->string("taxe_professionnelle")->unique();
            $table->string("registre_commerce")->unique();
            $table->string("cnss")->unique();
            $table->string("gerant");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('societes');
    }
};
