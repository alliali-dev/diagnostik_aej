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
        $entretiendiag = EntretientDiag::mine()->get();

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
            'Matricul eaej',
            'Nom & Prenom',
            'Niveau Formaion',
            'Niveau Expérience',
            'Adéquation Formation Expérience',
            'Connaissance du Métier / Activité',
            'Adéquation Formation Métier / Activité',
            'Adéquation Expérience Métier / Activité',
            'Maîtrise de l\'Outil de Recherche d\'Emploi',
            'Connaissance des Exigence du Marché',
            'Dépôt Dossier en Entreprise',
            'Conseiller'
        ];
    }

}
