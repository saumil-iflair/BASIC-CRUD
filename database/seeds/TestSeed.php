<?php

use Illuminate\Database\Seeder;

class TestSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('sample')->insert([
            'name'=>Str::random(10),
            'address'=>Str::random(10),
        ]);


    }
}
