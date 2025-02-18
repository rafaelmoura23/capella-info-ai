<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('saint_of_the_day', function (Blueprint $table) {
            $table->id();
            $table->string('nome_santo');
            $table->date('dia'); // Armazenando a data completa, mas somente para o dia/mês
            $table->string('frase');
            $table->string('imagem')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('saint_of_the_day');
    }
};