<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCandidatesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('candidates', function (Blueprint $table) {
            $table->foreign('position_id', 'candidates_ibfk_2')->references('position_id')->on('admin_positions')->onUpdate('CASCADE')->onDelete('RESTRICT');
            $table->foreign('admin_number', 'candidates_ibfk_3')->references('admin_number')->on('students')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('candidates', function (Blueprint $table) {
            $table->dropForeign('candidates_ibfk_2');
            $table->dropForeign('candidates_ibfk_3');
        });
    }

}
