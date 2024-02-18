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
        Schema::create('info_stes', function (Blueprint $table) {
            $table->foreignId("client_id")
                        ->constrained()
                        ->onUpdate("cascade")
                        ->onDelete("cascade");
            $table->string("identifiant_fiscal");
            $table->string("tax_professionnelle");
            $table->string("ice");
            $table->string("registre_commerce");
            $table->string("cnss");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('info_stes');
    }
};
