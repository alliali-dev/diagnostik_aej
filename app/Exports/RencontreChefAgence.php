<?php

namespace App\Exports;

use App\Models\Rencontre;
use App\Models\User;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RencontreChefAgence implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $entretiendiag  = Rencontre::mine()->get();
        $data = [];
        foreach($entretiendiag as $item){
            $data[]=[
                'matricule_aej'     => $item->suivirencontre->matricule_aej,
                'nomprenom'         => $item->suivirencontre->nomprenom,
                'sexe'              => $item->suivirencontre->sexe,
                'lieudereisdence'   => $item->suivirencontre->lieudereisdence,
                'diplome'           => $item->suivirencontre->diplome,
                'dureerencontre'    => $item->dureerencontre,
                'dateprochainrdv'   => Carbon::parse($item->dateprochainrdv)->format('M d, Y'),
                'axetravail'        => $item->axetravail,
                'conseiller'        => User::where('agence_id', session()->get('orig_agence'))->where('id',$item->user_id)->first()->name
            ];
        }
        //return Rencontre::mine()->get();
        return collect($data);
    }

    public function headings(): array
    {
        return [
            'Matricule AEJ',
            'NOM PRENOM',
            'SEXE',
            'COMMUNE',
            'DIPLOME',
            'DUREE (h:m:s:ms)',
            'DATE RDV',
            'AXE TRAVAIL',
            'CONSEILLER REFERENT'
        ];

    }

    /*public function headings(): array
    {
        return array_keys($this->collection()->first()->toArray());
    }*/
}
