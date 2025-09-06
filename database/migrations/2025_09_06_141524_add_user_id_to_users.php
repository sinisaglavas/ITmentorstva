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
         Schema::table('ocene', function (Blueprint $table) {
             // kom useru pripada oglas
             $table->unsignedBigInteger('user_id')->after('profesor');
             // user_id iz tabele 'ocene' ukazuje na id iz tabele 'user' - povezuju se user_id i id iz dve tabele
             // cascadeOnDelete() - ako obrisemo user-a obrisace se i ocene i ostalo vezano za tog istog user-a
             $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
         });
     }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ocene', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
    }
};
