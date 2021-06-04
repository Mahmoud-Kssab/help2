<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEducationsTable extends Migration {

	public function up()
	{
		Schema::create('educations', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name', 255)->nullable();
			$table->integer('user_id')->nullable();
			$table->string('des', 255)->nullable();



		});
	}

	public function down()
	{
		Schema::drop('educations');
	}
}
