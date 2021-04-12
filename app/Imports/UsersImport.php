<?php

namespace App\Imports;

use App\RegisterData;
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
        return new RegisterData([
            'name'     => $row['name'],
            'email'    => $row['email'], 
            'phone' => $row['phone'],
            'address' => $row['address'],
        ]);
    }
}
