<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRequestsTable extends Migration {

	public function up()
	{
		Schema::create('requests', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('title', 255);
			$table->longText('des');
			$table->string('price', 255);
			$table->integer('user_id');
			$table->integer('type_id');
			$table->integer('city_id')->unsigned();
			$table->decimal('latitude');
			$table->decimal('longitude');
		});
	}

	public function down()
	{
		Schema::drop('requests');
	}
}