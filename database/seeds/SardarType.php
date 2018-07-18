<?php

use Illuminate\Database\Seeder;

class SardarType extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sardar_types')->insert(array(
	      		array('name'=>'Heavy Duty'),
	      		array('name'=>'Light Duty'),
	  		)
    	);
    }
}
