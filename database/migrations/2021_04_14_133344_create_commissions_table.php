<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommissionsTable extends Migration {

	public function up()
	{
		Schema::create('commissions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('freelance_id')->nullable();
            $table->unsignedBigInteger('client_id')->nullable();
            $table->unsignedBigInteger('price')->nullable();
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('commissions');
	}
}