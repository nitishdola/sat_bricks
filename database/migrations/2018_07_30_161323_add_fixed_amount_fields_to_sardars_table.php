<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFixedAmountFieldsToSardarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sardars', function (Blueprint $table) {
            $table->decimal('fixed_amount_per_unit', 20,2)->nullable()->after('mill_id');
            $table->decimal('fixed_amount_per_line', 20,2)->nullable()->after('fixed_amount_per_unit');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sardars', function (Blueprint $table) {
            //
        });
    }
}
