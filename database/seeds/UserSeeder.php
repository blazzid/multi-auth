<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'administrator']);
        $permission = Permission::create(['name' => 'manajemen_user']);

        $user = User::create([
            'name' => 'administrator',
            'email' => 'admin@email.id',
            'password' => Hash::make('spasitigakali'),
            'status' => true
        ]);

        $role->syncPermissions($permission);
        $user->assignRole($role);
    }
}
