<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserProfilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_profiles', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->string('company', 191)->nullable();
			$table->string('affiliate_link_label', 255)->nullable();
			$table->string('affiliate_link', 255)->nullable();
			$table->string('billing_street1', 191)->nullable();
			$table->string('billing_street2', 191)->nullable();
			$table->string('billing_postcode', 191)->nullable();
			$table->string('billing_state', 191)->nullable();
			$table->string('billing_suburb', 191)->nullable();
			$table->string('billing_country', 191)->nullable();
			$table->string('residential_street1', 191)->nullable();
			$table->string('residential_street2', 191)->nullable();
			$table->string('residential_postcode', 191)->nullable();
			$table->string('residential_state', 191)->nullable();
			$table->string('residential_suburb', 191)->nullable();
			$table->string('residential_country', 191)->nullable();
			$table->string('website', 191)->nullable();
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
		Schema::drop('user_profiles');
	}

}
