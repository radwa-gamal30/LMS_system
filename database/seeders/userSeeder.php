<?php

namespace Database\Seeders;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // admin role create 
        $role = Role::create(['name' => 'admin']);
        // user permissions
        $rolePermissions = Permission::all()->pluck('name');
        $role->givePermissionTo($rolePermissions);


        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('admin123'),
            'is_admin' => 'yes',
            'balance' => 0.00,

        ]);

        // assign role to user
        $user->assignRole($role);
        $user->givePermissionTo($rolePermissions);

    }
}
