<?php

namespace App\Exports;

use App\Models\Rencontre;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Rencontre3Export implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Rencontre::mine()
            ->where('typerencontre', 3)
            ->where('status',false)->get();
    }

    public function headings(): array
    {
        return array_keys($this->collection()->first()->toArray());
    }
}
