<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAddsTable extends Migration {

	public function up()
	{
		Schema::create('adds', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->string('title', 255);
			$table->string('des', 255);
			$table->string('seo_title')->nullable();
			$table->longText('seo_des')->nullable();
			$table->string('seo_keywords')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('adds');
	}
}