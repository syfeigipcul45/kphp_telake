<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superadmin = Role::create(['name' => 'superadmin']);
        $admin = Role::create(['name' => 'admin']);
        $user = Role::create(['name' => 'user']);

        $roleSuperadmin = User::create([
            'display_name' => 'Superadmin',
            'username' => 'superadmin',
            'email' => 'superadmin@'. env('APP_DOMAIN', 'test.com'),
            'password' => bcrypt('@superadmin')
        ]);
        $roleSuperadmin->syncRoles([$superadmin]);

        $roleAdmin = User::create([
            'display_name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@'. env('APP_DOMAIN', 'test.com'),
            'password' => bcrypt('@admin')
        ]);
        $roleAdmin->syncRoles([$admin]);

        $roleUser = User::create([
            'display_name' => 'User',
            'username' => 'user',
            'email' => 'user@'. env('APP_DOMAIN', 'test.com'),
            'password' => bcrypt('@user')
        ]);
        $roleUser->syncRoles([$user]);
    }
}
