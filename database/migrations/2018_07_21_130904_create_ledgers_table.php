<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLedgersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ledgers', function (Blueprint $table) {
            $table->increments('id'); 
            $table->string('name');             
            $table->integer('head_id', false, true); 
            $table->boolean('cash_ledger')->default(0); 
            $table->integer('register')->default(0); 
            $table->boolean('status')->default(1); 
            $table->boolean('active')->default(1); 
            $table->timestamps(); 
            $table->foreign('head_id')->references('id')->on('accounts_heads'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ledgers');
    }
}
