<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'Tech']);
        $permissions = Permission::whereNotIn('name', ['role-list','role-create','role-edit','role-delete'])->pluck('id','id');
        $role->syncPermissions($permissions);
        $role2 = Role::create(['name' => 'Store Manager']);
        $permissions2 = Permission::whereIn('name', ['job-list','job-manage','project-list'])->pluck('id','id');
        $role2->syncPermissions($permissions2);
    }
}
