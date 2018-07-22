<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSardarAdvancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sardar_advances', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('voucher_id', false, true);    
            $table->integer('sardar_id', false, true);     
            $table->unsignedDecimal('advance_payment', 8, 2)->default(0);   
            $table->unsignedDecimal('advance_received', 8, 2)->default(0);  
            $table->boolean('status')->default(1);  
            $table->timestamps();
            $table->foreign('voucher_id')->references('id')->on('vouchers'); 
            $table->foreign('sardar_id')->references('id')->on('sardars'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sardar_advances');
    }
}
