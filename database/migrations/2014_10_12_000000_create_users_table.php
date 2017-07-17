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
            $table->string('username');
            $table->string('email')->unique();
            $table->string('password');

            $table->string('name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('locale')->nullable();
            $table->string('timezone')->nullable();

            $table->string('img')->nullable();
            $table->boolean('active')->default(0);
            $table->boolean('activated')->default(0);

            $table->timestamp('last_login')->nullable();

            $table->dateTime('dob')->nullable();
            $table->string('phone')->nullable();

            $table->engine = 'InnoDB';
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
