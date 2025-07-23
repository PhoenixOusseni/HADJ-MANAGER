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
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();

            $table->string('nom');
            $table->string('ville')->nullable();
            $table->string('quartier')->nullable();
            $table->string('adresse')->nullable();
            $table->string('code_contrat')->nullable();

            $table->string('telephone')->nullable();
            $table->string('email')->nullable();
            $table->string('contact_responsable')->nullable();

            $table->date('debut')->nullable();
            $table->date('fin')->nullable();

            $table->integer('nombre_chambre')->nullable();
            $table->integer('nombre_lit')->nullable();

            $table->unsignedBigInteger('agence_id')->nullable();
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
        Schema::dropIfExists('hotels');
    }
};
