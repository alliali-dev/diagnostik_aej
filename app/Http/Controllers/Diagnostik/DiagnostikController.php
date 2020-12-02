<?php

namespace App\Http\Controllers\Diagnostik;

use App\Http\Controllers\Controller;
use App\Models\Agence;
use App\Models\Commune;
use App\Models\Niveauetude;
use App\Models\Specialite;
use Database\Seeders\NiveauetudeSeeder;
use Illuminate\Http\Request;
use Illuminate\View\View;

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
        return view('diagnostic.create',compact('data'));
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
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
