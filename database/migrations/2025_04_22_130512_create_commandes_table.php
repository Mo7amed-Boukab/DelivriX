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
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->string('commande_number', 20)->unique();
            $table->string('nom_produit', 100);
            $table->text('details_produit')->nullable();
            $table->integer('quantite')->default(1);
            $table->float('prix');
            $table->float('total_a_payer');
            $table->enum('paiement_type', ['a_la_livraison', 'en_ligne']);
            $table->boolean('paiement_status')->default(false);
            $table->enum('livraison_status', ['en_attente', 'accepter', 'refuser'])->default('en_attente');
            $table->enum('commande_statut', ['en_attente', 'confirmer', 'annulee'])->default('en_attente');
            $table->timestamp('date_commande')->useCurrent();
            $table->unsignedBigInteger('id_client');
            $table->unsignedBigInteger('id_livreur')->nullable();
            $table->foreign('id_client')->references('id')->on('clients');
            $table->foreign('id_livreur')->references('id')->on('livreurs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandes');
    }
};
