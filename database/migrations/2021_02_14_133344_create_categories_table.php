<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoriesTable extends Migration {

	public function up()
	{
		Schema::create('categories', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->integer('parent')->unsigned()->nullable();
			$table->boolean('sub')->default(0);
		});
	}

	public function down()
	{
		Schema::drop('categories');
	}
}
