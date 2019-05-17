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
            $table->bigInteger('selecao_id')->unsigned();
            $table->foreign('selecao_id')
                ->references('id')
                ->on('selecoes');
            $table->bigInteger('candidato_id')->unsigned();
            $table->foreign('candidato_id')
                ->references('id')
                ->on('users');
            $table->primary(['selecao_id','candidato_id']);           
            $table->float('CR_atual');
            $table->float('CH_cumprida');
            $table->integer('semestre_atual');
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
