@extends('layouts.master')

@section('title') Ma liste de demandeur @endsection

@section('subTitle') Liste de demandeur ayant été évalué @endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    {{-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">--}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
@endsection
@section('content')
<section>
    <div class="card" id="" role="tabpanel"
         aria-labelledby="pinterest-icon-pill">
        <div class="d-flex align-items-end flex-column">
            <div class="mb-4">
                <a class="btn btn-success" href="{{ route('diagnostik.export_rc5') }}">Export Excel</a>
            </div>
        </div>
        <div>
            <div class="table-responsive-sm">
                <table class="table table-bordered" id="recliste" style="width: 100%;">
                    <thead>
                    <tr>
                        <th>N AEJ</th>
                        <th>NOM PRENOM</th>
                        <th>SEXE</th>
                        <th>COMMUNE</th>
                        <th>DIPLOME</th>
                        <th>DUREE (h:m:s:ms)</th>
                        <th>DATE RDV</th>
                        <th>MODALITE</th>
                        <th>AXE TRAVAIL</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@endsection
@section('js')
    <script src="{{asset('jqueryui/jquery-3.3.1.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('jqueryui/jquery-ui.min.js')}}" type="text/javascript"></script>
    <script type="text/javascript" src="https://daokun.webs.com/jquery.stopwatch.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.3/moment.min.js"></script>
    <script>

            $('#recliste').DataTable({
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
                    url: '{{ route('diagnostik.listerec') }}'
                },
                columns: [
                    {data: 'matricule_aej' , orderable: false, searchable: true},
                    {data: 'nomprenom' , orderable: false, searchable: true},
                    {data: 'sexe' , orderable: false, searchable: false},
                    {data: 'lieudereisdence' , orderable: false, searchable: false},
                    {data: 'diplome', orderable: false, searchable: false},
                    {data: 'dureerencontre' , orderable: false, searchable: false},
                    {data: 'dateprochainrdv' , orderable: false, searchable: false},
                    {data: 'modalite' , orderable: false, searchable: false},
                    {data: 'axetravail', orderable: false, searchable: true},
                ]
            });

@endsection
