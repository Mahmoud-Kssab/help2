<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdminsTable extends Migration {

	public function up()
	{
		Schema::create('admins', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('email');
			$table->text('roles_name');
			$table->boolean('activate')->nullable()->default(0);
			$table->string('password');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('admins');
	}
}
