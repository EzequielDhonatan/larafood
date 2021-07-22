<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();

            /* DADOS DO TENANT
            ================================================== */
            $table->unsignedBigInteger( 'plan_id' ); ## PLANO

            $table->string( 'cnpj' )->unique(); ## CNPJ
            $table->string( 'name' )->unique(); ## NOME
            $table->string( 'url' )->unique(); ## URL
            $table->string( 'email' )->unique(); ## E-MAIL
            $table->string( 'logo' )->nullable(); ## LOGO

            // Status tenant ( Se inativar 'N' ele perde o acesso ao sistema )
            $table->enum( 'active', [ 'Y', 'N' ] )->default( 'Y' ); ## ATIVO?

            // Subscription
            $table->date( 'subscription' )->nullable(); ## DATA QUE SE INSCREVEU
            $table->date( 'expires_at' )->nullable(); ## DATA QUE EXPIRA O ACESSO

            $table->string( 'subscription_id', 255 )->nullable(); ##IDENTIFICADOR DO GATEWAY
            $table->boolean( 'subscription_active' )->default( false ); ## ASSINATURA ATIVA
            $table->boolean( 'subscription_suspended' )->default( false ); ## ASSINATIRA CANCELADA

            $table->foreign( 'plan_id' )->references( 'id' )->on( 'plans' )->onDelete( 'cascade' ); ## PLANO

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
        Schema::dropIfExists('tenants');
    }
}
