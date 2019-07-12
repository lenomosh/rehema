<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSpoiltVotesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('spoilt_votes', function (Blueprint $table) {
            $table->foreign('position_id', 'position_table_and_spoilt_votes')->references('position_id')->on('admin_positions')->onUpdate('RESTRICT')->onDelete('SET NULL');
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
        Schema::table('spoilt_votes', function (Blueprint $table) {
            $table->dropForeign('position_table_and_spoilt_votes');
            $table->dropForeign('spoilt_votes_ibfk_1');
        });
    }

}
