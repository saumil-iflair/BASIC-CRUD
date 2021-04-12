<?php

namespace App\Exports;

use App\Rolemanager;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class Roleexport implements FromCollection,WithHeadings,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings():array
	{
		return[
            "id",
			"role",
			"status",
		];
	}
     
    public function collection()
    {
        return Rolemanager::all();
    }
}
