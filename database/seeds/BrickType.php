<?php

use Illuminate\Database\Seeder;

class BrickType extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brick_types')->insert(array(
	      		array('name'=>'1st Class', 'unit' => 'Piece'),
	      		array('name'=>'1 No Mitha', 'unit' => 'Piece'),
	      		array('name'=>'2 No Mitha', 'unit' => 'Piece'),
	      		array('name'=>'Plain Picket', 'unit' => 'Piece'),
	      		array('name'=>'Jawa', 'unit' => 'CM'),
	      		array('name'=>'Tukura', 'unit' => 'CM'),
	  		)
    	);
    }
}
