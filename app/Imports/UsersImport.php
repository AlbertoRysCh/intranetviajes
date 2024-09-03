<?php

namespace App\Imports;

use App\Models\User;
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
        return new User([
            'name'     => $row['name'], // Ajusta el nombre de la columna según tu Excel
            'username'    => $row['username'],
            'email'    => $row['email'],
            'password' => bcrypt($row['password']),
        ]);
    }
}
