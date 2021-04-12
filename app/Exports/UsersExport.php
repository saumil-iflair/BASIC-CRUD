<?php

namespace App\Exports;

use App\RegisterData;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class UsersExport implements FromCollection,WithHeadings,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings():array
	{
		return[
            "id",
			"name",
			"email",
			"phone",
            "address",
            "created_at",
            "updated_at",
		];
	}
    public function collection()
    {
        return RegisterData::all();
    }
}
