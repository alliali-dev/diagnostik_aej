<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Agence;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;
use Spatie\Permission\Models\Role;

class AgenceController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('role:Admin')->except(['logoutAs']);
    }

    public function autocomplete(Request $request){
        $search = $request->search;
        if($search == ''){
            $agences = Agence::orderby('name','asc')->select('id','name')->limit(10)->get();
        }else{
            $agences = Agence::orderby('name','asc')->select('id','name')->where('name', 'like', '%' .$search . '%')->limit(10)->get();
        }
        $response = array();
        foreach($agences as $agence){
            $response[] = array("value"=> $agence->id,"label"=> $agence->name);
        }
        return response()->json($response);
    }

    public function index(){
        $agences = Agence::paginate(5);
        return view('users.agence.index',compact('agences'));
    }

    public function store(Request $request){

        if(!$request->name){
            Flashy::error('ajouter un nom');
            return back();
        }
        try {
            Agence::create($request->all());
            Flashy::success('Enregistrement effectue');
        } catch (\Exception $exception) {
            Flashy::error('Enregistrement annule');
        }
        return back();
    }

    public function update(Request $request){

        if(!$request->name){
            Flashy::error('ajouter un name');
            return back();
        }
        $role = Agence::findOrFail($request->id);
        if($role){
            $role->update($request->all());
            Flashy::success('Modification effectue');
        }
        return back();
    }

    public function destroy(Request $request)
    {
        try {
            Agence::destroy($request->id);
        } catch (\Exception $exception) {
            Flashy::error('Suppression interrompu');
        }
        Flashy::success('Roles efface');
        return back();
    }
}
