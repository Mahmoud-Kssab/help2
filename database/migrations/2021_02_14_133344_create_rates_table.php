<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRatesTable extends Migration {

	public function up()
	{
		Schema::create('rates', function(Blueprint $table) {
			$table->increments('id');
			$table->decimal('quality_rate', 2,1)->default('0');
			$table->decimal('price_rate', 2,1)->default('0');
			$table->decimal('personal_rate', 2,1)->default('0');
			$table->longText('comment')->nullable();
			$table->integer('rater_id');
			$table->integer('rated_id');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('rates');
	}
}
