<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            /* DADOS DO PRODUTO
            ================================================== */
            $table->unsignedBigInteger( 'tenant_id' ); ## TENANT
            $table->unsignedBigInteger( 'category_id' )->nullable(); ## CATEGORY

            $table->string( 'title' )->unique(); ## TÍTULO
            $table->string( 'flag' )->unique(); ## FLAG
            $table->string( 'image' )->unique(); ## IMAGEM
            $table->double( 'price', 10, 2 ); ## PREÇO
            $table->text( 'description' ); ## DESCRIÇÃO

            $table->foreign( 'tenant_id' )->references( 'id' )->on( 'tenants' )->onDelete( 'cascade' ); ## TENANT
            $table->foreign( 'category_id' )->references( 'id' )->on( 'categories' )->onDelete( 'cascade' ); ## CATEGORY

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
        Schema::dropIfExists('products');
    }
}
