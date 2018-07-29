<?php

use Illuminate\Database\Seeder;

class Ledger extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ledgers')->insert(array(
                array('name'=>'Credit', 'head_id' => 1, 'cash_ledger' => 0, 'register' => 0), 
                array('name'=>'SBI Bank 20006121', 'head_id' => 1, 'cash_ledger' => 1, 'register' => 0), 
            )
        );
    }
}
