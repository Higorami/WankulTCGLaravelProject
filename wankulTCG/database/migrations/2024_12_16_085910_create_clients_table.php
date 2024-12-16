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
            // Définir id_Client comme clé primaire auto-incrémentée
            $table->id('id_Client');  // Cette méthode crée une colonne auto-incrémentée

            // Autres colonnes de la table
            $table->string('login');
            $table->string('password');
            $table->string('email')->unique();  // L'email doit être unique
            $table->timestamps();  // Création des colonnes created_at et updated_at
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
