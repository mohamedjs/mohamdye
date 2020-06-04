<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductPropertiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_properties', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('property_value_id')->unsigned()->index('product_properties_property_value_id_foreign');
			$table->integer('product_id')->unsigned()->index('product_properties_product_id_foreign');
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
		Schema::drop('product_properties');
	}

}
