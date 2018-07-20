<?php

use Illuminate\Database\Seeder;

class VehicleType extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vehicle_types')->insert(array(
            array('name'=>'Truck'),
            array('name'=>'Dumper'),
            array('name'=>'JCB'),
            array('name'=>'Tractor'),
        )
  );
    }
}
