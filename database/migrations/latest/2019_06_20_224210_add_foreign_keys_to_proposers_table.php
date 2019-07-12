<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToProposersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('proposers', function(Blueprint $table)
		{
			$table->foreign('admin_number', 'proposers_ibfk_1')->references('admin_number')->on('students')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('candidate_id', 'proposers_ibfk_2')->references('candidate_id')->on('candidates')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('proposers', function(Blueprint $table)
		{
			$table->dropForeign('proposers_ibfk_1');
			$table->dropForeign('proposers_ibfk_2');
		});
	}

}
