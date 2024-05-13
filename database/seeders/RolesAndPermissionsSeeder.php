<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create(['name' => 'Admin']);
        $newsManagerRole = Role::create(['name' => 'News Manager']);
        $blogManagerRole = Role::create(['name' => 'Blog Manager']);

        // Permissions
        $fullAccessPermission = Permission::create(['name' => 'full access']);
        $newsPermission = Permission::create(['name' => 'news management']);
        $blogPermission = Permission::create(['name' => 'blog management']);

        // Assign permissions to roles
        $adminRole->givePermissionTo($fullAccessPermission);
        $newsManagerRole->givePermissionTo($newsPermission);
        $blogManagerRole->givePermissionTo($blogPermission);
    }
}
