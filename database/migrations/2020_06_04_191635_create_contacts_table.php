<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contacts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('email', 191);
			$table->string('phone', 191);
			$table->text('message', 65535)->nullable();
			$table->integer('product_id')->unsigned()->nullable()->index('contacts_product_id_foreign');
			$table->integer('city_id')->unsigned()->nullable()->index('contacts_city_id_foreign');
			$table->string('name', 191)->nullable();
			$table->char('lang', 4)->nullable();
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
		Schema::drop('contacts');
	}

}
