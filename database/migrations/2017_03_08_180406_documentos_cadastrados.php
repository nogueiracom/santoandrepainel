<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DocumentosCadastrados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('documentos', function (Blueprint $table) {
          $table->increments('id');
          $table->string('titulo');
          $table->longText('arquivo');
          $table->text('descricao');
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
        Schema::drop("documentos");
    }
}
