<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //admin 
        $admin = [
            'id' => 999,
            'name' => 'Admin',
        ];

        $operator = [
            'id' => 889,
            'name' => 'Operator',
        ];

        $fieldWorker = [
            'id' => 779,
            'name' => 'Field Worker',
        ];

        $fieldAdmin = [
            'id' => 777,
            'name' => 'Field Admin',
        ];
        \App\Models\Role::create($admin);
        \App\Models\Role::create($operator);
        \App\Models\Role::create($fieldWorker);
        \App\Models\Role::create($fieldAdmin);

    }
}
