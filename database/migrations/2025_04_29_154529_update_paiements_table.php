<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
          Schema::table('paiements', function (Blueprint $table) {

           $table->dateTime('date_paiement')->change();
           $table->string('details')->nullable();
           $table->dropForeign(['id_commande']);
           $table->dropColumn('id_commande');
           $table->unsignedBigInteger('id_colie');
           $table->foreign('id_colie')->references('id')->on('colies')->onDelete('cascade');
       });
    }

    public function down(): void
    {
        Schema::table('paiements', function (Blueprint $table) {
         $table->dropForeign(['id_colie']);
         $table->dropColumn('id_colie');
         $table->dropColumn('details');
         $table->unsignedBigInteger('id_commande');
         $table->foreign('id_commande')->references('id')->on('commandes')->onDelete('cascade');

         $table->timestamp('date_paiement')->useCurrent()->change();
     });
    }
};
