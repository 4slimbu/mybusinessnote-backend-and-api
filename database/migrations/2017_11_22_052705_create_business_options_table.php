<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBusinessOptionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('business_options', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('level_id');
			$table->integer('section_id');
			$table->integer('parent_id')->nullable();
			$table->string('name', 191);
			$table->string('slug', 191);
			$table->text('description', 65535)->nullable();
            $table->text('content', 65535)->nullable();
            $table->string('element', 191)->nullable();
            $table->text('tooltip', 65535)->nullable();
            $table->tinyInteger('menu_order')->unique()->nullable();
			$table->integer('weight')->nullable();
            $table->boolean('show_everywhere')->default(true);
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
		Schema::drop('business_options');
	}

}
