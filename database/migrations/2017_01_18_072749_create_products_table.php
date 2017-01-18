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
			$table->string('name')->unique('name');
			$table->string('description', 2000);
			$table->string('category', 225);
			$table->integer('parent');
			$table->integer('type')->unsigned()->index('products_type_foreign');
			$table->integer('group')->unsigned()->index('products_group_foreign');
			$table->string('welcome_email');
			$table->integer('require_domain');
			$table->integer('stock_control');
			$table->integer('stock_qty');
			$table->integer('sort_order');
			$table->integer('tax_apply');
			$table->integer('retired');
			$table->integer('deny_after_subscription');
			$table->integer('hidden');
			$table->integer('multiple_qty');
			$table->string('auto_terminate');
			$table->integer('setup_order_placed');
			$table->integer('setup_first_payment');
			$table->integer('setup_accept_manually');
			$table->integer('no_auto_setup');
			$table->string('shoping_cart_link');
			$table->string('file');
			$table->string('image');
			$table->string('version', 225);
			$table->string('github_owner', 225);
			$table->string('github_repository', 225);
			$table->string('process_url');
			$table->integer('subscription');
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
		Schema::drop('products');
	}

}
