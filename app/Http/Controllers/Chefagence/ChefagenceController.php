<?php

namespace App\Http\Controllers\Chefagence;

use App\Http\Controllers\Controller;
use App\Models\Rencontre;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ChefagenceController extends Controller
{
    public function rencontre1()
    {
        return view('chefagence.rencontre1');
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
