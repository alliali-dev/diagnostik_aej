<?php

namespace App\Http\Controllers;

use App\Exports\EntretientDiagExport;
use App\Models\Commune;
use App\Models\EntretientDiag;
use App\Models\Niveauetude;
use App\Models\Specialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;

class EntretientDiagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('role:Admin')->except(['logoutAs']);
    }

    public function msg_profile(Request $request){
        /*$url        =  "http://localhost:8888/aejtechnologie/all_demandeur";
        $response   =   Http::get($url);
        $data       =   json_decode($response->body());*/
        return view('entretientdiag.msg_profile');
    }

    public function loadAllDemandeur(Request $request){
        if ($request->ajax()) {
            $url =  "http://localhost:8888/aejtechnologie/all_demandeur";
            $response   =   Http::get($url);
            $data       =   json_decode($response->body());

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){

                    $actionBtn = '';
                    $actionBtn .= '<a class="badge badge-success mr-1" href="'. route('diagnostik.create',$row->matriculeaej).'" style="font-size: small;">
                                    <i class="feather icon-arrow-right"></i>
                                    Passer entretien
                                   </a>';

                    return $actionBtn;
                })
                ->editColumn('matriculeaej', function ($row){
                    $matricule_aej = $row->matriculeaej ;
                    return $matricule_aej;
                })
                ->editColumn('nomprenom', function ($row){
                    $nomprenom = $row->nom ? $row->nom : ' '.' '. $row->prenoms ;
                    return $nomprenom;
                })
                ->editColumn('sexe', function ($row){
                    return $row->sexe->libelle;
                })
                ->editColumn('lieuhabitation', function ($row){
                    $lieuhabitation = '';
                    if($row->tlieuhabitation){
                        $lieuhabitation = $row->tlieuhabitation->nom;
                    }
                    return $lieuhabitation;
                })
                ->editColumn('niveauetude', function ($row){
                    $niveauetude = "";
                     if($row->niveauetude){
                         $niveauetude = $row->niveauetude->libelle;
                     }
                    return $niveauetude;
                })
                ->editColumn('uniteexperience', function ($row){
                    $uniteexperience = "";
                    if($row->uniteexperience){
                        $uniteexperience = $row->uniteexperience->libelle;
                    }
                    return $uniteexperience;
                })
                ->editColumn('nombreexperience', function ($row){
                    $nombreexperience = $row->nombreexperience;
                    return $nombreexperience;
                })
                ->editColumn('conseiller', function ($row){
                    $conseiller = "";
                    if($row->conseilleremploi){
                        $conseiller = $row->conseilleremploi->last_name .' '. $row->conseilleremploi->first_name ;
                    }
                    return $conseiller;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

    }

    public function index(){
        $entretiens  = EntretientDiag::mine()->paginate(15);
        return view('entretientdiag.index',compact('entretiens'));
    }

    public function create($matricule = null ){
        $demandeur = null;
        $date_now = date('Y');
        for($i = 1960; $i <= $date_now ;$i ++){
            $data[] = ['dateannee'=> $i];
        }

        $entretiendiag = EntretientDiag::where('matriculeaej',$matricule)->first();


        if($entretiendiag){
            session()->flash('warning','Numéro existe déjà');
        } else {
            $token = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9";
            $url =  "https://www.agenceemploijeunes.ci/site/demandeur_info/{$matricule}/{$token}" ;
           // $url =  "http://localhost:8888/aejtechnologie/demandeur_info/{$matricule}/{$token}";
            $response = Http::get($url);
            $demandeur = json_decode($response->body())[0];
        }

        $niveauetudes = Niveauetude::orderby('libelle','asc')->select('id','libelle')->get();
        $specialites = Specialite::orderby('libelle','asc')->select('id','libelle')->get();
        $communes = Commune::orderby('nom','asc')->select('id','nom')->get();
        //dd($demandeur);
        return view('entretientdiag.create',compact('niveauetudes','specialites','communes','data','demandeur','matricule'));
    }

    public function export(){
        ob_end_clean(); // this
        ob_start();
        return Excel::download(new EntretientDiagExport, 'entretient_'.time().'.xlsx');
    }

    public function store(Request $request){


        $validatedData_Step1 = Validator::make(
            [
                'entretient' => $request->entretient,
                'diagnostic' => $request->diagnostic,
            ],
            [
                'entretient' => 'required_if:entretient,mimes:doc,docx,pdf|max:1024',
                'diagnostic' => 'required_if:diagnostic,mimes:doc,docx,pdf|max:1024',
            ],
            [
                'entretient.mimes'          => 'la fiche d\'entretien doit être un fichier de type : pdf,doc,docx.',
                'diagnostic.mimes'          => 'la fiche d\'entretien doit être un fichier de type : pdf,doc,docx.',
                'entretient.max'            => 'Ce fichier a une taille supérieure à 1Mo.',
                'diagnostic.max'            => 'Ce fichier a une taille supérieure à 1Mo.',
            ]
        )->validate();

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
                //$file = $request->file('entretient');
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
                //$file = $request->file('diagnostic');
                // enregistre le fichier sur l'emplacement $pach definit sous le nom $filename
                $file->move($path, $filename);

                $data['file_grille_diagnostic'] = $filename;
            }

            EntretientDiag::create($data);
            session()->flash('success','Entretien bien ajoute');

        } catch (\Exception $e){
            session()->flash('success',$e->getMessage());
        }
        return redirect()->route('diagnostik.liste-attente-diagnostic');
    }
}
