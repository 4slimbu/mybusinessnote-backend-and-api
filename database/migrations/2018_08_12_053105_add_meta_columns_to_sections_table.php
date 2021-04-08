<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMetaColumnsToSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::table('sections', function ($table) {
		    $table->string('meta_title')->after('slug')->nullable();
		    $table->string('meta_description')->after('meta_title')->nullable();
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::table('sections', function ($table) {
		    $table->dropColumn('meta_title');
		    $table->dropColumn('meta_description');
	    });
    }
}
