<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    // public function run()
    // {
    //     // $this->call([PostTableSeeder::class]);
    //     $this->call(TesTableSeeder::class);
    // }

    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // $this->call(OrdersTableSeeder::class);
        // $this->call(ItemsTableSeeder::class);
        // $this->call(InvoiceTableSeeder::class);


        $this->call(PermissionTableSeeder::class);

        $this->call(CreateAdminUserSeeder::class);



    }
}
