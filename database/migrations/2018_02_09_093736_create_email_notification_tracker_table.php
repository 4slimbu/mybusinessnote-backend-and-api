<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailNotificationTrackerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_notification_tracker', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('business_id')->unsigned();
            $table->boolean('level_one_complete')->default(0);
            $table->boolean('level_one_not_complete_after_one_day')->default(0);
            $table->boolean('level_one_not_complete_after_one_month')->default(0);
            $table->boolean('level_two_not_complete_after_one_week')->default(0);
            $table->boolean('no_activity_after_completing_level_one_for_one_month')->default(0);
            $table->boolean('no_activity_after_completing_level_two_for_one_week')->default(0);
            $table->boolean('no_activity_after_completing_level_two_for_one_month')->default(0);

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
        Schema::dropIfExists('email_notification_tracker');
    }
}
