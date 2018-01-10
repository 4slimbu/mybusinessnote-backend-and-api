<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessSection extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_section', function(Blueprint $table)
        {
            $table->integer('business_id')->unsigned();
            $table->integer('section_id')->unsigned();
            $table->tinyInteger('completed_percent')->default(0);
            $table->timestamps();
            $table->primary(['business_id','section_id'], 'pivot_bu_se');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('business_section');
    }
}
