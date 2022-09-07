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
                            'maitoutrechempl', 'conexigmarch', 'depdossent', 'user_id', 'agence_id',
                            'file_guide_entretient','file_grille_diagnostic','state'
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
        'agence_id' => 'integer',
        'file_guide_entretient' => 'string',
        'file_grille_diagnostic' => 'string'
        ];

    public function scopeMine(Builder $query)
    {
        if(auth()->user()->hasRole('Super Admin')){
            return $query;
        } elseif(auth()->user()->hasRole('Chef Agence')){
            return $query->where('agence_id',  session()->get('orig_agence'));
        } elseif(auth()->user()->hasRole('Conseiller') || auth()->user()->hasRole('Assistant Conseiller') || auth()->user()->hasRole('Conseiller Emploi Junior')){
            return $query->where('agence_id',  session()->get('orig_agence'))
                ->where('user_id',  Auth::id());
        }
    }

    public function conseiller(){
       return $this->belongsTo(User::class,'user_id','id');
    }

    public function suivi(){
        return $this->hasMany(SuiviRencontre::class,'matricule_aej','matriculeaej');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
