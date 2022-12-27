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
        Schema::create('Veiculos', function (Blueprint $table) {
            $table->increments('id_veiculo')->index();
            $table->integer('usuarios_id_usuario')->unsigned();
            $table->foreign('usuarios_id_usuario')->references('id_usuario')->on('Usuarios')->onDelete('cascade');
            $table->integer('marcas_id_marca')->unsigned();
            $table->foreign('marcas_id_marca')->references('id_marca')->on('Marcas')->onDelete('cascade');
            $table->string('dsc_placa', 20)->nullable();
            $table->string('dsc_modelo', 50)->nullable();
            $table->year('dsc_versao', 20)->nullable();
            $table->integer('cores_id_cor')->unsigned();
            $table->foreign('cores_id_cor')->references('id_cor')->on('Cores')->onDelete('cascade');
            $table->timestamp('dhs_cadastro')->nullable();
            $table->timestamp('dhs_atualizacao')->nullable();
            $table->timestamp('dhs_exclusao')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Veiculos');
    }
};
