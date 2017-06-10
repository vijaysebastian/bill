<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFrontendPagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('frontend_pages', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('parent_page_id');
			$table->string('slug');
			$table->string('name');
			$table->text('content', 65535);
			$table->string('url');
			$table->string('type', 225);
			$table->integer('publish');
			$table->integer('hidden');
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
		Schema::drop('frontend_pages');
	}

}
