<?php

use Illuminate\Database\Seeder;

class AccountHead extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('accounts_heads')->insert(array(
            array('name'=>'Assets'),
            array('name'=>'Liability'),
            array('name'=>'Income'),
            array('name'=>'Expenditure'), 
            )
        );
    }
}
