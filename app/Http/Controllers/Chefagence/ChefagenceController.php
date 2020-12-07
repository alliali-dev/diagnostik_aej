<?php

namespace App\Http\Controllers\Chefagence;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChefagenceController extends Controller
{
    public function rencontre1()
    {
        return view('chefagence.rencontre1');
    }

    public function rencontre2()
    {
        return view('chefagence.rencontre2');
    }

    public function rencontre3()
    {
        return view('chefagence.rencontre3');
    }

    public function rencontre4()
    {
        return view('chefagence.rencontre4');
    }

    public function rencontre5()
    {
        return view('chefagence.rencontre5');
    }
}
