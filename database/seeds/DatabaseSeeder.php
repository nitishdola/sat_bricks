<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      //  $this->call(AdminSeed::class);
        

      /*  DB::table('sardar_types')->insert(array(
                array('name'=>'Heavy Duty'),
                array('name'=>'Light Duty'),
            )
        );


        DB::table('mills')->insert(array(
                array('name'=>'Mill 1'),
                array('name'=>'Mill 2'),
                array('name'=>'Mill 3'),
                array('name'=>'Mill 4'),
                array('name'=>'main Mill'),
            )
        );*/


       //$this->call(BrickType::class);
       //$this->call(AccounHead::class);
       $this->call(Register::class);
       $this->call(Ledger::class);

    /*   DB::table('accounts_heads')->insert(array(
            array('name'=>'Assets'),
            array('name'=>'Liability'),
            array('name'=>'Income'),
            array('name'=>'Expenditure'), 
            )
        );


       DB::table('ledgers')->insert(array(
                array('name'=>'Credit', 'head_id' => 1, 'cash_ledger' => 0, 'register' => 0), 
                array('name'=>'SBI Bank 20006121', 'head_id' => 1, 'cash_ledger' => 1, 'register' => 0),
                array('name'=>'Sales', 'head_id' => 1, 'cash_ledger' => 0, 'register' => 3), 
            )
        );


       DB::table('registers')->insert(array(
                array('name'=>'Sardars Advance'),
                array('name'=>'Employees Advance'),
                array('name'=>'Sales Register'), 
                array('name'=>'Employees Salary'), 
                array('name'=>'Sardars Salary'), 
                array('name'=>'Workers Salary'), 
            )
        );*/

    }
}
