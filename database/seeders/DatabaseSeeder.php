<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create([
            'name'         => 'super-admin',
            'display_name' => 'Super Admin'
        ]);
        Role::create([
            'name'         => 'admin',
            'display_name' => 'Admin'
        ]);
        Role::create([
            'name'         => 'agency',
            'display_name' => 'Agency'
        ]);
        Role::create([
            'name'         => 'model',
            'display_name' => 'Model'
        ]);
        Role::create([
            'name'         => 'user',
            'display_name' => 'User'
        ]);
        $user = User::create([
            'name'              => 'Super Admin',
            'email'             => 'admin@zozolive.com',
            'password'          => bcrypt('password'),
            'email_verified_at' => now(),
            // 'role_id'           => $role->uuid
        ]);
        $user->attachRole($role->id);
    }
}
