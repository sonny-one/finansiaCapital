<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioHasPropiedadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario_has_propiedads', function (Blueprint $table) {
            $table->id();
            $table->integer('id_usuario');
            $table->integer('id_propiedad');
            $table->integer('id_ejecutivo')->nullable();

            $table->foreign('id_usuario')->references('id')->on('users');
            $table->foreign('id_propiedad')->references('id')->on('propiedades');
            $table->foreign('id_ejecutivo')->references('id')->on('users');

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
        Schema::dropIfExists('usuario_has_propiedads');
    }
}
