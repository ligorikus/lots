<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToLotPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lot_prices', function (Blueprint $table){
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
        Schema::table('lot_prices', function (Blueprint $table){
            $table->dropForeign('lot_prices_lot_id_foreign');
        });
    }
}
