@extends('layouts.master')

@section('title') Manage Users @endsection

@section('subTitle') Show User @endsection

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
                                <a href="{{ route('users.index') }}" class="btn btn-primary btn-rounded">&larr; Retour</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive-sm">
                    <table id="users-table" class="table table-hover table-striped">
                        <tbody class="">
                        <tr>
                            <th>ID</th>
                            <td class="text-left">{{$user->id}}</td>
                        </tr>
                        <tr>
                            <th>Nom</th>
                            <td class="text-left">{{$user->name}}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td class="text-left">{{$user->email}}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td class="text-left">
                                @if($user->status)
                                    <span class="badge badge-success">Activé</span>
                                @else
                                    <span class="badge badge-warning">Désactivé</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Confirmé</th>
                            <td class="text-left">
                                @if($user->confirmed)
                                    <span class="badge badge-success">OUI</span>
                                @else
                                    <span class="badge badge-warning">NON</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Date de creation</th>
                            <td class="text-left">{{ $user->created_at->toFormattedDateString() }}</td>
                        </tr>
                        <tr>
                            <th>Roles</th>
                            <td class="text-left">{{ $user->roles()->pluck('name')->implode(', ') }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </section>


@endsection
