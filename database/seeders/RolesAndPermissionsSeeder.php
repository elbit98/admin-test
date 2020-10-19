<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'create user']);
        Permission::create(['name' => 'update user']);
        Permission::create(['name' => 'delete user']);

        Permission::create(['name' => 'set role master']);


        $role = Role::create(['name' => 'master']);
        $role->givePermissionTo(['create user', 'update user', 'delete user', 'set role master']);

        $role = Role::create(['name' => 'admin']);
        $role = Role::create(['name' => 'user']);


    }
}
