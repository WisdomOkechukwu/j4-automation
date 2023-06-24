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
        // $admin1 = [
        //     'id' => 9999,
        //     'name' => 'Admin',
        // ];
        
        $admin2 = [
            'id' => 999,
            'name' => 'Admin',
        ];

        $operator = [
            'id' => 889,
            'name' => 'Operator',
        ];

        $fieldWorker = [
            'id' => 779,
            'name' => 'Field Admin',
        ];

        $fieldAdmin = [
            'id' => 777,
            'name' => 'Field Worker',
        ];
        // \App\Models\Role::create($admin1);
        \App\Models\Role::create($admin2);
        \App\Models\Role::create($operator);
        \App\Models\Role::create($fieldWorker);
        \App\Models\Role::create($fieldAdmin);

    }
}
