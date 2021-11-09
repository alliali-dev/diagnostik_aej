<?php

namespace App\Exports;

use App\Models\Rencontre;
//use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\User;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RencontreFilterByRencontre implements FromQuery,WithHeadings
{
    use Exportable;

    private $modalite;
    private $axetravail;
    private $approche;
    private $typerencontre;
    private $user_id;
    private $datefin;
    private $datedebut;

    /**
    * @return RencontreFilterByRencontre
    */

    public function forModalite($modalite)
    {
        $this->modalite = $modalite;
        return $this;
    }

    public function forAxetravail($axetravail)
    {
        $this->axetravail = $axetravail;
        return $this;
    }

    public function forApproche($approche)
    {
        $this->approche = $approche;
        return $this;
    }

    public function forTyperencontre($typerencontre)
    {
        $this->typerencontre = $typerencontre;
        return $this;
    }

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


    public function query()
    {
        $data = array();
        $suiviedata = Rencontre::where('agence_id',  session()->get('orig_agence'));

        if ($this->modalite != null)
            $suiviedata->where('modalite',$this->modalite);
        if ($this->axetravail != null)
            $suiviedata->where('axetravail',$this->axetravail);
        if ($this->approche != null)
            $suiviedata->where('approche',$this->approche);
        if($this->typerencontre != null)
            $suiviedata->where('typerencontre',$this->typerencontre);
        if($this->user_id != null)
            $suiviedata->where('user_id', $this->user_id);
        if($this->datedebut != null && $this->datefin != null)
            $suiviedata->whereBetween('dateprochainrdv', [$this->datedebut." 00:00:00",$this->datefin." 23:59:59"]);

        foreach($suiviedata->get() as $item){
            $data[]=[
                'id'                => $item->suivirencontre_id,
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

        return $suiviedata->get();
    }

    public function headings(): array
    {
        return [
            'id',
            'matricule_aej',
            'nomprenom',
            'sexe',
            'lieudereisdence',
            'diplome',
            'dureerencontre',
            'dateprochainrdv',
            'axetravail',
            'conseiller'
            ];
    }
}
