<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSpoiltVotesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spoilt_votes', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('class_id', 191)->index('class_id');
            $table->integer('position_id')->nullable()->index('position_table_and_spoilt_votes');
            $table->integer('number_of_votes_spoilt')->nullable();
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
        Schema::drop('spoilt_votes');
    }

}
