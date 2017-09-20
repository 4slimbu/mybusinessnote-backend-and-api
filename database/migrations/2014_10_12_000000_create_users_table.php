<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone_number');
            $table->enum('role_id', [1,2,3])->default(2);
            $table->string('email')->unique();
            $table->string('company');
            $table->string('billing_street1');
            $table->string('billing_street2');
            $table->string('billing_postcode');
            $table->string('billing_state');
            $table->string('billing_suburb');
            $table->string('billing_country');
            $table->string('residential_street1');
            $table->string('residential_street2');
            $table->string('residential_postcode');
            $table->string('residential_state');
            $table->string('residential_suburb');
            $table->string('residential_country');
            $table->string('password');
            $table->boolean('verified')->default(false);
            $table->string('token')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }



}
