<?php

namespace App\Exports;

use App\Models\Rencontre;
use Maatwebsite\Excel\Concerns\FromCollection;

class Rencontre2Export implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Rencontre::mine()
            ->where('typerencontre', 2)
            ->where('status',false);
    }
}
