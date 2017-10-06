<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_options', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('badge_id');
            $table->integer('parent_id')->default(0);
            $table->string('name');
            $table->text('tooltip')->nullable();
            $table->timestamps();
        });


        Schema::create('business_category_business_option', function (Blueprint $table) {
            $table->integer('business_option_id');
            $table->integer('business_category_id');

        });

        Schema::create('business_option_user', function (Blueprint $table) {
            $table->integer('business_option_id');
            $table->integer('user_id');

        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('business_options');
        Schema::dropIfExists('business_options_categories');
        Schema::dropIfExists('business_options_partners');
    }
}
