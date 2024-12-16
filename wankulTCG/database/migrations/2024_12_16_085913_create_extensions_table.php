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
        Schema::create('extensions', function (Blueprint $table) {
            // Définir id_Extension comme clé primaire auto-incrémentée
            $table->id('id_Extension');  // La méthode id() crée une colonne auto-incrémentée

            // Autres colonnes de la table
            $table->string('name_extension');  // Nom de l'extension
            $table->text('description_extension');  // Description de l'extension
            $table->string('code_extension');  // Code de l'extension
            $table->timestamps();  // Création des colonnes created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('extensions');
    }
};
