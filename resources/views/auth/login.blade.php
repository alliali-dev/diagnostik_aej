@extends('auth.main')
@section('title') Login @endsection
@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            {{--                <strong>Whoops!</strong> There were some problems with your input.<br><br>--}}
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="wrap-login100 p-t-190 p-b-30">
        <form class="login100-form validate-form" method="POST" action="{{ route('session.login') }}">
            @csrf
            {{--<div class="login100-form-avatar">
            </div>--}}
            <div>
                <img src="{{ asset('app-assets/images/logo/logo_aej.png') }}" style="margin-left: 80px;" alt="AVATAR">
            </div>
            <span class="login100-form-title p-t-20 p-b-45">
                Espace de Connexion
            </span>
            <div class="wrap-input100 validate-input m-b-10" data-validate="Le nom d'utilisateur est requis">
                <input class="input100 @error('email') is-invalid @enderror" type="text" name="email" placeholder="Email">
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-user"></i>
                </span>
            </div>
            <div class="wrap-input100 validate-input m-b-10" data-validate="Le mot de passe est requis">
                <input class="input100" type="password" name="password" placeholder="Mot de passe">
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-lock"></i>
                </span>
            </div>
            <button type="submit" style="border-radius:25px;width:100%;height:50px; background-color: #039F61" class="btn btn-info btn-block btn-ivory float-right btn-round">
                {{ __('Se connecter') }}
            </button>
        </form>
    </div>
@endsection
@section('css')
    @include('layouts.styles')
    <style>
        .btn-ivory {
            border-color: #039F61 !important;
            background-color: #F78003 !important;
            color: #FFFFFF;
        }
        .loginbtn:hover{
            background:0 0;
            color:#fff
        }

        .loginbtn:hover:before{
            opacity:1
        }
        .loginbtn{
            font-family:Montserrat-Bold;
            font-size:15px;
            line-height:1.5;
            color:#e0e0e0;
            width:100%;
            height:50px;
            border-radius:25px;
            background:#F78003;
            display:-webkit-box;
            display:-webkit-flex;
            display:-moz-box;
            display:-ms-flexbox;
            display:flex;
            background:#F78003;
            background:-webkit-linear-gradient(left,#039F61,#039F61);
            background:-o-linear-gradient(left,#039F61,#039F61);
            background:-moz-linear-gradient(left,#005bea,#00c6fb);
            background:linear-gradient(left,#005bea,#00c6fb);
            -webkit-transition:all .4s;
            justify-content:center;
            align-items:center;
            padding:0 25px;
            -webkit-transition:all .4s;
            -o-transition:all .4s;
            -moz-transition:all .4s;
            transition:all .4s;
            position:relative;
            z-index:1
        }
        .loginbtn::before{
            content:"";
            display:block;
            position:absolute;
            z-index:-1;
            width:100%;
            height:100%;
            border-radius:25px;
            top:0;
            left:0;
            -o-transition:all .4s;
            -moz-transition:all .4s;
            transition:all .4s;
            opacity:0
        }
    </style>
@endsection

