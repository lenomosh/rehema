<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToFailedCandidatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('failed_candidates', function(Blueprint $table)
		{
			$table->foreign('admin_number', 'failed_candidates_ibfk_1')->references('admin_number')->on('students')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('position_id', 'failed_candidates_ibfk_2')->references('position_id')->on('admin_positions')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('failed_candidates', function(Blueprint $table)
		{
			$table->dropForeign('failed_candidates_ibfk_1');
			$table->dropForeign('failed_candidates_ibfk_2');
		});
	}

}
