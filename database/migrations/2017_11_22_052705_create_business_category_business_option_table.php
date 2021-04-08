<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBusinessCategoryBusinessOptionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('business_category_business_option', function(Blueprint $table)
		{
			$table->integer('business_category_id')->unsigned();
			$table->integer('business_option_id')->unsigned();
			$table->primary(['business_category_id','business_option_id'], 'pivot_bu_ca_bu_op_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('business_category_business_option');
	}

}
