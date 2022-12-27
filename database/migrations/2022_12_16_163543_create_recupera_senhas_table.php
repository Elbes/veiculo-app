<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Recupera_senha', function (Blueprint $table) {
            $table->increments('id_recupera')->index();
            $table->integer('usuarios_id_usuario')->unsigned();
            $table->foreign('usuarios_id_usuario')->references('id_usuario')->on('Usuarios')->onDelete('cascade');
            $table->string('token', 250)->nullable();
            $table->string('sit_token', 1)->nullable();
            $table->timestamp('dhs_cadastro')->nullable();
            $table->timestamp('dhs_atualização')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Recupera_senha');
    }
};
