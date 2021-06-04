<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAddCategoryTable extends Migration {

	public function up()
	{
		Schema::create('add_category', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('category_id')->unsigned();
			$table->integer('add_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('add_category');
	}
}
