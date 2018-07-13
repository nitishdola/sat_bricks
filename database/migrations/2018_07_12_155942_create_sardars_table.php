<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSardarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sardars', function (Blueprint $table) {
            $table->increments('id');            
            $table->string('name');        
            $table->string('mobile_number');
            $table->string('address')->nullable();
            $table->integer('sardar_type_id', false, true);
            $table->integer('mill_id', false, true);
            $table->boolean('status')->default(1); 
            $table->timestamps();
            $table->foreign('sardar_type_id')->references('id')->on('sardar_types');
            $table->foreign('mill_id')->references('id')->on('mills');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sardars');
    }
}
