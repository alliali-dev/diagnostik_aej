<?php

namespace App\Exports;

use App\Models\EntretientDiag;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EntretientDiagChefAgence implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return EntretientDiag::mine()->get();
    }

    public function headings(): array
    {
        return array_keys($this->collection()->first()->toArray());
    }

}
