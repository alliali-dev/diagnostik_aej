<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecialitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        // `code_specialite`, `libelle`, `description`, `created_at`, `updated_at`, `deleted_at`, `secteuractivite_id`, `migration_key`, `actif`
        Schema::create('specialites', function (Blueprint $table) {
            $table->id();
            $table->string('code_specialite')->nullable();
            $table->string('libelle')->nullable();
            $table->string('description')->nullable();
            $table->string('migration_key')->nullable();
            $table->string('actif')->nullable();
            $table->unsignedBigInteger('secteuracitivite_id');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('secteuracitivite_id')
                ->references('id')
                ->on('secteuracitivites')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('specialites');
    }
}
