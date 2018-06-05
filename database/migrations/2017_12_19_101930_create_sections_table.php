<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('level_id');
            $table->string('name');
            $table->string('slug');
            $table->string('icon')->nullable();
            $table->string('hover_icon')->nullable();
	        $table->string('tooltip_title')->nullable();
            $table->text('tooltip')->nullable();
	        $table->boolean( 'show_landing_page' )->default( true );
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
        Schema::dropIfExists('sections');
    }
}
