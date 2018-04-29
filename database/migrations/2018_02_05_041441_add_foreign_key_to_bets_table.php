<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToBetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bets', function (Blueprint $table){
            $table->foreign('better_id')
                ->references('id')
                ->on('users');
            $table->foreign('lot_id')
                ->references('id')
                ->on('lots');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bets', function (Blueprint $table){
            $table->dropForeign('bets_better_id_foreign');
            $table->dropForeign('bets_lot_id_foreign');
        });
    }
}
