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
        Schema::table('utilisateurs', function (Blueprint $table) {
            $table->enum('role', ['client', 'administrateur', 'livreur']);
            $table->text('photo')->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('ville', 20)->nullable();
            $table->string('adresse', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('utilisateurs', function (Blueprint $table) {
            $table->dropColumn('role');
            $table->dropColumn('photo');
            $table->dropColumn('phone');
            $table->dropColumn('ville');
            $table->dropColumn('adresse');
        });
    }
};
