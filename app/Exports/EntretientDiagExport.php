<?php

namespace App\Exports;

use App\Models\EntretientDiag;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class EntretientDiagExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = [];
        $entretiens = EntretientDiag::mine()->get();
        foreach ($entretiens as $entretien) {
            $data [] = [
               'matriculeaej'       => $entretien->matriculeaej ,
               'nomprenom'          => $entretien->nomprenom ,
               'niveauformaion'     => $entretien->niveauformaion ,
               'niveauexperience'   => $entretien->niveauexperience ,
               'adeqormaexper'      => $entretien->adeqormaexper ,
               'conmetieractiv'     => $entretien->conmetieractiv ,
               'adqformmetieractiv' => $entretien->adqformmetieractiv ,
               'adqexpmetieractiv'  => $entretien->adqexpmetieractiv ,
               'maitoutrechempl'    => $entretien->maitoutrechempl ,
               'conexigmarch'       => $entretien->conexigmarch ,
               'depdossent'         => $entretien->depdossent ,
            ];

        }
        return collect($data);
    }

    public function headings(): array
    {
        return [
            'Numero AEJ',
            'Nom & PRenom',
            'Niveau Formation',
            'Niveau Expérience',
            'Adéquation Formation Expérience',
            'Connaissance du métier / activité',
            'Adéquation formation métier / activité',
            'Adéquation expérience métier / activité',
            'Maîtrise de l\'outil de recherche d\'emploi',
            'Connaissance des exigence du marché',
            'Dépôt de dossier en entreprise',
        ];
    }
}
