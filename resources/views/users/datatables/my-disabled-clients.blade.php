@extends('layouts.master')

@section('title') Manage Clients @endsection

@section('subTitle') Deactivated Clients @endsection

@section('content')


    <section id="team-access" class="card">
        <div class="card-header">
            <h4 class="card-title"></h4>
        </div>
        <div class="card-content">

            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3 float-right">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('users.myClients') }}" class="btn btn-primary btn-rounded">Active
                                    Clients</a>
                                <a href="{{ route('users.create') }}" class="btn btn-success">Add Client</a>
                                <a href="{{ route('users.myDisabledClients') }}" class="btn btn-warning">Deactivated
                                    Clients</a>
                                <a href="{{ route('users.myDeletedClients') }}" class="btn btn-danger btn-rounded">Deleted
                                    Clients</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive-sm">
                    <table id="usersTable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Added by</th>
                            <th>Active ?</th>
                            <th>Created at</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

@endsection
