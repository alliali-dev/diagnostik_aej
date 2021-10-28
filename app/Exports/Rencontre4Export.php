<?php

namespace App\Exports;

use App\Models\Rencontre;
use Maatwebsite\Excel\Concerns\FromCollection;

class Rencontre4Export implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Rencontre::mine()
            ->where('typerencontre', 4)
            ->where('status',false);
    }
}
