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
        Schema::create('raretes', function (Blueprint $table) {
             // Définir id_rarete comme clé primaire auto-incrémentée
            $table->id('id_rarete');  // La méthode id() crée une colonne auto-incrémentée

            // Autres colonnes de la table
            $table->string('rarete_name');  // Nom de la rareté
            $table->timestamps();  // Création des colonnes created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('raretes');
    }
};
