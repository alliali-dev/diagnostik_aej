<?php

namespace App\Http\Controllers;

use App\Models\EntretientDiag;
use Illuminate\Http\Request;

class EntretientDiagController extends Controller
{
    public function index(){
        $entretiens  = EntretientDiag::mine()->paginate(15);
        return view('entretientdiag.index',compact('entretiens'));
    }

    public function create(){
        return view('entretientdiag.create');
    }

    public function store(Request $request){
        $data = $request->all();
        $data['user_id'] = auth()->id();
        $data['agence_id'] = auth()->user()->agence_id;
        try {
            $entretien = EntretientDiag::create($data);
            session()->flash('success','Entretien bien ajoute');

        }catch (\Exception $e){
            session()->flash('success',$e->getMessage());
        }
        return back();
    }
}
