@extends('layouts.master')

@section('title') Entretien @endsection

@section('subTitle') Liste des entretiens @endsection


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
                <div class="mb-3">
                   {{-- <a class="btn btn-primary" href="{{ route('entretient.msg_profile') }}">
                        <span><i class="feather icon-plus"></i>Faire un Entretien</span>
                    </a>--}}
                    <div class="text-right">
                        <a class="btn btn-info" href="{{ route('entretient.export') }}">
                            <span><i class="feather icon-download"></i>Exporter</span>
                        </a>
                    </div>
                </div>

                <div class="table-responsive-sm">
                    <table class="table table-hover table-striped" id="tableEntretien">
                        <thead>
                        <tr>
                            <th>#n aej</th>
                            <th>Nom et Prenom</th>
                            <th>Niveau formaion</th>
                            <th>Niveau expérience</th>
                           {{-- <th>adéquation formation expérience</th>--}}
                           {{-- <th>Connaissance du métier / activité</th>--}}
                            {{--<th>Adéquation formation métier / activité</th>--}}
                            {{--<th>Adéquation expérience métier / activité</th>--}}
                            <th>Maîtrise de l'outil de recherche d'emploi</th>
                            {{--<th>Connaissance des exigence du marché</th>--}}
                            <th>Dépôt de dossier en entreprise</th>
                            <th>Grille Diagnostique</th>
                            <th>Guide Entretien</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>

{{--                        @foreach($entretiens as $item)--}}

{{--                            <tr>--}}
{{--                                <td> {{ $item->matriculeaej }}</td>--}}
{{--                                <td> {{ $item->nomprenom }}</td>--}}
{{--                                <td> {{ $item->niveauformaion }}</td>--}}
{{--                                <td> {{ $item->niveauexperience }}</td>--}}
{{--                                <td> {{ $item->adeqormaexper }}</td>--}}
{{--                                <td> {{ $item->conmetieractiv }}</td>--}}
{{--                                <td> {{ $item->adqformmetieractiv }}</td>--}}
{{--                                <td> {{ $item->adqexpmetieractiv }}</td>--}}
{{--                                <td> {{ $item->maitoutrechempl }}</td>--}}
{{--                                <td> {{ $item->conexigmarch }}</td>--}}
{{--                                <td> {{ $item->depdossent }}</td>--}}
{{--                                <td>--}}
{{--                                    @if($item->file_grille_diagnostic )--}}
{{--                                        <a href="{{ asset('fichiers/diagnostic/'.$item->file_grille_diagnostic) }}" style="font-size: 16px;"--}}
{{--                                                class="badge badge-info mr-1" target="_blank">--}}
{{--                                            <i class="feather icon-eye"></i>--}}
{{--                                        </a>--}}
{{--                                    @endif--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    @if($item->file_guide_entretient)--}}
{{--                                        <a href="{{ asset('fichiers/entretient/'.$item->file_guide_entretient) }}" style="font-size: 16px;" target="_blank"--}}
{{--                                           class="badge badge-primary mr-1">--}}
{{--                                            <i class="feather icon-eye"></i>--}}
{{--                                        </a>--}}
{{--                                    @endif--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    <a class="badge badge-success mr-1" href="{{ route('diagnostik.create',$item->matriculeaej) }}" style="font-size: small;">--}}
{{--                                        <i class="feather icon-arrow-right"></i>--}}
{{--                                        Effectuer un entretien--}}
{{--                                    </a>--}}
{{--                                </td>--}}
{{--                                <td class="float-right">--}}
{{--                                    <button type="button"--}}
{{--                                            data-toggle="modal"--}}
{{--                                            data-target="#editAgence"--}}
{{--                                            class="btn btn-icon btn-icon rounded-circle btn-primary mr-0 waves-effect waves-light">--}}
{{--                                        <i class="feather icon-edit"></i>--}}
{{--                                    </button>--}}
{{--                                    <button type="button"--}}
{{--                                            data-toggle="modal"--}}
{{--                                            data-target="#deletedAgence"--}}
{{--                                            class="btn btn-icon btn-icon rounded-circle btn-danger mr-0 waves-effect waves-light">--}}
{{--                                        <i class="feather icon-trash"></i>--}}
{{--                                    </button>--}}
                                </td>
{{--                            </tr>--}}

{{--                        @endforeach--}}
{{--                        @if(count($entretiens) < 1)--}}
{{--                            <tr>--}}
{{--                                <td colspan="10" class="text-center">Pas d'entretien trouvé !</td>--}}
{{--                            </tr>--}}
{{--                        @endif--}}
                        </tbody>
                    </table>
                </div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center mt-2">
{{--                        {{ $entretiens->links() }}--}}
                    </ul>
                </nav>
            </div>
        </div>
    </section>
    <!-- Modal New Social Viewer -->
    <div class="modal fade" id="addAgence" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel16" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-white" id="myModalLabel16">Ajouter agence</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                {{ Form::open(['route'=>'users.agencestore', 'files'=>true , 'method' => 'POST']) }}
                {{csrf_field()}}
                <!-- Form Group -->
                    <div class="form-group">
                        <label for="email-1">Name</label>
                        <input type="text" name="name" class="form-control"  aria-describedby="emailHelp1">
                    </div>
                    <div class="form-group">
                        <label for="email-1">Code</label>
                        <input type="text" name="code" class="form-control" aria-describedby="emailHelp1">
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
    <div class="modal fade" id="editAgence" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel16" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-white" id="myModalLabel16">Modifier role</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                {{ Form::open(['route'=>'users.agenceupdate', 'files'=>true , 'method' => 'POST']) }}
                @method('PUT')
                @csrf()
                <!-- Form Group -->
                    <div class="form-group">
                        <label for="email-1">Name</label>
                        <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp1">
                    </div>
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="email-1">Code</label>
                        <input type="text" name="code" class="form-control" id="code" aria-describedby="emailHelp1">
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

    <div class="modal modal-danger fade" id="deletedAgence" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger white">
                    <h4 class="modal-title" id="myModalLabel16">Confirmation la suppression</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ Form::open(['route'=>'users.agencedestroy', 'files'=>true , 'methode' => 'POST']) }}
                    {{method_field('delete')}}
                    {{csrf_field()}}
                    <div class="modal-body">
                        <p class="text-center">
                            Êtes-vous sûr de vouloir le supprimer ?
                        </p>
                        <input type="hidden" name="id" id="agence_id" value="">
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
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></>
    <script src="//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(function() {
            $('#tableEntretien').DataTable({
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
                    url: '{{ route('diagnostik.listsuivi') }}' /*http://localhost:8888/aejtechnologie/all_demandeur*/
                },
                columns: [
                    {data: 'matriculeaej', orderable: false, searchable: true},
                    {data: 'nomprenom', orderable: false, searchable: true},
                    {data: 'niveauformation', orderable: false, searchable: false},
                    {data: 'niveauexperience', orderable: false, searchable: false},
                    {data: 'maitoutrechempl', orderable: false, searchable: false},
                    {data: 'depdossent', orderable: false, searchable: false},
                    {data: 'actionBtn2', orderable: false, searchable: false},
                    {data: 'actionBtn3', orderable: false, searchable: false},
                    {data: 'action', orderable: false, searchable: false},

                ]
            });
        });
        $('#deletedAgence').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var modal = $(this);
            modal.find('.modal-body #agence_id').val(id);
        });

        $('#editAgence').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var name = button.data('name');
            var code = button.data('code');
            var modal = $(this);
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #code').val(code);
        });
    </script>
@endsection
