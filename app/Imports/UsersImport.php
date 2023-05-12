<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $role = null;

        switch ($row['role']) {
            case 'admin':
                $role = 999;
                break;
            case 'operator':
                $role = 889;
                break;
            case 'field admin':
                $role = 779;
                break;

            case 'field worker':
                $role = 777;
                break;

            default:
                $role = 777;
                break;
        }

        return new User([
            'first_name' => $row['first_name'],
            'last_name' => $row['last_name'],
            'role_id' => $role,
            'id_number' => $row['id_number'],
            'email' => $row['email'],
            'password' => Hash::make($row['password']),
        ]);
    }
}
