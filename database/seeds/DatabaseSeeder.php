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
        //$this->call(AdminSeed::class);
        //$this->call(SardarType::class);
        //$this->call(MillType::class);

        /*DB::table('sardar_types')->insert(array(
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
    }
}
