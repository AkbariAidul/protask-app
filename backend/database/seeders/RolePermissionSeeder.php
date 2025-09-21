<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Buat Permissions
        Permission::create(['name' => 'create projects']);
        Permission::create(['name' => 'edit projects']);
        Permission::create(['name' => 'delete projects']);
        Permission::create(['name' => 'assign users']);
        Permission::create(['name' => 'create tasks']);

        // Buat Roles dan berikan permissions
        $adminRole = Role::create(['name' => 'Admin']);
        // Admin bisa melakukan semuanya
        $adminRole->givePermissionTo(Permission::all());

        $pmRole = Role::create(['name' => 'Project Manager']);
        $pmRole->givePermissionTo(['create projects', 'edit projects', 'assign users', 'create tasks']);

        $memberRole = Role::create(['name' => 'Team Member']);
        // Member tidak punya permission khusus, hanya bisa melihat data yg ditugaskan
        $user = User::find(1);
        $user->assignRole('Admin');
    }
}