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
        $developer = Role::create(['name' => 'developer']);
        $superadmin = Role::create(['name' => 'superadmin']);
        $admin = Role::create(['name' => 'admin']);

        $userDeveloper = User::create([
            'display_name' => 'Developer',
            'username' => 'developer',
            'email' => 'developer@'. env('APP_DOMAIN', 'test.com'),
            'password' => bcrypt('@developer')
        ]);
        $userDeveloper->syncRoles([$developer]);
    }
}
