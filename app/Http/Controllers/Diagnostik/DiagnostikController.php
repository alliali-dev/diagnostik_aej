<?php

namespace App\Http\Controllers\Diagnostik;

use App\Http\Controllers\Controller;
use App\Models\Agence;
use App\Models\Commune;
use App\Models\Niveauetude;
use App\Models\Rencontre;
use App\Models\Specialite;
use App\Models\SuiviRencontre;
use Carbon\Carbon;
use Database\Seeders\NiveauetudeSeeder;
use Illuminate\Http\Request;
use Illuminate\View\View;
use MercurySeries\Flashy\Flashy;
use Yajra\DataTables\Facades\DataTables;

class DiagnostikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function autocomVille(Request $request){
        $search = $request->search;

        if($search == ''){
            $communes = Commune::orderby('nom','asc')->select('id','nom')->limit(10)->get();
        }else{
            $communes = Commune::orderby('nom','asc')->select('id','nom')->where('nom', 'like', '%' .$search . '%')->limit(10)->get();
        }
        $response = array();
        foreach($communes as $commune){
            $response[] = array("value"=> $commune->id,"label"=> strtoupper($commune->nom) );
        }
        return response()->json($response);
    }

    public function autocomSpecialite(Request $request){
        $search = $request->search;

        if($search == ''){
            $specialites = Specialite::orderby('libelle','asc')->select('id','libelle')->limit(10)->get();
        }else{
            $specialites = Specialite::orderby('libelle','asc')->select('id','libelle')->where('libelle', 'like', '%' .$search . '%')->limit(10)->get();
        }
        $response = array();
        foreach($specialites as $specialite){
            $response[] = array("value"=> $specialite->id,"label"=> strtoupper($specialite->libelle) );
        }
        return response()->json($response);
    }

    public function autocomNiveauEtude(Request $request){
        $search = $request->search;

        if($search == ''){
            $specialites = Niveauetude::orderby('libelle','asc')->select('id','libelle')->limit(10)->get();
        }else{
            $specialites = Niveauetude::orderby('libelle','asc')->select('id','libelle')->where('libelle', 'like', '%' .$search . '%')->limit(10)->get();
        }
        $response = array();
        foreach($specialites as $specialite){
            $response[] = array("value"=> $specialite->id,"label"=> strtoupper($specialite->libelle) );
        }
        return response()->json($response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $date_now = date('Y');
        for($i = 1960; $i <= $date_now ;$i ++){
            $data[] = ['dateannee'=> $i];
        }

        $niveauetudes = Niveauetude::orderby('libelle','asc')->select('id','libelle')->get();
        $specialites = Specialite::orderby('libelle','asc')->select('id','libelle')->get();
        $communes = Commune::orderby('nom','asc')->select('id','nom')->get();


        return view('diagnostic.create',compact('data','niveauetudes','specialites','communes'));
        //
    }

    public function getRec1(Request $request)
    {
        if ($request->ajax()) {
            $data = Rencontre::mine()
                ->where('typerencontre', 1)
                ->where('status',false);

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '';
                    $end_date = Carbon::parse($row->dateprochainrdv);
                    $endOutput = $end_date->diff(\Carbon\Carbon::now())->format('rdv dans %d jr %h hr');

                    if($row->dateprochainrdv->isFuture()){
                        $actionBtn .= '<span class="badge badge-success mr-1" style="font-size: small;">
                                            '.$endOutput.'
                                            </span>';
                        $actionBtn .= ' <button class="btn btn-info btn-rounded"
                                                                data-toggle="modal"
                                                                data-target="#traiter2rdv"
                                                                data-suivirencontre_id="'.$row->suivirencontre->id.'"
                                                                data-rencontre_id="'.$row->id .'"
                                                                data-typerencontre="2"
                                                                data-presencedemandeur="SANS-RDV"
                                                                >Edit 2eme sans-rdv
                                                            <i class="feather icon-edit"></i>
                                                        </button>';
                    }else{
                        $actionBtn .=' <button class="btn btn-primary btn-rounded"
                                                                data-toggle="modal"
                                                                data-target="#traiter2rdv"
                                                                data-suivirencontre_id="'.$row->suivirencontre->id.'"
                                                                data-rencontre_id="'.$row->id .'"
                                                                data-typerencontre="2"
                                                                >Traiter 2eme RDV
                                                            <i class="feather icon-edit"></i>
                                                        </button>';

                    }
                    return $actionBtn;
                })
                ->editColumn('matricule_aej', function ($row){
                    $matricule_aej = $row->suivirencontre->matricule_aej ;
                    return $matricule_aej;
                })
                ->editColumn('nomprenom', function ($row){
                    $nomprenom = $row->suivirencontre->nomprenom ;
                    return $nomprenom;
                })
                ->editColumn('sexe', function ($row){
                    $sexe = $row->suivirencontre->sexe ;
                    return $sexe;
                })
                ->editColumn('lieudereisdence', function ($row){
                    $lieudereisdence = $row->suivirencontre->lieudereisdence ;
                    return $lieudereisdence;
                })
                ->editColumn('diplome', function ($row){
                    $diplome = $row->suivirencontre->diplome ;
                    return $diplome;
                })
                ->editColumn('dateprochainrdv', function ($row){
                    $dateprochainrdv = Carbon::parse($row->dateprochainrdv);
                    return $dateprochainrdv->format('M d, Y');
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }



    public function getRec2(Request $request)
    {
        if ($request->ajax()) {
            $data = Rencontre::mine()
                ->where('typerencontre', 2)
                ->where('status',false);

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '';
                    $end_date = Carbon::parse($row->dateprochainrdv);
                    $endOutput = $end_date->diff(\Carbon\Carbon::now())->format('rdv dans %d jr %h hr');

                    if($row->dateprochainrdv->isFuture()){
                        $actionBtn .= '<span class="badge badge-success mr-1" style="font-size: small;">
                                            '.$endOutput.'
                                            </span>';

                        $actionBtn .= '<button class="btn btn-info btn-rounded"
                                                                data-toggle="modal"
                                                                data-target="#traiter3rdv"
                                                                data-suivirencontre_id="'.$row->suivirencontre->id.'"
                                                                data-rencontre_id="'.$row->id .'"
                                                                data-typerencontre="3"
                                                                data-presencedemandeur="SANS-RDV"
                                                                >Edit 3e sans-rdv
                                                            <i class="feather icon-edit"></i>
                                                        </button>';
                    }else{
                        $actionBtn .=' <button class="btn btn-primary btn-rounded"
                                                                data-toggle="modal"
                                                                data-target="#traiter3rdv"
                                                                data-suivirencontre_id="'.$row->suivirencontre->id.'"
                                                                data-rencontre_id="'.$row->id .'"
                                                                data-typerencontre="3"
                                                                >Traiter 3e RDV
                                                            <i class="feather icon-edit"></i>
                                                        </button>';

                    }
                    return $actionBtn;
                })
                ->editColumn('matricule_aej', function ($row){
                    $matricule_aej = $row->suivirencontre->matricule_aej ;
                    return $matricule_aej;
                })
                ->editColumn('nomprenom', function ($row){
                    $nomprenom = $row->suivirencontre->nomprenom ;
                    return $nomprenom;
                })
                ->editColumn('sexe', function ($row){
                    $sexe = $row->suivirencontre->sexe ;
                    return $sexe;
                })
                ->editColumn('lieudereisdence', function ($row){
                    $lieudereisdence = $row->suivirencontre->lieudereisdence ;
                    return $lieudereisdence;
                })
                ->editColumn('diplome', function ($row){
                    $diplome = $row->suivirencontre->diplome ;
                    return $diplome;
                })
                ->editColumn('dateprochainrdv', function ($row){
                    $dateprochainrdv = Carbon::parse($row->dateprochainrdv);
                    return $dateprochainrdv->format('M d, Y');
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function getRec3(Request $request)
    {
        if ($request->ajax()) {
            $data = Rencontre::mine()
                ->where('typerencontre', 3)
                ->where('status',false);

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '';
                    $end_date = Carbon::parse($row->dateprochainrdv);
                    $endOutput = $end_date->diff(\Carbon\Carbon::now())->format('rdv dans %d jr %h hr');

                    if($row->dateprochainrdv->isFuture()){
                        $actionBtn .= '<span class="badge badge-success mr-1" style="font-size: small;">
                                            '.$endOutput.'
                                            </span>';
                        $actionBtn .= '<button class="btn btn-info btn-rounded"
                                                                data-toggle="modal"
                                                                data-target="#traiter4rdv"
                                                                data-suivirencontre_id="'.$row->suivirencontre->id.'"
                                                                data-rencontre_id="'.$row->id .'"
                                                                data-typerencontre="4"
                                                                data-presencedemandeur4="SANS-RDV"
                                                                >4e sans-rdv
                                                            <i class="feather icon-edit"></i>
                                                        </button>';
                    }else{
                        $actionBtn .=' <button class="btn btn-primary btn-rounded"
                                                                data-toggle="modal"
                                                                data-target="#traiter4rdv"
                                                                data-suivirencontre_id="'.$row->suivirencontre->id.'"
                                                                data-rencontre_id="'.$row->id .'"
                                                                data-typerencontre="4"
                                                                >Traiter 4eme RDV
                                                            <i class="feather icon-edit"></i>
                                                        </button>';

                    }
                    return $actionBtn;
                })
                ->editColumn('matricule_aej', function ($row){
                    $matricule_aej = $row->suivirencontre->matricule_aej ;
                    return $matricule_aej;
                })
                ->editColumn('nomprenom', function ($row){
                    $nomprenom = $row->suivirencontre->nomprenom ;
                    return $nomprenom;
                })
                ->editColumn('sexe', function ($row){
                    $sexe = $row->suivirencontre->sexe ;
                    return $sexe;
                })
                ->editColumn('lieudereisdence', function ($row){
                    $lieudereisdence = $row->suivirencontre->lieudereisdence ;
                    return $lieudereisdence;
                })
                ->editColumn('diplome', function ($row){
                    $diplome = $row->suivirencontre->diplome ;
                    return $diplome;
                })
                ->editColumn('dateprochainrdv', function ($row){
                    $dateprochainrdv = Carbon::parse($row->dateprochainrdv);
                    return $dateprochainrdv->format('M d, Y');
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function getRec4(Request $request)
    {
        if ($request->ajax()) {
            $data = Rencontre::mine()
                ->where('typerencontre', 4)
                ->where('status',false);

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '';
                    $end_date = Carbon::parse($row->dateprochainrdv);
                    $endOutput = $end_date->diff(\Carbon\Carbon::now())->format('rdv dans %d jr %h hr');

                    if($row->dateprochainrdv->isFuture()){
                        $actionBtn .= '<span class="badge badge-success mr-1" style="font-size: small;">
                                            '.$endOutput.'
                                            </span>';
                        $actionBtn .= '<button class="btn btn-info btn-rounded"
                                                                data-toggle="modal"
                                                                data-target="#traiter5rdv"
                                                                data-suivirencontre_id="'.$row->suivirencontre->id.'"
                                                                data-rencontre_id="'.$row->id .'"
                                                                data-typerencontre="5"
                                                                data-presencedemandeur="SANS-RDV"
                                                                >Edit 5e sans-rdv
                                                            <i class="feather icon-edit"></i>
                                                        </button>';
                    }else{
                        $actionBtn .=' <button class="btn btn-primary btn-rounded"
                                                                data-toggle="modal"
                                                                data-target="#traiter5rdv"
                                                                data-suivirencontre_id="'.$row->suivirencontre->id.'"
                                                                data-rencontre_id="'.$row->id .'"
                                                                data-typerencontre="5"
                                                                >Traiter 5eme RDV
                                                            <i class="feather icon-edit"></i>
                                                        </button>';

                    }
                    return $actionBtn;
                })
                ->editColumn('matricule_aej', function ($row){
                    $matricule_aej = $row->suivirencontre->matricule_aej ;
                    return $matricule_aej;
                })
                ->editColumn('nomprenom', function ($row){
                    $nomprenom = $row->suivirencontre->nomprenom ;
                    return $nomprenom;
                })
                ->editColumn('sexe', function ($row){
                    $sexe = $row->suivirencontre->sexe ;
                    return $sexe;
                })
                ->editColumn('lieudereisdence', function ($row){
                    $lieudereisdence = $row->suivirencontre->lieudereisdence ;
                    return $lieudereisdence;
                })
                ->editColumn('diplome', function ($row){
                    $diplome = $row->suivirencontre->diplome ;
                    return $diplome;
                })
                ->editColumn('dateprochainrdv', function ($row){
                    $dateprochainrdv = Carbon::parse($row->dateprochainrdv);
                    return $dateprochainrdv->format('M d, Y');
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }


    public function getRec5(Request $request)
    {
        if ($request->ajax()) {
            $data = Rencontre::mine()
                ->where('typerencontre', 5 )
                ->where('status',true);

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '';
                    return $actionBtn;
                })
                ->editColumn('matricule_aej', function ($row){
                    $matricule_aej = $row->suivirencontre->matricule_aej ;
                    return $matricule_aej;
                })
                ->editColumn('nomprenom', function ($row){
                    $nomprenom = $row->suivirencontre->nomprenom ;
                    return $nomprenom;
                })
                ->editColumn('sexe', function ($row){
                    $sexe = $row->suivirencontre->sexe ;
                    return $sexe;
                })
                ->editColumn('lieudereisdence', function ($row){
                    $lieudereisdence = $row->suivirencontre->lieudereisdence ;
                    return $lieudereisdence;
                })
                ->editColumn('diplome', function ($row){
                    $diplome = $row->suivirencontre->diplome ;
                    return $diplome;
                })
                ->editColumn('dateprochainrdv', function ($row){
                    $dateprochainrdv = Carbon::parse($row->dateprochainrdv);
                    return $dateprochainrdv->format('M d, Y');
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
        $data_demandeur = $request->demandeur;
        $data_demandeur['user_id']= auth()->id();
        $data_demandeur['agence_id']= session()->get('orig_agence');

        $data_rencontre = $request->rencontre;
        $data_rencontre['user_id']= auth()->id();
        $data_rencontre['dateprochainrdv']= $request->rencontre['dateprochainrdv'].'06:30:08';
        $data_rencontre['typerencontre']= 1;
        $data_rencontre['agence_id']= session()->get('orig_agence');

        //dd($data_demandeur,$data_rencontre);
        $suivierencontre =  SuiviRencontre::create($data_demandeur);
            if ($suivierencontre){
                $data_rencontre['suivirencontre_id'] = $suivierencontre->id;
                $rencontre = Rencontre::create($data_rencontre);
                session()->flash('success','Bien ajoute');
            }
        }catch (\Exception $e){
            //Flashy::error();
            session()->flash('warning',$e->getMessage());
        }
        return redirect()->route('diagnostik.mes_suivies');
    }

    public function store1to2rencontre(Request $request){
        try {

            $rencontre = Rencontre::findOrfail($request->rencontre_id);
            $rencontre->update(['status' => true]);

            if($rencontre){
                $data = $request->rencontre;
                $data['user_id'] = auth()->id();
                $data['dateprochainrdv'] = $request->rencontre['dateprochainrdv'] . '06:30:08';
                $data['agence_id'] = session()->get('orig_agence');
                Rencontre::create($data);
            }
            session()->flash('success', 'Bien ajoute');
        } catch (\Exception $e) {
            session()->flash('warning', $e->getMessage());
        }

        return back();
    }

    public function store2to3rencontre(Request $request){
        try {
            $rencontre = Rencontre::findOrfail($request->rencontre_id);
            $rencontre->update(['status' => true]);
            if ($rencontre) {
                $data = $request->rencontre;
                $data['user_id'] = auth()->id();
                if($data['typerencontre'] == "5"){
                    $data['status'] = true;
                }
                $data['dateprochainrdv'] = $request->rencontre['dateprochainrdv'] . '06:30:08';
                $data['agence_id'] = session()->get('orig_agence');
                Rencontre::create($data);
            }
            session()->flash('success', 'Bien ajoute');
        } catch (\Exception $e) {
            session()->flash('warning', $e->getMessage());
        }
        return back();
    }


    public function mes_suivies(){

        $rencontres1 = Rencontre::mine()
                        ->where('typerencontre', 1)
                        ->where('status',false);


        $rencontres2 = Rencontre::mine()
                        ->where('typerencontre', 2)
                        ->where('status', false);
        $rencontres3 = Rencontre::mine()
                        ->where('typerencontre', 3)
                        ->where('status', false);
        $rencontres4 = Rencontre::mine()
                        ->where('typerencontre', 4)
                        ->where('status', false);
        $rencontres5 = Rencontre::mine()
                        ->where('typerencontre', 5)
                        ->where('status', true);

        return view('diagnostic.mes_suivies',compact('rencontres1','rencontres2','rencontres3', 'rencontres4', 'rencontres5'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    public function diagnos (){
        return view('diagnostic.diagnos');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
