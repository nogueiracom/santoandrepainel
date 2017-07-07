<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelacionamentoArtigoUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('items', function($table)
        {
          $table->integer('user_id')->unsigned();
        });

        DB::table('items')->update(array('user_id' => 1));

        Schema::table('items', function($table)
        {
          $table->foreign('user_id')->
          references('id')->
          on('users')->
          onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('items', function($table)
        {
          $table->dropForeign('artigos_usuario_id_foreign');
          $table->dropColumn('user_id');
        });
    }
}
