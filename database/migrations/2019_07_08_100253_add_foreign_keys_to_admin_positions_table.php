<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAdminPositionsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admin_positions', function (Blueprint $table) {
            $table->foreign('level_id', 'admin_positions_ibfk_1')->references('level_id')->on('admin_levels')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admin_positions', function (Blueprint $table) {
            $table->dropForeign('admin_positions_ibfk_1');
        });
    }

}
