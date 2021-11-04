<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('idEndereco')->index('fk_clientes_endereco1_idx');
            $table->string('nome', 200);
            $table->string('cpf', 15);
            $table->string('telefone', 16);
            $table->string('eMail', 200);
            $table->date('dataNascimento');
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
        Schema::dropIfExists('cliente');
    }
}
