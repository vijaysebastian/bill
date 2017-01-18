<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePlanPricesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('plan_prices', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('plan_id')->unsigned();
			$table->string('currency');
			$table->string('add_price');
			$table->string('renew_price', 225);
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
		Schema::drop('plan_prices');
	}

}
