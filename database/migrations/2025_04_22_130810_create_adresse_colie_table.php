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
        Schema::create('adresse_colie', function (Blueprint $table) {
            $table->id();
            $table->string('derniere_adresse', 255);
            $table->timestamp('date_ajout')->useCurrent();
            $table->unsignedBigInteger('id_colie');
            $table->foreign('id_colie')->references('id')->on('colies')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adresse_colie');
    }
};
