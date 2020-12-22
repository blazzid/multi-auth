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
        $permission1 = Permission::create(['name' => 'manajemen_user']);
        $permission2 = Permission::create(['name' => 'log_monitoring']);
        $role->syncPermissions([$permission1,$permission2]);

        $user = User::create([
            'name' => 'administrator',
            'email' => 'admin@email.id',
            'password' => Hash::make('spasitigakali'),
            'status' => true
        ]);
        $user->assignRole($role);
    }
}
