<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAffiliateLinkBusinessOptionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('affiliate_link_business_option', function(Blueprint $table)
		{
			$table->integer('business_option_id')->unsigned();
			$table->integer('affiliate_link_id')->unsigned();
			$table->string('label')->default('Set Up Now');
			$table->primary(['business_option_id','affiliate_link_id'], 'pivot_af_li_bu_op_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('affiliate_link_business_option');
	}

}
