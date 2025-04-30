<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table('livreurs', function (Blueprint $table) {

         $table->enum('statut', ['disponible', 'indisponible'])->default('disponible')->change();
      });
    }

    public function down(): void
    {
         Schema::table('livreurs', function (Blueprint $table) {
          $table->enum('statut', ['active', 'inactive', 'suspendu'])->default('active')->change();
      });
    }
};
