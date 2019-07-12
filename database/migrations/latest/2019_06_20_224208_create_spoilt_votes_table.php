<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSpoiltVotesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('spoilt_votes', function(Blueprint $table)
		{
//		    $table->increments('id')->primary();
			$table->string('class_id', 191)->index('class_id');
			$table->integer('number_of_votes_spoilt')->nullable();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('spoilt_votes');
	}

}
