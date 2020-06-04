<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table)
		{
			$table->increments('id');
			$table->decimal('shipping_amount', 10);
			$table->decimal('total_price', 10);
			$table->boolean('status')->default(1);
			$table->integer('client_id')->unsigned()->index('orders_client_id_foreign');
			$table->integer('address_id')->unsigned()->index('orders_address_id_foreign');
			$table->char('lang', 4);
			$table->boolean('payment')->comment('1-cash , 2-visa , 3-visa in cash');
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
		Schema::drop('orders');
	}

}
