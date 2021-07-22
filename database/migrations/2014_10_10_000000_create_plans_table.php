<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();

            /* DADOS DO PLANO
            ================================================== */
            $table->string( 'name' )->unique(); ## NOME
            $table->string( 'url' ); ## URL
            $table->double( 'price', 10, 2 ); ## PREÇO
            $table->text( 'description' ); ## DESCRIÇÃO

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
        Schema::dropIfExists('plans');
    }
}
