@extends('layouts.master')

@section('title') Ma liste de demandeur @endsection

@section('subTitle') Liste de demandeur ayant été évalué @endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    {{-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">--}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
@endsection
@section('content')

    <section class="card">
        <div class="card-header">
            <h4 class="card-title"></h4>
        </div>
        <div class="card-content">

            <div class="card-body">

              {{--  <div class="mb-3">
                    <a class="btn btn-primary" href=""
                       data-toggle="modal"
                       data-target="#addRole">
                        <span><i class="feather icon-plus"></i>Ajouter rôle</span>
                    </a>
                </div>--}}

                <div class="table-responsive-sm">
                    <table class="table table-hover table-striped"  id="attenteDiagnostic">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Matricule</th>
                            <th>Nom & prenom (s)</th>
                            <th>Sexe</th>
                            <th>Conseiller affecte</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </section>


    <!-- Modal New Social Viewer -->
    <div class="modal fade" id="addRole" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel16" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-white" id="myModalLabel16">Ajouter rôle</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                {{ Form::open(['route'=>'roles.store', 'files'=>true , 'method' => 'POST']) }}
                {{csrf_field()}}
                <!-- Form Group -->
                    <div class="form-group">
                        <label for="email-1">Name</label>
                        <input type="text" name="name" class="form-control"  aria-describedby="emailHelp1">
                    </div>
                    <div class="form-group">
                        <label for="email-1">Description</label>
                        <input type="text" name="guard_name" class="form-control" aria-describedby="emailHelp1">
                    </div>
                    <div class="form-group text-right mb-0">
                        <button type="submit" class="btn btn-success text-uppercase">Ajouter</button>
                    </div>
                    <!-- /form group -->
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Modal New Social Viewer -->
    <div class="modal fade" id="editRole" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel16" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-white" id="myModalLabel16">Modifier rôle</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                {{ Form::open(['route'=>'roles.update', 'files'=>true , 'method' => 'POST']) }}
                @method('PUT')
                @csrf()
                <!-- Form Group -->
                    <div class="form-group">
                        <label for="email-1">Name</label>
                        <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp1">
                    </div>
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="email-1">Description</label>
                        <input type="text" name="guard_name" class="form-control" id="guard_name" aria-describedby="emailHelp1">
                    </div>
                    <div class="form-group text-right mb-0">
                        <button type="submit" class="btn btn-success text-uppercase">Modifier</button>
                    </div>
                    <!-- /form group -->
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal-danger fade" id="deletedRole" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger white">
                    <h4 class="modal-title" id="myModalLabel16">Confirmation la suppression</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ Form::open(['route'=>'roles.destroy', 'files'=>true , 'methode' => 'POST']) }}
                    {{method_field('delete')}}
                    {{csrf_field()}}
                    <div class="modal-body">
                        <p class="text-center">
                            Êtes-vous sûr de vouloir le supprimer ?
                        </p>
                        <input type="hidden" name="id" id="role_id" value="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Non, Annuler</button>
                        <button type="submit" class="btn btn-warning">Oui, Supprimer</button>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(function () {
            $('#attenteDiagnostic').DataTable({
                "language": {
                    "lengthMenu": "Afficher _MENU_ enregistrements par page",
                    "zeroRecords": "Rien n'a été trouvé - désolé",
                    "info": "Afficher la page _PAGE_ de _PAGES_",
                    "infoEmpty": "Aucun dossier disponible",
                    "processing":     "Traitement...",
                    "search":         "Recherche:",
                    "infoFiltered": "(filtré de _MAX_ total des enregistrements)",
                    "paginate": {
                        "first":      "Premier",
                        "last":       "Dernier",
                        "next":       "Suivant",
                        "previous":   "Précédent"
                    },
                },
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route('diagnostik.datatable-attente-diagnostic') }}'
                },
                columns: [
                    {data: 'id' , orderable: false, searchable: false},
                    {data: 'matricule_aej' , orderable: false, searchable: false},
                    {data: 'nomprenom' , orderable: false, searchable: false},
                    {data: 'sexe' , orderable: false, searchable: false},
                    {data: 'conseiller', orderable: false, searchable: false},
                    {data: 'action', orderable: false, searchable: false},
                ]
            });
        });

        $('#deletedRole').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var modal = $(this);
            modal.find('.modal-body #role_id').val(id);
        });

        $('#editRole').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var name = button.data('name');
            var guard_name = button.data('guard_name');
            var modal = $(this);
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #guard_name').val(guard_name);
        });
    </script>
@endsection
