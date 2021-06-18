<?php

namespace App\Http\Controllers\Session;

use App\Http\Controllers\Controller;
use App\Models\Agence;
use App\Models\User;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use MercurySeries\Flashy\Flashy;

class SessionController extends Controller
{
    use ThrottlesLogins;

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'destroy']);
    }

    public function create()
    {
        return view('session.create');
    }

    public function login()
    {

        $data = \request()->all();

        $messages = [
            'required' => 'Le champ :attribute est obligatoire',
        ];

        $data_src = [
            'email' => 'required|string',
            'password' => 'required|string',
        ];

        $validator = Validator::make($data, $data_src, $messages);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $user = User::where('email', request(['email']))->first();

        if(!$user){
            //Flashy::error('Aucun compte ne correspond à cet utilisateur. Veuillez contacter l\'administrateur');
            session()->flash('warning','Aucun compte ne correspond à cet utilisateur. Veuillez contacter l\'administrateur');
            return back();
        }else{

            $agence = Agence::where('code',$user->agence_id)->first();

            if (!$agence){
               // Flashy::error('Verifier votre code agence');
                session()->flash('warning','Verifier votre code agence');
                return back();
            }else{
                session()->put('orig_agence',$agence->id);
               // dd(session()->get('orig_agence'));
            }
        }

        $data = request(['email', 'password']);
        //$data['agence_id'] = $agence->id;

        if(!auth()->attempt($data)){
            //Flashy::error('Votre adresse électronique ou votre mot de passe est incorrecte');
            session()->flash('warning','Votre adresse électronique ou votre mot de passe est incorrecte');
            return back();
        }

        Flashy::success('Bienvenue');
        return redirect()->home();
    }

    public function destroy()
    {
        $this->guard()->logout();

        request()->session()->flush();
        request()->session()->regenerate();

        return redirect()->login();
    }

    public function recovery()
    {
        return view('session.recovery');
    }

    protected function guard()
    {
        return Auth::guard();
    }
}
