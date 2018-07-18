<?php

use Illuminate\Database\Seeder;

class MillType extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mills')->insert(array(
	      		array('name'=>'Mill 1'),
	      		array('name'=>'Mill 2'),
	      		array('name'=>'Mill 3'),
	      		array('name'=>'Mill 4'),
	      		array('name'=>'main Mill'),
	  		)
    	);
    }
}
