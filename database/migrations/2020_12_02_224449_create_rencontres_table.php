<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRencontresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rencontres', function (Blueprint $table) {
            $table->id();
            $table->integer('dureerencontre')->nullable();
            $table->string('approche')->nullable();
            $table->integer('typerencontre')->nullable();
            $table->string('modalite')->nullable();
            $table->string('axetravail')->nullable();
            $table->string('planaction')->nullable();
            $table->date('dateprochainrdv')->nullable();
            $table->longText('observation')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->unsignedBigInteger('suivirencontre_id');
            $table->foreign('suivirencontre_id')
                ->references('id')
                ->on('suivi_rencontres')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rencontres');
    }
}
