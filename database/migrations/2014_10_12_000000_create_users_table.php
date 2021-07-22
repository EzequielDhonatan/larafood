<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            /* DADOS DO USUÁRIO
            ================================================== */
            $table->unsignedBigInteger( 'tenant_id' ); ## TENANT

            $table->string( 'name' ); ## NOME
            $table->string( 'email' )->unique(); ## E-MAIL
            $table->timestamp( 'email_verified_at' )->nullable(); ## E-MAIL VERIFICADO EM
            $table->string( 'password' ); ## SENHA
            $table->rememberToken(); ## LEMBRAR TOKEN
            $table->foreignId( 'current_team_id' )->nullable(); ## ID DO TIME
            $table->string( 'profile_photo_path' , 2048)->nullable(); ## CAMINHO DA FOTO DO PERFIL

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
        Schema::dropIfExists('users');
    }
}
