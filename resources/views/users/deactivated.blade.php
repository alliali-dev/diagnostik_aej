@extends('layouts.master')
@section('title') Gerer Utilisateur @endsection
@section('subTitle') Désactivé Utilisateur @endsection

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
                                <a href="{{ route('users.index') }}" class="btn btn-primary btn-rounded">Tous utilisateurs</a>
                                <a href="{{ route('users.create') }}" class="btn btn-success">Creer utilisateur</a>
                                <a href="{{ route('users.disabled') }}" class="btn btn-warning">Utilisateur désactivé</a>
                                <a href="{{ route('users.deleted') }}" class="btn btn-danger btn-rounded">Utilisateur Supprimé</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='table-responsive-sm'>
                    <table id="usersTable" class='table table-striped table-hover'>
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>E-mail</th>
                            <th>Status</th>
                            <th>Rôle</th>
                            <th>Crée le</th>
                            <th>Mise à jour</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(function () {
            $('#usersTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route('users.disabledUsersTable') }}'
                },
                columns: [
                    {data: 'id'},
                    {data: 'name'},
                    {data: 'email'},
                    {data: 'status'},
                    // {data: 'roles', orderable: false, searchable: false},
                    {data: 'created_at'},
                    {data: 'updated_at'},
                    {data: 'actions', orderable: false, searchable: false},
                ]
            });
        });
    </script>
@endsection


