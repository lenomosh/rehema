<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToClassesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('classes', function(Blueprint $table)
		{
			$table->foreign('teacher_id', 'classes_ibfk_1')->references('teacher_id')->on('class_teachers')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('form_id', 'classes_ibfk_2')->references('form_id')->on('forms')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('classes', function(Blueprint $table)
		{
			$table->dropForeign('classes_ibfk_1');
			$table->dropForeign('classes_ibfk_2');
		});
	}

}
