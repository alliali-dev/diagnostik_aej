@extends('layouts.master')

@section('title') Manage users @endsection

@section('subTitle') Password Reset @endsection

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

                {{ Form::model($user, ['route'=>['users.update'],'method' => 'POST'],  'novalidate') }}

                <div class="form-body">

                    <div class="row">

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="password">Password</label>
                                {{ Form::password('password', ['class'=>'form-control', 'required'=>true]) }}
                                {{ Form::hidden('id', $user->id) }}
                            </div><!--form control-->
                        </div><!--form control-->

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="password_confirmation" class="control-label">Password
                                    Confirmation</label>
                                {{ Form::password('password_confirm', ['class'=>'form-control']) }}
                            </div><!--form control-->
                        </div><!--form control-->


                        <div class="col-12">
                            <button class="btn btn-primary waves-effect waves-light">
                                <span><i class="feather icon-refresh-cw"></i> Update</span>
                            </button>
                        </div><!--pull-right-->

                    </div>

                </div>
                {{Form::hidden('_method','PUT')}}

                {{ Form::close() }}

            </div>
        </div>
    </section>

@endsection
@section('js')
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
