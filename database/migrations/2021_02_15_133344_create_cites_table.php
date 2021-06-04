<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCitesTable extends Migration {

	public function up()
	{
		Schema::create('cites', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 255);
			$table->integer('governorate_id')->unsigned();
			$table->string('lagitude', 255)->nullable();
			$table->string('latitude', 255)->nullable();
            $table->foreign('governorate_id')->references('id')->on('governorates')->onDelete('cascade');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('cites');
	}
}
