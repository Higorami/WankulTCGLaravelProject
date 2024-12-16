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
        Schema::create('decks', function (Blueprint $table) {
            // Définir id_Deck comme clé primaire auto-incrémentée
            $table->id('id_Deck');  // La méthode id() crée une colonne auto-incrémentée

            // Autres colonnes de la table
            $table->string('name_deck');
            $table->timestamps();  // Création des colonnes created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('decks');
    }
};
