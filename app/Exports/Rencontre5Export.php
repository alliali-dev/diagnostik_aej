<?php

namespace App\Exports;

use App\Models\Rencontre;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Rencontre5Export implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Rencontre::mine()
            ->where('typerencontre', 5 )
            ->where('status',true)->get();
    }

    public function headings(): array
    {
        return array_keys($this->collection()->first()->toArray());
    }
}
