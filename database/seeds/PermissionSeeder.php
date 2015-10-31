<?php

use Bican\Roles\Models\Permission;
use Bican\Roles\Models\Role;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $createUsersPermission=Permission::create([
            'name' => 'Create users',
            'slug' => 'create.users',
            'description' => '', // optional
        ]);
        $role = Role::find(1);
        $role->attachPermission($createUsersPermission);
    }
}
