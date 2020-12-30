<?php

namespace App\Http\Controllers\Verif;

use App\Http\Controllers\Controller;
use App\Models\EntretientDiag;
use Illuminate\Http\Request;

class VerifierController extends Controller
{
    public function verifAejEntretien(){
        $matriculeaej = \request('matriculeaej');
        $entretiendiag = EntretientDiag::where('matriculeaej',$matriculeaej)->first();
        return compact('entretiendiag');
    }
}
