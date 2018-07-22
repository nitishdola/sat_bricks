<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sale_id', false, true);
            $table->integer('brick_type_id', false, true);
            $table->decimal('unit_cost', 20,2);
            $table->float('quantity', 10,2);
            $table->decimal('total_cost', 20,2);
            $table->boolean('status')->default(1);
            $table->timestamps();

            $table->foreign('sale_id')->references('id')->on('sales');
            $table->foreign('brick_type_id')->references('id')->on('brick_types');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sale_items');
    }
}
