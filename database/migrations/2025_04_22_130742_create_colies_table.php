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
        Schema::create('colies', function (Blueprint $table) {
            $table->id();
            $table->string('colie_number', 20)->unique();
            $table->float('poids');
            $table->float('longueur');
            $table->float('largeur');
            $table->float('hauteur');
            $table->dateTime('date_sortie')->nullable();
            $table->dateTime('date_arrivee_estime')->nullable();
            $table->enum('statut', ['en_preparation', 'en_route', 'livrée'])->default('en_preparation');
            $table->timestamp('date_creation')->useCurrent();
            $table->unsignedBigInteger('id_commande');
            $table->foreign('id_commande')->references('id')->on('commandes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colies');
    }
};
