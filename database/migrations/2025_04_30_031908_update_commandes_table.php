<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table('commandes', function (Blueprint $table) {
            $table->enum('commande_statut', ['en_attente', 'en_livraison', 'livree'])->default('en_attente')->change();
        });
    }

    public function down(): void
    {
        Schema::table('commandes', function (Blueprint $table) {
         $table->enum('commande_statut', ['en_attente', 'confirmer', 'annulee'])->default('en_attente')->change();
       });
    }
};
