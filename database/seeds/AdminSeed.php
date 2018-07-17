<?php

use Illuminate\Database\Seeder;

class AdminSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert(array(
	      		array('name'=>'Sun Mohammad Talukdar', 'username' => 'sun', 'password' => bcrypt('SunTalukdar'), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
	  		)
    	);
    }
}
