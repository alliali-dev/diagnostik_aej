<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class Rencontre extends Model
{
    use HasFactory;
    protected $table = 'rencontres';
    protected $fillable = ['dureerencontre','approche','typerencontre','modalite', 'status',
                            'axetravail','planaction','dateprochainrdv','observation',
                            'user_id', 'suivirencontre_id','agence_id', 'presencedemandeur','rdvmanque',
                            'findrdv'
    ];

    protected $casts = [
        'dureerencontre'    => 'string',
        'user_id'           => 'integer',
        'agence_id'         => 'integer',
        'suivirencontre_id' => 'integer',
        'approche'          => 'string',
        'typerencontre'     => 'integer',
        'modalite'          => 'string',
        'axetravail'        => 'string',
        'planaction'        => 'string',
        'dateprochainrdv'   => 'datetime',
        'observation'       => 'string',
        'presencedemandeur' => 'string',
        'status'            => 'boolean',
        'rdvmanque'         => 'integer',
        'findrdv'           => 'boolean'
    ];

    public function scopeMine(Builder $query)
    {
        // if(auth()->user()->hasRole('SuperAdmin')){
        //     return $query;
        // }elseif(auth()->user()->hasRole('CAgence')){
        //     return $query->where('agence_id',  session()->get('orig_agence'));
        // }elseif(auth()->user()->hasRole('CEmploi')){
        //     return $query->where('agence_id',  session()->get('orig_agence'))
        //         ->where('user_id',  Auth::id());
        // }
        return $query->where('user_id',  Auth::id());
    }

    public function suivirencontre(){
        return $this->belongsTo( SuiviRencontre::class);
    }

}
