<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuiviRencontresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suivi_rencontres', function (Blueprint $table) {
            $table->id();
            $table->string('sexe')->nullable();
            $table->date('datenaisance')->nullable();
            $table->integer('age')->nullable();
            $table->string('naturepiece')->nullable();
            $table->string('npiece')->nullable();
            $table->string('nationalite')->nullable();
            $table->string('contact')->nullable();
            $table->string('lieudereisdence')->nullable();
            $table->string('diplome')->nullable();
            $table->string('specialitediplome')->nullable();
            $table->string('anneediplome')->nullable();
            $table->string('niveaudetude')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->unsignedBigInteger('agence_id');
            $table->foreign('agence_id')
                ->references('id')
                ->on('agences');
            $table->softDeletes();
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
        Schema::dropIfExists('suivi_rencontres');
    }
}
