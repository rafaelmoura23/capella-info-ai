<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // Remove a chave estrangeira antiga
            $table->foreign('user_id')->references('id')->on('usuarios')->onDelete('cascade'); // Corrige referência
        });
    }

    public function down()
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
};
