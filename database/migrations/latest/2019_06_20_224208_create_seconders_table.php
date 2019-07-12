<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSecondersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('seconders', function(Blueprint $table)
		{
			$table->integer('seconder_id', true);
			$table->integer('admin_number')->index('admin_number');
			$table->integer('candidate_id')->index('candidate_id');
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
		Schema::drop('seconders');
	}

}
