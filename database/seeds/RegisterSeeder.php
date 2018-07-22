<?php

use Illuminate\Database\Seeder;

class RegisterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('registers')->insert(array(
	      		array('name'=>'Sardar Advance'),
	      		array('name'=>'Employee Advance'),
	      		array('name'=>'Salary'), 
	  		)
    	);
    }
}
