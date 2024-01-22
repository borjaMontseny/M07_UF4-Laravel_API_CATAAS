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
        Schema::create('cat_images', function (Blueprint $table) {
            $table->id(); // Camp d'identitat
            $table->string('_id')->unique(); // Camp únic per emmagatzemar l'_id
            $table->string('mimetype');
            $table->integer('size');
            $table->json('tags'); // Camp de tipus JSON per emmagatzemar les etiquetes
            $table->timestamps(); // Camps de data i hora de creació i actualització
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cat_images');
    }
};
