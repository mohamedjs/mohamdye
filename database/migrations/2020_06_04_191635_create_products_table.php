<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title', 191);
			$table->string('main_image', 191);
      $table->decimal('price', 10);
      $table->decimal('min', 10)->nullable();
			$table->integer('discount')->nullable();
			$table->decimal('price_after_discount', 10)->nullable();
			$table->boolean('special')->default(0);
			$table->boolean('active')->default(1);
			$table->text('description', 65535)->nullable();
			$table->text('short_description', 65535)->nullable();
			$table->integer('category_id')->unsigned()->index('products_category_id_foreign');
			$table->integer('brand_id')->nullable()->unsigned()->index('products_brand_id_foreign');
			$table->integer('stock')->default(0);
			$table->text('key_feature', 65535)->nullable();
			$table->text('warranty', 65535)->nullable();
			$table->text('delivery_time', 65535)->nullable();
			$table->text('cash_on_delivery', 65535)->nullable();
			$table->text('return_or_refund', 65535)->nullable();
			$table->timestamps();
			$table->integer('inch')->nullable();
			$table->boolean('recently_added')->nullable();
			$table->boolean('selected_for_you')->nullable();
			$table->string('sku', 191)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('products');
	}

}
