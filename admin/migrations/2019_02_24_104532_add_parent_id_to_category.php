<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddParentIdToCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('categories', function(Blueprint $table)
      {
        $table->Integer('parent_id')->unsigned()->nullable();
        $table->foreign('parent_id')->references('id')->on('categories')->onUpdate('CASCADE')->onDelete('CASCADE');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('categories', function(Blueprint $table)
      {
        $table->dropForeign('parent_id');
      });
    }
}
