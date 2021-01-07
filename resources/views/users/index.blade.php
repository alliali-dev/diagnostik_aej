@extends('layouts.master')

@section('title') Gérer les utilisateurs @endsection

@section('subTitle') Actif @endsection

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
                        <tbody>
                        {{--<tr>
                            <td>1</td>
                            <td>Ouattara</td>
                            <td>synderime@gmail.com</td>
                            <td><span class="badge badge-success">Yes</span></td>
                            <td>Basic</td>
                            <td>2018-02-23 15:36:34</td>
                            <td>2018-02-23 15:36:34</td>
                            <td>
                                <button type="button"
                                        class="btn btn-icon btn-icon rounded-circle btn-success mr-0 waves-effect waves-light">
                                    <i class="feather icon-lock"></i>
                                </button>
                                <a href="--}}{{--{{ route('users.view') }}--}}{{--"
                                   class="btn btn-icon btn-icon rounded-circle btn-info  waves-effect waves-light">
                                    <i class="feather icon-search"></i>
                                </a>
                                <a href="--}}{{--{{ route('users.edit') }}--}}{{--"
                                   class="btn btn-icon btn-icon rounded-circle btn-primary  waves-effect waves-light">
                                    <i class="feather icon-edit"></i>
                                </a>
                                <a href="--}}{{--{{ route('users.passwordreset') }}--}}{{--"
                                   class="btn btn-icon btn-icon rounded-circle btn-success  waves-effect waves-light">
                                    <i class="feather icon-refresh-ccw"></i>
                                </a>
                                <button type="button"
                                        class="btn btn-icon btn-icon rounded-circle btn-warning  waves-effect waves-light">
                                    <i class="feather icon-pause"></i>
                                </button>

                                <button type="button"
                                        class="btn btn-icon btn-icon rounded-circle btn-danger waves-effect waves-light">
                                    <i class="feather icon-trash"></i>
                                </button>


                            </td>
                        </tr>--}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
@section('js')
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(function () {
            $('#usersTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route('users.activeUsersTable') }}'
                },
                columns: [
                    {data: 'id'},
                    {data: 'name'},
                    {data: 'email'},
                    {data: 'status'},
                    {data: 'roles', orderable: false, searchable: false},
                    {data: 'created_at'},
                    {data: 'updated_at'},
                    {data: 'actions', orderable: false, searchable: false},
                ]
            });
        });
    </script>
@endsection
{{--<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(function () {
        $('#usersTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route('users.activeUsersTable') }}'
            },
            columns: [
                {data: 'id'},
                {data: 'name'},
                {data: 'email'},
                {data: 'status'},
                {data: 'roles', orderable: false, searchable: false},
                {data: 'created_at'},
                {data: 'updated_at'},
                {data: 'actions', orderable: false, searchable: false},
            ]
        });
    });
</script>--}}
@endsection
