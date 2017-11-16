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
            $table->string('company')->nullable();;
            $table->string('billing_street1')->nullable();;
            $table->string('billing_street2')->nullable();;
            $table->string('billing_postcode')->nullable();;
            $table->string('billing_state')->nullable();;
            $table->string('billing_suburb')->nullable();;
            $table->string('billing_country')->nullable();;
            $table->string('residential_street1')->nullable();;
            $table->string('residential_street2')->nullable();;
            $table->string('residential_postcode')->nullable();;
            $table->string('residential_state')->nullable();;
            $table->string('residential_suburb')->nullable();;
            $table->string('residential_country')->nullable();;
            $table->string('website')->nullable();;
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
