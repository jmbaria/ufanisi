<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class EmployerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //add an employer
        DB::table('users')->insert([
             array('name' => 'Employer','email' => 'admin@ufanisi.co','password' => bcrypt('!empl0y'),'remember_token' => 1)
             ]);

        //add a jobseeker
        DB::table('users')->insert([
             array('name' => 'Jobseeker','email' => 'john@ufanisi.co','password' => bcrypt('c@ng3tJ0b'),'remember_token' => 1)
             ]);

		DB::table('user_permissions')->insert([
             array('user_id' => 1,'permission_id' => 1)
             ]);

        DB::table('user_permissions')->insert([
             array('user_id' => 2,'permission_id' => 2)
             ]);
    }
}
