<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemapisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demapis', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('matriculeaej')->nullable();
            $table->string('sexe')->nullable();
            $table->dateTime('datenaissance')->nullable();
            $table->string('typepieceidentite')->nullable();
            $table->string('numerocni')->nullable();
            $table->integer('age')->nullable();
            $table->string('telephone')->nullable();
            $table->string('niveauetude')->nullable();
            $table->string('diplome')->nullable();
            $table->string('nationalite')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('demapis');
    }
}
