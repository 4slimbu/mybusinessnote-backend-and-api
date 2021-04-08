<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBadgeUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
//		Schema::create('badge_user', function(Blueprint $table)
//		{
//			$table->integer('badge_id')->unsigned();
//			$table->integer('user_id')->unsigned();
//			$table->integer('business_id')->unsigned();
//            $table->timestamps();
//			$table->primary(['badge_id','user_id','business_id'], 'pivot_ba_us_bu_id');
//		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
//		Schema::drop('badge_user');
	}

}
