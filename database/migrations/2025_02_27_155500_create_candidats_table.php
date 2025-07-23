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
        Schema::create('candidats', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->date('date_naissance')->nullable();
            $table->string('lieu_naissance')->nullable();
            $table->string('telephone')->nullable();
            $table->enum('sexe', ['Masculin', 'Feminin']);
            $table->string('ville_province')->nullable();
            $table->enum('type_piece', ['CNIB', 'Passeport'])->default('CNIB');
            $table->string('numero_piece')->nullable();
            $table->date('date_delivrance')->nullable();
            $table->date('date_expiration')->nullable();
            $table->string('nationalite')->nullable();
            $table->enum('statut', ['Provisoir', 'Définitif'])->default('Provisoir');

            $table->enum('statut_paiement', ['Non payé', 'Paiement partiel', 'Tout payé'])->default('Non payé');

            $table->string('observation')->nullable();
            $table->string('photo')->nullable();

            $table->string('id_inscription');
            $table->string('office_code');
            $table->foreignId('agent_id')->nullable()->constrained('agents')->onDelete('set null');
            $table->foreignId('service_id')->nullable()->constrained('services')->onDelete('set null');
            $table->foreignId('agence_id')->constrained('agences')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidats');
    }
};
