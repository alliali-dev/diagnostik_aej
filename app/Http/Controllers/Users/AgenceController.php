<?php

namespace App\Http\Controllers\Users;

use App\Models\Agence;
use Illuminate\Http\Request;

class AgenceController extends Controller
{
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
}
