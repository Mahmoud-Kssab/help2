<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAddTagTable extends Migration {

	public function up()
	{
		Schema::create('add_tag', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('add_id')->unsigned();
			$table->integer('tag_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('add_tag');
	}
}
