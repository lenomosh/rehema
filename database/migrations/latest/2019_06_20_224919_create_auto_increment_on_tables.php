<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateAutoIncrementOnTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::update("ALTER TABLE admin_positions AUTO_INCREMENT = 100;");
        DB::update("ALTER TABLE candidates AUTO_INCREMENT = 2000;");
        DB::update("ALTER TABLE class_teachers AUTO_INCREMENT = 10000;");
        DB::update("ALTER TABLE failed_candidates AUTO_INCREMENT = 3000;");
        DB::update("ALTER TABLE proposers AUTO_INCREMENT = 4000;");
        DB::update("ALTER TABLE seconders AUTO_INCREMENT = 5000;");
        DB::update("ALTER TABLE students AUTO_INCREMENT = 18230;");


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auto_increment_on_tables');
    }
}
