<?php
/**
 * Created by PhpStorm.
 * Users: Achija
 * Date: 10/13/17
 * Time: 6:28 AM
 */



    if( ! function_exists('getagencesession') ) {
        function getagencesession(){
            $session = session()->get('orig_agence');
            return $session;
        }
    }


