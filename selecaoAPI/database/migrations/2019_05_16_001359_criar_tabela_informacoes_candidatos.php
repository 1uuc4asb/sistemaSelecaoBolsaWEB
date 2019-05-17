<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaInformacoesCandidatos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informacoes_candidatos', function (Blueprint $table) {
            $table->bigInteger('usuario_id')->unsigned();
            $table->foreign('usuario_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->primary('usuario_id');
            $table->string('nome_do_curso');
            $table->string('numero_matricula')->unique();
            $table->integer('idade');
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
        Schema::dropIfExists('informacoes_candidatos');
    }
}
