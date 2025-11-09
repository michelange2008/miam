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
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('espece_id')->constrained()->cascadeOnDelete();
            $table->foreignId('race_id')->constrained()->cascadeOnDelete();
            $table->foreignId('production_id')->constrained()->cascadeOnDelete();
            $table->foreignId('physiologie_id')->constrained()->cascadeOnDelete();
            $table->integer('effectif');
            $table->integer('poids');
            // Production spécifique selon physiologie
            $table->double('prolificite')->nullable(); // gestation
            $table->double('lait_quantite')->nullable(); // lactation
            $table->double('lait_mg')->nullable();
            $table->double('lait_mp')->nullable();
            $table->double('gmq')->nullable(); // engrais
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};
