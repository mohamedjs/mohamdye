<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCouponsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('coupons', function(Blueprint $table)
		{
			$table->increments('id');
			$table->char('coupon', 10);
			$table->integer('value');
			$table->date('expire_date');
			$table->integer('client_id')->unsigned()->nullable()->index('coupons_client_id_foreign');
			$table->boolean('used')->default(0)->comment('0-unused , 1-reseve_to_specfic_client , 2-used');
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
		Schema::drop('coupons');
	}

}
