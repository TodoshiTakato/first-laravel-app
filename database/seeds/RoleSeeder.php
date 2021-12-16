<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'user',
        ]);

        Role::create([
            'name' => 'content_manager',
        ]);

        Role::create([
            'name' => 'manager',
        ]);

        Role::create([
            'name' => 'admin',
        ]);

        Role::create([
            'name' => 'super_admin',
        ]);
    }
}
