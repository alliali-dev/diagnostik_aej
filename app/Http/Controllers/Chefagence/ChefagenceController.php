<?php

namespace App\Http\Controllers\Chefagence;

use App\Exports\EntretientDiagChefAgence;
use App\Exports\RencontreChefAgence;
use App\Exports\RencontreFilterByEntretient;
use App\Exports\RencontreFilterByRencontre;
use App\Http\Controllers\Controller;
use App\Models\EntretientDiag;
use App\Models\Rencontre;
use App\Models\SuiviRencontre;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class ChefagenceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('role:Admin')->except(['logoutAs']);
    }

    public function rencontre1()
    {
        $typerencontres = [
            ['name' => '1ere rencontre','id' => 1],
            ['name' => '2eme rencontre','id' => 2],
            ['name' => '3eme rencontre','id' => 3],
            ['name' => '4eme rencontre','id' => 4],
            ['name' => '5eme rencontre','id' => 5],
        ];

        $cemplois = User::mine()->where('id','!=',auth()->id())->get();
        $rencontres = Rencontre::mine()->paginate(15);
        return view('chefagence.rencontre1',compact('cemplois','typerencontres','rencontres'));
    }

    public function entretientdiag(){
        $typerencontres = [
            ['name' => '1ere rencontre',    'id' => 1],
            ['name' => '2eme rencontre',    'id' => 2],
            ['name' => '3eme rencontre',    'id' => 3],
            ['name' => '4eme rencontre',    'id' => 4],
            ['name' => '5eme rencontre',    'id' => 5],
        ];
        $cemplois = User::mine()->where('id','!=',auth()->id())->get();
        $entretiens  = EntretientDiag::mine()->paginate(15);
        return view('chefagence.entretiendiag',compact('entretiens','cemplois','typerencontres'));
    }

    public function detailDemandeur($id){
        $rencontres = Rencontre::mine()->where('suivirencontre_id',$id)->get();
        $suivie = SuiviRencontre::find($id);
        return view('demandeur.details',compact('rencontres','suivie'));
    }

    public function filter(){
        $typerencontre = \request('typerencontre');
        $cemploi = \request('cemploi');
        $datedebut = \request('datedebut');
        $datefin = \request('datefin');
        $modalite = \request('modalite');
        $axetravail = \request('axetravail');
        $approche = \request('approche');

        $data = [];

        $suiviedata = Rencontre::where('agence_id',  session()->get('orig_agence'));

        if ($modalite != null)
            $suiviedata->where('modalite',$modalite);
        if ($axetravail != null)
            $suiviedata->where('axetravail',$axetravail);
        if ($approche != null)
            $suiviedata->where('approche',$approche);
        if($typerencontre != null)
            $suiviedata->where('typerencontre',$typerencontre);
        if($cemploi != null)
            $suiviedata->where('user_id', $cemploi);
        if($datedebut != null && $datefin != null)
            $suiviedata->whereBetween('dateprochainrdv', [$datedebut." 00:00:00",$datefin." 23:59:59"]);

        foreach($suiviedata->get() as $item){
            $data[]=[
                'id'                => $item->suivirencontre_id,
                'matricule_aej'     => $item->suivirencontre->matricule_aej,
                'nomprenom'         => $item->suivirencontre->nomprenom,
                'sexe'              => $item->suivirencontre->sexe,
                'lieudereisdence'   => $item->suivirencontre->lieudereisdence,
                'diplome'           => $item->suivirencontre->diplome,
                'dureerencontre'    => $item->dureerencontre,
                'dateprochainrdv'   => Carbon::parse($item->dateprochainrdv)->format('M d, Y'),
                'axetravail'        => $item->axetravail,
                'conseiller'        => User::where('agence_id', session()->get('orig_agence'))->where('id',$item->user_id)->first()->name
            ];
        }

        return response()->json($data);
    }

    public function exportFilter(Request $request){

        $typerencontre = \request('typerencontre');
        $cemploi = \request('cemploi');
        $datedebut = \request('datedebut');
        $datefin = \request('datefin');
        $modalite = \request('modalite');
        $axetravail = \request('axetravail');
        $approche = \request('approche');

        ob_end_clean(); // this
        ob_start();

        /*return (new RencontreFilterByRencontre)
            ->forTyperencontre($typerencontre)
            ->forModalite($modalite)
            ->forAxetravail($axetravail)
            ->forApproche($approche)
            ->forUserId($cemploi)
            ->forDateDebut($datedebut)
            ->forDateFin($datefin)
            ->download('rencontre.xlsx');*/

        return  Excel::download(new RencontreChefAgence(), 'rencontre_chef_agence'.time().'.xlsx');
    }

    public function filter_entretient(){
        $cemploi = \request('cemploi');
        $datedebut = \request('datedebut');
        $datefin = \request('datefin');
        $data = [];

        $entretiendiag = EntretientDiag::where('agence_id',  session()->get('orig_agence'));

        if($cemploi != null)
            $entretiendiag->where('user_id', $cemploi);
        if($datedebut != null && $datefin != null)
            $entretiendiag->whereBetween('created_at', [$datedebut." 00:00:00",$datefin." 23:59:59"]);

        foreach($entretiendiag->get() as $item){
            $data[]=[
                'matriculeaej'      => $item->matriculeaej,
                'nomprenom'         => $item->nomprenom,
                'niveauformaion'    => $item->niveauformaion,
                'niveauexperience'  => $item->niveauexperience,
                'adeqormaexper'     => $item->adeqormaexper,
                'conmetieractiv'    => $item->conmetieractiv,
                'adqformmetieractiv'=> $item->adqformmetieractiv,
                'adqexpmetieractiv' => $item->adqexpmetieractiv,
                'maitoutrechempl'   => $item->maitoutrechempl,
                'conexigmarch'      => $item->conexigmarch,
                'depdossent'        => $item->depdossent,
                'conseiller'        => \App\Models\User::find($item->user_id)->name
            ];
        }
        return response()->json($data);
    }

    public function exportFilterEntretient(Request $request){

        $cemploi = \request('cemploi');
        $datedebut = \request('datedebut');
        $datefin = \request('datefin');
        ob_end_clean();
        ob_start();
        return  Excel::download(new EntretientDiagChefAgence(), 'entretient_chef_agence'.time().'.xlsx');
        /* return (new RencontreFilterByEntretient)
             ->forUserId($cemploi)
             ->forDateDebut($datedebut)
             ->forDateFin($datefin)
             ->download('entretient_diag.xlsx');*/
    }


    public function getAgenceRenct1(Request $request){
        if ($request->ajax()) {
            $data = Rencontre::mine()
                ->where('typerencontre', 1);

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('conseillerreferent', function($row){
                    $user = User::where('agence_id', session()->get('orig_agence'))->where('id',$row->user_id)->first();
                    $conseillerreferent = $user->name;
                    return $conseillerreferent;
                })->editColumn('matricule_aej', function ($row){
                    $matricule_aej = $row->suivirencontre->matricule_aej ;
                    return $matricule_aej;
                })
                ->editColumn('nomprenom', function ($row){
                    $nomprenom = $row->suivirencontre->nomprenom ;
                    return $nomprenom;
                })->editColumn('sexe', function ($row){
                    $sexe = $row->suivirencontre->sexe ;
                    return $sexe;
                })->editColumn('lieudereisdence', function ($row){
                    $lieudereisdence = $row->suivirencontre->lieudereisdence ;
                    return $lieudereisdence;
                })->editColumn('diplome', function ($row){
                    $diplome = $row->suivirencontre->diplome ;
                    return $diplome;
                })->editColumn('dateprochainrdv', function ($row){
                    $dateprochainrdv = Carbon::parse($row->dateprochainrdv);
                    return $dateprochainrdv->format('M d, Y');
                })->rawColumns(['conseillerreferent'])
                ->make(true);
        }
    }

    public function rencontre2()
    {
        return view('chefagence.rencontre2');
    }

    public function getAgenceRenct2(Request $request){
        if ($request->ajax()) {
            $data = Rencontre::mine()
                ->where('typerencontre', 2);

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('conseillerreferent', function($row){
                    $user = User::where('agence_id', session()->get('orig_agence'))->where('id',$row->user_id)->first();
                    $conseillerreferent = $user->name;
                    return $conseillerreferent;
                })->editColumn('matricule_aej', function ($row){
                    $matricule_aej = $row->suivirencontre->matricule_aej ;
                    return $matricule_aej;
                })->editColumn('nomprenom', function ($row){
                    $nomprenom = $row->suivirencontre->nomprenom ;
                    return $nomprenom;
                })->editColumn('sexe', function ($row){
                    $sexe = $row->suivirencontre->sexe ;
                    return $sexe;
                })->editColumn('lieudereisdence', function ($row){
                    $lieudereisdence = $row->suivirencontre->lieudereisdence ;
                    return $lieudereisdence;
                })->editColumn('diplome', function ($row){
                    $diplome = $row->suivirencontre->diplome ;
                    return $diplome;
                })->editColumn('dateprochainrdv', function ($row){
                    $dateprochainrdv = Carbon::parse($row->dateprochainrdv);
                    return $dateprochainrdv->format('M d, Y');
                })->rawColumns(['conseillerreferent'])->make(true);
        }
    }

    public function rencontre3()
    {
        return view('chefagence.rencontre3');
    }

    public function getAgenceRenct3(Request $request){
        if ($request->ajax()) {
            $data = Rencontre::mine()
                ->where('typerencontre', 3);

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('conseillerreferent', function($row){
                    $user = User::where('agence_id', session()->get('orig_agence'))->where('id',$row->user_id)->first();
                    $conseillerreferent = $user->name;
                    return $conseillerreferent;
                })->editColumn('matricule_aej', function ($row){
                    $matricule_aej = $row->suivirencontre->matricule_aej ;
                    return $matricule_aej;
                })->editColumn('nomprenom', function ($row){
                    $nomprenom = $row->suivirencontre->nomprenom ;
                    return $nomprenom;
                })->editColumn('sexe', function ($row){
                    $sexe = $row->suivirencontre->sexe ;
                    return $sexe;
                })->editColumn('lieudereisdence', function ($row){
                    $lieudereisdence = $row->suivirencontre->lieudereisdence ;
                    return $lieudereisdence;
                })->editColumn('diplome', function ($row){
                    $diplome = $row->suivirencontre->diplome ;
                    return $diplome;
                })->editColumn('dateprochainrdv', function ($row){
                    $dateprochainrdv = Carbon::parse($row->dateprochainrdv);
                    return $dateprochainrdv->format('M d, Y');
                })->rawColumns(['conseillerreferent'])
                ->make(true);
        }
    }

    public function rencontre4()
    {
        return view('chefagence.rencontre4');
    }

    public function getAgenceRenct4(Request $request){
        if ($request->ajax()) {
            $data = Rencontre::mine()
                ->where('typerencontre', 4);

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('conseillerreferent', function($row){
                    $user = User::where('agence_id', session()->get('orig_agence'))->where('id',$row->user_id)->first();
                    $conseillerreferent = $user->name;
                    return $conseillerreferent;
                })->editColumn('matricule_aej', function ($row){
                    $matricule_aej = $row->suivirencontre->matricule_aej ;
                    return $matricule_aej;
                })->editColumn('nomprenom', function ($row){
                    $nomprenom = $row->suivirencontre->nomprenom ;
                    return $nomprenom;
                })->editColumn('sexe', function ($row){
                    $sexe = $row->suivirencontre->sexe ;
                    return $sexe;
                })->editColumn('lieudereisdence', function ($row){
                    $lieudereisdence = $row->suivirencontre->lieudereisdence ;
                    return $lieudereisdence;
                })
                ->editColumn('diplome', function ($row){
                    $diplome = $row->suivirencontre->diplome ;
                    return $diplome;
                })->editColumn('dateprochainrdv', function ($row){
                    $dateprochainrdv = Carbon::parse($row->dateprochainrdv);
                    return $dateprochainrdv->format('M d, Y');
                })->rawColumns(['conseillerreferent'])
                ->make(true);
        }
    }

    public function rencontre5()
    {
        return view('chefagence.rencontre5');
    }

    public function getAgenceRenct5(Request $request){
        if ($request->ajax()) {
            $data = Rencontre::mine()
                ->where('typerencontre', 5);

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('conseillerreferent', function($row){
                    $user = User::where('agence_id', session()->get('orig_agence'))->where('id',$row->user_id)->first();
                    $conseillerreferent = $user->name;
                    return $conseillerreferent;
                })->editColumn('matricule_aej', function ($row){
                    $matricule_aej = $row->suivirencontre->matricule_aej ;
                    return $matricule_aej;
                })->editColumn('nomprenom', function ($row){
                    $nomprenom = $row->suivirencontre->nomprenom ;
                    return $nomprenom;
                })->editColumn('sexe', function ($row){
                    $sexe = $row->suivirencontre->sexe ;
                    return $sexe;
                })->editColumn('lieudereisdence', function ($row){
                    $lieudereisdence = $row->suivirencontre->lieudereisdence ;
                    return $lieudereisdence;
                })->editColumn('diplome', function ($row){
                    $diplome = $row->suivirencontre->diplome ;
                    return $diplome;
                })->editColumn('dateprochainrdv', function ($row){
                    $dateprochainrdv = Carbon::parse($row->dateprochainrdv);
                    return $dateprochainrdv->format('M d, Y');
                })->rawColumns(['conseillerreferent'])
                ->make(true);
        }
    }
}
