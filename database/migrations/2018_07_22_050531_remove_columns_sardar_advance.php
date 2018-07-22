<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveColumnsSardarAdvance extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sardar_advances', function (Blueprint $table) {
            $table->dropForeign('sardar_advances_voucher_id_foreign');
            $table->dropColumn(['advance_payment', 'advance_received', 'voucher_id']);
            $table->integer('trans_id', false, true)->after('id');   
            $table->foreign('trans_id')->references('id')->on('voucher_transactions'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sardar_advances', function (Blueprint $table) {
            //
        });
    }
}
