<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class SuiviRencontre extends Model
{
    use HasFactory;

    protected $table = 'suivi_rencontres';

    protected $fillable = ['sexe','datenaisance','nomprenom','age','naturepiece','npiece','nationalite','contact',
                            'lieudereisdence','diplome','specialitediplome','anneediplome','niveaudetude','user_id',
                            'agence_id'
        ];
    protected $casts = [
        'sexe'          => 'string',
        'nomprenom'     => 'string',
        'datenaisance'  => 'date',
        'age'           => 'integer',
        'naturepiece'   => 'string',
        'npiece'        => 'string',
        'nationalite'   => 'string',
        'contact'       => 'string',
        'lieudereisdence'   => 'string',
        'diplome'           => 'string',
        'specialitediplome' => 'string',
        'anneediplome'      => 'string',
        'niveaudetude'      => 'string',
        'user_id'           => 'string',
        'agence_id'         => 'integer',
    ];

    public function scopeMine(Builder $query)
    {
        if(auth()->user()->hasRole('SuperAdmin')){
            return $query;
        }elseif(auth()->user()->hasRole('CAgence')){
            return $query->where('agence_id',  session()->get('orig_agence'))
                ->get();
        }elseif(auth()->user()->hasRole('CEmploi')){
            return $query->where('agence_id',  session()->get('orig_agence'))
                ->where('user_id',  Auth::id())
                ->get();
        }
    }

    public function user(){
        return $this->belongsTo( User::class);
    }
    public function agence(){
        return $this->belongsTo( Agence::class);
    }
    public function rencontre(){
        return $this->hasMany( Rencontre::class);
    }
}
