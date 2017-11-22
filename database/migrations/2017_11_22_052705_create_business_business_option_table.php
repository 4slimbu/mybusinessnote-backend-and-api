<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBusinessBusinessOptionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('business_business_option', function(Blueprint $table)
		{
			$table->integer('business_id')->unsigned();
			$table->integer('business_option_id')->unsigned();
			$table->boolean('status')->nullable();
			$table->dateTime('completed_on')->nullable();
			$table->primary(['business_id','business_option_id'], 'pivot_bu_bu_op_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('business_business_option');
	}

}
