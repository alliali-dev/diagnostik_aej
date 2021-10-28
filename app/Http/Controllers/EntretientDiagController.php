<?php

namespace App\Http\Controllers;

use App\Models\Commune;
use App\Models\EntretientDiag;
use App\Models\Niveauetude;
use App\Models\Specialite;
use Illuminate\Http\Request;

class EntretientDiagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('role:Admin')->except(['logoutAs']);
    }

    public function index(){
        $entretiens  = EntretientDiag::mine()->paginate(15);
        return view('entretientdiag.index',compact('entretiens'));
    }

    public function create(){
        $date_now = date('Y');
        for($i = 1960; $i <= $date_now ;$i ++){
            $data[] = ['dateannee'=> $i];
        }

        $niveauetudes = Niveauetude::orderby('libelle','asc')->select('id','libelle')->get();
        $specialites = Specialite::orderby('libelle','asc')->select('id','libelle')->get();
        $communes = Commune::orderby('nom','asc')->select('id','nom')->get();
        return view('entretientdiag.create',compact('niveauetudes','specialites','communes','data'));
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
        return redirect()->route('entretient.index');
    }
}
