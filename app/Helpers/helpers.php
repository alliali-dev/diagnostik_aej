<?php
/**
 * Created by PhpStorm.
 * Users: Achija
 * Date: 10/13/17
 * Time: 6:28 AM
 */

use App\Models\Anneescolaire;
use App\Models\Ecole;

/**
 * @param $mediaId
 * @return \Spatie\MediaLibrary\Media
 */

    if( ! function_exists('selected_annee') ) {
        function selected_annee(){
            $selected = Anneescolaire::where('platform', 'academic')->where('active', true)->first();
            return $selected->id;
        }
    }

    if( ! function_exists('get_annee_name') ) {
        function get_annee_name(){
            $selected = Anneescolaire::where('platform', 'academic')->where('active', true)->first();
            return $selected->anneescolaire;
        }
    }

if( ! function_exists('getanneename_byid') ) {
    function getanneename_byid($id){
        $selected = Anneescolaire::findOrfail($id);
        return $selected->anneescolaire;
    }
}

    if( ! function_exists('getselected_ecole') ) {
        function getselected_ecole(){
            $selected = Ecole::where('id', Auth()->user()->ecole_id)->first();
            return $selected->id;
        }
    }

    if( ! function_exists('getselected_ecole_name') ) {
        function getselected_ecole_name(){
            $selected = Ecole::where('id', Auth()->user()->ecole_id)->first();
            return $selected->nometab;
        }
    }

if( ! function_exists('getecolename_byid') ) {
    function getecolename_byid($id){
        $selected = Ecole::findOrfail($id);
        return $selected->nometab;
    }
}

    if( ! function_exists('selected_ecole') ) {
        function selected_ecole($code){

            $sltecole = Ecole::where('active', true)->first();

            if ($sltecole) {
                $sltecole->active = false;
                $sltecole->save();
            }

            $academic = Ecole::where('code', $code)->first();
            $academic->active = true;
            $academic->save();
            return [true];
        }
    }

    if( ! function_exists('list_academic') ) {
        function list_academic(){
            $selected = Anneescolaire::where('platform', 'academic')->where('active', true)->first();
            $academics = Anneescolaire::pluck('anneescolaire','id')->prepend($selected->anneescolaire,'0');
            return $academics;
        }
    }


    if( ! function_exists('list_ecoles') ) {
        function list_ecoles(){
            $ecoles = Ecole::pluck('nometab','id')->prepend('Choisir Etablissement','0');
            return $ecoles;
        }
    }

