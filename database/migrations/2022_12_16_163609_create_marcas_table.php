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
        Schema::create('Marcas', function (Blueprint $table) {
            $table->increments('id_marca')->index();
            $table->string('nom_marca', 250)->nullable();
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
        Schema::dropIfExists('Marcas');
    }
};
