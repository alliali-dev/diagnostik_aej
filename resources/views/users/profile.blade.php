@extends('layouts.master')

@section('title') Profile @endsection

@section('subTitle') My Account @endsection

@section('content')

    <section id="users" class="card">

        <div class="card-header">
            <h4 class="card-title"></h4>
        </div>

        <div class="card-content">

            <div class="card-body">
                {{ Form::model($profil,['route' => ['profile.store'],  'novalidate']) }}
                <div class="form-body">

                    <div class="row">

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="first_name">Nom</label>
                                {{ Form::text('name', null, ['class'=>'form-control col-md-12', 'id' => 'name', 'required'=>true ]) }}
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="email">Email</label>
                                {{ Form::email('email', null, ['class'=>'form-control col-md-12', 'id' => 'email', 'readonly'=>true, 'required'=>false ]) }}
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="password">Mot de passe</label>
                                {{ Form::password('password', ['class'=>'form-control col-md-12', 'id' => 'password']) }}
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="repassword">Confirmer Mot de passe</label>
                                {{ Form::password('repassword', ['class'=>'form-control col-md-12', 'id' => 'repassword']) }}
                            </div>
                            <span id='message'></span>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="timezone" class="control-label">Timezone</label>
                                {{ Form::select('timezone', setTimezones(), isset($profil->settings['timezone']) ? $profil->settings['timezone'] : 'Africa/Casablanca', ['class'=>'form-control']) }}
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="clickBank-username" class="control-label">ClickBank Username</label>
                                <input class="form-control" required id="clickBank_username" type="text" value="@if ($profil) {{ $profil->clickBank_username }} @endif"
                                       name="clickBankusername">
                            </div>
                        </div>

                        <div class="col-12">
                            <button class="btn btn-primary waves-effect waves-light">
                                <span><i class="feather icon-save"></i> Sauvegarder</span>
                            </button>
                        </div>
                    </div>

                </div>
                {{ Form::close() }}
            </div>

        </div>

    </section>
@endsection
@section('js')
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.min.js') }}"></script>
    <script>
        $(function () {
            $('select').select2();

            $('[name="password"], [name="repassword"]').on('keyup change', function () {
                if ($('[name="password"]').val() !== $('[name="repassword"]').val()) {
                    $('#error-message').fadeOut().remove();
                    $('<span id="error-message">Passwords do not match.</span>').css('color', 'red').insertAfter($('[name="repassword"]'));
                    $('form').find('button[type="submit"]').attr('disabled', true);
                } else {
                    $('#error-message').fadeOut();
                    $('form').find('button[type="submit"]').attr('disabled', false);
                }
            });
        });
    </script>

@endsection
