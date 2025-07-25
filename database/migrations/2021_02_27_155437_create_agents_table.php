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
        Schema::create('agents', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('nom');
            $table->string('prenom');
            $table->string('telephone')->nullable();
            $table->date('date_naissance')->nullable();
            $table->string('residence')->nullable();
            $table->string('email')->nullable();
            $table->string('photo')->nullable();
            $table->enum('statut', ['Facilitateur', 'Délégué'])->default('Facilitateur');

            $table->foreignId('agence_id')->constrained()->onDelete('cascade');
            $table->foreignId('service_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agents');
    }
};
