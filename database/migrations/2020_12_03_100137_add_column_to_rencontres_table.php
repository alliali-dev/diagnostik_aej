<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToRencontresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rencontres', function (Blueprint $table) {
            $table->unsignedBigInteger('agence_id');
            $table->foreign('agence_id')
                ->references('id')
                ->on('agences');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rencontres', function (Blueprint $table) {
            //
        });
    }
}
