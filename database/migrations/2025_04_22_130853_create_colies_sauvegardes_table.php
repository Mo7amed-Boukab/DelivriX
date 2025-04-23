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
        Schema::create('colies_sauvegardes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_client');
            $table->unsignedBigInteger('id_colie');
            $table->timestamp('date_sauvegarde')->useCurrent();
            $table->foreign('id_client')->references('id')->on('clients');
            $table->foreign('id_colie')->references('id')->on('colies');
            $table->unique(['id_client', 'id_colie']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colies_sauvegardes');
    }
};
