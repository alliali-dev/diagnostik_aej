<?php

namespace App\Mail;

use App\Models\Rencontre;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RencontreShipped extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The order instance.
     *
     * @var \App\Models\Rencontre
     */
    public $rencontre;

    /**
     * Create a new message instance.
     *
     * @param  \App\Models\Rencontre  $rencontre
     * @return void
     */
    public function __construct(Rencontre $rencontre)
    {
        $this->rencontre = $rencontre;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->from('t.amia@emploijeunes.ci')->view('rencontre.mail')->with(
            [
                'dureerencontre'    =>  $this->rencontre->dureerencontre,
                'user_id'           =>  $this->rencontre->user_id,
                'agence_id'         =>  $this->rencontre->agence_id,
                'suivirencontre_id' =>  $this->rencontre->suivirencontre_id,
                'approche'          =>  $this->rencontre->approche,
                'typerencontre'     =>  $this->rencontre->typerencontre,
                'modalite'          =>  $this->rencontre->modalite,
                'axetravail'        =>  $this->rencontre->axetravail,
                'planaction'        =>  $this->rencontre->planaction,
                'dateprochainrdv'   =>  Carbon::parse($this->rencontre->dateprochainrdv),
                'observation'       =>  $this->rencontre->observation,
                'presencedemandeur' =>  $this->rencontre->presencedemandeur,
                'status'            =>  $this->rencontre->status,
                'nom'               =>  $this->rencontre->suivirencontre->nomprenom,
            ]
        );
    }
}
