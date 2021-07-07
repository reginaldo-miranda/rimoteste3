<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendaItensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venda_itens', function (Blueprint $table) {
            $table->integer('id_vendaitens');
            $table->integer('id_venda');
            $table->integer('id_cliente');
            $table->integer('id_produto'); 
            $table->double('qde'); 
            $table->double('valorunit'); 
            $table->integer('statusitens'); 
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
        Schema::dropIfExists('venda_itens');
    }
}
