<?php

use Illuminate\Database\Seeder;
use App\testdemo;

class TesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\testdemo::class,50)->create();
    }
}
