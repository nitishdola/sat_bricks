<?php

use Illuminate\Database\Seeder;

class Register extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('registers')->insert(array(
	      		array('name'=>'Sardars Advance'),
	      		array('name'=>'Employees Advance'),
	      		array('name'=>'Sales Register'), 
	      		array('name'=>'Employees Salary'), 
	      		array('name'=>'Sardars Salary'), 
	      		array('name'=>'Workers Salary'), 
	  		)
    	);
    }
}
