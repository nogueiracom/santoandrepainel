<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdeatDocumento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('documentos', function($table)
      {
        $table->integer('user_id')->unsigned();
      });

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
      Schema::table('documentos', function($table)
      {
        $table->dropColumn('user_id');
      });
    }
}
