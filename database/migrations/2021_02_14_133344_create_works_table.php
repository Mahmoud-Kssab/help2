<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWorksTable extends Migration {

	public function up()
	{
		Schema::create('works', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title');
			$table->longText('des');
			$table->integer('user_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('works');
	}
}
