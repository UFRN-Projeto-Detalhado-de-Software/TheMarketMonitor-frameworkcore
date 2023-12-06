<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('usuario')->default(0);
            $table->unsignedBigInteger('cargo')->default(0);
            $table->timestamps();
            $table->text("nome");
            $table->text("dataDeNascimento");
            $table->text("email");
            $table->text("telefone");
            $table->text("cpf");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('funcionarios');
    }
};
