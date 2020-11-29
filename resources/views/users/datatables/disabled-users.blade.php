@extends('layouts.master')

@section('content')
    <div class="animated fadeIn">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Deactivated Users
                <div class="input-group pull-right" style="width: auto;">
                    <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary">
                        <i class="fa fa-dot-circle-o"></i> Add User
                    </a>
                    <a href="{{ route('users.index') }}" class="btn btn-sm btn-success">
                        <i class="fa fa-check"></i> Active Users
                    </a>
                    <a href="{{ route('users.disabled') }}" class="btn btn-sm btn-warning">
                        <i class="fa fa-remove"></i> Deactivated Users
                    </a>
                    <a href="{{ route('users.deleted') }}" class="btn btn-sm btn-danger">
                        <i class="fa fa-trash"></i> Deleted Users
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table id="usersTable" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
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
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('coreui/datatables/css/dataTables.bootstrap4.min.css') }}">
@endsection
@section('scripts')
    <script src="{{ asset('coreui/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('coreui/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(function () {
            $('#usersTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route('users.disabledUsersTable') }}'
                },
                columns: [
                    {data: 'name'},
                    {data: 'email'},
                    {data: 'status'},
                    {data: 'created_at'},
                    {data: "actions", orderable: false, searchable: false},
                ]
            });
            $('#usersTable').attr('style', 'border-collapse: collapse !important');
        });
    </script>
@endsection
