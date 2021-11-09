<?php

namespace App\Exports;

use App\Models\EntretientDiag;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RencontreFilterByEntretient implements FromQuery,WithHeadings
{
    use Exportable;
    public function forUserId($user_id)
    {
        $this->user_id = $user_id;
        return $this;
    }

    public function forDateDebut($datedebut)
    {
        $this->datedebut = $datedebut;
        return $this;
    }

    public function forDateFin($datefin)
    {
        $this->datefin = $datefin;
        return $this;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        $data = [];
        $entretiendiag = EntretientDiag::where('agence_id',  session()->get('orig_agence'));
        if($this->user_id != null)
            $entretiendiag->where('user_id', $this->user_id);
        if($this->datedebut != null && $this->datefin != null)
            $entretiendiag->whereBetween('created_at', [$this->datedebut." 00:00:00",$this->datefin." 23:59:59"]);

        foreach($entretiendiag->get() as $item){
            $data[]=[
                'matriculeaej'      => $item->matriculeaej,
                'nomprenom'         => $item->nomprenom,
                'niveauformaion'    => $item->niveauformaion,
                'niveauexperience'  => $item->niveauexperience,
                'adeqormaexper'     => $item->adeqormaexper,
                'conmetieractiv'    => $item->conmetieractiv,
                'adqformmetieractiv'=> $item->adqformmetieractiv,
                'adqexpmetieractiv' => $item->adqexpmetieractiv,
                'maitoutrechempl'   => $item->maitoutrechempl,
                'conexigmarch'      => $item->conexigmarch,
                'depdossent'        => $item->depdossent,
                'conseiller'        => \App\Models\User::find($item->user_id)->name
            ];
        }
        return collect($data);
    }

    public function headings(): array
    {
        return [
            'matriculeaej',
            'nomprenom',
            'niveauformaion',
            'niveauexperience',
            'adeqormaexper',
            'conmetieractiv',
            'adqformmetieractiv',
            'adqexpmetieractiv',
            'maitoutrechempl',
            'conexigmarch',
            'depdossent',
            'conseiller'
        ];
    }
}
