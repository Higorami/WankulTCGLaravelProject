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
        Schema::create('ligne_decks', function (Blueprint $table) {
            // Définit la colonne card_id comme clé étrangère vers cards (unsignedBigInteger)
            $table->unsignedBigInteger('card_id');
            $table->foreign('card_id')->references('id_Card')->on('cards')->onDelete('cascade');

            // Définit la colonne deck_id comme clé étrangère vers decks (unsignedBigInteger)
            $table->unsignedBigInteger('deck_id');
            $table->foreign('deck_id')->references('id_Deck')->on('decks')->onDelete('cascade');

            // Définit la colonne quantity
            $table->integer('quantity')->default(1);

            // Définit une clé primaire composite
            $table->primary(['card_id', 'deck_id']);

            // Ajoute des timestamps
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ligne_decks');
    }
};
