<?php

use Illuminate\Database\Seeder;

class AdminAndRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
            'Admin',
            'Premium',
            'Standard'
        ];
        foreach ($names as $name) {
            \App\Role::create(['name' => $name]);


        \App\User::create([
            'name' => 'Admin',
            'email' => 'admin@scoreable.com',
            'role_id' => 1, 'password' => bcrypt('secret123')
        ]);

    }
}
