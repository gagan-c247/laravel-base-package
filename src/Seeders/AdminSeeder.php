<?php

namespace c247\Codebank\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@codebank.com',
            'password' => 'Codebank@123',
        ]);
        $role = Role::create(['name' => 'admin']);
        $permission = Permission::create(['name' => 'manage_dashboard']);
        $role->givePermissionTo($permission);
        $user->assignRole('admin');
    }
}
