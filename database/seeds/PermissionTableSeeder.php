<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use App\User;
use Spatie\Permission\Models\Role;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'img-list',
            'img-create',
            'img-edit',
            'img-delete'
            ];
                foreach ($permissions as $permission) {
                Permission::create(['name' => $permission]);
                }
    }
}

