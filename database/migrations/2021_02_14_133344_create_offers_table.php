<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOffersTable extends Migration {

	public function up()
	{
		Schema::create('offers', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title');
			$table->integer('add_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->string('content');
			$table->boolean('activate')->default(0);
			$table->timestamps();

		});
	}

	public function down()
	{
		Schema::drop('offers');
	}
}
