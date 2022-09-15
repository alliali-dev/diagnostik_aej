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
                            <th>Agence</th>
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

    <script>
        $(function () {
            $('#usersTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route('users.activeUsersTable') }}'
                },
                dom:'<"card-header border-bottom p-1"<"head-label"><"dt-action-buttons text-right"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                colVis: {
                    exclude: [ 0 ]
                },
                columns: [
                    {data: 'id'},
                    {data: 'name'},
                    {data: 'email'},
                    {data: 'agence_id'},
                    {data: 'status'},
                    {data: 'roles', orderable: false, searchable: false},
                    {data: 'created_at'},
                    {data: 'updated_at'},
                    {data: 'actions', orderable: false, searchable: false},
                ], buttons: [
                    {
                        extend: 'colvis',
                        text: 'Colonne',
                        className: 'btn btn-relief-success dropdown-toggle mr-2',
                    },
                    {
                        extend: 'collection',
                        className: 'btn btn-relief-primary dropdown-toggle mr-2',
                        text: 'Extraction',
                        buttons: [
                            {
                                extend: 'print',
                                text: 'Print',
                                className: 'dropdown-item',
                                exportOptions: { columns: [3, 4, 5, 6, 7] }
                            },
                            {
                                extend: 'csv',
                                text:  'Csv',
                                className: 'dropdown-item',
                                exportOptions: { columns: [3, 4, 5, 6, 7] }
                            },
                            {
                                extend: 'excel',
                                text: 'Excel',
                                className: 'dropdown-item',
                                exportOptions: { columns: [3, 4, 5, 6, 7] }
                            },
                            {
                                extend: 'pdf',
                                text:  'Pdf',
                                className: 'dropdown-item',
                                exportOptions: { columns: [3, 4, 5, 6, 7] }
                            },
                            {
                                extend: 'copy',
                                text:  'Copy',
                                className: 'dropdown-item',
                                exportOptions: { columns: [3, 4, 5, 6, 7] }
                            }
                        ],
                        init: function (api, node, config) {
                            $(node).removeClass('btn-secondary');
                            $(node).parent().removeClass('btn-group');
                            setTimeout(function () {
                                $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
                            }, 50);

                        }
                    },
                ],
            });
        });
    </script>
@endsection
