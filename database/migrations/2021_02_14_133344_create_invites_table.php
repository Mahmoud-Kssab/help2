<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInvitesTable extends Migration {

	public function up()
	{
		Schema::create('invites', function(Blueprint $table) {
			$table->increments('id');
			$table->longText('content')->nullable();
			$table->integer('invited_id')->unsigned();
			$table->integer('inviter_id')->unsigned();
            $table->boolean('active')->default(0);

			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('invites');
	}
}
