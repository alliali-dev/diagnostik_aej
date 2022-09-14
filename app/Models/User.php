<?php

namespace App\Models;

use App\Http\Controllers\Users\AgenceController;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'agence_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
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

    public function agence(){
        return $this->belongsTo( Agence::class);
    }

    public function rencontres() {
        return $this->hasMany(Rencontre::class);
    }

    public function suivirencontres() {
        return $this->hasMany(SuiviRencontre::class);
    }

    public function entretientdiags(){
        return $this->belongsToMany('User', 'entretient_diags','user_id', 'entretient_diag_id');

    }
    public function entretientdiag(){
        return $this->belongsToMany(User::class, 'entretient_diags','entretient_diag_id','user_id');

    }
}
