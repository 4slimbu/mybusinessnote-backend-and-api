<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businesses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('business_category_id');
            $table->integer('badge_id');
            $table->string('business_name');
            $table->string('website');
            $table->string('abn');
            $table->string('acn');
            $table->string('business_email');
            $table->string('business_mobile');
            $table->string('business_general_phone');
            $table->string('address');
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
        Schema::dropIfExists('businesses');
    }
}
