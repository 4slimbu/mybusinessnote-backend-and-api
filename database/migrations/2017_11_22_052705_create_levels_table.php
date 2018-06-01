<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLevelsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('levels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 191);
            $table->string('slug', 191);
            $table->string('icon', 191);
            $table->string('badge_icon', 191)->nullable();
            $table->text('badge_message')->nullable();
            $table->text('content', 65535)->nullable();
	        $table->string('tooltip_title')->nullable();
            $table->text('tooltip', 65535)->nullable();
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
        Schema::drop('levels');
    }

}
