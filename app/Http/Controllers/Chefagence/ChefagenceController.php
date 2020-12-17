<?php

namespace App\Http\Controllers\Chefagence;

use App\Http\Controllers\Controller;
use App\Models\Rencontre;
use App\Models\SuiviRencontre;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Yajra\DataTables\Facades\DataTables;

class ChefagenceController extends Controller
{
    public function rencontre1()
    {
        $typerencontres = [
            ['name' => '1ere rencontre','id' => 1],
            ['name' => '2eme rencontre','id' => 2],
            ['name' => '3eme rencontre','id' => 3],
            ['name' => '4eme rencontre','id' => 4],
            ['name' => '5eme rencontre','id' => 5],
        ];

        $cemplois = User::where('agence_id', session()->get('orig_agence'))->get();
        return view('chefagence.rencontre1',compact('cemplois','typerencontres'));
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

        $data = [];

        $suiviedata = Rencontre::where('agence_id',  session()->get('orig_agence'));

        if($typerencontre != null)
            $suiviedata->where('typerencontre',$typerencontre);
        if($cemploi != null)
            $suiviedata->where('user_id', $cemploi);
        if($datedebut != null && $datefin != null)
            $suiviedata->whereBetween('created_at', [$datedebut." 00:00:00",$datefin." 23:59:59"]);


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
                ->rawColumns(['conseillerreferent'])
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
                ->rawColumns(['conseillerreferent'])
                ->make(true);
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
                ->rawColumns(['conseillerreferent'])
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
                ->rawColumns(['conseillerreferent'])
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
                ->rawColumns(['conseillerreferent'])
                ->make(true);
        }
    }
}
