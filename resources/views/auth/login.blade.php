@extends('auth.layout')

@section('title') Login @endsection

@section('content')

    <section class="row flexbox-container">
        <div class="col-xl-8 col-11 d-flex justify-content-center">
            <div class="card bg-authentication rounded-0 mb-0">
                <div class="row m-0" style="background-color: white;">
                    <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0" style="background-color: white;">
                        <img src="{{ asset('app-assets/images/logo/logo_aej.png') }}" alt="branding logo" width="485px" height="231">
                    </div>
                    <div class="col-lg-6 col-12 p-0">
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
                        <div class="card rounded-0 mb-0 px-2">
                            <form method="POST" action="{{ route('session.login') }}">
                                @csrf
                                <div class="card-header pb-1">
                                    <div class="card-title">
                                        <h4 class="mb-0">{{ __('Connexion') }}</h4>
                                    </div>
                                </div>
                                <p class="px-2">Bienvenue, veuillez vous connecter à votre compte.</p>
                                <div class="card-content" style="margin-bottom: -45px;">
                                    <div class="card-body pt-1">
                                        <fieldset class="form-label-group form-group position-relative has-icon-left">
                                            <input type="text" id="email"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   name="email" value="{{ old('email') }}" required autocomplete="email"
                                                   autofocus>
                                            <div class="form-control-position">
                                                <i class="feather icon-user"></i>
                                            </div>
                                            <label for="email">{{ __('NOM UTILISATEUR') }}</label>
                                        </fieldset>

                                        <fieldset class="form-label-group position-relative has-icon-left">
                                            <input id="password" type="password" class="form-control" name="password"
                                                   required autocomplete="current-password">
                                            <div class="form-control-position">
                                                <i class="feather icon-lock"></i>
                                            </div>
                                            <label for="password">MOT DE PASSE</label>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="login-footer">
                                    <div class="divider">
                                        <div class="divider-text">CODE AGENCE</div>
                                        <fieldset class="form-label-group form-group position-relative has-icon-left">
                                            <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" required
                                                   autocomplete="current-password">
                                            <div class="form-control-position">
                                                <i class="feather icon-user-minus"></i>
                                            </div>
                                        </fieldset>

                                    </div>
                                    <button type="submit"
                                            class="btn btn-ivory btn-block float-right btn-inline">{{ __('Se connecter') }}</button>
                                    <div class="footer-btn d-inline">
                                        <br>
                                        {{--<a href="#" class="btn btn-facebook"><span class="fa fa-facebook"></span></a>
                                        <a href="#" class="btn btn-twitter white"><span class="fa fa-twitter"></span></a>
                                        <a href="#" class="btn btn-google"><span class="fa fa-google"></span></a>
                                        <a href="#" class="btn btn-github"><span class="fa fa-github-alt"></span></a>--}}
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('css')
    <style>
        .btn-ivory {
            border-color: #039F61 !important;
            background-color: #F78003 !important;
            color: #FFFFFF;
        }
    </style>
@endsection

