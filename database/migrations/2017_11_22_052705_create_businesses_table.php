<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBusinessesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('businesses', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->integer('business_category_id')->unsigned();
			$table->string('business_name', 191);
			$table->string('website', 191);
			$table->string('abn', 191)->nullable();
			$table->string('acn', 191)->nullable();
			$table->string('business_email', 191)->nullable();
			$table->string('business_mobile', 191)->nullable();
			$table->string('business_general_phone', 191)->nullable();
			$table->string('address', 191)->nullable();
			$table->boolean('sell_goods')->nullable();
			$table->string('tagline', 191)->nullable();
			$table->string('logo', 191)->nullable();
			$table->string('brand_color', 191)->nullable();
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
		Schema::drop('businesses');
	}

}
