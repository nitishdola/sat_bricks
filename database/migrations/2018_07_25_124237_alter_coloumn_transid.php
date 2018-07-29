<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterColoumnTransid extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sardar_payments', function (Blueprint $table) {
            
            $table->dropForeign('sardar_advances_trans_id_foreign');
            $table->foreign('voucher_id')->references('id')->on('vouchers'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sardar_payments', function (Blueprint $table) {
            //
        });
    }
}
