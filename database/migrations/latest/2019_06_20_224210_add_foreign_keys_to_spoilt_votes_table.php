<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSpoiltVotesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('spoilt_votes', function(Blueprint $table)
		{
			$table->foreign('class_id', 'spoilt_votes_ibfk_1')->references('class_id')->on('classes')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('spoilt_votes', function(Blueprint $table)
		{
			$table->dropForeign('spoilt_votes_ibfk_1');
		});
	}

}
