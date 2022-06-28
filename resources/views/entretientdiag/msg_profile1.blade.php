@extends('layouts.master')
@section('title') Message @endsection
@section('subTitle') Mise à jour profil @endsection
@section('content')
@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    {{-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">--}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
@endsection
    <section class="card">
        <div class="card-header">
            <h4 class="card-title"></h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <div class="mb-3">
                    <a class="btn btn-primary" href="{{ route('entretient.msg_profile') }}">
                        <span><i class="feather icon-plus"></i>Faire un Entretien</span>
                    </a>
                    <div class="text-right">
                        <a class="btn btn-info" href="{{ route('entretient.export') }}">
                            <span><i class="feather icon-download"></i>Exporter</span>
                        </a>
                    </div>
                </div>

                <div class="table-responsive-sm">
                    <table class="table table-hover table-striped" id="table">
                        <thead>
                        <tr>
                            <th>#n aej</th>
                            <th>Nom & Prenom</th>
                            <th>Sexe</th>
                            <th>Lieu d'habitation</th>
                            <th>Niveau etude</th>
                            <th>Unite Experience</th>
                            <th>Nombre annee</th>
                            <th>Conseiller</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                {{--<nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center mt-2">
                        {{ $entretiens->links() }}
                    </ul>
                </nav>--}}
            </div>
        </div>
    </section>
    <div class="modal fade" id="addAej" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h4 class="modal-title text-white" id="myModalLabel16">Entrez n° AEJ</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        @csrf
                        {{--<h3 style="color: orangered" align="justify">
                            Veuillez effectuer la mise à jour du profil du demandeur
                            concerné par l'entretien diagnostique que vous allez démarrer !!!
                        </h3>--}}
                        <br>
                        <div class="form-group">
                            <label for="matriculeaej">N° AEJ</label>
                            <input type="text" name="matriculeaej" id="matriculeaej" placeholder="numero aej" class="form-control" required>
                        </div>
                        <div id="loader" class="text-center" style="display: none;">
                        <!--img src="{{ asset('img/loader_squares.gif') }}" alt="Loader"-->
                            <div class="spinner-border" role="status" style="color: royalblue;">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                        <div id="result" style="display: none;" class="text-center text-success">
                           {{-- <strong>Importation réalisée avec succès</strong>--}}
                            {{--https://www.agenceemploijeunes.ci/site/01aej18/digit/demandeur/demandeursall/preview/50548--}}
                            {{--<strong>Mise à jour profil  <a style="color: deepskyblue;" id="urlprofile" href="#" target="_blank">ici</a></strong>--}}
                        </div>
                        <div id="resulterror" style="display: none;" class="text-center text-warning"><strong>Numéro existe déjà</strong></div>
                        <div id="resulterrorformat" style="display: none;" class="text-center text-warning"><strong>Format non-conforme</strong></div>

                        <!--form control-->
                        <div class="form-group text-right mb-0">
                            {{--<a href="{{ route('entretient.create') }}" id="close" style="display: none;" class="btn btn-secondary">Passer à l'entretien </a>--}}
                            <a href="#" id="profile" style="display: none;" target="_blank" class="btn btn-outline-info">Mise à jour profil</a>
                            <a class="btn btn-warning" id="return" href="{{route('home')}}">retour</a>
                            <button type="button" id="aej_ok" class="btn btn-success">ok</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(function() {
            $('#table').DataTable({
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
                    url: 'http://localhost:8888/aejtechnologie/all_demandeur'
                },
                columns: [
                    {data: 'matriculeaej', orderable: false, searchable: false},
                    {data: 'nomprenom', orderable: false, searchable: false},
                    {data: 'sexe.libelle', orderable: false, searchable: false},
                    {data: 'tlieuhabitation.nom', orderable: false, searchable: false},
                    {data: 'niveauetude.libelle', orderable: false, searchable: false},
                    {data: 'uniteexperience.libelle', orderable: false, searchable: false},
                    {data: 'nombreexperience', orderable: false, searchable: false},
                    {data: 'conseilleremploi.last_name', orderable: false, searchable: false},
                ]
            });
        });
    </script>
@endsection
