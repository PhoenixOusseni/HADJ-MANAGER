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
        Schema::create('vols', function (Blueprint $table) {
            $table->id();

            $table->string('compagnie')->nullable();

            $table->enum('type_vol', ['Charter', 'Régulier', 'Autre'])->default('Charter');

            $table->string('numero_vol')->nullable();
            $table->enum('trajet', ['Aller', 'Aller-retour', 'Retour'])->default('Aller')->nullable();

            $table->string('ville_depart_aller')->nullable();
            $table->string('ville_arrivee_aller')->nullable();
            $table->dateTime('date_heure_depart_aller')->nullable();
            $table->dateTime('date_heure_arrivee_aller')->nullable();

            $table->string('ville_depart_retour')->nullable();
            $table->string('ville_arrivee_retour')->nullable();
            $table->dateTime('date_heure_depart_retour')->nullable();
            $table->dateTime('date_heure_arrivee_retour')->nullable();

            $table->integer('quota')->nullable();

            $table->string('convocation')->nullable();

            $table->unsignedBigInteger(column: 'agence_id')->nullable();
            $table->foreign('agence_id')->references('id')->on('agences')->onDelete('set null');
            $table->foreignId('service_id')->constrained()->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vols');
    }
};
