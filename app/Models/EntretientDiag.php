<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class EntretientDiag extends Model
{
    use HasFactory;

    protected $table = 'entretient_diags';
    protected $fillable = ['matriculeaej','nomprenom','sexe','niveauformaion','niveauexperience',
                            'adeqormaexper', 'conmetieractiv', 'adqformmetieractiv', 'adqexpmetieractiv',
                            'maitoutrechempl', 'conexigmarch', 'depdossent', 'user_id', 'agence_id'
                            ];

    protected $casts = [
        'matriculeaej' => 'string',
        'nomprenom' => 'string',
        'sexe' => 'string' ,
        'niveauformaion' => 'string',
        'niveauexperience' => 'string',
        'adeqormaexper' => 'string',
        'conmetieractiv' => 'string',
        'adqformmetieractiv' => 'string' ,
        'adqexpmetieractiv' => 'string',
        'maitoutrechempl' => 'string',
        'conexigmarch' => 'string',
        'depdossent' => 'string',
        'user_id' => 'integer',
        'agence_id' => 'integer'
        ];

    public function scopeMine(Builder $query)
    {
        if(auth()->user()->hasRole('SuperAdmin')){
            return $query;
        }elseif(auth()->user()->hasRole('CAgence')){
            return $query->where('agence_id',  session()->get('orig_agence'));
        }elseif(auth()->user()->hasRole('CEmploi')){
            return $query->where('agence_id',  session()->get('orig_agence'))
                ->where('user_id',  Auth::id());
        }
    }
}
