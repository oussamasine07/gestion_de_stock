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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->foreignId("societe_id")->constrained();
            $table->string("nom_ou_raison_social");
            $table->string("email");
            $table->string("telephone");
            $table->string("address");
            $table->string("ville");
            $table->string("code_postal");
            $table->string("statu_social");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
