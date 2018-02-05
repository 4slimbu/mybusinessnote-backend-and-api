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
			$table->integer('role_id')->unsigned();
			$table->string('first_name', 191);
			$table->string('last_name', 191);
			$table->string('phone_number', 191)->nullable();
			$table->string('email', 191)->unique();
			$table->string('password', 191)->nullable();
            $table->string('provider', 20)->nullable();
            $table->string('provider_id', 191)->nullable();
			$table->boolean('verified')->default(0);
			$table->boolean('is_3rd_party_integration')->default(1);
			$table->boolean('is_marketing_emails')->default(1);
			$table->boolean('is_free_isb_subscription')->default(1);
			$table->text('history')->nullable();
            $table->string('remember_token', 100)->nullable();
            $table->string('email_verification_token', 191)->nullable();
            $table->timestamp('email_verification_token_expiry_date')->nullable();
            $table->string('forgot_password_token', 191)->nullable();
            $table->timestamp('forgot_password_token_expiry_date')->nullable();
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
