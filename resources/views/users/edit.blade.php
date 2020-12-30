@extends('layouts.master')

@section('title') Gérer utilisateur @endsection

@section('subTitle') Modifier utilisateur @endsection

@section('content')


    <section id="users" class="card">

        <div class="card-header">
            <h4 class="card-title"></h4>
        </div>

        <div class="card-content">

            <div class="card-body">

                <div class="row">
                    <div class="col-12">
                        <div class="mb-3 float-right">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('users.index') }}" class="btn btn-primary btn-rounded">&larr; Back</a>
                            </div>
                        </div>
                    </div>
                </div>


                {{ Form::model($user, ['route'=>['users.update']], 'novalidate')}}
                @csrf

                <div class="form-body">

                    <div class="row">

                        <div class="col-12">
                            <div class="form-group">
                                <label for="name">Nom</label>
                                {{ Form::text('name', null, ['class'=>'form-control', 'required'=>true]) }}
                                {{ Form::hidden('id', $user->id) }}
                            </div><!--form control-->
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="email">Adresse mail</label>
                                {{ Form::email('email', null, ['class'=>'form-control', 'required'=>true]) }}
                            </div><!--form control-->
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="password">Mot de passe</label>
                                {{ Form::password('password', ['class'=>'form-control', 'required'=>false]) }}
                            </div>
                        </div><!--form control-->

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="password_confirm" class="control-label">Confirmer mot de passe</label>
                                {{ Form::password('password_confirm', ['class'=>'form-control', 'required'=>false]) }}
                            </div><!--form control-->
                        </div><!--form control-->

                        <div class="col-12">
                            <div class="form-group">
                                <fieldset class="checkbox">
                                    <div class="vs-checkbox-con vs-checkbox-primary">
                                        {{ Form::checkbox('status', $user->status, ['class'=>'form-control']) }}
                                        <span class="vs-checkbox">
                                      <span class="vs-checkbox--check">
                                        <i class="vs-icon feather icon-check"></i>
                                      </span>
                                    </span>
                                        <span class="">Active</span>
                                    </div>
                                </fieldset>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <fieldset class="checkbox">
                                    <div class="vs-checkbox-con vs-checkbox-primary">
                                        {{ Form::checkbox('confirmed', $user->confirmed, ['class'=>'form-control']) }}
                                        <span class="vs-checkbox">
                                      <span class="vs-checkbox--check">
                                        <i class="vs-icon feather icon-check"></i>
                                      </span>
                                    </span>
                                        <span class="">Confirmé</span>
                                    </div>
                                </fieldset>
                            </div>
                        </div>


                        <div class="col-12">
                            <div class="form-group">
                                <fieldset class="checkbox">
                                    <div class="vs-checkbox-con vs-checkbox-primary">
                                        <input name="confirmation_email" type="checkbox" value="1">
                                        <span class="vs-checkbox">
                                      <span class="vs-checkbox--check">
                                        <i class="vs-icon feather icon-check"></i>
                                      </span>
                                    </span>
                                        <span class="">Send Confirmation E-mail (If confirmed is off)</span>
                                    </div>
                                </fieldset>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="role">Role</label>
                                @foreach ($roles as $role)
                                    <fieldset class="form-group">
                                        <div class="vs-checkbox-con vs-checkbox-primary">
                                            {{ Form::checkbox('roles[]',  $role->id, $user->roles ) }}
                                            <span class="vs-checkbox">
                                                 <span class="vs-checkbox--check">
                                                  <i class="vs-icon feather icon-check"></i>
                                                  </span>
                                            </span>
                                            <span class="">{{ $role->name }}</span>
                                        </div>
                                    </fieldset>
                                @endforeach
                            </div><!--form control-->
                        </div>

                        <div class="col-12">
                            <button class="btn btn-primary waves-effect waves-light">
                                <span><i class="feather icon-save"></i>Modifier</span>
                            </button>
                        </div>

                    </div>
                </div>
                {{Form::hidden('_method','PUT')}}

                {{ Form::close() }}

            </div>

        </div>

    </section>
@endsection
@section('js')
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(function () {
            $('[name="password"], [name="password_confirm"]').on('keyup change', function () {
                if ($('[name="password"]').val() !== $('[name="password_confirm"]').val()) {
                    $('#error-message').fadeOut().remove();
                    $('<span id="error-message">Les mots de passe ne correspondent pas.</span>').css('color', 'red').insertAfter($('[name="password_confirm"]'));
                    $('form').find('button[type="submit"]').attr('disabled', true);
                } else {
                    $('#error-message').fadeOut();
                    $('form').find('button[type="submit"]').attr('disabled', false);
                }
            });
        });
    </script>
@endsection

