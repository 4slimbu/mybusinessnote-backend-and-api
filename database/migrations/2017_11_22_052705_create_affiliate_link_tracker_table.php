<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAffiliateLinkTrackerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('affiliate_link_tracker', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('affiliate_link_id');
			$table->integer('user_id')->nullable();
			$table->integer('business_id')->nullable();
			$table->integer('business_option_id')->nullable();
			$table->string('browser', 191)->nullable();
			$table->string('ip', 191)->nullable();
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
		Schema::drop('affiliate_link_tracker');
	}

}
