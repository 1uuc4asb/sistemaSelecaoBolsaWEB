<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaSelecoes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('selecoes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('dono_da_selecao')->unsigned();
            $table->foreign('dono_da_selecao')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->string('nome');
            $table->dateTime('data_do_resultado');
            $table->string('parametro_de_comparacao');
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
        Schema::dropIfExists('selecoes');
    }
}
