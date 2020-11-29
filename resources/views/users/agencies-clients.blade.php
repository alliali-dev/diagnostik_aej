@extends('layouts.master')

@section('content')
    <div class="animated fadeIn">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Agencies Clients ({{ $users->count() }})
            </div>
            <div class="card-body">
                <table id="usersTable" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Agency Email</th>
                        <th>Created At</th>
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
                    url: "{{ route('users.agenciesClientsTable') }}"
                },
                columns: [
                    {data: 'name'},
                    {data: 'email'},
                    {data: 'status'},
                    {data: 'creator'},
                    {data: 'created_at'},
                    {data: 'actions', orderable: false, searchable: false},
                ]
            });
            $('#usersTable').attr('style', 'border-collapse: collapse !important');
        });
    </script>
@endsection
