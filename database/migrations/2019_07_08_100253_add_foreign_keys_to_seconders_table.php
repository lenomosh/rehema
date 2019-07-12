<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSecondersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('seconders', function (Blueprint $table) {
            $table->foreign('admin_number', 'seconders_ibfk_1')->references('admin_number')->on('students')->onUpdate('CASCADE')->onDelete('RESTRICT');
            $table->foreign('candidate_id', 'seconders_ibfk_2')->references('candidate_id')->on('candidates')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('seconders', function (Blueprint $table) {
            $table->dropForeign('seconders_ibfk_1');
            $table->dropForeign('seconders_ibfk_2');
        });
    }

}
