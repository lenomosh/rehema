<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdminLevelsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('admin_levels', function(Blueprint $table)
		{
			$table->integer('level_id', true);
			$table->string('level_name', 50);
			$table->timestamps();
		});
        DB::update("ALTER TABLE admin_levels AUTO_INCREMENT = 1000;");
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('admin_levels');
	}

}
