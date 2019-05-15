<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaSelecoesCandidatos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('selecoes_candidatos', function (Blueprint $table) {
            $table->bigInteger('selecao')->unsigned();
            $table->foreign('selecao')
                ->references('id')
                ->on('selecoes');
            
            $table->bigInteger('candidato')->unsigned();
            $table->foreign('candidato')
                ->references('numero_matricula')
                ->on('candidatos');
            $table->primary(['candidato','selecao']);
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
        Schema::dropIfExists('selecoes_candidatos');
    }
}
