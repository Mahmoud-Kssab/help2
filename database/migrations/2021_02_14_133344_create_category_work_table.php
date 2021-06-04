<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoryWorkTable extends Migration {

	public function up()
	{
		Schema::create('category_work', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('category_id')->unsigned();
			$table->integer('work_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('category_work');
	}
}
