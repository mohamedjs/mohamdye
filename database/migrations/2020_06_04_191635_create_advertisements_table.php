<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdvertisementsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('advertisements', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('image', 191);
			$table->string('ads_url', 191)->nullable();
			$table->timestamps();
			$table->string('type', 100);
			$table->boolean('active');
			$table->integer('order');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('advertisements');
	}

}
