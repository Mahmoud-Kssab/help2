<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReportsTable extends Migration {

	public function up()
	{
		Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('work_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('search');
            $table->bigInteger('counter')->default(0);
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('reports');
	}
}