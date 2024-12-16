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
        Schema::create('cards', function (Blueprint $table) {
            $table->id('id_Card');
            $table->string('name_card');
            $table->string('imageName');
            $table->text('description_card');
            $table->decimal('price', 8, 2);
            $table->unsignedBigInteger('artiste_id');
            $table->unsignedBigInteger('rarete_id');
            $table->unsignedBigInteger('extension_id')->nullable();
            $table->timestamps();

            $table->foreign('artiste_id')->references('id_artiste')->on('artistes')->onDelete('cascade');
            $table->foreign('rarete_id')->references('id_rarete')->on('raretes')->onDelete('cascade');
            $table->foreign('extension_id')->references('id_Extension')->on('extensions')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
