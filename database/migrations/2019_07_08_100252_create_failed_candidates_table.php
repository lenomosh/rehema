<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFailedCandidatesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('failed_candidates', function (Blueprint $table) {
            $table->bigInteger('id', true)->unsigned();
            $table->integer('admin_number')->index('admin_number');
            $table->integer('position_id')->index('position_id');
            $table->text('description', 65535);
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
        Schema::drop('failed_candidates');
    }

}
