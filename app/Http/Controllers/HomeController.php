<?php

namespace App\Http\Controllers;

use App\Models\Rencontre;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $rencontres = Rencontre::mine();
       // dd($rencontres->where('axetravail','FCQ')->count());
        return view('home',compact('rencontres'));
    }
}
