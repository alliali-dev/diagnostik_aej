

@extends('layouts.master')

@section('title') Manage users @endsection

@section('subTitle') Create User @endsection

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
                                <a href="{{ route('users.index') }}" class="btn btn-primary btn-rounded">All Users</a>
                                <a href="{{ route('users.create') }}" class="btn btn-success">Create User</a>
                                <a href="{{ route('users.disabled') }}" class="btn btn-warning">Deactivated Users</a>
                                <a href="{{ route('users.deleted') }}" class="btn btn-danger btn-rounded">Deleted
                                    Users</a>
                            </div>
                        </div>
                    </div>
                </div>

                {{ Form::open(['route'=>'users.store', 'file' => true],  'novalidate' )}}
                @csrf
                <div class="form-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="name">Agence Aej</label>
                                <!-- For defining autocomplete -->
                                <input type="text"  id="agence" placeholder="Agence AEJ" class="form-control">
                                <!-- For displaying selected option value from autocomplete suggestion -->
                                <input type="hidden" name="agence_id" id='agenceid' readonly>
                            </div><!--form control-->
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="name">Nom</label>
                                <input class="form-control" required id="name" name="name" type="text">
                            </div><!--form control-->
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="email">Adresse E-mail</label>
                                <input class="form-control" required id="email" type="email" name="email">
                            </div><!--form control-->
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="password">Mot de passe</label>
                                <input class="form-control" required id="password" type="password" name="password">
                            </div>
                        </div><!--form control-->

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="password_confirm" class="control-label">Confirmé mot de passe</label>
                                <input class="form-control" id="password_confirm" type="password" name="password_confirm">
                            </div><!--form control-->
                        </div><!--form control-->

                        <div class="col-12">
                            <div class="form-group">
                                <fieldset class="checkbox">
                                    <div class="vs-checkbox-con vs-checkbox-primary">
                                        <input type="checkbox" name="status">
                                        <span class="vs-checkbox">
                                              <span class="vs-checkbox--check">
                                                <i class="vs-icon feather icon-check"></i>
                                              </span>
                                            </span>
                                        <span class="">Activé</span>
                                    </div>
                                </fieldset>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <fieldset class="checkbox">
                                    <div class="vs-checkbox-con vs-checkbox-primary">
                                        <input type="checkbox" name="confirmed">
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
                                        <input type="checkbox" name="confirmation_email">
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
                                <label for="role">Roles</label>
                                <ul class="list-unstyled">

                                        @if(auth()->user()->hasRole('SuperAdmin'))
                                            @foreach ($roles as $role)
                                                <li class="d-inline-block mr-2">
                                                    <fieldset class="form-group">
                                                        <div class="vs-checkbox-con vs-checkbox-primary">
                                                            {{ Form::checkbox('roles[]',  $role->id ) }}
                                                            <span class="vs-checkbox">
                                                                <span class="vs-checkbox--check">
                                                                    <i class="vs-icon feather icon-check"></i>
                                                                </span>
                                                            </span>
                                                            <span class="">{{ $role->name }}</span>
                                                        </div>
                                                    </fieldset>
                                                </li>
                                            @endforeach
                                        @elseif( auth()->user()->hasRole('CAgence') )
                                            @foreach ($roles as $role)
                                                @if( in_array($role->name, ['CEmploi']) )
                                                    <li class="d-inline-block mr-2">
                                                        <fieldset class="form-group">
                                                            <div class="vs-checkbox-con vs-checkbox-primary">
                                                                {{ Form::checkbox('roles[]',  $role->id ) }}
                                                                <span class="vs-checkbox">
                                                                    <span class="vs-checkbox--check">
                                                                        <i class="vs-icon feather icon-check"></i>
                                                                    </span>
                                                                </span>
                                                                <span class="">{{ $role->name }}</span>
                                                            </div>
                                                        </fieldset>
                                                    </li>
                                                @endif
                                            @endforeach
                                        @endif

                                </ul>
                            </div>
                        </div>

                        <div class="col-12">
                            <button class="btn btn-primary waves-effect waves-light">
                                <span><i class="feather icon-save"></i> Enregistrer</span>
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
    <!-- Script -->
    <script src="{{asset('jqueryui/jquery-3.3.1.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('jqueryui/jquery-ui.min.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $( "#agence" ).autocomplete({
                source: function( request, response ) {
                    // Fetch data
                    $.ajax({
                        url:"{{route('users.autocomplete')}}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: "{{ csrf_token() }}",
                            search: request.term
                        },
                        success: function( data ) {
                            response( data );
                        }
                    });
                },
                select: function (event, ui) {
                    // Set selection
                    $('#agence').val(ui.item.label); // display the selected text
                    $('#agenceid').val(ui.item.value); // save selected id to input
                    return false;
                }
            });
        });
    </script>
    <script>
        $(function () {
            $('[name="password"], [name="password_confirm"]').on('keyup change', function () {
                if ($('[name="password"]').val() !== $('[name="password_confirm"]').val()) {
                    $('#error-message').fadeOut().remove();
                    $('<span id="error-message">Passwords do not match.</span>').css('color', 'red').insertAfter($('[name="password_confirm"]'));
                    $('form').find('button[type="submit"]').attr('disabled', true);
                } else {
                    $('#error-message').fadeOut();
                    $('form').find('button[type="submit"]').attr('disabled', false);
                }
            });
        });
    </script>
@endsection

