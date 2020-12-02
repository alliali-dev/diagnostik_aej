<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rencontre extends Model
{
    use HasFactory;
    protected $table = 'rencontres';
    protected $fillable = ['dureerencontre','approche','typerencontre','modalite',
                            'axetravail','planaction','dateprochainrdv','observation',
                            'user_id', 'suivirencontre_id','agence_id'];

    protected $casts = [
        'dureerencontre' => 'integer',
        'user_id' => 'integer',
        'agence_id'         => 'integer',
        'suivirencontre_id' => 'integer',
        'approche' => 'string',
        'typerencontre' => 'integer',
        'modalite' => 'string',
        'axetravail' => 'string',
        'planaction' => 'string',
        'dateprochainrdv' => 'date',
        'observation' => 'string',
    ];
}
