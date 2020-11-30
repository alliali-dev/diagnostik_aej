<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demapi extends Model
{
    use HasFactory;

    /* DB_CONNECTION=mysql
DB_HOST=prod-paas-aej.mariadb.database.azure.com
DB_PORT=3306
DB_DATABASE=db_aej_version2
DB_USERNAME=adm-aej@prod-paas-aej
DB_PASSWORD=ehswnIBj1q5uCPF4 */


    protected $fillable =[
        'matriculeaej', 'sexe', 'datenaissance', 'typepieceidentite', 'numerocni', 'telephone', 'niveauetude', 'niveauetude', 'diplome', 'nationalite'
    ];

    protected $cast = [
        "matriculeaej" => 'string',
        "sexe" => 'string',
        "datenaissance" => 'datetime',
        "typepieceidentite" => 'string',
        "numerocni" => 'string',
        "age"  => 'integer',
        "telephone" =>'string',
        "niveauetude" => 'string',
        "diplome" => 'string',
        "nationalite" => 'string'
    ];
}
