<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntretientDiagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entretient_diags', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('matriculeaej')->nullable();
            $table->string('nomprenom')->nullable();
            $table->string('sexe')->nullable();
            $table->string('niveauformaion')->nullable();
            $table->string('niveauexperience')->nullable();
            $table->string('adeqormaexper')->nullable();
            $table->string('conmetieractiv')->nullable();
            $table->string('adqformmetieractiv')->nullable();
            $table->string('adqexpmetieractiv')->nullable();
            $table->string('maitoutrechempl')->nullable();
            $table->string('conexigmarch')->nullable();
            $table->string('depdossent')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
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
        Schema::dropIfExists('entretient_diags');
    }
}
