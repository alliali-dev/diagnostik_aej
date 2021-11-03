<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToEntretientDiagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('entretient_diags', function (Blueprint $table) {
            $table->string('file_guide_entretient')->nullable();
            $table->string('file_grille_diagnostic')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('entretient_diags', function (Blueprint $table) {
            //
        });
    }
}
