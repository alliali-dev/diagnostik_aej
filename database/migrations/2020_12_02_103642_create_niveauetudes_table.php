<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNiveauetudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { //`id`, `libelle`, `description`, `bacplus`, `old`, `actif`, `created_at`, `updated_at`, `deleted_at`, `migration_key`
        Schema::create('niveauetudes', function (Blueprint $table) {
            $table->id();
            $table->string('libelle')->nullable();
            $table->string('description')->nullable();
            $table->string('bacplus')->nullable();
            $table->string('old')->nullable();
            $table->string('migration_key')->nullable();
            $table->boolean('actif');
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
        Schema::dropIfExists('niveauetudes');
    }
}
