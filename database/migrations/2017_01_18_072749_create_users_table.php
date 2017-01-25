<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('user_name', 225);
			$table->string('first_name');
			$table->string('last_name');
			$table->string('email')->unique();
			$table->string('password', 60);
			$table->string('company');
			$table->string('company_type', 225)->nullable();
			$table->string('company_size', 225)->nullable();
			$table->string('bussiness', 225)->nullable();
                        $table->string('company_type', 225)->nullable();
                        $table->string('company_size', 225)->nullable();
			$table->string('mobile');
			$table->string('mobile_code', 225);
			$table->string('address');
			$table->string('town');
			$table->string('state')->nullable()->default('IN-KA');
			$table->string('zip');
			$table->string('profile_pic');
			$table->integer('active');
			$table->string('role')->default('client');
			$table->string('currency', 225)->default('INR');
			$table->decimal('debit', 10, 0);
			$table->integer('timezone_id')->default(114);
			$table->string('remember_token', 100)->nullable();
                        $table->string('country')->default('IN');
                        $table->string('ip')->nullable();
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
		Schema::drop('users');
	}

}
