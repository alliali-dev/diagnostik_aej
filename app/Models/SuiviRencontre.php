<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuiviRencontre extends Model
{
    use HasFactory;

    protected $table = 'suivi_rencontres';

    protected $fillable = ['sexe','datenaisance','age','naturepiece','npiece','nationalite','contact',
                            'lieudereisdence','diplome','specialitediplome','anneediplome','niveaudetude','user_id',
                            'agence_id'
        ];
    protected $casts = [
        'sexe'          => 'string',
        'datenaisance'  => 'date',
        'age'           => 'integer',
        'naturepiece'   => 'string',
        'npiece'        => 'string',
        'nationalite'   => 'string',
        'contact'       => 'string',
        'lieudereisdence' => 'string',
        'diplome'           => 'string',
        'specialitediplome' => 'string',
        'anneediplome'      => 'string',
        'niveaudetude'      => 'string',
        'user_id'           => 'string',
        'agence_id'         => 'integer',
    ];
}
