<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workers', function (Blueprint $table) {
            $table->increments('id');            
            $table->string('name');           
            $table->unsignedDecimal('salary', 8, 2)->default(0);   
            $table->integer('salary_type');    
            $table->integer('sardar_id', false, true); 
            $table->boolean('status')->default(1); 
            $table->timestamps();
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
        Schema::dropIfExists('workers');
    }
}
