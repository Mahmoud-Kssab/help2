<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommentRatesTable extends Migration {

	public function up()
	{
		Schema::create('comment_rates', function(Blueprint $table) {
			$table->increments('id');
			$table->longText('comment')->nullable();
			$table->integer('rater_id');
			$table->integer('rated_id');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('comment_rates');
	}
}
