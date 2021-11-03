<?php

namespace App\Http\Controllers;

use App\Exports\EntretientDiagExport;
use App\Models\Commune;
use App\Models\EntretientDiag;
use App\Models\Niveauetude;
use App\Models\Specialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;

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

    public function export(){
        ob_end_clean(); // this
        ob_start();
        return Excel::download(new EntretientDiagExport, 'entretient_'.time().'.xlsx');
    }

    public function store(Request $request){
        $data = $request->all();

        $data['user_id'] = auth()->id();
        $data['agence_id'] = auth()->user()->agence_id;
        $data['matriculeaej'] = $request->demandeur["matricule_aej"];
        $data['nomprenom'] = $request->demandeur["nomprenom"];
        $data['sexe'] = $request->demandeur["sexe"];

        try {

            if ($request->file('entretient')) {
                //store file into document folder
                $file = $request->file('entretient');
                $filename = Str::slug('entretient').'_' . time() . '.' . $file->getClientOriginalExtension();
                $path = public_path('fichiers/entretient');

                if(!File::isDirectory($path)){
                    File::makeDirectory($path, 0777, true, true);
                }
                $file = $request->file('entretient');
                // enregistre le fichier sur l'emplacement $pach definit sous le nom $filename
                $file->move($path, $filename);
                $data['file_guide_entretient'] = $filename;
            }

            if ($request->file('diagnostic')) {
                //store file into document folder
                $file = $request->file('diagnostic');
                $filename = Str::slug('diagnostic').'_' . time() . '.' . $file->getClientOriginalExtension();
                $path = public_path('fichiers/diagnostic');

                if(!File::isDirectory($path)){
                    File::makeDirectory($path, 0777, true, true);
                }
                $file = $request->file('diagnostic');
                // enregistre le fichier sur l'emplacement $pach definit sous le nom $filename
                $file->move($path, $filename);

                $data['file_grille_diagnostic'] = $filename;
            }

            EntretientDiag::create($data);
            session()->flash('success','Entretien bien ajoute');

        } catch (\Exception $e){
            session()->flash('success',$e->getMessage());
        }
        return redirect()->route('entretient.index');
    }
}
