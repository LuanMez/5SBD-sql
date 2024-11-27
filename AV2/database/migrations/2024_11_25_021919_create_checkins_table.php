<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckinsTable extends Migration
{
    public function up()
    {
        Schema::create('checkins', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_checkin'); // Código do checkin
            $table->string('status'); // Status do checkin (por exemplo, 'concluído', 'pendente')
            $table->dateTime('data_hora'); // Data e hora do checkin
            $table->string('assento'); // Número do assento
            $table->string('codigo_passagem'); // Relacionamento com a passagem
            $table->timestamps();

            // Definindo a chave estrangeira para a tabela passagens
            $table->foreign('codigo_passagem')->references('codigoPassagem')->on('passagens')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('checkins');
    }
}
