<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table('commandes', function (Blueprint $table) {
         $table->unsignedBigInteger('id_admin');
        });
    }


    public function down(): void
    {
        Schema::table('commandes', function (Blueprint $table) {
         $table->dropColumn('id_admin');
        });
    }
};