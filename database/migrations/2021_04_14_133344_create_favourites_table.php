<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFavouritesTable extends Migration {

	public function up()
	{
		Schema::create('favourites', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('add_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
			$table->boolean('is_favourite')->default(0);
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('favourites');
	}
}