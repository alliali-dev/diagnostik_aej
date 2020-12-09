@extends('layouts.master')

@section('title')5eme Rencontre @endsection

@section('subTitle') par Conseil Emploie & Guichet emploi @endsection

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
                </div>
                <div class="table-responsive-sm">
                    <table class="table table-bordered" id="rec" style="width: 100%;">
                        <thead>
                        <tr>
                            <th>N AEJ</th>
                            <th>NOM PRENOM</th>
                            <th>SEXE</th>
                            <th>COMMUNE</th>
                            <th>DIPLOME</th>
                            <th>DUREE (h:m:s:ms)</th>
                            <th>DATE RDV</th>
                            <th>AXE TRAVAIL</th>
                            <th>CONSEILLER REFERENT</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center mt-2">
                        {{--  {{ $agences->links() }}--}}
                    </ul>
                </nav>
            </div>
        </div>
    </section>

@endsection
@section('js')
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="//cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script>
        $('#rec').DataTable({
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
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ],
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route('chefagence.getagencerenct5') }}'
            },
            columns: [
                {data: 'matricule_aej', orderable: false, searchable: false},
                {data: 'nomprenom' , orderable: false, searchable: false},
                {data: 'sexe' , orderable: false, searchable: false},
                {data: 'lieudereisdence', orderable: false, searchable: false},
                {data: 'diplome', orderable: false, searchable: false},
                {data: 'dureerencontre', orderable: false, searchable: false},
                {data: 'dateprochainrdv', orderable: false, searchable: false},
                {data: 'axetravail', orderable: false, searchable: false},
                {data: 'conseillerreferent', orderable: false, searchable: false},
            ]
        });
    </script>
@endsection
