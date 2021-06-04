<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSlidersTable extends Migration {

	public function up()
	{
		Schema::create('sliders', function(Blueprint $table) {
			$table->timestamps();
			$table->increments('id');
			$table->string('title', 255);
			$table->string('des', 255);
		});
	}

	public function down()
	{
		Schema::drop('sliders');
	}
}