<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSettingsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
	        $table->increments('id');
	        $table->string('name', 191)->nullable();
	        $table->string('key', 191)->nullable();
	        $table->mediumText('value')->nullable();
	        $table->string('edit_template', 191)->default('default');
	        $table->boolean('status')->default(0);
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
        Schema::drop('settings');
    }

}
