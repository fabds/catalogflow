<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'project-list',
            'project-create',
            'project-edit',
            'project-delete',
            'job-list',
            'job-create',
            'job-edit',
            'job-manage',
            'job-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'user-role'
        ];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
