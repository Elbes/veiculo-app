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
        Schema::create('Manutencoes', function (Blueprint $table) {
            $table->increments('id_manutencao')->index();
            $table->integer('viculos_id_marca')->unsigned();
            $table->foreign('viculos_id_marca')->references('id_veiculo')->on('Veiculos')->onDelete('cascade');
            $table->integer('usuarios_id_usuario')->unsigned();
            $table->foreign('usuarios_id_usuario')->references('id_usuario')->on('Usuarios')->onDelete('cascade');
            $table->text('dsc_servico')->nullable();
            $table->string('dsc_grau_necessidade', 50)->nullable();
            $table->text('dsc_obs_manutencao')->nullable();
            $table->string('sit_manutencao', 1)->nullable();
            $table->string('sit_garantia_veiculo', 1)->nullable();
            $table->string('sit_servico', 1)->nullable();
            $table->date('dat_entrega')->nullable();
            $table->text('dsc_obs_fechamento')->nullable();
            $table->date('dat_fechamento')->nullable();
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
        Schema::dropIfExists('Manutencoes');
    }
};
