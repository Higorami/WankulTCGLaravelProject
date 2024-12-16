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
        Schema::create('artistes', function (Blueprint $table) {
            // Définir id_artiste comme clé primaire auto-incrémentée
            $table->id('id_artiste');  // La méthode id() crée une colonne auto-incrémentée

            // Autres colonnes de la table
            $table->string('artiste_name');  // Nom de l'artiste
            $table->timestamps();  // Création des colonnes created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artistes');
    }
};
