<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id', false, true);
            $table->integer('customer_id', false, true);
            $table->decimal('discount',20,2)->default(0);
            $table->decimal('gst', 5,2)->default(0);
            $table->date('invoice_date');
            $table->integer('invoice_number', false, true);
            $table->boolean('status')->default(1);
            $table->timestamps();


            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
