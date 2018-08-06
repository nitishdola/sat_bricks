<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkerProductionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('worker_productions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('worker_id', false, true);
            $table->float('bricks_manufactured', 20,2)->nullable()->default(0);
            $table->float('bricks_lined_up', 20,2)->nullable()->default(0);
            $table->decimal('unit_cost', 20,2);
            $table->date('date');
            $table->integer('employee_id', false, true);
            $table->boolean('status')->default(1);
            $table->timestamps();

            $table->foreign('worker_id')->references('id')->on('workers');
            $table->foreign('employee_id')->references('id')->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('worker_productions');
    }
}
