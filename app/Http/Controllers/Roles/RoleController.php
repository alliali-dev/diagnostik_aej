<?php

namespace App\Http\Controllers\Roles;

use App\Http\Controllers\Controller;
use App\Models\Agence;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('role:Admin')->except(['logoutAs']);
    }

    public function index(){
        $roles = Role::get();
        return view('users.roles.index',compact('roles'));
    }

    public function store(Request $request){
        if(!$request->name){
            Flashy::error('ajouter un nom');
            return back();
        }

        try {
            Role::create($request->all());
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
        $role = Role::findById($request->id);
        if($role){
            $role->update($request->all());
            Flashy::success('Modification effectue');
        }
        return back();
    }

    public function destroy(Request $request)
    {
        try {
            Role::destroy($request->id);
        } catch (\Exception $exception) {
            Flashy::error('Suppression interrompu');
        }
        Flashy::success('Roles efface');
        return back();
    }

}
