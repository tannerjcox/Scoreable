<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
            'Admin', 'Premium', 'Standard'
        ];
        foreach ($names as $name) {
            \App\Role::create(['name' => $name]);
        }
    }
}
