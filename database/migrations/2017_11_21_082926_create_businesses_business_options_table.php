<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBusinessesBusinessOptionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('businesses_business_options', function(Blueprint $table)
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
		Schema::drop('businesses_business_options');
	}

}
