<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('commandes', function (Blueprint $table) {
            $table->string('adresse')->nullable(); // Ajoute une colonne nullable
            $table->string('phone')->nullable(); // Ajoute une colonne nullable

        });
    }

    public function down()
    {
        Schema::table('commandes', function (Blueprint $table) {
            $table->dropColumn('adresse'); // Permet d'annuler la migration si besoin
            $table->dropColumn('phone')->nullable(); // Ajoute une colonne nullable

        });
    }
};
