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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('compagnie',);
            $table->string('numero',);
            $table->string('place',);
            $table->string('statut',);
            
            $table->unsignedBigInteger('agence_id',)->nullable();
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
        Schema::dropIfExists('cars');
    }
};
