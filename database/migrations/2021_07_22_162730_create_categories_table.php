<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();

            /* DADOS DA CATEGORIA
            ================================================== */
            $table->unsignedBigInteger( 'tenant_id' ); ## TENANT

            $table->string( 'name' )->unique(); ## NOME
            $table->string( 'url' )->unique(); ## URL
            $table->text( 'description' )->nullable(); ## DESCRIÇÃO

            $table->foreign( 'tenant_id' )->references( 'id' )->on( 'tenants' )->onDelete( 'cascade' ); ## TENANT

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
        Schema::dropIfExists('categories');
    }
}
