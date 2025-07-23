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
        Schema::create('agences', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique()->nullable();
            $table->string('libelle')->nullable();
            $table->string('email')->nullable();
            $table->string('telephone')->nullable();
            $table->string('siege')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('exter_phone')->nullable();
            $table->string('adress')->nullable();
            $table->string('logo')->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('admin_id')->nullable();
            $table->foreign('admin_id')->references('id')->on('users')->onDelete('set null');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('agence_id')->nullable()->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agences');
    }
};
