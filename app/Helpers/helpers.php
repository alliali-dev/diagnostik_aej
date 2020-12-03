<?php
/**
 * Created by PhpStorm.
 * Users: Achija
 * Date: 10/13/17
 * Time: 6:28 AM
 */


use App\Models\Rencontre;

if( ! function_exists('getagencesession') ) {
        function getagencesession(){
            $session = session()->get('orig_agence');
            return $session;
        }
    }

if( ! function_exists('first_rencontre') ) {
    function first_rencontre($id){
        $rencontre = Rencontre::where('suivirencontre_id',$id)->first();
        return $rencontre;
    }
}


