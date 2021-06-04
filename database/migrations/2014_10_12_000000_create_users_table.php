<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
			$table->string('name');
			$table->string('email');
            $table->string('password');
			$table->string('phone');
			$table->integer('city_id');
			$table->string('nationality', 255)->nullable();
            $table->decimal('quality_rate', 2,1)->default('0');
			$table->decimal('price_rate', 2,1)->default('0');
			$table->decimal('personal_rate', 2,1)->default('0');
			$table->boolean('activate')->nullable()->default(0);
			$table->boolean('is_busy')->nullable()->default(0);
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
