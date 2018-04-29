<?php

use  Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payments', function (Blueprint $table){
            $table->foreign('payer_wallet_id')
                ->references('id')
                ->on('wallets');
            $table->foreign('recipient_wallet_id')
                ->references('id')
                ->on('wallets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payments', function (Blueprint $table){
            $table->dropForeign('payments_payer_wallet_id_foreign');
            $table->dropForeign('payments_recipient_wallet_id_foreign');
        });
    }
}
