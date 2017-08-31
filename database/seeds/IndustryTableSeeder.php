<?php

use Illuminate\Database\Seeder;

class IndustryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('industries')->insert([
             array('name'=>'IT & Telcoms'),
             array('name'=>'Banking'),
             array('name'=>'Hospitality'),
             array('name'=>'Legal'),
             array('name'=>'Security'),
             array('name'=>'Insurance'),
        ]);
    }
}
